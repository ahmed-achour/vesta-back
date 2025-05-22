<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * AdminRoles
 *
 * @ORM\Table(name="admin_roles", uniqueConstraints={@ORM\UniqueConstraint(name="role_id", columns={"role_id"}), @ORM\UniqueConstraint(name="role_name", columns={"role_name"})})
 * @ORM\Entity
*@ORM\Entity(repositoryClass="App\Repository\AdminRolesRepository")
 */
class AdminRoles
{
    /**
     * @var int
     *
     * @ORM\Column(name="role_id", type="bigint", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $roleId;

    /**
     * @var string
     *
     * @ORM\Column(name="role_name", type="string", length=50, nullable=false)
     */
    private $roleName;

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

    public function getRoleId(): ?string
    {
        return $this->roleId;
    }

    public function getRoleName(): ?string
    {
        return $this->roleName;
    }

    public function setRoleName(string $roleName): static
    {
        $this->roleName = $roleName;

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
