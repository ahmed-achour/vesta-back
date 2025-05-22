<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * MonthlyCosts
 *
 * @ORM\Table(name="monthly_costs", uniqueConstraints={@ORM\UniqueConstraint(name="id", columns={"id"})})
 * @ORM\Entity
*@ORM\Entity(repositoryClass="App\Repository\MonthlyCostsRepository")
 */
class MonthlyCosts
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
     * @ORM\Column(name="total", type="decimal", precision=10, scale=2, nullable=true, options={"default"="0.00"})
     */
    private $total = '0.00';

    /**
     * @var string|null
     *
     * @ORM\Column(name="principal_interest", type="decimal", precision=10, scale=2, nullable=true, options={"default"="0.00"})
     */
    private $principalInterest = '0.00';

    /**
     * @var string|null
     *
     * @ORM\Column(name="taxes", type="decimal", precision=10, scale=2, nullable=true, options={"default"="0.00"})
     */
    private $taxes = '0.00';

    /**
     * @var string|null
     *
     * @ORM\Column(name="insurance", type="decimal", precision=10, scale=2, nullable=true, options={"default"="0.00"})
     */
    private $insurance = '0.00';

    /**
     * @var string|null
     *
     * @ORM\Column(name="hoa_fees", type="decimal", precision=10, scale=2, nullable=true, options={"default"="0.00"})
     */
    private $hoaFees = '0.00';

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

    public function getTotal(): ?string
    {
        return $this->total;
    }

    public function setTotal(?string $total): static
    {
        $this->total = $total;

        return $this;
    }

    public function getPrincipalInterest(): ?string
    {
        return $this->principalInterest;
    }

    public function setPrincipalInterest(?string $principalInterest): static
    {
        $this->principalInterest = $principalInterest;

        return $this;
    }

    public function getTaxes(): ?string
    {
        return $this->taxes;
    }

    public function setTaxes(?string $taxes): static
    {
        $this->taxes = $taxes;

        return $this;
    }

    public function getInsurance(): ?string
    {
        return $this->insurance;
    }

    public function setInsurance(?string $insurance): static
    {
        $this->insurance = $insurance;

        return $this;
    }

    public function getHoaFees(): ?string
    {
        return $this->hoaFees;
    }

    public function setHoaFees(?string $hoaFees): static
    {
        $this->hoaFees = $hoaFees;

        return $this;
    }


}
