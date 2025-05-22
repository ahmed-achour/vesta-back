<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Reviews
 *
 * @ORM\Table(name="reviews", uniqueConstraints={@ORM\UniqueConstraint(name="review_id", columns={"review_id"})})
 * @ORM\Entity
*@ORM\Entity(repositoryClass="App\Repository\ReviewsRepository")
 */
class Reviews
{
    /**
     * @var int
     *
     * @ORM\Column(name="review_id", type="bigint", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $reviewId;

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
     * @ORM\Column(name="reviewer_name", type="string", length=100, nullable=true)
     */
    private $reviewerName;

    /**
     * @var int|null
     *
     * @ORM\Column(name="rating", type="integer", nullable=true)
     */
    private $rating;

    /**
     * @var string|null
     *
     * @ORM\Column(name="review_text", type="text", length=65535, nullable=true)
     */
    private $reviewText;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="review_date", type="datetime", nullable=true, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $reviewDate = 'CURRENT_TIMESTAMP';

    /**
     * @var int|null
     *
     * @ORM\Column(name="transaction_id", type="integer", nullable=true)
     */
    private $transactionId;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="approved", type="boolean", nullable=true)
     */
    private $approved = '0';

    public function getReviewId(): ?string
    {
        return $this->reviewId;
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

    public function getReviewerName(): ?string
    {
        return $this->reviewerName;
    }

    public function setReviewerName(?string $reviewerName): static
    {
        $this->reviewerName = $reviewerName;

        return $this;
    }

    public function getRating(): ?int
    {
        return $this->rating;
    }

    public function setRating(?int $rating): static
    {
        $this->rating = $rating;

        return $this;
    }

    public function getReviewText(): ?string
    {
        return $this->reviewText;
    }

    public function setReviewText(?string $reviewText): static
    {
        $this->reviewText = $reviewText;

        return $this;
    }

    public function getReviewDate(): ?\DateTimeInterface
    {
        return $this->reviewDate;
    }

    public function setReviewDate(?\DateTimeInterface $reviewDate): static
    {
        $this->reviewDate = $reviewDate;

        return $this;
    }

    public function getTransactionId(): ?int
    {
        return $this->transactionId;
    }

    public function setTransactionId(?int $transactionId): static
    {
        $this->transactionId = $transactionId;

        return $this;
    }

    public function isApproved(): ?bool
    {
        return $this->approved;
    }

    public function setApproved(?bool $approved): static
    {
        $this->approved = $approved;

        return $this;
    }


}
