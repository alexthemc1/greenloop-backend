<?php

namespace App\Entity;

use App\Repository\NutritionalIconRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Attribute\Groups;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;

#[ApiResource(
    operations: [
        new Get(),
        new GetCollection()
    ],
    normalizationContext: [
        'groups' => ['product:read']
    ]
)]

#[ORM\Entity(repositoryClass: NutritionalIconRepository::class)]
class NutritionalIcon
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    #[Groups(['product:read'])]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    #[Groups(['product:read'])]
    private ?string $iconPath = null;

    #[ORM\Column(length: 50)]
    #[Groups(['product:read'])]
    private ?string $color = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    /**
     * @var Collection<int, ProductNutritionalIcon>
     */
    #[ORM\OneToMany(targetEntity: ProductNutritionalIcon::class, mappedBy: 'nutritionalIcon')]
    private Collection $productNutritionalIcons;

    public function __construct()
    {
        $this->productNutritionalIcons = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getIconPath(): ?string
    {
        return $this->iconPath;
    }

    public function setIconPath(string $iconPath): static
    {
        $this->iconPath = $iconPath;

        return $this;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(string $color): static
    {
        $this->color = $color;

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

    /**
     * @return Collection<int, ProductNutritionalIcon>
     */
    public function getProductNutritionalIcons(): Collection
    {
        return $this->productNutritionalIcons;
    }

    public function addProductNutritionalIcon(ProductNutritionalIcon $productNutritionalIcon): static
    {
        if (!$this->productNutritionalIcons->contains($productNutritionalIcon)) {
            $this->productNutritionalIcons->add($productNutritionalIcon);
            $productNutritionalIcon->setNutritionalIcon($this);
        }

        return $this;
    }

    public function removeProductNutritionalIcon(ProductNutritionalIcon $productNutritionalIcon): static
    {
        if ($this->productNutritionalIcons->removeElement($productNutritionalIcon)) {
            // set the owning side to null (unless already changed)
            if ($productNutritionalIcon->getNutritionalIcon() === $this) {
                $productNutritionalIcon->setNutritionalIcon(null);
            }
        }

        return $this;
    }
}
