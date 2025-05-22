<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Agency
 *
 * @ORM\Table(name="agency", uniqueConstraints={@ORM\UniqueConstraint(name="agency_id", columns={"agency_id"})})
 * @ORM\Entity
*@ORM\Entity(repositoryClass="App\Repository\AgencyRepository")
 */
class Agency
{
    /**
     * @var int
     *
     * @ORM\Column(name="agency_id", type="bigint", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $agencyId;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=100, nullable=false)
     */
    private $name;

    /**
     * @var int|null
     *
     * @ORM\Column(name="brokerage_id", type="integer", nullable=true)
     */
    private $brokerageId;

    /**
     * @var int|null
     *
     * @ORM\Column(name="lead_agent_id", type="integer", nullable=true)
     */
    private $leadAgentId;

    /**
     * @var int|null
     *
     * @ORM\Column(name="member_count", type="integer", nullable=true, options={"default"="1"})
     */
    private $memberCount = 1;

    /**
     * @var int|null
     *
     * @ORM\Column(name="total_sales", type="integer", nullable=true)
     */
    private $totalSales = '0';

    /**
     * @var int|null
     *
     * @ORM\Column(name="twelve_month_sales", type="integer", nullable=true)
     */
    private $twelveMonthSales = '0';

    /**
     * @var string|null
     *
     * @ORM\Column(name="average_price", type="decimal", precision=12, scale=2, nullable=true)
     */
    private $averagePrice;

    /**
     * @var string|null
     *
     * @ORM\Column(name="min_price_range", type="decimal", precision=12, scale=2, nullable=true)
     */
    private $minPriceRange;

    /**
     * @var string|null
     *
     * @ORM\Column(name="max_price_range", type="decimal", precision=12, scale=2, nullable=true)
     */
    private $maxPriceRange;

    /**
     * @var string|null
     *
     * @ORM\Column(name="website_url", type="string", length=255, nullable=true)
     */
    private $websiteUrl;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=true)
     */
    private $description;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=true, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $createdAt = 'CURRENT_TIMESTAMP';

    public function getAgencyId(): ?string
    {
        return $this->agencyId;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getBrokerageId(): ?int
    {
        return $this->brokerageId;
    }

    public function setBrokerageId(?int $brokerageId): static
    {
        $this->brokerageId = $brokerageId;

        return $this;
    }

    public function getLeadAgentId(): ?int
    {
        return $this->leadAgentId;
    }

    public function setLeadAgentId(?int $leadAgentId): static
    {
        $this->leadAgentId = $leadAgentId;

        return $this;
    }

    public function getMemberCount(): ?int
    {
        return $this->memberCount;
    }

    public function setMemberCount(?int $memberCount): static
    {
        $this->memberCount = $memberCount;

        return $this;
    }

    public function getTotalSales(): ?int
    {
        return $this->totalSales;
    }

    public function setTotalSales(?int $totalSales): static
    {
        $this->totalSales = $totalSales;

        return $this;
    }

    public function getTwelveMonthSales(): ?int
    {
        return $this->twelveMonthSales;
    }

    public function setTwelveMonthSales(?int $twelveMonthSales): static
    {
        $this->twelveMonthSales = $twelveMonthSales;

        return $this;
    }

    public function getAveragePrice(): ?string
    {
        return $this->averagePrice;
    }

    public function setAveragePrice(?string $averagePrice): static
    {
        $this->averagePrice = $averagePrice;

        return $this;
    }

    public function getMinPriceRange(): ?string
    {
        return $this->minPriceRange;
    }

    public function setMinPriceRange(?string $minPriceRange): static
    {
        $this->minPriceRange = $minPriceRange;

        return $this;
    }

    public function getMaxPriceRange(): ?string
    {
        return $this->maxPriceRange;
    }

    public function setMaxPriceRange(?string $maxPriceRange): static
    {
        $this->maxPriceRange = $maxPriceRange;

        return $this;
    }

    public function getWebsiteUrl(): ?string
    {
        return $this->websiteUrl;
    }

    public function setWebsiteUrl(?string $websiteUrl): static
    {
        $this->websiteUrl = $websiteUrl;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

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
