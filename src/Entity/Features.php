<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Features
 *
 * @ORM\Table(name="features", uniqueConstraints={@ORM\UniqueConstraint(name="id", columns={"id"}), @ORM\UniqueConstraint(name="name", columns={"name"})})
 * @ORM\Entity
*@ORM\Entity(repositoryClass="App\Repository\FeaturesRepository")
 */
class Features
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="bigint", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="name", type="string", length=100, nullable=true)
     */
    private $name;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): static
    {
        $this->name = $name;

        return $this;
    }


}
