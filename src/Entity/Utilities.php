<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Utilities
 *
 * @ORM\Table(name="utilities", uniqueConstraints={@ORM\UniqueConstraint(name="id", columns={"id"})})
 * @ORM\Entity
*@ORM\Entity(repositoryClass="App\Repository\UtilitiesRepository")
 */
class Utilities
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
     * @ORM\Column(name="sewer", type="string", length=50, nullable=true, options={"default"="Septic Tank"})
     */
    private $sewer = 'Septic Tank';

    /**
     * @var string|null
     *
     * @ORM\Column(name="water", type="string", length=50, nullable=true, options={"default"="Rural"})
     */
    private $water = 'Rural';

    /**
     * @var bool|null
     *
     * @ORM\Column(name="electricity", type="boolean", nullable=true, options={"default"="1"})
     */
    private $electricity = true;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="propane", type="boolean", nullable=true, options={"default"="1"})
     */
    private $propane = true;

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

    public function getSewer(): ?string
    {
        return $this->sewer;
    }

    public function setSewer(?string $sewer): static
    {
        $this->sewer = $sewer;

        return $this;
    }

    public function getWater(): ?string
    {
        return $this->water;
    }

    public function setWater(?string $water): static
    {
        $this->water = $water;

        return $this;
    }

    public function isElectricity(): ?bool
    {
        return $this->electricity;
    }

    public function setElectricity(?bool $electricity): static
    {
        $this->electricity = $electricity;

        return $this;
    }

    public function isPropane(): ?bool
    {
        return $this->propane;
    }

    public function setPropane(?bool $propane): static
    {
        $this->propane = $propane;

        return $this;
    }


}
