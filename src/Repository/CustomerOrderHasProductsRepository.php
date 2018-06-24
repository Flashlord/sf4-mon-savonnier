<?php

namespace App\Repository;

use App\Entity\CustomerOrderHasProducts;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method CustomerOrderHasProducts|null find($id, $lockMode = null, $lockVersion = null)
 * @method CustomerOrderHasProducts|null findOneBy(array $criteria, array $orderBy = null)
 * @method CustomerOrderHasProducts[]    findAll()
 * @method CustomerOrderHasProducts[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CustomerOrderHasProductsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CustomerOrderHasProducts::class);
    }

//    /**
//     * @return CustomerOrdersHasProducts[] Returns an array of CustomerOrdersHasProducts objects
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
    public function findOneBySomeField($value): ?CustomerOrdersHasProducts
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
