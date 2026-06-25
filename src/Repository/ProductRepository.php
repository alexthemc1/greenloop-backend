<?php

namespace App\Repository;

use App\Entity\Product;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Product>
 */
class ProductRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Product::class);
    }
    
    // permet d'afficher les produits par dates d'ajout
    // public function findLatest(int $limit = 20)
    // {
    //     return $this->createQueryBuilder('p')
    //         ->orderBy('p.createdAt', 'DESC')
    //         ->setMaxResults($limit)
    //         ->getQuery()
    //         ->getResult();
    // }
    //  permet d'afficher les produits populaires
    // public function findPopular(int $limit = 10)
    // {
    //     return $this->createQueryBuilder('p')
    //         ->andWhere('p.isPopular = :val')
    //         ->setParameter('val', true)
    //         ->setMaxResults($limit)
    //         ->getQuery()
    //         ->getResult();
    // }
    // permet d'afficher les produits en promotion
    // public function findPromo(int $limit = 10)
    // {
    //     return $this->createQueryBuilder('p')
    //         ->andWhere('p.discountPercent IS NOT NULL')
    //         ->andWhere('p.discountPercent > 0')
    //         ->setMaxResults($limit)
    //         ->getQuery()
    //         ->getResult();
    // }
    // permet d'afficher les produits par catégorie
    // public function findByCategorySlug(string $slug, int $limit = 20)
    // {
    //     return $this->createQueryBuilder('p')
    //         ->join('p.category', 'c')
    //         ->andWhere('c.slug = :slug')
    //         ->setParameter('slug', $slug)
    //         ->setMaxResults($limit)
    //         ->getQuery()
    //         ->getResult();
    // }
    // permet de faire du filtrage dans la page des produits, ordre alphabétique, prix, etc
    // public function findByFilters(
    //     ?string $search,
    //     ?string $category,
    //     int $limit,
    //     int $offset,
    //     ?string $sort = null,
    //     bool $onlyPromo = false
    // ) {
    //     $qb = $this->createQueryBuilder('p')
    //         ->leftJoin('p.category', 'c')
    //         ->addSelect('c');

    //     if (!empty($search)) {
    //         $qb->andWhere('LOWER(p.name) LIKE :search')
    //             ->setParameter('search', '%' . strtolower($search) . '%');
    //     }

    //     if (!empty($category)) {
    //         $qb->andWhere('c.slug = :category')
    //             ->setParameter('category', $category);
    //     }
    //     if ($onlyPromo) {
    //         $qb->andWhere('p.discountPercent > 0');
    //     }
    //     switch ($sort) {
    //         case 'price_asc':
    //             $qb->orderBy('p.price', 'ASC');
    //             break;

    //         case 'price_desc':
    //             $qb->orderBy('p.price', 'DESC');
    //             break;

    //         case 'alpha_asc':
    //             $qb->orderBy('p.name', 'ASC');
    //             break;

    //         case 'alpha_desc':
    //             $qb->orderBy('p.name', 'DESC');
    //             break;

    //         default:
    //             $qb->orderBy('p.createdAt', 'DESC');
    //     }

    //     return $qb
    //         ->setFirstResult($offset)
    //         ->setMaxResults($limit)
    //         ->getQuery()
    //         ->getResult();
    // }
    // public function countByFilters(
    //     ?string $search,
    //     ?string $category,
    //     bool $onlyPromo = false
    // ) {
    //     $qb = $this->createQueryBuilder('p')
    //         ->select('COUNT(DISTINCT p.id)')
    //         ->leftJoin('p.category', 'c');

    //     if (!empty($search)) {
    //         $qb->andWhere('p.name LIKE :search')
    //             ->setParameter('search', '%' . $search . '%');
    //     }

    //     if (!empty($category)) {
    //         $qb->andWhere('c.slug = :category')
    //             ->setParameter('category', $category);
    //     }

    //     if ($onlyPromo) {
    //         $qb->andWhere('p.discountPercent > 0');
    //     }

    //     return (int) $qb->getQuery()->getSingleScalarResult();
    // }
}
