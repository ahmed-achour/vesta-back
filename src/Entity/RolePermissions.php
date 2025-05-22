<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * RolePermissions
 *
 * @ORM\Table(name="role_permissions")
 * @ORM\Entity
*@ORM\Entity(repositoryClass="App\Repository\RolePermissionsRepository")
 */
class RolePermissions
{
    /**
     * @var int
     *
     * @ORM\Column(name="role_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $roleId;

    /**
     * @var int
     *
     * @ORM\Column(name="permission_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $permissionId;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="assigned_at", type="datetime", nullable=true, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $assignedAt = 'CURRENT_TIMESTAMP';

    public function getRoleId(): ?int
    {
        return $this->roleId;
    }

    public function getPermissionId(): ?int
    {
        return $this->permissionId;
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
