<?php

namespace App\Controller\Api;

use App\Entity\Wishlist;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/wishlist')]
class WishlistController extends AbstractController
{
    #[Route('', methods: ['GET'])]
    public function getWishlist(EntityManagerInterface $em): JsonResponse
    {
        $user = $this->getUser();

        if (!$user) {
            return $this->json(['message' => 'Non autorisé'], 401);
        }

        $items = $em->createQueryBuilder()
            ->select('w', 'p')
            ->from(Wishlist::class, 'w')
            ->leftJoin('w.product', 'p')
            ->where('w.user = :user')
            ->setParameter('user', $user)
            ->getQuery()
            ->getResult();

        return $this->json($items, 200, [], [
             'groups' => ['wishlist:read', 'product:read']
        ]);
    }

    #[Route('/add', methods: ['POST'])]
    public function add(
        Request $request,
        ProductRepository $productRepository,
        EntityManagerInterface $em
    ): JsonResponse {
        $user = $this->getUser();

        if (!$user) {
            return $this->json(['message' => 'Non autorisé'], 401);
        }

        $data = json_decode($request->getContent(), true);

        $product = $productRepository->find($data['productId'] ?? null);

        if (!$product) {
            return $this->json(['message' => 'Produit non trouvé'], 404);
        }

        $existing = $em->getRepository(Wishlist::class)->findOneBy([
            'user' => $user,
            'product' => $product
        ]);

        if ($existing) {
            return $this->json(['message' => 'Already dans la liste de souhait'], 409);
        }

        $wish = new Wishlist();
        $wish->setUser($user);
        $wish->setProduct($product);
        $wish->setCreatedAt(new \DateTimeImmutable());

        $em->persist($wish);
        $em->flush();

        return $this->json(['success' => true]);
    }

    #[Route('/item/{id}', methods: ['DELETE'])]
    public function remove(
        Wishlist $wishlist,
        EntityManagerInterface $em
    ): JsonResponse {
        $user = $this->getUser();

        if ($wishlist->getUser() !== $user) {
            return $this->json(['message' => 'Access refusé'], 403);
        }

        $em->remove($wishlist);
        $em->flush();

        return $this->json(['success' => true]);
    }
}