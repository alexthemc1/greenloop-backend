<?php

namespace App\Repository;

use App\Entity\Comment;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Comment>
 */
class CommentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Comment::class);
    }

    public function findByFilters(?string $status, int $limit, int $offset)
    {
        $qb = $this->createQueryBuilder('c')
            ->leftJoin('c.user', 'u')
            ->addSelect('u')
            ->leftJoin('c.product', 'p')
            ->addSelect('p')
            ->orderBy('c.createdAt', 'DESC')
            ->setMaxResults($limit)
            ->setFirstResult($offset);

        if ($status && $status !== 'all') {
            $qb->andWhere('c.status = :status')
                ->setParameter('status', $status);
        }

        return $qb->getQuery()->getResult();
    }

    public function countByFilters(?string $status)
    {
        $qb = $this->createQueryBuilder('c')
            ->select('COUNT(c.id)');

        if ($status && $status !== 'all') {
            $qb->andWhere('c.status = :status')
                ->setParameter('status', $status);
        }

        return (int) $qb->getQuery()->getSingleScalarResult();
    }

    public function findByProduct(int $productId, int $limit = 20, int $offset = 0)
{
    return $this->createQueryBuilder('c')
        ->leftJoin('c.user', 'u')
        ->addSelect('u')
        ->leftJoin('c.product', 'p')
        ->addSelect('p')
        ->where('c.product = :productId')
        ->andWhere('c.status = :status')
        ->setParameter('productId', $productId)
        ->setParameter('status', 'approuvé')
        ->orderBy('c.createdAt', 'DESC')
        ->setMaxResults($limit)
        ->setFirstResult($offset)
        ->getQuery()
        ->getResult();
}
}
