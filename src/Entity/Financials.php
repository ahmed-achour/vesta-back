<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Financials
 *
 * @ORM\Table(name="financials", uniqueConstraints={@ORM\UniqueConstraint(name="id", columns={"id"})})
 * @ORM\Entity
*@ORM\Entity(repositoryClass="App\Repository\FinancialsRepository")
 */
class Financials
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
     * @ORM\Column(name="assessed_value", type="decimal", precision=12, scale=2, nullable=true, options={"default"="0.00"})
     */
    private $assessedValue = '0.00';

    /**
     * @var string|null
     *
     * @ORM\Column(name="tax_amount", type="decimal", precision=10, scale=2, nullable=true, options={"default"="0.00"})
     */
    private $taxAmount = '0.00';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ownership_type", type="string", length=50, nullable=true, options={"default"="Private"})
     */
    private $ownershipType = 'Private';

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

    public function getAssessedValue(): ?string
    {
        return $this->assessedValue;
    }

    public function setAssessedValue(?string $assessedValue): static
    {
        $this->assessedValue = $assessedValue;

        return $this;
    }

    public function getTaxAmount(): ?string
    {
        return $this->taxAmount;
    }

    public function setTaxAmount(?string $taxAmount): static
    {
        $this->taxAmount = $taxAmount;

        return $this;
    }

    public function getOwnershipType(): ?string
    {
        return $this->ownershipType;
    }

    public function setOwnershipType(?string $ownershipType): static
    {
        $this->ownershipType = $ownershipType;

        return $this;
    }


}
