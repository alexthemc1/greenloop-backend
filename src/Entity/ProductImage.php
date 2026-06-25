<?php

namespace App\Entity;

use App\Repository\ProductImageRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Attribute\Groups;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use App\Controller\ProductImageUploadController;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Delete;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Attribute\Uploadable;
use Vich\UploaderBundle\Mapping\Attribute\UploadableField;


#[ApiResource(
    operations: [
        new Get(),
        new GetCollection(),
        new Post(
            uriTemplate: '/product_images/upload',
            controller: ProductImageUploadController::class,
            deserialize: false
        ),
        new Post(),
        new Patch(),
        new Delete(),
    ],
    normalizationContext: [
        'groups' => ['product:read']
    ],
    denormalizationContext: [
        'groups' => ['productImage:write']
    ]
)]

#[ORM\Entity(repositoryClass: ProductImageRepository::class)]
#[Uploadable]
class ProductImage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['product:read', 'comment:read'])]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['product:read', 'comment:read', 'productImage:write'])]
    private ?string $imagePath = null;

    #[UploadableField(
        mapping: 'product_images',
        fileNameProperty: 'imagePath'
    )]
    private ?File $imageFile = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\Column(length: 50)]
    #[Groups(['product:read', 'comment:read', 'productImage:write'])]
    private ?string $typeImage = null;

    #[ORM\ManyToOne(inversedBy: 'images')]
    #[Groups(['productImage:write'])]
    private ?Product $product = null;
    
    public function getId(): ?int
    {
        return $this->id;
    }

#[Groups(['product:read', 'cart:read', 'comment:read'])]
public function getImagePath(): ?string
{
    if (!$this->imagePath) {
        return null;
    }

    return '/images/products/' . ltrim($this->imagePath, '/');
}

    public function setImagePath(?string $imagePath): static
    {
        $this->imagePath = $imagePath;

        return $this;
    }

    public function getProduct(): ?Product
    {
        return $this->product;
    }

    public function setProduct(?Product $product): static
    {
        $this->product = $product;

        return $this;
    }

    #[Groups(['product:read', 'comment:read'])]
    public function getTypeImage(): ?string
    {
        return $this->typeImage;
    }

    public function setTypeImage(string $typeImage): static
    {
        $this->typeImage = $typeImage;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->typeImage;
    }

    public function setType(string $typeImage): static
    {
        $this->typeImage = $typeImage;
        return $this;
    }

    public function setImageFile(?File $imageFile = null): void
    {
        $this->imageFile = $imageFile;

        if ($imageFile) {
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeImmutable $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
    
}
