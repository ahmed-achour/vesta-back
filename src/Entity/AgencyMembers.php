<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * AgencyMembers
 *
 * @ORM\Table(name="agency_members")
 * @ORM\Entity
*@ORM\Entity(repositoryClass="App\Repository\AgencyMembersRepository")
 */
class AgencyMembers
{
    /**
     * @var int
     *
     * @ORM\Column(name="agency_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $agencyId;

    /**
     * @var int
     *
     * @ORM\Column(name="agent_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $agentId;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="join_date", type="datetime", nullable=true, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $joinDate = 'CURRENT_TIMESTAMP';

    /**
     * @var bool|null
     *
     * @ORM\Column(name="is_lead", type="boolean", nullable=true)
     */
    private $isLead = '0';

    /**
     * @var string|null
     *
     * @ORM\Column(name="position", type="string", length=50, nullable=true)
     */
    private $position;

    public function getAgencyId(): ?int
    {
        return $this->agencyId;
    }

    public function getAgentId(): ?int
    {
        return $this->agentId;
    }

    public function getJoinDate(): ?\DateTimeInterface
    {
        return $this->joinDate;
    }

    public function setJoinDate(?\DateTimeInterface $joinDate): static
    {
        $this->joinDate = $joinDate;

        return $this;
    }

    public function isIsLead(): ?bool
    {
        return $this->isLead;
    }

    public function setIsLead(?bool $isLead): static
    {
        $this->isLead = $isLead;

        return $this;
    }

    public function getPosition(): ?string
    {
        return $this->position;
    }

    public function setPosition(?string $position): static
    {
        $this->position = $position;

        return $this;
    }


}
