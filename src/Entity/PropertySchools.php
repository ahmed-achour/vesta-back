<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PropertySchools
 *
 * @ORM\Table(name="property_schools")
 * @ORM\Entity
*@ORM\Entity(repositoryClass="App\Repository\PropertySchoolsRepository")
 */
class PropertySchools
{
    /**
     * @var int
     *
     * @ORM\Column(name="property_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $propertyId;

    /**
     * @var int
     *
     * @ORM\Column(name="school_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $schoolId;

    public function getPropertyId(): ?int
    {
        return $this->propertyId;
    }

    public function getSchoolId(): ?int
    {
        return $this->schoolId;
    }


}
