<?php
namespace App\Security;

use App\Entity\Agency;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Exception\UserNotFoundException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;

use Symfony\Component\Security\Core\Exception\UnsupportedUserException;

class AgencyProvider implements UserProviderInterface
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function loadUserByIdentifier(string $identifier): UserInterface
    {
        // Agencies might authenticate by email or other identifier
        $agency = $this->entityManager->getRepository(Agency::class)
            ->findOneBy(['email' => $identifier]); // Add email field to Agency if needed

        if (!$agency) {
            throw new UserNotFoundException(sprintf('Agency with identifier "%s" not found.', $identifier));
        }

        return $agency;
    }

    public function refreshUser(UserInterface $user): UserInterface
    {
        if (!$user instanceof Agency) {
            throw new UnsupportedUserException(
                sprintf('Instances of "%s" are not supported.', get_class($user))
            );
        }

        return $this->loadUserByIdentifier($user->getUserIdentifier());
    }

    public function supportsClass(string $class): bool
    {
        return Agency::class === $class || is_subclass_of($class, Agency::class);
    }

    // For Symfony <5.4 compatibility
    public function loadUserByUsername(string $username): UserInterface
    {
        return $this->loadUserByIdentifier($username);
    }
}