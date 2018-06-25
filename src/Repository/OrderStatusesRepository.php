<?php

namespace App\Repository;

use App\Entity\OrderStatuses;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method OrderStatuses|null find($id, $lockMode = null, $lockVersion = null)
 * @method OrderStatuses|null findOneBy(array $criteria, array $orderBy = null)
 * @method OrderStatuses[]    findAll()
 * @method OrderStatuses[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OrderStatusesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, OrderStatuses::class);
    }

//    /**
//     * @return OrderStatuses[] Returns an array of OrderStatuses objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?OrderStatuses
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
