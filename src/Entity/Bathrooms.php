<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Bathrooms
 *
 * @ORM\Table(name="bathrooms", uniqueConstraints={@ORM\UniqueConstraint(name="id", columns={"id"})})
 * @ORM\Entity
*@ORM\Entity(repositoryClass="App\Repository\BathroomsRepository")
 */
class Bathrooms
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
     * @ORM\Column(name="full_bathrooms", type="integer", nullable=true)
     */
    private $fullBathrooms = '0';

    /**
     * @var int|null
     *
     * @ORM\Column(name="three_quarter_bathrooms", type="integer", nullable=true)
     */
    private $threeQuarterBathrooms = '0';

    /**
     * @var int|null
     *
     * @ORM\Column(name="half_bathrooms", type="integer", nullable=true)
     */
    private $halfBathrooms = '0';

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

    public function getFullBathrooms(): ?int
    {
        return $this->fullBathrooms;
    }

    public function setFullBathrooms(?int $fullBathrooms): static
    {
        $this->fullBathrooms = $fullBathrooms;

        return $this;
    }

    public function getThreeQuarterBathrooms(): ?int
    {
        return $this->threeQuarterBathrooms;
    }

    public function setThreeQuarterBathrooms(?int $threeQuarterBathrooms): static
    {
        $this->threeQuarterBathrooms = $threeQuarterBathrooms;

        return $this;
    }

    public function getHalfBathrooms(): ?int
    {
        return $this->halfBathrooms;
    }

    public function setHalfBathrooms(?int $halfBathrooms): static
    {
        $this->halfBathrooms = $halfBathrooms;

        return $this;
    }


}
