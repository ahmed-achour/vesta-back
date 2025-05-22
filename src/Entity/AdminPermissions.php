<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * AdminPermissions
 *
 * @ORM\Table(name="admin_permissions", uniqueConstraints={@ORM\UniqueConstraint(name="permission_id", columns={"permission_id"}), @ORM\UniqueConstraint(name="permission_key", columns={"permission_key"})})
 * @ORM\Entity
*@ORM\Entity(repositoryClass="App\Repository\AdminPermissionsRepository")
 */
class AdminPermissions
{
    /**
     * @var int
     *
     * @ORM\Column(name="permission_id", type="bigint", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $permissionId;

    /**
     * @var string
     *
     * @ORM\Column(name="permission_key", type="string", length=100, nullable=false)
     */
    private $permissionKey;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=true)
     */
    private $description;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=true, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $createdAt = 'CURRENT_TIMESTAMP';

    public function getPermissionId(): ?string
    {
        return $this->permissionId;
    }

    public function getPermissionKey(): ?string
    {
        return $this->permissionKey;
    }

    public function setPermissionKey(string $permissionKey): static
    {
        $this->permissionKey = $permissionKey;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

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
