<?php

namespace App\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/products')]
class ProductController extends AbstractController
{
    // #[Route('', methods: ['GET'])]
    // public function index(Request $request, ProductRepository $repo): JsonResponse
    // {
    //     $search = $request->query->get('search');
    //     $category = $request->query->get('category');
    //     $page = max(1, $request->query->getInt('page', 1));
    //     $limit = $request->query->getInt('limit', 12);
    //     $offset = ($page - 1) * $limit;
    //     $sort = $request->query->get('sort');
    //     $onlyPromo = $request->query->getBoolean('onlyPromo');

    //     $products = $repo->findByFilters(
    //         $search,
    //         $category,
    //         $limit,
    //         $offset,
    //         $sort,
    //         $onlyPromo
    //     );

    //     $total = $repo->countByFilters(
    //         $search,
    //         $category,
    //         $onlyPromo
    //     );

    //     return $this->json([
    //         'data' => $products,
    //         'total' => $total,
    //         'page' => $page,
    //         'pages' => ceil($total / $limit),
    //         'category' => $category ? [
    //             'name' => $category
    //         ] : null
    //     ], 200, [], [
    //         'groups' => ['product:read']
    //     ]);
    // }

    // #[Route('/{slug}', methods: ['GET'])]
    // public function show(string $slug, ProductRepository $repo): JsonResponse
    // {
    //     $product = $repo->findOneBy(['slug' => $slug]);

    //     if (!$product) {
    //         return $this->json([
    //             'message' => 'Produit introuvables',
    //             'slug' => $slug
    //         ], 404);
    //     }

    //     return $this->json($product, 200, [], [
    //         'groups' => ['product:read']
    //     ]);
    // }

    // #[Route('/related/{slug}', methods: ['GET'])]
    // public function related(string $slug, ProductRepository $repo): JsonResponse
    // {
    //     $product = $repo->findOneBy(['slug' => $slug]);

    //     if (!$product) {
    //         return $this->json([]);
    //     }

    //     $category = $product->getCategory();

    //     $qb = $repo->createQueryBuilder('p')
    //         ->leftJoin('p.category', 'c')
    //         ->andWhere('c.id = :catId')
    //         ->andWhere('p.id != :id')
    //         ->setParameter('catId', $category->getId())
    //         ->setParameter('id', $product->getId())
    //         ->setMaxResults(8);

    //     $results = $qb->getQuery()->getResult();

    //     return $this->json($results, 200, [], [
    //         'groups' => ['product:read']
    //     ]);
    // }
}