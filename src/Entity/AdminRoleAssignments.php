<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * AdminRoleAssignments
 *
 * @ORM\Table(name="admin_role_assignments")
 * @ORM\Entity
*@ORM\Entity(repositoryClass="App\Repository\AdminRoleAssignmentsRepository")
 */
class AdminRoleAssignments
{
    /**
     * @var int
     *
     * @ORM\Column(name="admin_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $adminId;

    /**
     * @var int
     *
     * @ORM\Column(name="role_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $roleId;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="assigned_at", type="datetime", nullable=true, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $assignedAt = 'CURRENT_TIMESTAMP';

    public function getAdminId(): ?int
    {
        return $this->adminId;
    }

    public function getRoleId(): ?int
    {
        return $this->roleId;
    }

    public function getAssignedAt(): ?\DateTimeInterface
    {
        return $this->assignedAt;
    }

    public function setAssignedAt(?\DateTimeInterface $assignedAt): static
    {
        $this->assignedAt = $assignedAt;

        return $this;
    }


}
