<?php

namespace App\Controller;

use App\Entity\AdminUsers;
use App\Form\AdminUsersType;
use App\Repository\AdminUsersRepository;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use App\Controller\Bootstrap\DefaultLayoutController;
use App\Service\FileUploader;
use Symfony\Component\HttpFoundation\File\UploadedFile;

#[Route('/admin/admin-users')]
class AdminUsersController extends DefaultLayoutController
{
    #[Route('/', name: 'admin_admin_users_index', methods: ['GET'])]
    public function index(AdminUsersRepository $adminUsersRepository, Request $request): Response
    {
        $adminUser = new AdminUsers();
        $form = $this->createForm(AdminUsersType::class, $adminUser);
        $this->theme->addVendors(['amcharts', 'amcharts-maps', 'amcharts-stock']);

        $editForms = [];
        foreach ($adminUsersRepository->findAll() as $user) {
            $editForms[$user->getAdminId()] = $this->createForm(AdminUsersType::class, $user, ['is_edit' => true])->createView();
        }

        return $this->render('pages/admin/admin_users/index.html.twig', [
            'admin_users' => $adminUsersRepository->findAll(),
            'form' => $form->createView(),
            'edit_forms' => $editForms,
        ]);
    }

    #[Route('/new', name: 'admin_admin_users_new', methods: ['GET', 'POST'])]
    public function new(
        Request $request,
        EntityManagerInterface $entityManager,
        UserPasswordHasherInterface $passwordHasher,
        AdminUsersRepository $adminUsersRepository,
        FileUploader $fileUploader
    ): Response {
        $adminUser = new AdminUsers();
        $form = $this->createForm(AdminUsersType::class, $adminUser);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var UploadedFile $profilePictureFile */
            $profilePictureFile = $form->get('profilePictureFile')->getData();

            if ($profilePictureFile) {
                $fileName = $fileUploader->upload($profilePictureFile);
                // Store the complete path here
                $adminUser->setProfilePicture('/uploads/profile_pictures/' . $fileName);
            }
            $adminUser->setPasswordHash(
                $passwordHasher->hashPassword(
                    $adminUser,
                    $form->get('plainPassword')->getData()
                )
            );

            $adminUser->setCreatedAt(new \DateTime());
            $adminUser->setUpdatedAt(new \DateTime());

            $entityManager->persist($adminUser);
            $entityManager->flush();

            $this->addFlash('success', 'Admin user created successfully');
            return $this->redirectToRoute('admin_admin_users_index');
        }

        $this->theme->addVendors(['amcharts', 'amcharts-maps', 'amcharts-stock']);
        return $this->render('pages/admin/admin_users/index.html.twig', [
            'admin_users' => $adminUsersRepository->findAll(),
            'form' => $form->createView(),
            'edit_forms' => $this->createEditForms($adminUsersRepository),
        ]);
    }

    #[Route('/{adminId}/edit', name: 'admin_admin_users_edit', methods: ['POST'])]
    public function edit(Request $request, AdminUsers $adminUser, EntityManagerInterface $entityManager, UserPasswordHasherInterface $passwordHasher, AdminUsersRepository $adminUsersRepository, FileUploader $fileUploader): Response
    {
        $form = $this->createForm(AdminUsersType::class, $adminUser, ['is_edit' => true]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var UploadedFile $profilePictureFile */
            $profilePictureFile = $form->get('profilePictureFile')->getData();

            if ($profilePictureFile) {
                // Remove old file if exists
                if ($adminUser->getProfilePicture()) {
                    $oldFilePath = $this->getParameter('kernel.project_dir') . '/public' . $adminUser->getProfilePicture();
                    if (file_exists($oldFilePath)) {
                        unlink($oldFilePath);
                    }
                }

                $fileName = $fileUploader->upload($profilePictureFile);
                $adminUser->setProfilePicture('/uploads/profile_pictures/' . $fileName);
            }
            if ($form->get('plainPassword')->getData()) {
                $adminUser->setPasswordHash(
                    $passwordHasher->hashPassword(
                        $adminUser,
                        $form->get('plainPassword')->getData()
                    )
                );
            }

            $adminUser->setUpdatedAt(new \DateTime());
            $entityManager->flush();

            $this->addFlash('success', 'Admin user updated successfully');
            return $this->redirectToRoute('admin_admin_users_index');
        }

        $this->theme->addVendors(['amcharts', 'amcharts-maps', 'amcharts-stock']);
        return $this->render('pages/admin/admin_users/index.html.twig', [
            'admin_users' => $adminUsersRepository->findAll(),
            'form' => $this->createForm(AdminUsersType::class, new AdminUsers())->createView(),
            'edit_forms' => $this->createEditForms($adminUsersRepository),
        ]);
    }

    private function createEditForms(AdminUsersRepository $adminUsersRepository): array
    {
        $editForms = [];
        foreach ($adminUsersRepository->findAll() as $user) {
            $editForms[$user->getAdminId()] = $this->createForm(AdminUsersType::class, $user, ['is_edit' => true])->createView();
        }
        return $editForms;
    }

    #[Route('/{adminId}', name: 'admin_admin_users_delete', methods: ['POST'])]
    public function delete(Request $request, AdminUsers $adminUser, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $adminUser->getAdminId(), $request->request->get('_token'))) {
            $entityManager->remove($adminUser);
            $this->addFlash('success', 'Admin user deleted successfully');

            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_admin_users_index', [], Response::HTTP_SEE_OTHER);
    }
}
