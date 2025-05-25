<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use App\Entity\AdminUsers;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

class AdminLoginController extends AbstractController
{
    private $security;
    private $authorizationChecker;

    public function __construct(Security $security, AuthorizationCheckerInterface $authorizationChecker)
    {
        $this->security = $security;
        $this->authorizationChecker = $authorizationChecker;
    }

    /**
     * @Route("/admin/login", name="admin_login")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // If user is already logged in, redirect based on role
        if ($this->getUser()) {
            return $this->redirectBasedOnRole();
        }

        // Get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        
        // Last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('pages/auth/signin.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error
        ]);
    }

    /**
     * @Route("/admin/login_check", name="admin_login_check")
     */
    public function loginCheck(Request $request): Response
    {
        // This method will not be executed as the security layer handles it
        // It's just here to provide the route for the security configuration
        throw new \LogicException('This method should not be called directly.');
    }

    /**
     * @Route("/admin/logout", name="admin_logout")
     */
    public function logout(): void
    {
        // This method will not be executed as the security layer handles it
        // It's just here to provide the route for the security configuration
        throw new \LogicException('This method should not be called directly.');
    }

    private function redirectBasedOnRole(): Response
    {
        $user = $this->getUser();

        if (!$user instanceof AdminUsers) {
            throw new \LogicException('The user is not an AdminUsers instance.');
        }

        // Check roles and redirect accordingly
        if ($this->authorizationChecker->isGranted('ROLE_SUPER_ADMIN')) {
            return $this->redirectToRoute('admin_dashboard_super');
        } elseif ($this->authorizationChecker->isGranted('ROLE_ADMIN')) {
            return $this->redirectToRoute('admin_dashboard');
        }

        // Default redirect if no specific role is matched
        return $this->redirectToRoute('admin_dashboard');
    }
}