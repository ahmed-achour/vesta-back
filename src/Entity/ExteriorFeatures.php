<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * ExteriorFeatures
 *
 * @ORM\Table(name="exterior_features", uniqueConstraints={@ORM\UniqueConstraint(name="id", columns={"id"})})
 * @ORM\Entity
*@ORM\Entity(repositoryClass="App\Repository\ExteriorFeaturesRepository")
 */
class ExteriorFeatures
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
     * @ORM\Column(name="levels", type="string", length=50, nullable=true, options={"default"="One Level"})
     */
    private $levels = 'One Level';

    /**
     * @var string|null
     *
     * @ORM\Column(name="patio_deck", type="text", length=65535, nullable=true)
     */
    private $patioDeck;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="spa", type="boolean", nullable=true)
     */
    private $spa = '0';

    /**
     * @var string|null
     *
     * @ORM\Column(name="spa_features", type="string", length=100, nullable=true)
     */
    private $spaFeatures = '';

    /**
     * @var string|null
     *
     * @ORM\Column(name="waterfront", type="string", length=100, nullable=true)
     */
    private $waterfront = '';

    /**
     * @var string|null
     *
     * @ORM\Column(name="additional_structures", type="string", length=100, nullable=true, options={"default"="None"})
     */
    private $additionalStructures = 'None';

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

    public function getLevels(): ?string
    {
        return $this->levels;
    }

    public function setLevels(?string $levels): static
    {
        $this->levels = $levels;

        return $this;
    }

    public function getPatioDeck(): ?string
    {
        return $this->patioDeck;
    }

    public function setPatioDeck(?string $patioDeck): static
    {
        $this->patioDeck = $patioDeck;

        return $this;
    }

    public function isSpa(): ?bool
    {
        return $this->spa;
    }

    public function setSpa(?bool $spa): static
    {
        $this->spa = $spa;

        return $this;
    }

    public function getSpaFeatures(): ?string
    {
        return $this->spaFeatures;
    }

    public function setSpaFeatures(?string $spaFeatures): static
    {
        $this->spaFeatures = $spaFeatures;

        return $this;
    }

    public function getWaterfront(): ?string
    {
        return $this->waterfront;
    }

    public function setWaterfront(?string $waterfront): static
    {
        $this->waterfront = $waterfront;

        return $this;
    }

    public function getAdditionalStructures(): ?string
    {
        return $this->additionalStructures;
    }

    public function setAdditionalStructures(?string $additionalStructures): static
    {
        $this->additionalStructures = $additionalStructures;

        return $this;
    }


}
