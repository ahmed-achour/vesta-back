<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Rooms
 *
 * @ORM\Table(name="rooms", uniqueConstraints={@ORM\UniqueConstraint(name="id", columns={"id"})})
 * @ORM\Entity
*@ORM\Entity(repositoryClass="App\Repository\RoomsRepository")
 */
class Rooms
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
     * @ORM\Column(name="name", type="string", length=50, nullable=true)
     */
    private $name = '';

    /**
     * @var string|null
     *
     * @ORM\Column(name="level", type="string", length=20, nullable=true, options={"default"="First"})
     */
    private $level = 'First';

    /**
     * @var int|null
     *
     * @ORM\Column(name="area", type="integer", nullable=true)
     */
    private $area = '0';

    /**
     * @var int|null
     *
     * @ORM\Column(name="width", type="integer", nullable=true)
     */
    private $width = '0';

    /**
     * @var int|null
     *
     * @ORM\Column(name="length", type="integer", nullable=true)
     */
    private $length = '0';

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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getLevel(): ?string
    {
        return $this->level;
    }

    public function setLevel(?string $level): static
    {
        $this->level = $level;

        return $this;
    }

    public function getArea(): ?int
    {
        return $this->area;
    }

    public function setArea(?int $area): static
    {
        $this->area = $area;

        return $this;
    }

    public function getWidth(): ?int
    {
        return $this->width;
    }

    public function setWidth(?int $width): static
    {
        $this->width = $width;

        return $this;
    }

    public function getLength(): ?int
    {
        return $this->length;
    }

    public function setLength(?int $length): static
    {
        $this->length = $length;

        return $this;
    }


}
