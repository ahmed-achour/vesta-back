<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * UserReviews
 *
 * @ORM\Table(name="user_reviews", uniqueConstraints={@ORM\UniqueConstraint(name="review_id", columns={"review_id"}), @ORM\UniqueConstraint(name="unique_user_review", columns={"user_id", "reviewed_entity_type", "reviewed_entity_id"})})
 * @ORM\Entity
*@ORM\Entity(repositoryClass="App\Repository\UserReviewsRepository")
 */
class UserReviews
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
     * @ORM\Column(name="user_id", type="integer", nullable=true)
     */
    private $userId;

    /**
     * @var string
     *
     * @ORM\Column(name="reviewed_entity_type", type="string", length=20, nullable=false)
     */
    private $reviewedEntityType;

    /**
     * @var int
     *
     * @ORM\Column(name="reviewed_entity_id", type="integer", nullable=false)
     */
    private $reviewedEntityId;

    /**
     * @var int
     *
     * @ORM\Column(name="rating", type="integer", nullable=false)
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
     * @ORM\Column(name="created_at", type="datetime", nullable=true, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $createdAt = 'CURRENT_TIMESTAMP';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="is_public", type="boolean", nullable=true, options={"default"="1"})
     */
    private $isPublic = true;

    public function getReviewId(): ?string
    {
        return $this->reviewId;
    }

    public function getUserId(): ?int
    {
        return $this->userId;
    }

    public function setUserId(?int $userId): static
    {
        $this->userId = $userId;

        return $this;
    }

    public function getReviewedEntityType(): ?string
    {
        return $this->reviewedEntityType;
    }

    public function setReviewedEntityType(string $reviewedEntityType): static
    {
        $this->reviewedEntityType = $reviewedEntityType;

        return $this;
    }

    public function getReviewedEntityId(): ?int
    {
        return $this->reviewedEntityId;
    }

    public function setReviewedEntityId(int $reviewedEntityId): static
    {
        $this->reviewedEntityId = $reviewedEntityId;

        return $this;
    }

    public function getRating(): ?int
    {
        return $this->rating;
    }

    public function setRating(int $rating): static
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

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?\DateTimeInterface $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeInterface $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function isIsPublic(): ?bool
    {
        return $this->isPublic;
    }

    public function setIsPublic(?bool $isPublic): static
    {
        $this->isPublic = $isPublic;

        return $this;
    }


}
