<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;


/**
 * Users
 *
 * @ORM\Table(name="users", uniqueConstraints={@ORM\UniqueConstraint(name="user_id", columns={"user_id"}), @ORM\UniqueConstraint(name="email", columns={"email"}), @ORM\UniqueConstraint(name="google_id", columns={"google_id"}), @ORM\UniqueConstraint(name="screen_name", columns={"screen_name"})})
 * @ORM\Entity
*@ORM\Entity(repositoryClass="App\Repository\UsersRepository")
 */
class Users implements  PasswordAuthenticatedUserInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="user_id", type="bigint", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $userId;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=191, nullable=false)
     */
    private $email;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="email_verified", type="boolean", nullable=true)
     */
    private $emailVerified = '0';

    /**
     * @var string|null
     *
     * @ORM\Column(name="password_hash", type="string", length=191, nullable=true)
     */
    private $passwordHash;

    /**
     * @var string|null
     *
     * @ORM\Column(name="google_id", type="string", length=191, nullable=true)
     */
    private $googleId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="account_status", type="string", length=20, nullable=true, options={"default"="active"})
     */
    private $accountStatus = 'active';

    /**
     * @var string|null
     *
     * @ORM\Column(name="first_name", type="string", length=100, nullable=true)
     */
    private $firstName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="last_name", type="string", length=100, nullable=true)
     */
    private $lastName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="screen_name", type="string", length=50, nullable=true)
     */
    private $screenName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="profile_photo_url", type="string", length=191, nullable=true)
     */
    private $profilePhotoUrl;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="profile_photo_verified", type="boolean", nullable=true)
     */
    private $profilePhotoVerified = '0';

    /**
     * @var string|null
     *
     * @ORM\Column(name="phone_number", type="string", length=20, nullable=true)
     */
    private $phoneNumber;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="phone_verified", type="boolean", nullable=true)
     */
    private $phoneVerified = '0';

    /**
     * @var string|null
     *
     * @ORM\Column(name="preferred_language", type="string", length=10, nullable=true, options={"default"="en"})
     */
    private $preferredLanguage = 'en';

    /**
     * @var bool|null
     *
     * @ORM\Column(name="show_full_name", type="boolean", nullable=true, options={"default"="1"})
     */
    private $showFullName = true;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="show_email", type="boolean", nullable=true)
     */
    private $showEmail = '0';

    /**
     * @var bool|null
     *
     * @ORM\Column(name="show_phone", type="boolean", nullable=true)
     */
    private $showPhone = '0';

    /**
     * @var bool|null
     *
     * @ORM\Column(name="show_reviews", type="boolean", nullable=true, options={"default"="1"})
     */
    private $showReviews = true;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="search_engine_indexing", type="boolean", nullable=true)
     */
    private $searchEngineIndexing = '0';

    /**
     * @var bool|null
     *
     * @ORM\Column(name="data_sharing_consent", type="boolean", nullable=true)
     */
    private $dataSharingConsent = '0';

    /**
     * @var array|null
     *
     * @ORM\Column(name="cookie_preferences", type="json", nullable=true)
     */
    private $cookiePreferences;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="deactivated_at", type="datetime", nullable=true)
     */
    private $deactivatedAt;

    /**
     * @var string|null
     *
     * @ORM\Column(name="deactivation_reason", type="text", length=65535, nullable=true)
     */
    private $deactivationReason;

    /**
     * @var string|null
     *
     * @ORM\Column(name="request_origin", type="string", length=20, nullable=true)
     */
    private $requestOrigin;

    /**
     * @var int|null
     *
     * @ORM\Column(name="data_retention_period_days", type="integer", nullable=true, options={"default"="180"})
     */
    private $dataRetentionPeriodDays = 180;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="scheduled_purge_date", type="date", nullable=true)
     */
    private $scheduledPurgeDate;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=true, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $createdAt = 'CURRENT_TIMESTAMP';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=true, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $updatedAt = 'CURRENT_TIMESTAMP';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="last_login", type="datetime", nullable=true)
     */
    private $lastLogin;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="two_factor_enabled", type="boolean", nullable=true)
     */
    private $twoFactorEnabled = '0';

    /**
     * @var string|null
     *
     * @ORM\Column(name="two_factor_method", type="string", length=20, nullable=true)
     */
    private $twoFactorMethod;

    public function getUserId(): ?string
    {
        return $this->userId;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function isEmailVerified(): ?bool
    {
        return $this->emailVerified;
    }

    public function setEmailVerified(?bool $emailVerified): static
    {
        $this->emailVerified = $emailVerified;

        return $this;
    }

    public function getPasswordHash(): ?string
    {
        return $this->passwordHash;
    }

    public function setPasswordHash(?string $passwordHash): static
    {
        $this->passwordHash = $passwordHash;

        return $this;
    }

    public function getGoogleId(): ?string
    {
        return $this->googleId;
    }

    public function setGoogleId(?string $googleId): static
    {
        $this->googleId = $googleId;

        return $this;
    }

    public function getAccountStatus(): ?string
    {
        return $this->accountStatus;
    }

    public function setAccountStatus(?string $accountStatus): static
    {
        $this->accountStatus = $accountStatus;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(?string $firstName): static
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(?string $lastName): static
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getScreenName(): ?string
    {
        return $this->screenName;
    }

    public function setScreenName(?string $screenName): static
    {
        $this->screenName = $screenName;

        return $this;
    }

    public function getProfilePhotoUrl(): ?string
    {
        return $this->profilePhotoUrl;
    }

    public function setProfilePhotoUrl(?string $profilePhotoUrl): static
    {
        $this->profilePhotoUrl = $profilePhotoUrl;

        return $this;
    }

    public function isProfilePhotoVerified(): ?bool
    {
        return $this->profilePhotoVerified;
    }

    public function setProfilePhotoVerified(?bool $profilePhotoVerified): static
    {
        $this->profilePhotoVerified = $profilePhotoVerified;

        return $this;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(?string $phoneNumber): static
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    public function isPhoneVerified(): ?bool
    {
        return $this->phoneVerified;
    }

    public function setPhoneVerified(?bool $phoneVerified): static
    {
        $this->phoneVerified = $phoneVerified;

        return $this;
    }

    public function getPreferredLanguage(): ?string
    {
        return $this->preferredLanguage;
    }

    public function setPreferredLanguage(?string $preferredLanguage): static
    {
        $this->preferredLanguage = $preferredLanguage;

        return $this;
    }

    public function isShowFullName(): ?bool
    {
        return $this->showFullName;
    }

    public function setShowFullName(?bool $showFullName): static
    {
        $this->showFullName = $showFullName;

        return $this;
    }

    public function isShowEmail(): ?bool
    {
        return $this->showEmail;
    }

    public function setShowEmail(?bool $showEmail): static
    {
        $this->showEmail = $showEmail;

        return $this;
    }

    public function isShowPhone(): ?bool
    {
        return $this->showPhone;
    }

    public function setShowPhone(?bool $showPhone): static
    {
        $this->showPhone = $showPhone;

        return $this;
    }

    public function isShowReviews(): ?bool
    {
        return $this->showReviews;
    }

    public function setShowReviews(?bool $showReviews): static
    {
        $this->showReviews = $showReviews;

        return $this;
    }

    public function isSearchEngineIndexing(): ?bool
    {
        return $this->searchEngineIndexing;
    }

    public function setSearchEngineIndexing(?bool $searchEngineIndexing): static
    {
        $this->searchEngineIndexing = $searchEngineIndexing;

        return $this;
    }

    public function isDataSharingConsent(): ?bool
    {
        return $this->dataSharingConsent;
    }

    public function setDataSharingConsent(?bool $dataSharingConsent): static
    {
        $this->dataSharingConsent = $dataSharingConsent;

        return $this;
    }

    public function getCookiePreferences(): ?array
    {
        return $this->cookiePreferences;
    }

    public function setCookiePreferences(?array $cookiePreferences): static
    {
        $this->cookiePreferences = $cookiePreferences;

        return $this;
    }

    public function getDeactivatedAt(): ?\DateTimeInterface
    {
        return $this->deactivatedAt;
    }

    public function setDeactivatedAt(?\DateTimeInterface $deactivatedAt): static
    {
        $this->deactivatedAt = $deactivatedAt;

        return $this;
    }

    public function getDeactivationReason(): ?string
    {
        return $this->deactivationReason;
    }

    public function setDeactivationReason(?string $deactivationReason): static
    {
        $this->deactivationReason = $deactivationReason;

        return $this;
    }

    public function getRequestOrigin(): ?string
    {
        return $this->requestOrigin;
    }

    public function setRequestOrigin(?string $requestOrigin): static
    {
        $this->requestOrigin = $requestOrigin;

        return $this;
    }

    public function getDataRetentionPeriodDays(): ?int
    {
        return $this->dataRetentionPeriodDays;
    }

    public function setDataRetentionPeriodDays(?int $dataRetentionPeriodDays): static
    {
        $this->dataRetentionPeriodDays = $dataRetentionPeriodDays;

        return $this;
    }

    public function getScheduledPurgeDate(): ?\DateTimeInterface
    {
        return $this->scheduledPurgeDate;
    }

    public function setScheduledPurgeDate(?\DateTimeInterface $scheduledPurgeDate): static
    {
        $this->scheduledPurgeDate = $scheduledPurgeDate;

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

    public function getLastLogin(): ?\DateTimeInterface
    {
        return $this->lastLogin;
    }

    public function setLastLogin(?\DateTimeInterface $lastLogin): static
    {
        $this->lastLogin = $lastLogin;

        return $this;
    }

    public function isTwoFactorEnabled(): ?bool
    {
        return $this->twoFactorEnabled;
    }

    public function setTwoFactorEnabled(?bool $twoFactorEnabled): static
    {
        $this->twoFactorEnabled = $twoFactorEnabled;

        return $this;
    }

    public function getTwoFactorMethod(): ?string
    {
        return $this->twoFactorMethod;
    }

    public function setTwoFactorMethod(?string $twoFactorMethod): static
    {
        $this->twoFactorMethod = $twoFactorMethod;

        return $this;
    }



    public function getPassword(): string
    {
        return $this->passwordHash;
    }

    // Only needed if you store salt separately (most hashing algorithms don't need it)
    public function getSalt(): ?string
    {
        return null;
    }

    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
    }

    
}
