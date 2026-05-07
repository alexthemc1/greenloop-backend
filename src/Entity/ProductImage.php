<?php

namespace App\Entity;

use App\Repository\ProductImageRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Attribute\Groups;


#[ORM\Entity(repositoryClass: ProductImageRepository::class)]
class ProductImage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['product:read'])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(['product:read'])]
    private ?string $imagePath = null;

    #[ORM\Column(length: 50)]
    #[Groups(['product:read'])]
    private ?string $typeImage = null;

    #[ORM\ManyToOne(inversedBy: 'images')]
    private ?Product $product = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    #[Groups(['product:read'])]
    public function getImagePath(): ?string
    {
        return $this->imagePath;
    }

    public function setImagePath(string $imagePath): static
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

    public function getType(): ?string
    {
        return $this->typeImage;
    }

    public function setType(string $typeImage): static
    {
        $this->typeImage = $typeImage;
        return $this;
    }
}
