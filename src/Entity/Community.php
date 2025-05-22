<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Community
 *
 * @ORM\Table(name="community", uniqueConstraints={@ORM\UniqueConstraint(name="id", columns={"id"})})
 * @ORM\Entity
*@ORM\Entity(repositoryClass="App\Repository\CommunityRepository")
 */
class Community
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
     * @var int|null
     *
     * @ORM\Column(name="walk_score", type="integer", nullable=true)
     */
    private $walkScore = '0';

    /**
     * @var int|null
     *
     * @ORM\Column(name="bike_score", type="integer", nullable=true)
     */
    private $bikeScore = '0';

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

    public function getWalkScore(): ?int
    {
        return $this->walkScore;
    }

    public function setWalkScore(?int $walkScore): static
    {
        $this->walkScore = $walkScore;

        return $this;
    }

    public function getBikeScore(): ?int
    {
        return $this->bikeScore;
    }

    public function setBikeScore(?int $bikeScore): static
    {
        $this->bikeScore = $bikeScore;

        return $this;
    }


}
