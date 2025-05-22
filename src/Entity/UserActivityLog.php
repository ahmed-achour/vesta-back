<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * UserActivityLog
 *
 * @ORM\Table(name="user_activity_log", uniqueConstraints={@ORM\UniqueConstraint(name="log_id", columns={"log_id"})})
 * @ORM\Entity
*@ORM\Entity(repositoryClass="App\Repository\UserActivityLogRepository")
 */
class UserActivityLog
{
    /**
     * @var int
     *
     * @ORM\Column(name="log_id", type="bigint", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $logId;

    /**
     * @var int|null
     *
     * @ORM\Column(name="user_id", type="integer", nullable=true)
     */
    private $userId;

    /**
     * @var string
     *
     * @ORM\Column(name="activity_type", type="string", length=50, nullable=false)
     */
    private $activityType;

    /**
     * @var array|null
     *
     * @ORM\Column(name="activity_details", type="json", nullable=true)
     */
    private $activityDetails;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ip_address", type="string", length=45, nullable=true)
     */
    private $ipAddress;

    /**
     * @var string|null
     *
     * @ORM\Column(name="user_agent", type="text", length=65535, nullable=true)
     */
    private $userAgent;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=true, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $createdAt = 'CURRENT_TIMESTAMP';

    public function getLogId(): ?string
    {
        return $this->logId;
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

    public function getActivityType(): ?string
    {
        return $this->activityType;
    }

    public function setActivityType(string $activityType): static
    {
        $this->activityType = $activityType;

        return $this;
    }

    public function getActivityDetails(): ?array
    {
        return $this->activityDetails;
    }

    public function setActivityDetails(?array $activityDetails): static
    {
        $this->activityDetails = $activityDetails;

        return $this;
    }

    public function getIpAddress(): ?string
    {
        return $this->ipAddress;
    }

    public function setIpAddress(?string $ipAddress): static
    {
        $this->ipAddress = $ipAddress;

        return $this;
    }

    public function getUserAgent(): ?string
    {
        return $this->userAgent;
    }

    public function setUserAgent(?string $userAgent): static
    {
        $this->userAgent = $userAgent;

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
