<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AgencyMembersRepository")
 * @ORM\Table(
 *     name="agency_members",
 *     uniqueConstraints={
 *         @ORM\UniqueConstraint(name="agency_agent_unique", columns={"agency_id", "agent_id"})
 *     }
 * )
 */
class AgencyMembers
{
        /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="App\Entity\Agency")
     * @ORM\JoinColumn(name="agency_id", referencedColumnName="agency_id", nullable=false)
     */
    private $agency;

    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="App\Entity\Agents")
     * @ORM\JoinColumn(name="agent_id", referencedColumnName="agent_id", nullable=false)
     */
    private $agent;

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
     public function getAgency(): ?Agency
    {
        return $this->agency;
    }

    public function setAgency(?Agency $agency): self
    {
        $this->agency = $agency;
        return $this;
    }

    public function getAgent(): ?Agents
    {
        return $this->agent;
    }

    public function setAgent(?Agents $agent): self
    {
        $this->agent = $agent;
        return $this;
    }


}
