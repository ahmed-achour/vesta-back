<?php

namespace App\Controller;

use App\Entity\Agents;
use App\Form\AgentType;
use App\Repository\AgentsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Controller\Bootstrap\DefaultLayoutController;
use App\Service\FileUploader;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Security\Core\Security;

#[Route('/admin/agents')]
class AgentsController extends DefaultLayoutController
{
    #[Route('/', name: 'admin_agents_index', methods: ['GET'])]
    public function index(AgentsRepository $agentsRepository, Request $request): Response
    {
        $agent = new Agents();
        $form = $this->createForm(AgentType::class, $agent);
        $this->theme->addVendors(['amcharts', 'amcharts-maps', 'amcharts-stock']);

        $editForms = [];
        foreach ($agentsRepository->findAll() as $agent) {
            $editForms[$agent->getAgentId()] = $this->createForm(AgentType::class, $agent, ['is_edit' => true])->createView();
        }

        return $this->render('pages/agents/index.html.twig', [
            'agents' => $agentsRepository->findAll(),
            'form' => $form->createView(),
            'edit_forms' => $editForms,
        ]);
    }

    #[Route('/new', name: 'admin_agents_new', methods: ['GET', 'POST'])]
    public function new(
        Request $request,
        EntityManagerInterface $entityManager,
        AgentsRepository $agentsRepository,
        FileUploader $fileUploader
    ): Response {
        $agent = new Agents();
        $form = $this->createForm(AgentType::class, $agent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $agent->setJoinDate(new \DateTime());
            $agent->setActive(true);

            $entityManager->persist($agent);
            $entityManager->flush();

            $this->addFlash('success', 'Agent created successfully');
            return $this->redirectToRoute('admin_agents_index');
        }

        $this->theme->addVendors(['amcharts', 'amcharts-maps', 'amcharts-stock']);
        return $this->render('pages/agents/index.html.twig', [
            'agents' => $agentsRepository->findAll(),
            'form' => $form->createView(),
            'edit_forms' => $this->createEditForms($agentsRepository),
        ]);
    }

    #[Route('/{agentId}/edit', name: 'admin_agents_edit', methods: ['POST'])]
    public function edit(
        Request $request, 
        Agents $agent, 
        EntityManagerInterface $entityManager, 
        AgentsRepository $agentsRepository
    ): Response {
        $form = $this->createForm(AgentType::class, $agent, ['is_edit' => true]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();
            $this->addFlash('success', 'Agent updated successfully');
            return $this->redirectToRoute('admin_agents_index');
        }

        $this->theme->addVendors(['amcharts', 'amcharts-maps', 'amcharts-stock']);
        return $this->render('pages/agents/index.html.twig', [
            'agents' => $agentsRepository->findAll(),
            'form' => $this->createForm(AgentType::class, new Agents())->createView(),
            'edit_forms' => $this->createEditForms($agentsRepository),
        ]);
    }

    #[Route('/{agentId}', name: 'admin_agents_delete', methods: ['POST'])]
    public function delete(Request $request, Agents $agent, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $agent->getAgentId(), $request->request->get('_token'))) {
            $entityManager->remove($agent);
            $this->addFlash('success', 'Agent deleted successfully');
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_agents_index', [], Response::HTTP_SEE_OTHER);
    }

    private function createEditForms(AgentsRepository $agentsRepository): array
    {
        $editForms = [];
        foreach ($agentsRepository->findAll() as $agent) {
            $editForms[$agent->getAgentId()] = $this->createForm(AgentType::class, $agent, ['is_edit' => true])->createView();
        }
        return $editForms;
    }
     #[Route('/signin', name: 'agent_signin')]
    public function signin(AuthenticationUtils $authenticationUtils): Response
    {
        // if user is already logged in, redirect to dashboard
        if ($this->getUser()) {
            return $this->redirectToRoute('admin_agents_index');
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

    #[Route('/signup', name: 'agent_signup')]
    public function signup(Request $request, UserPasswordHasherInterface $passwordHasher, EntityManagerInterface $entityManager): Response
    {
        // if user is already logged in, redirect to dashboard
        if ($this->getUser()) {
            return $this->redirectToRoute('admin_agents_index');
        }

        $agent = new Agents();
        
        if ($request->isMethod('POST')) {
            $email = $request->request->get('email');
            $firstName = $request->request->get('first_name');
            $lastName = $request->request->get('last_name');
            $plainPassword = $request->request->get('password');
            $confirmPassword = $request->request->get('confirm-password');
            
            // Basic validation
            if ($plainPassword !== $confirmPassword) {
                $this->addFlash('error', 'Passwords do not match');
                return $this->redirectToRoute('agent_signup');
            }
            
            // Hash the password
            $hashedPassword = $passwordHasher->hashPassword($agent, $plainPassword);
            
            $agent->setEmail($email);
            $agent->setFirstName($firstName);
            $agent->setLastName($lastName);
            $agent->setPassword($hashedPassword);
            $agent->setJoinDate(new \DateTime());
            $agent->setActive(true);
            
            $entityManager->persist($agent);
            $entityManager->flush();
            
            $this->addFlash('success', 'Registration successful! Please sign in.');
            return $this->redirectToRoute('agent_signin');
        }

        return $this->render('signup.html.twig');
    }

    #[Route('/logout', name: 'agent_logout')]
    public function logout(): void
    {
        // controller can be blank: it will be intercepted by the logout key on your firewall
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}