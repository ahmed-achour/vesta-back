<?php

namespace App\Controller;

use App\Entity\Users;
use App\Form\UserType;
use App\Repository\UsersRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use App\Controller\Bootstrap\DefaultLayoutController;
use App\Service\FileUploader;
use Symfony\Component\HttpFoundation\File\UploadedFile;

#[Route('/admin/users')]
class UsersController extends DefaultLayoutController
{
    #[Route('/', name: 'admin_users_index', methods: ['GET'])]
    public function index(UsersRepository $usersRepository, Request $request): Response
    {
        $user = new Users();
        $form = $this->createForm(UserType::class, $user);
        $this->theme->addVendors(['amcharts', 'amcharts-maps', 'amcharts-stock']);

        $editForms = [];
        foreach ($usersRepository->findAll() as $user) {
            $editForms[$user->getUserId()] = $this->createForm(UserType::class, $user, ['is_edit' => true])->createView();
        }

        return $this->render('pages/users/index.html.twig', [
            'users' => $usersRepository->findAll(),
            'form' => $form->createView(),
            'edit_forms' => $editForms,
        ]);
    }

    #[Route('/new', name: 'admin_users_new', methods: ['GET', 'POST'])]
    public function new(
        Request $request,
        EntityManagerInterface $entityManager,
        UserPasswordHasherInterface $passwordHasher,
        UsersRepository $usersRepository,
        FileUploader $fileUploader
    ): Response {
        $user = new Users();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var UploadedFile $profilePhotoFile */
            $profilePhotoFile = $form->get('profilePhotoFile')->getData();

            if ($profilePhotoFile) {
                $fileName = $fileUploader->upload($profilePhotoFile);
                $user->setProfilePhotoUrl('/uploads/profile_photos/' . $fileName);
            }

            $user->setPasswordHash(
                $passwordHasher->hashPassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );

            $user->setCreatedAt(new \DateTime());
            $user->setUpdatedAt(new \DateTime());
            $user->setAccountStatus('active');

            $entityManager->persist($user);
            $entityManager->flush();

            $this->addFlash('success', 'User created successfully');
            return $this->redirectToRoute('admin_users_index');
        }

        $this->theme->addVendors(['amcharts', 'amcharts-maps', 'amcharts-stock']);
        return $this->render('pages/users/index.html.twig', [
            'users' => $usersRepository->findAll(),
            'form' => $form->createView(),
            'edit_forms' => $this->createEditForms($usersRepository),
        ]);
    }

    #[Route('/{userId}/edit', name: 'admin_users_edit', methods: ['POST'])]
    public function edit(
        Request $request, 
        Users $user, 
        EntityManagerInterface $entityManager, 
        UserPasswordHasherInterface $passwordHasher, 
        UsersRepository $usersRepository, 
        FileUploader $fileUploader
    ): Response {
        $form = $this->createForm(UserType::class, $user, ['is_edit' => true]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var UploadedFile $profilePhotoFile */
            $profilePhotoFile = $form->get('profilePhotoFile')->getData();

            if ($profilePhotoFile) {
                // Remove old file if exists
                if ($user->getProfilePhotoUrl()) {
                    $oldFilePath = $this->getParameter('kernel.project_dir') . '/public' . $user->getProfilePhotoUrl();
                    if (file_exists($oldFilePath)) {
                        unlink($oldFilePath);
                    }
                }

                $fileName = $fileUploader->upload($profilePhotoFile);
                $user->setProfilePhotoUrl('/uploads/profile_photos/' . $fileName);
            }

            if ($form->get('plainPassword')->getData()) {
                $user->setPasswordHash(
                    $passwordHasher->hashPassword(
                        $user,
                        $form->get('plainPassword')->getData()
                    )
                );
            }

            $user->setUpdatedAt(new \DateTime());
            $entityManager->flush();

            $this->addFlash('success', 'User updated successfully');
            return $this->redirectToRoute('admin_users_index');
        }

        $this->theme->addVendors(['amcharts', 'amcharts-maps', 'amcharts-stock']);
        return $this->render('pages/users/index.html.twig', [
            'users' => $usersRepository->findAll(),
            'form' => $this->createForm(UserType::class, new Users())->createView(),
            'edit_forms' => $this->createEditForms($usersRepository),
        ]);
    }

    #[Route('/{userId}', name: 'admin_users_delete', methods: ['POST'])]
    public function delete(Request $request, Users $user, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $user->getUserId(), $request->request->get('_token'))) {
            // Delete profile photo if exists
            if ($user->getProfilePhotoUrl()) {
                $filePath = $this->getParameter('kernel.project_dir') . '/public' . $user->getProfilePhotoUrl();
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            }

            $entityManager->remove($user);
            $this->addFlash('success', 'User deleted successfully');
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_users_index', [], Response::HTTP_SEE_OTHER);
    }

    private function createEditForms(UsersRepository $usersRepository): array
    {
        $editForms = [];
        foreach ($usersRepository->findAll() as $user) {
            $editForms[$user->getUserId()] = $this->createForm(UserType::class, $user, ['is_edit' => true])->createView();
        }
        return $editForms;
    }
}