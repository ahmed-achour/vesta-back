<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * TaxHistory
 *
 * @ORM\Table(name="tax_history", uniqueConstraints={@ORM\UniqueConstraint(name="id", columns={"id"})})
 * @ORM\Entity
*@ORM\Entity(repositoryClass="App\Repository\TaxHistoryRepository")
 */
class TaxHistory
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
     * @var \DateTime
     *
     * @ORM\Column(name="year", type="date", nullable=false, options={"default"="year(curdate())"})
     */
    private $year = 'year(curdate())';

    /**
     * @var string|null
     *
     * @ORM\Column(name="property_taxes", type="decimal", precision=10, scale=2, nullable=true, options={"default"="0.00"})
     */
    private $propertyTaxes = '0.00';

    /**
     * @var string|null
     *
     * @ORM\Column(name="tax_assessment", type="decimal", precision=10, scale=2, nullable=true, options={"default"="0.00"})
     */
    private $taxAssessment = '0.00';

    /**
     * @var string|null
     *
     * @ORM\Column(name="assessment_change_percent", type="decimal", precision=5, scale=2, nullable=true, options={"default"="0.00"})
     */
    private $assessmentChangePercent = '0.00';

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

    public function getYear(): ?\DateTimeInterface
    {
        return $this->year;
    }

    public function setYear(\DateTimeInterface $year): static
    {
        $this->year = $year;

        return $this;
    }

    public function getPropertyTaxes(): ?string
    {
        return $this->propertyTaxes;
    }

    public function setPropertyTaxes(?string $propertyTaxes): static
    {
        $this->propertyTaxes = $propertyTaxes;

        return $this;
    }

    public function getTaxAssessment(): ?string
    {
        return $this->taxAssessment;
    }

    public function setTaxAssessment(?string $taxAssessment): static
    {
        $this->taxAssessment = $taxAssessment;

        return $this;
    }

    public function getAssessmentChangePercent(): ?string
    {
        return $this->assessmentChangePercent;
    }

    public function setAssessmentChangePercent(?string $assessmentChangePercent): static
    {
        $this->assessmentChangePercent = $assessmentChangePercent;

        return $this;
    }


}
