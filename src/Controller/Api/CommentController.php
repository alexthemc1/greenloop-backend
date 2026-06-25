<?php

namespace App\Controller\Api;

use App\Repository\CommentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/comments')]
class CommentController extends AbstractController
{
    #[Route('', methods: ['GET'])]
    public function index(Request $request, CommentRepository $repo): JsonResponse
    {
        $status = $request->query->get('status');
        $page = max(1, $request->query->getInt('page', 1));
        $limit = $request->query->getInt('limit', 10);
        $offset = ($page - 1) * $limit;

        $comments = $repo->findByFilters($status, $limit, $offset);
        $total = $repo->countByFilters($status);

        return $this->json([
            'data' => $comments,
            'total' => $total,
            'page' => $page,
            'pages' => ceil($total / $limit),
        ], 200, [], [
            'groups' => ['comment:read']
        ]);
    }

    #[Route('/product/{id}', methods: ['GET'])]
    public function byProduct(
        int $id,
        CommentRepository $repo
    ): JsonResponse {
        $comments = $repo->findByProduct($id);

        return $this->json([
            'data' => $comments
        ], 200, [], [
            'groups' => ['comment:read']
        ]);
    }

}
