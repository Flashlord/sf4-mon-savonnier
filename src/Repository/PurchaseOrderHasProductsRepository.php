<?php

namespace App\Repository;

use App\Entity\PurchaseOrderHasProducts;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method PurchaseOrderHasProducts|null find($id, $lockMode = null, $lockVersion = null)
 * @method PurchaseOrderHasProducts|null findOneBy(array $criteria, array $orderBy = null)
 * @method PurchaseOrderHasProducts[]    findAll()
 * @method PurchaseOrderHasProducts[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PurchaseOrderHasProductsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, PurchaseOrderHasProducts::class);
    }

//    /**
//     * @return SupplyOrdersHasProducts[] Returns an array of SupplyOrdersHasProducts objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SupplyOrdersHasProducts
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
