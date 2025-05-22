<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * AdminAuditLog
 *
 * @ORM\Table(name="admin_audit_log", uniqueConstraints={@ORM\UniqueConstraint(name="log_id", columns={"log_id"})})
 * @ORM\Entity
 *@ORM\Entity(repositoryClass="App\Repository\AdminAuditLogRepository")
 */
class AdminAuditLog
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
     * @ORM\Column(name="admin_id", type="integer", nullable=true)
     */
    private $adminId;

    /**
     * @var string
     *
     * @ORM\Column(name="action_type", type="string", length=50, nullable=false)
     */
    private $actionType;

    /**
     * @var string|null
     *
     * @ORM\Column(name="entity_type", type="string", length=50, nullable=true)
     */
    private $entityType;

    /**
     * @var int|null
     *
     * @ORM\Column(name="entity_id", type="integer", nullable=true)
     */
    private $entityId;

    /**
     * @var array|null
     *
     * @ORM\Column(name="old_values", type="json", nullable=true)
     */
    private $oldValues;

    /**
     * @var array|null
     *
     * @ORM\Column(name="new_values", type="json", nullable=true)
     */
    private $newValues;

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

    public function getAdminId(): ?int
    {
        return $this->adminId;
    }

    public function setAdminId(?int $adminId): static
    {
        $this->adminId = $adminId;

        return $this;
    }

    public function getActionType(): ?string
    {
        return $this->actionType;
    }

    public function setActionType(string $actionType): static
    {
        $this->actionType = $actionType;

        return $this;
    }

    public function getEntityType(): ?string
    {
        return $this->entityType;
    }

    public function setEntityType(?string $entityType): static
    {
        $this->entityType = $entityType;

        return $this;
    }

    public function getEntityId(): ?int
    {
        return $this->entityId;
    }

    public function setEntityId(?int $entityId): static
    {
        $this->entityId = $entityId;

        return $this;
    }

    public function getOldValues(): ?array
    {
        return $this->oldValues;
    }

    public function setOldValues(?array $oldValues): static
    {
        $this->oldValues = $oldValues;

        return $this;
    }

    public function getNewValues(): ?array
    {
        return $this->newValues;
    }

    public function setNewValues(?array $newValues): static
    {
        $this->newValues = $newValues;

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
