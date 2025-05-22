<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Parking
 *
 * @ORM\Table(name="parking", uniqueConstraints={@ORM\UniqueConstraint(name="id", columns={"id"})})
 * @ORM\Entity
*@ORM\Entity(repositoryClass="App\Repository\ParkingRepository")
 */
class Parking
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
     * @var int|null
     *
     * @ORM\Column(name="total_spaces", type="integer", nullable=true)
     */
    private $totalSpaces = '0';

    /**
     * @var int|null
     *
     * @ORM\Column(name="attached_garage_spaces", type="integer", nullable=true)
     */
    private $attachedGarageSpaces = '0';

    /**
     * @var string|null
     *
     * @ORM\Column(name="features", type="text", length=65535, nullable=true)
     */
    private $features;

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

    public function getTotalSpaces(): ?int
    {
        return $this->totalSpaces;
    }

    public function setTotalSpaces(?int $totalSpaces): static
    {
        $this->totalSpaces = $totalSpaces;

        return $this;
    }

    public function getAttachedGarageSpaces(): ?int
    {
        return $this->attachedGarageSpaces;
    }

    public function setAttachedGarageSpaces(?int $attachedGarageSpaces): static
    {
        $this->attachedGarageSpaces = $attachedGarageSpaces;

        return $this;
    }

    public function getFeatures(): ?string
    {
        return $this->features;
    }

    public function setFeatures(?string $features): static
    {
        $this->features = $features;

        return $this;
    }


}
