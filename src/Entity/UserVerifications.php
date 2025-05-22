<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * UserVerifications
 *
 * @ORM\Table(name="user_verifications", uniqueConstraints={@ORM\UniqueConstraint(name="verification_id", columns={"verification_id"})})
 * @ORM\Entity
*@ORM\Entity(repositoryClass="App\Repository\UserVerificationsRepository")
 */
class UserVerifications
{
    /**
     * @var int
     *
     * @ORM\Column(name="verification_id", type="bigint", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $verificationId;

    /**
     * @var int|null
     *
     * @ORM\Column(name="user_id", type="integer", nullable=true)
     */
    private $userId;

    /**
     * @var string
     *
     * @ORM\Column(name="verification_type", type="string", length=20, nullable=false)
     */
    private $verificationType;

    /**
     * @var string
     *
     * @ORM\Column(name="token", type="string", length=255, nullable=false)
     */
    private $token;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="expires_at", type="datetime", nullable=false)
     */
    private $expiresAt;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="completed", type="boolean", nullable=true)
     */
    private $completed = '0';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=true, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $createdAt = 'CURRENT_TIMESTAMP';

    public function getVerificationId(): ?string
    {
        return $this->verificationId;
    }

    public function getUserId(): ?int
    {
        return $this->userId;
    }

    public function setUserId(?int $userId): static
    {
        $this->userId = $userId;

        return $this;
    }

    public function getVerificationType(): ?string
    {
        return $this->verificationType;
    }

    public function setVerificationType(string $verificationType): static
    {
        $this->verificationType = $verificationType;

        return $this;
    }

    public function getToken(): ?string
    {
        return $this->token;
    }

    public function setToken(string $token): static
    {
        $this->token = $token;

        return $this;
    }

    public function getExpiresAt(): ?\DateTimeInterface
    {
        return $this->expiresAt;
    }

    public function setExpiresAt(\DateTimeInterface $expiresAt): static
    {
        $this->expiresAt = $expiresAt;

        return $this;
    }

    public function isCompleted(): ?bool
    {
        return $this->completed;
    }

    public function setCompleted(?bool $completed): static
    {
        $this->completed = $completed;

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


}
