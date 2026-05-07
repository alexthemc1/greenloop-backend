<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Attribute\Groups;

#[ORM\Entity(repositoryClass: ProductRepository::class)]
class Product
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 150)]
    #[Groups(['product:read'])]
    private ?string $name = null;

    #[ORM\Column(length: 100, unique: true)]
    #[Groups(['product:read'])]
    private ?string $slug = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Groups(['product:read'])]
    private ?string $descriptionShort = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    #[Groups(['product:read'])]
    private ?string $descriptionLong = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    #[Groups(['product:read'])]
    private ?string $price = null;

    #[ORM\Column(nullable: true)]
    #[Groups(['product:read'])]
    private ?int $discountPercent = null;

    #[ORM\Column]
    #[Groups(['product:read'])]
    private ?int $stock = null;

    #[ORM\Column(type: 'boolean', options: ["default" => false])]
    #[Groups(['product:read'])]
    private bool $isPopular = false;

    #[ORM\Column(type: 'boolean', options: ["default" => false])]
    #[Groups(['product:read'])]
    private bool $isFeatured = false;

    #[ORM\Column(type: Types::DATETIME_IMMUTABLE)]
    #[Groups(['product:read'])]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column(nullable: true)]
    #[Groups(['product:read'])]
    private ?float $weight = null;

    #[ORM\Column(type: Types::JSON, nullable: true)]
    #[Groups(['product:read'])]
    private array $keywords = [];

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    #[Groups(['product:read'])]
    private ?string $origin = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    #[Groups(['product:read'])]
    private ?string $taste = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    #[Groups(['product:read'])]
    private ?string $usageAdvice = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    #[Groups(['product:read'])]
    private ?string $conservation = null;

    /**
     * @var Category
     */
    #[ORM\ManyToOne(targetEntity: Category::class, inversedBy: 'products')]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(['product:read'])]
    private ?Category $category = null;

    /**
     * @var Collection<int, ProductImage>
     */

    #[ORM\OneToMany(targetEntity: ProductImage::class, mappedBy: 'product', orphanRemoval: true)]
    #[Groups(['product:read'])]
    private Collection $images;


    /**
     * @var Collection<int, Comment>
     */
    #[ORM\OneToMany(targetEntity: Comment::class, mappedBy: 'product')]
    private Collection $comments;

    /**
     * @var Collection<int, ProductNutritionalIcon>
     */
    #[ORM\OneToMany(targetEntity: ProductNutritionalIcon::class, mappedBy: 'product')]
    #[Groups(['product:read'])]
    private Collection $productNutritionalIcons;

    public function __construct()
    {
        $this->images = new ArrayCollection();
        $this->comments = new ArrayCollection();
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

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): static
    {
        $this->slug = $slug;

        return $this;
    }

    public function getDescriptionShort(): ?string
    {
        return $this->descriptionShort;
    }

    public function setDescriptionShort(string $descriptionShort): static
    {
        $this->descriptionShort = $descriptionShort;

        return $this;
    }

    public function getDescriptionLong(): ?string
    {
        return $this->descriptionLong;
    }

    public function setDescriptionLong(?string $descriptionLong): static
    {
        $this->descriptionLong = $descriptionLong;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(string $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getPriceAsFloat(): float
    {
        return (float) $this->price;
    } // récupérer le prix en float

    public function getDiscountPercent(): ?int
    {
        return $this->discountPercent;
    }

    public function setDiscountPercent(?int $discountPercent): static
    {
        $this->discountPercent = $discountPercent;

        return $this;
    }

    public function getStock(): ?int
    {
        return $this->stock;
    }

    public function setStock(int $stock): static
    {
        $this->stock = $stock;

        return $this;
    }

    public function isPopular(): ?bool
    {
        return $this->isPopular;
    }

    public function setIsPopular(bool $isPopular): static
    {
        $this->isPopular = $isPopular;

        return $this;
    }

    public function isFeatured(): ?bool
    {
        return $this->isFeatured;
    }

    public function setIsFeatured(bool $isFeatured): static
    {
        $this->isFeatured = $isFeatured;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

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

    public function getKeywords(): array
    {
        return $this->keywords;
    }

    public function setKeywords(array $keywords): static
    {
        $this->keywords = $keywords;
        return $this;
    }

    public function getWeight(): ?float
    {
        return $this->weight;
    }

    public function setWeight(?float $weight): static
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * @return Collection<int, ProductImage>
     */
    #[Groups(['product:read'])]
    public function getImages(): Collection
    {
        return $this->images;
    }

    public function addImage(ProductImage $image): static
    {
        if (!$this->images->contains($image)) {
            $this->images->add($image);
            $image->setProduct($this);
        }

        return $this;
    }

    public function removeImage(ProductImage $image): static
    {
        if ($this->images->removeElement($image)) {
            // set the owning side to null (unless already changed)
            if ($image->getProduct() === $this) {
                $image->setProduct(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Comment>
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }

    public function addComment(Comment $comment): static
    {
        if (!$this->comments->contains($comment)) {
            $this->comments->add($comment);
            $comment->setProduct($this);
        }

        return $this;
    }

    public function removeComment(Comment $comment): static
    {
        if ($this->comments->removeElement($comment)) {
            if ($comment->getProduct() === $this) {
                $comment->setProduct(null);
            }
        }

        return $this;
    }

    public function getOrigin(): ?string
    {
        return $this->origin;
    }

    public function setOrigin(?string $origin): static
    {
        $this->origin = $origin;
        return $this;
    }

    public function getTaste(): ?string
    {
        return $this->taste;
    }

    public function setTaste(?string $taste): static
    {
        $this->taste = $taste;
        return $this;
    }

    public function getUsageAdvice(): ?string
    {
        return $this->usageAdvice;
    }
    public function setUsageAdvice(?string $usageAdvice): static
    {
        $this->usageAdvice = $usageAdvice;
        return $this;
    }

    public function getConservation(): ?string
    {
        return $this->conservation;
    }
    public function setConservation(?string $conservation): static
    {
        $this->conservation = $conservation;
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
            $productNutritionalIcon->setProduct($this);
        }

        return $this;
    }

    public function removeProductNutritionalIcon(ProductNutritionalIcon $productNutritionalIcon): static
    {
        if ($this->productNutritionalIcons->removeElement($productNutritionalIcon)) {
            if ($productNutritionalIcon->getProduct() === $this) {
                $productNutritionalIcon->setProduct(null);
            }
        }

        return $this;
    }

    public function isNew(): bool
    {
        if (!$this->createdAt) {
            return false;
        }

        return $this->createdAt > new \DateTimeImmutable('-7 days');
    }

    public function getAverageRating(): float
    {
        $ratings = [];

        foreach ($this->comments as $comment) {
            if ($comment->getRating() !== null && $comment->getStatus() === 'approved') {
                $ratings[] = $comment->getRating();
            }
        }

        if (count($ratings) === 0) {
            return 0;
        }

        return array_sum($ratings) / count($ratings);
    }

    public function getReviewsCount(): int
    {
        return count(array_filter(
            $this->comments->toArray(),
            fn($c) => $c->getStatus() === 'approved'
        ));
    }

    public function getPrixPromo(): float
    {
        if (!$this->discountPercent) {
            return $this->getPriceAsFloat();
        }

        $discount = $this->getPriceAsFloat() * ($this->discountPercent / 100);

        return $this->getPriceAsFloat() - $discount;
    }

    public function isPromo(): bool
    {
        return $this->discountPercent !== null && $this->discountPercent > 0;
    }
}
