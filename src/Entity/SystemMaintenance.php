<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * SystemMaintenance
 *
 * @ORM\Table(name="system_maintenance", uniqueConstraints={@ORM\UniqueConstraint(name="maintenance_id", columns={"maintenance_id"})})
 * @ORM\Entity
*@ORM\Entity(repositoryClass="App\Repository\SystemMaintenanceRepository")
 */
class SystemMaintenance
{
    /**
     * @var int
     *
     * @ORM\Column(name="maintenance_id", type="bigint", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $maintenanceId;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=false)
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="start_time", type="datetime", nullable=false)
     */
    private $startTime;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="end_time", type="datetime", nullable=true)
     */
    private $endTime;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="is_active", type="boolean", nullable=true)
     */
    private $isActive = '0';

    /**
     * @var int|null
     *
     * @ORM\Column(name="initiated_by", type="integer", nullable=true)
     */
    private $initiatedBy;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=true, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $createdAt = 'CURRENT_TIMESTAMP';

    public function getMaintenanceId(): ?string
    {
        return $this->maintenanceId;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getStartTime(): ?\DateTimeInterface
    {
        return $this->startTime;
    }

    public function setStartTime(\DateTimeInterface $startTime): static
    {
        $this->startTime = $startTime;

        return $this;
    }

    public function getEndTime(): ?\DateTimeInterface
    {
        return $this->endTime;
    }

    public function setEndTime(?\DateTimeInterface $endTime): static
    {
        $this->endTime = $endTime;

        return $this;
    }

    public function isIsActive(): ?bool
    {
        return $this->isActive;
    }

    public function setIsActive(?bool $isActive): static
    {
        $this->isActive = $isActive;

        return $this;
    }

    public function getInitiatedBy(): ?int
    {
        return $this->initiatedBy;
    }

    public function setInitiatedBy(?int $initiatedBy): static
    {
        $this->initiatedBy = $initiatedBy;

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
