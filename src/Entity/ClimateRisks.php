<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * ClimateRisks
 *
 * @ORM\Table(name="climate_risks", uniqueConstraints={@ORM\UniqueConstraint(name="id", columns={"id"})})
 * @ORM\Entity
*@ORM\Entity(repositoryClass="App\Repository\ClimateRisksRepository")
 */
class ClimateRisks
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
     * @ORM\Column(name="flood_factor", type="integer", nullable=true, options={"default"="1"})
     */
    private $floodFactor = 1;

    /**
     * @var int|null
     *
     * @ORM\Column(name="fire_factor", type="integer", nullable=true, options={"default"="1"})
     */
    private $fireFactor = 1;

    /**
     * @var int|null
     *
     * @ORM\Column(name="wind_factor", type="integer", nullable=true, options={"default"="1"})
     */
    private $windFactor = 1;

    /**
     * @var int|null
     *
     * @ORM\Column(name="air_factor", type="integer", nullable=true, options={"default"="1"})
     */
    private $airFactor = 1;

    /**
     * @var int|null
     *
     * @ORM\Column(name="heat_factor", type="integer", nullable=true, options={"default"="1"})
     */
    private $heatFactor = 1;

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

    public function getFloodFactor(): ?int
    {
        return $this->floodFactor;
    }

    public function setFloodFactor(?int $floodFactor): static
    {
        $this->floodFactor = $floodFactor;

        return $this;
    }

    public function getFireFactor(): ?int
    {
        return $this->fireFactor;
    }

    public function setFireFactor(?int $fireFactor): static
    {
        $this->fireFactor = $fireFactor;

        return $this;
    }

    public function getWindFactor(): ?int
    {
        return $this->windFactor;
    }

    public function setWindFactor(?int $windFactor): static
    {
        $this->windFactor = $windFactor;

        return $this;
    }

    public function getAirFactor(): ?int
    {
        return $this->airFactor;
    }

    public function setAirFactor(?int $airFactor): static
    {
        $this->airFactor = $airFactor;

        return $this;
    }

    public function getHeatFactor(): ?int
    {
        return $this->heatFactor;
    }

    public function setHeatFactor(?int $heatFactor): static
    {
        $this->heatFactor = $heatFactor;

        return $this;
    }


}
