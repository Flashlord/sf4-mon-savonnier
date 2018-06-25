<?php

namespace App\Repository;

use App\Entity\CustomerOrderHasOrderStatuses;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method CustomerOrderHasOrderStatuses|null find($id, $lockMode = null, $lockVersion = null)
 * @method CustomerOrderHasOrderStatuses|null findOneBy(array $criteria, array $orderBy = null)
 * @method CustomerOrderHasOrderStatuses[]    findAll()
 * @method CustomerOrderHasOrderStatuses[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CustomerOrderHasOrderStatusesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CustomerOrderHasOrderStatuses::class);
    }

//    /**
//     * @return CustomerOrderHasOrderStatuses[] Returns an array of CustomerOrderHasOrderStatuses objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CustomerOrderHasOrderStatuses
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
