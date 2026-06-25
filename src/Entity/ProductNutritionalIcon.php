<?php

namespace App\Entity;

use App\Repository\ProductNutritionalIconRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Attribute\Groups;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Delete;

#[ApiResource(
    operations: [
        new Get(),
        new GetCollection(),
        new Post(),
        new Delete()
    ],
    denormalizationContext: [
        'groups' => ['productNutritionalIcon:write']
    ]
)]

#[ORM\Entity(repositoryClass: ProductNutritionalIconRepository::class)]
#[ORM\Table(
    uniqueConstraints: [
        new ORM\UniqueConstraint(name: "uniq_product_icon", columns: ["product_id", "nutritional_icon_id"])
    ]
)] //sécurité pour éviter qu'un même produit ait plusieurs fois la même icône nutritionnelle
class ProductNutritionalIcon
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;


    #[Groups(['productNutritionalIcon:write', 'product:write'])]
    #[ORM\ManyToOne(inversedBy: 'productNutritionalIcons')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Product $product = null;

    #[Groups(['product:read', 'productNutritionalIcon:write', 'product:write'])]
    #[ORM\ManyToOne(inversedBy: 'productNutritionalIcons')]
    #[ORM\JoinColumn(nullable: false)]
    private ?NutritionalIcon $nutritionalIcon = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getNutritionalIcon(): ?NutritionalIcon
    {
        return $this->nutritionalIcon;
    }

    public function setNutritionalIcon(?NutritionalIcon $nutritionalIcon): static
    {
        $this->nutritionalIcon = $nutritionalIcon;

        return $this;
    }
}
