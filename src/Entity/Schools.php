<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Schools
 *
 * @ORM\Table(name="schools", uniqueConstraints={@ORM\UniqueConstraint(name="id", columns={"id"})})
 * @ORM\Entity
*@ORM\Entity(repositoryClass="App\Repository\SchoolsRepository")
 */
class Schools
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
     * @var string|null
     *
     * @ORM\Column(name="name", type="string", length=150, nullable=true)
     */
    private $name = '';

    /**
     * @var string|null
     *
     * @ORM\Column(name="grades", type="string", length=20, nullable=true)
     */
    private $grades = '';

    /**
     * @var string|null
     *
     * @ORM\Column(name="distance_miles", type="decimal", precision=4, scale=1, nullable=true, options={"default"="0.0"})
     */
    private $distanceMiles = '0.0';

    /**
     * @var int|null
     *
     * @ORM\Column(name="rating", type="integer", nullable=true)
     */
    private $rating = '0';

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getGrades(): ?string
    {
        return $this->grades;
    }

    public function setGrades(?string $grades): static
    {
        $this->grades = $grades;

        return $this;
    }

    public function getDistanceMiles(): ?string
    {
        return $this->distanceMiles;
    }

    public function setDistanceMiles(?string $distanceMiles): static
    {
        $this->distanceMiles = $distanceMiles;

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


}
