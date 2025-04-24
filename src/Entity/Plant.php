<?php

namespace App\Entity;

use App\Repository\PlantRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: PlantRepository::class)]
#[Vich\Uploadable]
class Plant
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $commonName = null;

    #[ORM\Column(length: 255)]
    private ?string $scientificName = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image = null;

    #[Vich\UploadableField(mapping: 'plant_images', fileNameProperty: 'image')]
    private ?File $imageFile = null;

    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\Column(length: 255)]
    private ?string $cycle = null;

    #[ORM\Column(length: 255)]
    private ?int $hardinessZone = null;

    #[ORM\Column(length: 255)]
    private ?string $maintenanceDifficulty = null;

    #[ORM\Column(length: 255)]
    private ?string $wateringNeeds = null;

    #[ORM\Column(length: 255)]
    private ?string $soilType = null;

    #[ORM\Column(length: 255)]
    private ?string $floweringSeason = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $createdAt = null;

    /**
     * @var Collection<int, MaintenanceLog>
     */
    #[ORM\OneToMany(targetEntity: MaintenanceLog::class, mappedBy: 'plant', orphanRemoval: true)]
    private Collection $maintenanceLogs;

    #[ORM\ManyToOne(inversedBy: 'plants')]
    private ?Category $category = null;

    public function __construct()
    {
        $this->maintenanceLogs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCommonName(): ?string
    {
        return $this->commonName;
    }

    public function setCommonName(string $commonName): static
    {
        $this->commonName = $commonName;

        return $this;
    }

    public function getScientificName(): ?string
    {
        return $this->scientificName;
    }

    public function setScientificName(string $scientificName): static
    {
        $this->scientificName = $scientificName;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): void
    {
        $this->image = $image;
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    public function setImageFile(?File $imageFile = null): void
    {
        $this->imageFile = $imageFile;

        if ($imageFile) {
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getCycle(): ?string
    {
        return $this->cycle;
    }

    public function setCycle(string $cycle): static
    {
        $this->cycle = $cycle;

        return $this;
    }

    public function getHardinessZone(): ?int
    {
        return $this->hardinessZone;
    }

    public function setHardinessZone(int $hardinessZone): static
    {
        $this->hardinessZone = $hardinessZone;

        return $this;
    }

    public function getMaintenanceDifficulty(): ?string
    {
        return $this->maintenanceDifficulty;
    }

    public function setMaintenanceDifficulty(string $maintenanceDifficulty): static
    {
        $this->maintenanceDifficulty = $maintenanceDifficulty;

        return $this;
    }

    public function getWateringNeeds(): ?string
    {
        return $this->wateringNeeds;
    }

    public function setWateringNeeds(string $wateringNeeds): static
    {
        $this->wateringNeeds = $wateringNeeds;

        return $this;
    }

    public function getSoilType(): ?string
    {
        return $this->soilType;
    }

    public function setSoilType(string $soilType): static
    {
        $this->soilType = $soilType;

        return $this;
    }

    public function getFloweringSeason(): ?string
    {
        return $this->floweringSeason;
    }

    public function setFloweringSeason(string $floweringSeason): static
    {
        $this->floweringSeason = $floweringSeason;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @return Collection<int, MaintenanceLog>
     */
    public function getMaintenanceLogs(): Collection
    {
        return $this->maintenanceLogs;
    }

    public function addMaintenanceLog(MaintenanceLog $maintenanceLog): static
    {
        if (!$this->maintenanceLogs->contains($maintenanceLog)) {
            $this->maintenanceLogs->add($maintenanceLog);
            $maintenanceLog->setPlant($this);
        }

        return $this;
    }

    public function removeMaintenanceLog(MaintenanceLog $maintenanceLog): static
    {
        if ($this->maintenanceLogs->removeElement($maintenanceLog)) {
            // set the owning side to null (unless already changed)
            if ($maintenanceLog->getPlant() === $this) {
                $maintenanceLog->setPlant(null);
            }
        }

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): static
    {
        $this->category = $category;

        return $this;
    }
}
