<?php

namespace App\Controller\Api;

use App\Entity\Cart;
use App\Entity\CartItem;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\CartRepository;

#[Route('/api/cart')]
class CartController extends AbstractController
{
  #[Route('', methods: ['GET'])]
  public function getCart(
    CartRepository $cartRepository
  ): JsonResponse {

    $user = $this->getUser();

    if (!$user) {
      return $this->json(['message' => 'Non autorisé'], 401);
    }

    $cart = $cartRepository->createQueryBuilder('c')
      ->leftJoin('c.items', 'i')
      ->addSelect('i')
      ->leftJoin('i.product', 'p')
      ->addSelect('p')
      ->where('c.user = :user')
      ->setParameter('user', $user)
      ->getQuery()
      ->getOneOrNullResult();

    if (!$cart) {
      return $this->json(['items' => []]);
    }

    return $this->json($cart, 200, [], [
      'groups' => ['cart:read', 'product:read']
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
      return $this->json(['message' => 'Unauthorized'], 401);
    }

    $data = json_decode($request->getContent(), true);

    if (!isset($data['productId'])) {
      return $this->json(['message' => 'productId required'], 400);
    }

    $product = $productRepository->find($data['productId']);

    if (!$product) {
      return $this->json(['message' => 'Product not found'], 404);
    }

    $quantity = max(1, (int) ($data['quantity'] ?? 1));

    if ($quantity > $product->getStock()) {
      return $this->json([
        'message' => 'Stock insuffisant'
      ], 400);
    }


    $cart = $user->getCart();

    if (!$cart) {
      $cart = new Cart();
      $cart->setUser($user);
      $cart->setCreatedAt(new \DateTimeImmutable());

      $em->persist($cart);
    }

    foreach ($cart->getItems() as $item) {
      if ($item->getProduct()->getId() === $product->getId()) {
        $newQuantity = $item->getQuantity() + $quantity;

        if ($newQuantity > $product->getStock()) {
          return $this->json([
            'message' => sprintf(
              'Stock insuffisant. Disponible : %d',
              $product->getStock()
            )
          ], 400);
        }

        $item->setQuantity($newQuantity);
        $em->flush();

        return $this->json($cart, 200, [], [
          'groups' => ['cart:read']
        ]);
      }
    }

    $cartItem = new CartItem();
    $cartItem->setCart($cart);
    $cartItem->setProduct($product);
    $cartItem->setQuantity($quantity);

    $em->persist($cartItem);
    $em->flush();

    return $this->json($cart, 200, [], [
      'groups' => ['cart:read']
    ]);
  }

  #[Route('/item/{id}', methods: ['PATCH'])]
  public function updateItem(
    CartItem $item,
    Request $request,
    EntityManagerInterface $em
  ): JsonResponse {

    $user = $this->getUser();

    if ($item->getCart()->getUser() !== $user) {
      return $this->json([
        'message' => 'Access refusé'
      ], 403);
    }
    $data = json_decode($request->getContent(), true);

    $quantity = max(1, (int) ($data['quantity'] ?? 1));

    $product = $item->getProduct();

    if ($quantity > $product->getStock()) {
      return $this->json([
        'message' => sprintf(
          'Stock insuffisant. Disponible : %d',
          $product->getStock()
        )
      ], 400);
    }

    $item->setQuantity($quantity);
    $em->flush();

    return $this->json(['success' => true]);
  }

  #[Route('/item/{id}', methods: ['DELETE'])]
  public function removeItem(
    CartItem $item,
    EntityManagerInterface $em
  ): JsonResponse {

    $user = $this->getUser();

    if ($item->getCart()->getUser() !== $user) {
      return $this->json([
        'message' => 'Access refusé'
      ], 403);
    }

    $em->remove($item);
    $em->flush();

    return $this->json(['success' => true]);
  }

  #[Route('', methods: ['DELETE'])]
  public function clearCart(EntityManagerInterface $em): JsonResponse
  {
    $user = $this->getUser();

    if (!$user) {
      return $this->json(['message' => 'Non autorisé'], 401);
    }

    $cart = $user->getCart();

    if (!$cart) {
      return $this->json(['message' => 'Panier vide'], 200);
    }

    foreach ($cart->getItems() as $item) {
      $em->remove($item);
    }

    $em->flush();

    return $this->json(['success' => true]);
  }
}
