<?php

namespace App\Repository;

use App\Entity\PurchaseOrderHasOrderStatuses;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method PurchaseOrderHasOrderStatuses|null find($id, $lockMode = null, $lockVersion = null)
 * @method PurchaseOrderHasOrderStatuses|null findOneBy(array $criteria, array $orderBy = null)
 * @method PurchaseOrderHasOrderStatuses[]    findAll()
 * @method PurchaseOrderHasOrderStatuses[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PurchaseOrderHasOrderStatusesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, PurchaseOrderHasOrderStatuses::class);
    }

//    /**
//     * @return PurchaseOrderHasOrderStatuses[] Returns an array of PurchaseOrderHasOrderStatuses objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PurchaseOrderHasOrderStatuses
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
