<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Construction
 *
 * @ORM\Table(name="construction", uniqueConstraints={@ORM\UniqueConstraint(name="id", columns={"id"})})
 * @ORM\Entity
*@ORM\Entity(repositoryClass="App\Repository\ConstructionRepository")
 */
class Construction
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
     * @var int|null
     *
     * @ORM\Column(name="property_id", type="integer", nullable=true)
     */
    private $propertyId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="builder_name", type="string", length=100, nullable=true)
     */
    private $builderName = '';

    /**
     * @var string|null
     *
     * @ORM\Column(name="construction_material", type="string", length=100, nullable=true, options={"default"="Masonite"})
     */
    private $constructionMaterial = 'Masonite';

    /**
     * @var string|null
     *
     * @ORM\Column(name="roof_type", type="string", length=50, nullable=true, options={"default"="Composition"})
     */
    private $roofType = 'Composition';

    /**
     * @var bool|null
     *
     * @ORM\Column(name="new_construction", type="boolean", nullable=true)
     */
    private $newConstruction = '0';

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getPropertyId(): ?int
    {
        return $this->propertyId;
    }

    public function setPropertyId(?int $propertyId): static
    {
        $this->propertyId = $propertyId;

        return $this;
    }

    public function getBuilderName(): ?string
    {
        return $this->builderName;
    }

    public function setBuilderName(?string $builderName): static
    {
        $this->builderName = $builderName;

        return $this;
    }

    public function getConstructionMaterial(): ?string
    {
        return $this->constructionMaterial;
    }

    public function setConstructionMaterial(?string $constructionMaterial): static
    {
        $this->constructionMaterial = $constructionMaterial;

        return $this;
    }

    public function getRoofType(): ?string
    {
        return $this->roofType;
    }

    public function setRoofType(?string $roofType): static
    {
        $this->roofType = $roofType;

        return $this;
    }

    public function isNewConstruction(): ?bool
    {
        return $this->newConstruction;
    }

    public function setNewConstruction(?bool $newConstruction): static
    {
        $this->newConstruction = $newConstruction;

        return $this;
    }


}
