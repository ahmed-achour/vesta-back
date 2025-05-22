<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Transactions
 *
 * @ORM\Table(name="transactions", uniqueConstraints={@ORM\UniqueConstraint(name="transaction_id", columns={"transaction_id"})})
 * @ORM\Entity
*@ORM\Entity(repositoryClass="App\Repository\TransactionsRepository")
 */
class Transactions
{
    /**
     * @var int
     *
     * @ORM\Column(name="transaction_id", type="bigint", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $transactionId;

    /**
     * @var int|null
     *
     * @ORM\Column(name="property_id", type="integer", nullable=true)
     */
    private $propertyId;

    /**
     * @var int|null
     *
     * @ORM\Column(name="agent_id", type="integer", nullable=true)
     */
    private $agentId;

    /**
     * @var int|null
     *
     * @ORM\Column(name="agency_id", type="integer", nullable=true)
     */
    private $agencyId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="transaction_type", type="string", length=10, nullable=true)
     */
    private $transactionType;

    /**
     * @var string|null
     *
     * @ORM\Column(name="role", type="string", length=10, nullable=true)
     */
    private $role;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="contract_date", type="date", nullable=true)
     */
    private $contractDate;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="closing_date", type="date", nullable=true)
     */
    private $closingDate;

    /**
     * @var string|null
     *
     * @ORM\Column(name="closing_price", type="decimal", precision=12, scale=2, nullable=true)
     */
    private $closingPrice;

    /**
     * @var string|null
     *
     * @ORM\Column(name="commission", type="decimal", precision=10, scale=2, nullable=true)
     */
    private $commission;

    /**
     * @var int|null
     *
     * @ORM\Column(name="days_on_market", type="integer", nullable=true)
     */
    private $daysOnMarket;

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="text", length=65535, nullable=true)
     */
    private $notes;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=true, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $createdAt = 'CURRENT_TIMESTAMP';

    public function getTransactionId(): ?string
    {
        return $this->transactionId;
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

    public function getAgentId(): ?int
    {
        return $this->agentId;
    }

    public function setAgentId(?int $agentId): static
    {
        $this->agentId = $agentId;

        return $this;
    }

    public function getAgencyId(): ?int
    {
        return $this->agencyId;
    }

    public function setAgencyId(?int $agencyId): static
    {
        $this->agencyId = $agencyId;

        return $this;
    }

    public function getTransactionType(): ?string
    {
        return $this->transactionType;
    }

    public function setTransactionType(?string $transactionType): static
    {
        $this->transactionType = $transactionType;

        return $this;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(?string $role): static
    {
        $this->role = $role;

        return $this;
    }

    public function getContractDate(): ?\DateTimeInterface
    {
        return $this->contractDate;
    }

    public function setContractDate(?\DateTimeInterface $contractDate): static
    {
        $this->contractDate = $contractDate;

        return $this;
    }

    public function getClosingDate(): ?\DateTimeInterface
    {
        return $this->closingDate;
    }

    public function setClosingDate(?\DateTimeInterface $closingDate): static
    {
        $this->closingDate = $closingDate;

        return $this;
    }

    public function getClosingPrice(): ?string
    {
        return $this->closingPrice;
    }

    public function setClosingPrice(?string $closingPrice): static
    {
        $this->closingPrice = $closingPrice;

        return $this;
    }

    public function getCommission(): ?string
    {
        return $this->commission;
    }

    public function setCommission(?string $commission): static
    {
        $this->commission = $commission;

        return $this;
    }

    public function getDaysOnMarket(): ?int
    {
        return $this->daysOnMarket;
    }

    public function setDaysOnMarket(?int $daysOnMarket): static
    {
        $this->daysOnMarket = $daysOnMarket;

        return $this;
    }

    public function getNotes(): ?string
    {
        return $this->notes;
    }

    public function setNotes(?string $notes): static
    {
        $this->notes = $notes;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?\DateTimeInterface $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }


}
