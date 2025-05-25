<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;

/**
 * Agents
 *
 * @ORM\Table(name="agents", uniqueConstraints={@ORM\UniqueConstraint(name="agent_id", columns={"agent_id"}), @ORM\UniqueConstraint(name="email", columns={"email"})})
 * @ORM\Entity
*@ORM\Entity(repositoryClass="App\Repository\AgentsRepository")
 */
class Agents  implements UserInterface , PasswordAuthenticatedUserInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="agent_id", type="bigint", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $agentId;

    /**
     * @var int|null
     *
     * @ORM\Column(name="agency_id", type="integer", nullable=true)
     */
    private $agencyId;

    /**
     * @var string
     *
     * @ORM\Column(name="first_name", type="string", length=50, nullable=false)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string", length=50, nullable=false)
     */
    private $lastName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="email", type="string", length=100, nullable=true)
     */
    private $email;

    /**
     * @var string|null
     *
     * @ORM\Column(name="phone", type="string", length=20, nullable=true)
     */
    private $phone;

    /**
     * @var string|null
     *
     * @ORM\Column(name="license_number", type="string", length=50, nullable=true)
     */
    private $licenseNumber;

    /**
     * @var int|null
     *
     * @ORM\Column(name="years_experience", type="integer", nullable=true)
     */
    private $yearsExperience = '0';

    /**
     * @var string|null
     *
     * @ORM\Column(name="languages", type="string", length=100, nullable=true, options={"default"="English"})
     */
    private $languages = 'English';

    /**
     * @var string|null
     *
     * @ORM\Column(name="specialty", type="string", length=100, nullable=true)
     */
    private $specialty;

    /**
     * @var string|null
     *
     * @ORM\Column(name="rating", type="decimal", precision=2, scale=1, nullable=true, options={"default"="0.0"})
     */
    private $rating = '0.0';

    /**
     * @var int|null
     *
     * @ORM\Column(name="review_count", type="integer", nullable=true)
     */
    private $reviewCount = '0';

    /**
     * @var string|null
     *
     * @ORM\Column(name="profile_text", type="text", length=65535, nullable=true)
     */
    private $profileText;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="active", type="boolean", nullable=true, options={"default"="1"})
     */
    private $active = true;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="join_date", type="datetime", nullable=true, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $joinDate = 'CURRENT_TIMESTAMP';

   /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $password;

    // ... existing methods ...

    /**
     * @see PasswordAuthenticatedUserInterface
     */


    public function setPassword(?string $password): self
    {
        $this->password = $password;
        return $this;
    }

    public function getAgentId(): ?string
    {
        return $this->agentId;
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

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): static
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): static
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): static
    {
        $this->phone = $phone;

        return $this;
    }

    public function getLicenseNumber(): ?string
    {
        return $this->licenseNumber;
    }

    public function setLicenseNumber(?string $licenseNumber): static
    {
        $this->licenseNumber = $licenseNumber;

        return $this;
    }

    public function getYearsExperience(): ?int
    {
        return $this->yearsExperience;
    }

    public function setYearsExperience(?int $yearsExperience): static
    {
        $this->yearsExperience = $yearsExperience;

        return $this;
    }

    public function getLanguages(): ?string
    {
        return $this->languages;
    }

    public function setLanguages(?string $languages): static
    {
        $this->languages = $languages;

        return $this;
    }

    public function getSpecialty(): ?string
    {
        return $this->specialty;
    }

    public function setSpecialty(?string $specialty): static
    {
        $this->specialty = $specialty;

        return $this;
    }

    public function getRating(): ?string
    {
        return $this->rating;
    }

    public function setRating(?string $rating): static
    {
        $this->rating = $rating;

        return $this;
    }

    public function getReviewCount(): ?int
    {
        return $this->reviewCount;
    }

    public function setReviewCount(?int $reviewCount): static
    {
        $this->reviewCount = $reviewCount;

        return $this;
    }

    public function getProfileText(): ?string
    {
        return $this->profileText;
    }

    public function setProfileText(?string $profileText): static
    {
        $this->profileText = $profileText;

        return $this;
    }

    public function isActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(?bool $active): static
    {
        $this->active = $active;

        return $this;
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

    /**
     * Returns ONLY ROLE_AGENT (fixed role).
     */
    public function getRoles(): array
    {
        return ['ROLE_AGENT']; // Always returns this exact role
    }

    // Required for UserInterface
    public function getPassword(): ?string { 
        return null; // Or your password field if agents can log in
    }
    public function getSalt(): ?string { return null; }
    public function eraseCredentials() {}
    public function getUserIdentifier(): string { return (string)$this->email; }
    public function isMemberOf(Agency $agency): bool
{
    foreach ($this->getAgencyMemberships() as $membership) {
        if ($membership->getAgency()->getAgencyId() === $agency->getAgencyId()) {
            return true;
        }
    }
    return false;
}

/**
 * @return Collection|AgencyMembers[]
 */
public function getAgencyMemberships(): Collection
{
    return $this->agencyMembers;
}

// Add this inverse side if using bidirectional relationship
/**
 * @ORM\OneToMany(targetEntity="AgencyMembers", mappedBy="agent")
 */
private $agencyMembers;

}
