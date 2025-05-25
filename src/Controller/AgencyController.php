<?php

namespace App\Controller;

use App\Entity\Agency;
use App\Form\AgencyType;
use App\Repository\AgencyRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Controller\Bootstrap\DefaultLayoutController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

#[Route('/admin/agencies')]
class AgencyController extends DefaultLayoutController
{
    #[Route('/', name: 'admin_agencies_index', methods: ['GET'])]
    public function index(AgencyRepository $agencyRepository, Request $request): Response
    {
        $agency = new Agency();
        $form = $this->createForm(AgencyType::class, $agency);
        $this->theme->addVendors(['amcharts', 'amcharts-maps', 'amcharts-stock']);

        $editForms = [];
        foreach ($agencyRepository->findAll() as $agency) {
            $editForms[$agency->getAgencyId()] = $this->createForm(AgencyType::class, $agency, ['is_edit' => true])->createView();
        }

        return $this->render('pages/agencies/index.html.twig', [
            'agencies' => $agencyRepository->findAll(),
            'form' => $form->createView(),
            'edit_forms' => $editForms,
        ]);
    }

    #[Route('/new', name: 'admin_agencies_new', methods: ['GET', 'POST'])]
    public function new(
        Request $request,
        EntityManagerInterface $entityManager,
        AgencyRepository $agencyRepository
    ): Response {
        $agency = new Agency();
        $form = $this->createForm(AgencyType::class, $agency);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $agency->setCreatedAt(new \DateTime());
            $entityManager->persist($agency);
            $entityManager->flush();

            $this->addFlash('success', 'Agency created successfully');
            return $this->redirectToRoute('admin_agencies_index');
        }

        $this->theme->addVendors(['amcharts', 'amcharts-maps', 'amcharts-stock']);
        return $this->render('pages/agencies/index.html.twig', [
            'agencies' => $agencyRepository->findAll(),
            'form' => $form->createView(),
            'edit_forms' => $this->createEditForms($agencyRepository),
        ]);
    }

    #[Route('/{agencyId}/edit', name: 'admin_agencies_edit', methods: ['POST'])]
    public function edit(
        Request $request, 
        Agency $agency, 
        EntityManagerInterface $entityManager, 
        AgencyRepository $agencyRepository
    ): Response {
        $form = $this->createForm(AgencyType::class, $agency, ['is_edit' => true]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();
            $this->addFlash('success', 'Agency updated successfully');
            return $this->redirectToRoute('admin_agencies_index');
        }

        $this->theme->addVendors(['amcharts', 'amcharts-maps', 'amcharts-stock']);
        return $this->render('pages/agencies/index.html.twig', [
            'agencies' => $agencyRepository->findAll(),
            'form' => $this->createForm(AgencyType::class, new Agency())->createView(),
            'edit_forms' => $this->createEditForms($agencyRepository),
        ]);
    }

    #[Route('/{agencyId}', name: 'admin_agencies_delete', methods: ['POST'])]
    public function delete(Request $request, Agency $agency, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $agency->getAgencyId(), $request->request->get('_token'))) {
            $entityManager->remove($agency);
            $this->addFlash('success', 'Agency deleted successfully');
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_agencies_index', [], Response::HTTP_SEE_OTHER);
    }

    private function createEditForms(AgencyRepository $agencyRepository): array
    {
        $editForms = [];
        foreach ($agencyRepository->findAll() as $agency) {
            $editForms[$agency->getAgencyId()] = $this->createForm(AgencyType::class, $agency, ['is_edit' => true])->createView();
        }
        return $editForms;
    }
    
    #[Route('/signin', name: 'agency_signin')]
    public function signin(AuthenticationUtils $authenticationUtils): Response
    {
        // if user is already logged in, redirect to dashboard
        if ($this->getUser()) {
            return $this->redirectToRoute('admin_agencies_index');
        }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('signin.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error
        ]);
    }

    #[Route('/signup', name: 'agency_signup')]
    public function signup(Request $request, UserPasswordHasherInterface $passwordHasher, EntityManagerInterface $entityManager): Response
    {
        // if user is already logged in, redirect to dashboard
        if ($this->getUser()) {
            return $this->redirectToRoute('admin_agencies_index');
        }

        $agency = new Agency();
        
        if ($request->isMethod('POST')) {
            $email = $request->request->get('email');
            $plainPassword = $request->request->get('password');
            $confirmPassword = $request->request->get('confirm-password');
            
            // Basic validation
            if ($plainPassword !== $confirmPassword) {
                $this->addFlash('error', 'Passwords do not match');
                return $this->redirectToRoute('agency_signup');
            }
            
            // Hash the password
            $hashedPassword = $passwordHasher->hashPassword($agency, $plainPassword);
            
            $agency->setEmail($email);
            $agency->setPassword($hashedPassword);
            $agency->setCreatedAt(new \DateTime());
            
            $entityManager->persist($agency);
            $entityManager->flush();
            
            $this->addFlash('success', 'Registration successful! Please sign in.');
            return $this->redirectToRoute('agency_signin');
        }

        return $this->render('signup.html.twig');
    }

    #[Route('/logout', name: 'agency_logout')]
    public function logout(): void
    {
        // controller can be blank: it will be intercepted by the logout key on your firewall
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}