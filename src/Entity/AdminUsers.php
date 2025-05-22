<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * AdminUsers
 *
 * @ORM\Table(name="admin_users", uniqueConstraints={@ORM\UniqueConstraint(name="admin_id", columns={"admin_id"}), @ORM\UniqueConstraint(name="username", columns={"username"}), @ORM\UniqueConstraint(name="email", columns={"email"})})
 * @ORM\Entity
 *@ORM\Entity(repositoryClass="App\Repository\AdminUsersRepository")
 */
class AdminUsers implements UserInterface, PasswordAuthenticatedUserInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="admin_id", type="bigint", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $adminId;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=50, nullable=false)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="password_hash", type="string", length=191, nullable=false)
     */
    private $passwordHash;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=191, nullable=false)
     */
    private $email;

    /**
     * @var string|null
     *
     * @ORM\Column(name="full_name", type="string", length=100, nullable=true)
     */
    private $fullName;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="is_superadmin", type="boolean", nullable=true)
     */
    private $isSuperadmin = '0';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="last_login", type="datetime", nullable=true)
     */
    private $lastLogin;

    /**
     * @var int|null
     *
     * @ORM\Column(name="failed_attempts", type="integer", nullable=true)
     */
    private $failedAttempts = '0';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="locked_until", type="datetime", nullable=true)
     */
    private $lockedUntil;

    /**
     * @var string|null
     *
     * @ORM\Column(name="mfa_secret", type="string", length=100, nullable=true)
     */
    private $mfaSecret;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=true, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $createdAt = 'CURRENT_TIMESTAMP';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=true, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $updatedAt = 'CURRENT_TIMESTAMP';

     /**
     * @var string|null
     *
     * @ORM\Column(name="profilePicture", type="string", length=1000, nullable=true)
     */
    private ?string $profilePicture = null;

    public function getProfilePicture(): ?string
    {
        return $this->profilePicture;
    }

    public function setProfilePicture(?string $profilePicture): static
    {
        $this->profilePicture = $profilePicture;
        return $this;
    }

    public function getAdminId(): ?string
    {
        return $this->adminId;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): static
    {
        $this->username = $username;

        return $this;
    }

    public function getPasswordHash(): ?string
    {
        return $this->passwordHash;
    }

    public function setPasswordHash(string $passwordHash): static
    {
        $this->passwordHash = $passwordHash;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getFullName(): ?string
    {
        return $this->fullName;
    }

    public function setFullName(?string $fullName): static
    {
        $this->fullName = $fullName;

        return $this;
    }

    public function isIsSuperadmin(): ?bool
    {
        return $this->isSuperadmin;
    }

    public function setIsSuperadmin(?bool $isSuperadmin): static
    {
        $this->isSuperadmin = $isSuperadmin;

        return $this;
    }

    public function getLastLogin(): ?\DateTimeInterface
    {
        return $this->lastLogin;
    }

    public function setLastLogin(?\DateTimeInterface $lastLogin): static
    {
        $this->lastLogin = $lastLogin;

        return $this;
    }

    public function getFailedAttempts(): ?int
    {
        return $this->failedAttempts;
    }

    public function setFailedAttempts(?int $failedAttempts): static
    {
        $this->failedAttempts = $failedAttempts;

        return $this;
    }

    public function getLockedUntil(): ?\DateTimeInterface
    {
        return $this->lockedUntil;
    }

    public function setLockedUntil(?\DateTimeInterface $lockedUntil): static
    {
        $this->lockedUntil = $lockedUntil;

        return $this;
    }

    public function getMfaSecret(): ?string
    {
        return $this->mfaSecret;
    }

    public function setMfaSecret(?string $mfaSecret): static
    {
        $this->mfaSecret = $mfaSecret;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?\DateTimeInterface $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeInterface $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
    public function getUserIdentifier(): string
    {
        return $this->username;
    }

    public function getPassword(): string
    {
        return $this->passwordHash;
    }

    // Only needed if you store salt separately (most hashing algorithms don't need it)
    public function getSalt(): ?string
    {
        return null;
    }

    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
    }

    public function getRoles(): array
    {
        // Customize as needed
        return $this->isSuperadmin ? ['ROLE_SUPER_ADMIN'] : ['ROLE_ADMIN'];
    }
}
