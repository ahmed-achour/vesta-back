<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Listings
 *
 * @ORM\Table(name="listings", uniqueConstraints={@ORM\UniqueConstraint(name="listing_id", columns={"listing_id"})})
 * @ORM\Entity
*@ORM\Entity(repositoryClass="App\Repository\ListingsRepository")
 */
class Listings
{
    /**
     * @var int
     *
     * @ORM\Column(name="listing_id", type="bigint", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $listingId;

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
     * @var string|null
     *
     * @ORM\Column(name="listing_type", type="string", length=10, nullable=true)
     */
    private $listingType;

    /**
     * @var string
     *
     * @ORM\Column(name="price", type="decimal", precision=12, scale=2, nullable=false)
     */
    private $price;

    /**
     * @var string|null
     *
     * @ORM\Column(name="price_period", type="string", length=20, nullable=true, options={"default"="Monthly"})
     */
    private $pricePeriod = 'Monthly';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="listing_date", type="datetime", nullable=true, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $listingDate = 'CURRENT_TIMESTAMP';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="expiration_date", type="date", nullable=true)
     */
    private $expirationDate;

    /**
     * @var string|null
     *
     * @ORM\Column(name="status", type="string", length=20, nullable=true, options={"default"="Active"})
     */
    private $status = 'Active';

    /**
     * @var string|null
     *
     * @ORM\Column(name="mls_url", type="string", length=255, nullable=true)
     */
    private $mlsUrl;

    /**
     * @var string|null
     *
     * @ORM\Column(name="virtual_tour_url", type="string", length=255, nullable=true)
     */
    private $virtualTourUrl;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="featured", type="boolean", nullable=true)
     */
    private $featured = '0';

    public function getListingId(): ?string
    {
        return $this->listingId;
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

    public function getListingType(): ?string
    {
        return $this->listingType;
    }

    public function setListingType(?string $listingType): static
    {
        $this->listingType = $listingType;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(string $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getPricePeriod(): ?string
    {
        return $this->pricePeriod;
    }

    public function setPricePeriod(?string $pricePeriod): static
    {
        $this->pricePeriod = $pricePeriod;

        return $this;
    }

    public function getListingDate(): ?\DateTimeInterface
    {
        return $this->listingDate;
    }

    public function setListingDate(?\DateTimeInterface $listingDate): static
    {
        $this->listingDate = $listingDate;

        return $this;
    }

    public function getExpirationDate(): ?\DateTimeInterface
    {
        return $this->expirationDate;
    }

    public function setExpirationDate(?\DateTimeInterface $expirationDate): static
    {
        $this->expirationDate = $expirationDate;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getMlsUrl(): ?string
    {
        return $this->mlsUrl;
    }

    public function setMlsUrl(?string $mlsUrl): static
    {
        $this->mlsUrl = $mlsUrl;

        return $this;
    }

    public function getVirtualTourUrl(): ?string
    {
        return $this->virtualTourUrl;
    }

    public function setVirtualTourUrl(?string $virtualTourUrl): static
    {
        $this->virtualTourUrl = $virtualTourUrl;

        return $this;
    }

    public function isFeatured(): ?bool
    {
        return $this->featured;
    }

    public function setFeatured(?bool $featured): static
    {
        $this->featured = $featured;

        return $this;
    }


}
