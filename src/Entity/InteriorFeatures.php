<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * InteriorFeatures
 *
 * @ORM\Table(name="interior_features", uniqueConstraints={@ORM\UniqueConstraint(name="id", columns={"id"})})
 * @ORM\Entity
*@ORM\Entity(repositoryClass="App\Repository\InteriorFeaturesRepository")
 */
class InteriorFeatures
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
     * @ORM\Column(name="heating", type="string", length=50, nullable=true, options={"default"="Propane"})
     */
    private $heating = 'Propane';

    /**
     * @var string|null
     *
     * @ORM\Column(name="cooling", type="string", length=50, nullable=true, options={"default"="Central Air"})
     */
    private $cooling = 'Central Air';

    /**
     * @var string|null
     *
     * @ORM\Column(name="flooring", type="string", length=100, nullable=true, options={"default"="Carpet"})
     */
    private $flooring = 'Carpet';

    /**
     * @var string|null
     *
     * @ORM\Column(name="basement", type="string", length=255, nullable=true, options={"default"="Full"})
     */
    private $basement = 'Full';

    /**
     * @var string|null
     *
     * @ORM\Column(name="appliances", type="string", length=500, nullable=true)
     */
    private $appliances = '';

    /**
     * @var string|null
     *
     * @ORM\Column(name="fireplace_locations", type="string", length=255, nullable=true)
     */
    private $fireplaceLocations = '';

    /**
     * @var bool|null
     *
     * @ORM\Column(name="ceiling_fan", type="boolean", nullable=true)
     */
    private $ceilingFan = '0';

    /**
     * @var bool|null
     *
     * @ORM\Column(name="eat_in_kitchen", type="boolean", nullable=true)
     */
    private $eatInKitchen = '0';

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

    public function getHeating(): ?string
    {
        return $this->heating;
    }

    public function setHeating(?string $heating): static
    {
        $this->heating = $heating;

        return $this;
    }

    public function getCooling(): ?string
    {
        return $this->cooling;
    }

    public function setCooling(?string $cooling): static
    {
        $this->cooling = $cooling;

        return $this;
    }

    public function getFlooring(): ?string
    {
        return $this->flooring;
    }

    public function setFlooring(?string $flooring): static
    {
        $this->flooring = $flooring;

        return $this;
    }

    public function getBasement(): ?string
    {
        return $this->basement;
    }

    public function setBasement(?string $basement): static
    {
        $this->basement = $basement;

        return $this;
    }

    public function getAppliances(): ?string
    {
        return $this->appliances;
    }

    public function setAppliances(?string $appliances): static
    {
        $this->appliances = $appliances;

        return $this;
    }

    public function getFireplaceLocations(): ?string
    {
        return $this->fireplaceLocations;
    }

    public function setFireplaceLocations(?string $fireplaceLocations): static
    {
        $this->fireplaceLocations = $fireplaceLocations;

        return $this;
    }

    public function isCeilingFan(): ?bool
    {
        return $this->ceilingFan;
    }

    public function setCeilingFan(?bool $ceilingFan): static
    {
        $this->ceilingFan = $ceilingFan;

        return $this;
    }

    public function isEatInKitchen(): ?bool
    {
        return $this->eatInKitchen;
    }

    public function setEatInKitchen(?bool $eatInKitchen): static
    {
        $this->eatInKitchen = $eatInKitchen;

        return $this;
    }


}
