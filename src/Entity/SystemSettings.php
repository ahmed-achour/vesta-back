<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * SystemSettings
 *
 * @ORM\Table(name="system_settings", uniqueConstraints={@ORM\UniqueConstraint(name="setting_id", columns={"setting_id"}), @ORM\UniqueConstraint(name="setting_key", columns={"setting_key"})})
 * @ORM\Entity
*@ORM\Entity(repositoryClass="App\Repository\SystemSettingsRepository")
 */
class SystemSettings
{
    /**
     * @var int
     *
     * @ORM\Column(name="setting_id", type="bigint", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $settingId;

    /**
     * @var string
     *
     * @ORM\Column(name="setting_key", type="string", length=100, nullable=false)
     */
    private $settingKey;

    /**
     * @var string|null
     *
     * @ORM\Column(name="setting_value", type="text", length=65535, nullable=true)
     */
    private $settingValue;

    /**
     * @var string|null
     *
     * @ORM\Column(name="data_type", type="string", length=20, nullable=true)
     */
    private $dataType;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="is_public", type="boolean", nullable=true)
     */
    private $isPublic = '0';

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=true)
     */
    private $description;

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
     * @var int|null
     *
     * @ORM\Column(name="updated_by", type="integer", nullable=true)
     */
    private $updatedBy;

    public function getSettingId(): ?string
    {
        return $this->settingId;
    }

    public function getSettingKey(): ?string
    {
        return $this->settingKey;
    }

    public function setSettingKey(string $settingKey): static
    {
        $this->settingKey = $settingKey;

        return $this;
    }

    public function getSettingValue(): ?string
    {
        return $this->settingValue;
    }

    public function setSettingValue(?string $settingValue): static
    {
        $this->settingValue = $settingValue;

        return $this;
    }

    public function getDataType(): ?string
    {
        return $this->dataType;
    }

    public function setDataType(?string $dataType): static
    {
        $this->dataType = $dataType;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

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

    public function getUpdatedBy(): ?int
    {
        return $this->updatedBy;
    }

    public function setUpdatedBy(?int $updatedBy): static
    {
        $this->updatedBy = $updatedBy;

        return $this;
    }


}
