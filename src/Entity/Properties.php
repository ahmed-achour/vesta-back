<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Properties
 *
 * @ORM\Table(name="properties", uniqueConstraints={@ORM\UniqueConstraint(name="id", columns={"id"})})
 * @ORM\Entity
 *@ORM\Entity(repositoryClass="App\Repository\PropertiesRepository")
 *@Vich\Uploadable
 */
#[Vich\Uploadable]
class Properties
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
     * @ORM\Column(name="city", type="string", length=100, nullable=true)
     */
    private $city = '';

    /**
     * @var string|null
     *
     * @ORM\Column(name="state", type="string", length=2, nullable=true, options={"default"="KS","fixed"=true})
     */
    private $state = 'KS';

    /**
     * @var string|null
     *
     * @ORM\Column(name="zip_code", type="string", length=10, nullable=true)
     */
    private $zipCode = '';

    /**
     * @var string|null
     *
     * @ORM\Column(name="subdivision", type="string", length=100, nullable=true)
     */
    private $subdivision = '';

    /**
     * @var string|null
     *
     * @ORM\Column(name="region", type="string", length=100, nullable=true)
     */
    private $region = '';

    /**
     * @var int|null
     *
     * @ORM\Column(name="year_built", type="integer", nullable=true, options={"default"="2000"})
     */
    private $yearBuilt = 2000;

    /**
     * @var string|null
     *
     * @ORM\Column(name="lot_size_acres", type="decimal", precision=5, scale=2, nullable=true, options={"default"="0.00"})
     */
    private $lotSizeAcres = '0.00';

    /**
     * @var int|null
     *
     * @ORM\Column(name="structure_area", type="integer", nullable=true)
     */
    private $structureArea = '0';

    /**
     * @var int|null
     *
     * @ORM\Column(name="livable_area", type="integer", nullable=true)
     */
    private $livableArea = '0';

    /**
     * @var int|null
     *
     * @ORM\Column(name="finished_below_ground", type="integer", nullable=true)
     */
    private $finishedBelowGround = '0';

    /**
     * @var string|null
     *
     * @ORM\Column(name="listing_price", type="decimal", precision=12, scale=2, nullable=true, options={"default"="0.00"})
     */
    private $listingPrice = '0.00';

    /**
     * @var string|null
     *
     * @ORM\Column(name="price_per_sqft", type="decimal", precision=8, scale=2, nullable=true, options={"default"="0.00"})
     */
    private $pricePerSqft = '0.00';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_listed", type="date", nullable=true)
     */
    private $dateListed;

    /**
     * @var string|null
     *
     * @ORM\Column(name="mls_id", type="string", length=50, nullable=true)
     */
    private $mlsId = '';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ownership_type", type="string", length=50, nullable=true, options={"default"="Private"})
     */
    private $ownershipType = 'Private';

    /**
     * @var string|null
     *
     * @ORM\Column(name="listing_terms", type="string", length=100, nullable=true, options={"default"="Cash, New Loan"})
     */
    private $listingTerms = 'Cash, New Loan';

    /**
     * @var string|null
     *
     * @ORM\Column(name="road_surface", type="string", length=50, nullable=true, options={"default"="Gravel"})
     */
    private $roadSurface = 'Gravel';

    /**
     * @var string|null
     *
     * @ORM\Column(name="longitude", type="decimal", precision=10, scale=7, nullable=true)
     */
    private $longitude;

    /**
     * @var string|null
     *
     * @ORM\Column(name="latitude", type="decimal", precision=10, scale=7, nullable=true)
     */
    private $latitude;


    /**
     * @var string|null
     *
     * @ORM\Column(name="main_picture",type="string", length=100, nullable=true)
     */
    #[ORM\Column(type: "string", length: 1000, nullable: true, name: "main_picture")]
    private ?string $mainPicture = null;

    #[Vich\UploadableField(mapping: "property_main", fileNameProperty: "mainPicture")]
    private ?File $mainPictureFile = null;

    #[ORM\Column(type: "json", nullable: true, name: "gallery_pictures")]
    private array $galleryPictures = []; // Initialize as empty array

    #[Vich\UploadableField(mapping: "property_gallery", fileNameProperty: "galleryPictures")]
    private ?File $galleryPicturesFile = null;

    /**
     * @var string|null
     *
     * @ORM\Column(name="plan_picture",type="string", length=100, nullable=true)
     */
    #[ORM\Column(type: "string", length: 255, nullable: true, name: "plan_picture")]
    private ?string $planPicture = null;

    #[Vich\UploadableField(mapping: "property_plan", fileNameProperty: "planPicture")]
    private ?File $planPictureFile = null;



    public function getId(): ?string
    {
        return $this->id;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): static
    {
        $this->city = $city;

        return $this;
    }

    public function getState(): ?string
    {
        return $this->state;
    }

    public function setState(?string $state): static
    {
        $this->state = $state;

        return $this;
    }

    public function getZipCode(): ?string
    {
        return $this->zipCode;
    }

    public function setZipCode(?string $zipCode): static
    {
        $this->zipCode = $zipCode;

        return $this;
    }

    public function getSubdivision(): ?string
    {
        return $this->subdivision;
    }

    public function setSubdivision(?string $subdivision): static
    {
        $this->subdivision = $subdivision;

        return $this;
    }

    public function getRegion(): ?string
    {
        return $this->region;
    }

    public function setRegion(?string $region): static
    {
        $this->region = $region;

        return $this;
    }

    public function getYearBuilt(): ?int
    {
        return $this->yearBuilt;
    }

    public function setYearBuilt(?int $yearBuilt): static
    {
        $this->yearBuilt = $yearBuilt;

        return $this;
    }

    public function getLotSizeAcres(): ?string
    {
        return $this->lotSizeAcres;
    }

    public function setLotSizeAcres(?string $lotSizeAcres): static
    {
        $this->lotSizeAcres = $lotSizeAcres;

        return $this;
    }

    public function getStructureArea(): ?int
    {
        return $this->structureArea;
    }

    public function setStructureArea(?int $structureArea): static
    {
        $this->structureArea = $structureArea;

        return $this;
    }

    public function getLivableArea(): ?int
    {
        return $this->livableArea;
    }

    public function setLivableArea(?int $livableArea): static
    {
        $this->livableArea = $livableArea;

        return $this;
    }

    public function getFinishedBelowGround(): ?int
    {
        return $this->finishedBelowGround;
    }

    public function setFinishedBelowGround(?int $finishedBelowGround): static
    {
        $this->finishedBelowGround = $finishedBelowGround;

        return $this;
    }

    public function getListingPrice(): ?string
    {
        return $this->listingPrice;
    }

    public function setListingPrice(?string $listingPrice): static
    {
        $this->listingPrice = $listingPrice;

        return $this;
    }

    public function getPricePerSqft(): ?string
    {
        return $this->pricePerSqft;
    }

    public function setPricePerSqft(?string $pricePerSqft): static
    {
        $this->pricePerSqft = $pricePerSqft;

        return $this;
    }

    public function getDateListed(): ?\DateTimeInterface
    {
        return $this->dateListed;
    }

    public function setDateListed(?\DateTimeInterface $dateListed): static
    {
        $this->dateListed = $dateListed;

        return $this;
    }

    public function getMlsId(): ?string
    {
        return $this->mlsId;
    }

    public function setMlsId(?string $mlsId): static
    {
        $this->mlsId = $mlsId;

        return $this;
    }

    public function getOwnershipType(): ?string
    {
        return $this->ownershipType;
    }

    public function setOwnershipType(?string $ownershipType): static
    {
        $this->ownershipType = $ownershipType;

        return $this;
    }

    public function getListingTerms(): ?string
    {
        return $this->listingTerms;
    }

    public function setListingTerms(?string $listingTerms): static
    {
        $this->listingTerms = $listingTerms;

        return $this;
    }

    public function getRoadSurface(): ?string
    {
        return $this->roadSurface;
    }

    public function setRoadSurface(?string $roadSurface): static
    {
        $this->roadSurface = $roadSurface;

        return $this;
    }

    public function getLongitude(): ?string
    {
        return $this->longitude;
    }

    public function setLongitude(?string $longitude): static
    {
        $this->longitude = $longitude;

        return $this;
    }

    public function getLatitude(): ?string
    {
        return $this->latitude;
    }

    public function setLatitude(?string $latitude): static
    {
        $this->latitude = $latitude;

        return $this;
    }

    public function getMainPicture(): ?string
    {
        return $this->mainPicture;
    }

    public function setMainPicture(?string $mainPicture): self
    {
        $this->mainPicture = $mainPicture;
        return $this;
    }

    public function setMainPictureFile(?File $mainPictureFile = null): void
    {
        $this->mainPictureFile = $mainPictureFile;
    }

    public function getMainPictureFile(): ?File
    {
        return $this->mainPictureFile;
    }

    public function getGalleryPictures(): array
    {
        return $this->galleryPictures ?: [];
    }

    public function setGalleryPictures(?array $galleryPictures): self
    {
        $this->galleryPictures = $galleryPictures ?? [];
        return $this;
    }

    public function getGalleryPicturesFile(): ?File
    {
        return $this->galleryPicturesFile;
    }

    public function setGalleryPicturesFile(?File $galleryPicturesFile = null): void
    {
        $this->galleryPicturesFile = $galleryPicturesFile;
    }

    public function getPlanPicture(): ?string
    {
        return $this->planPicture;
    }

    public function setPlanPicture(?string $planPicture): self
    {
        $this->planPicture = $planPicture;
        return $this;
    }

    public function setPlanPictureFile(?File $planPictureFile = null): void
    {
        $this->planPictureFile = $planPictureFile;
    }

    public function getPlanPictureFile(): ?File
    {
        return $this->planPictureFile;
    }
}
