<?php

namespace App\Repository;

use App\Entity\InventoryHasProducts;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method InventoryHasProducts|null find($id, $lockMode = null, $lockVersion = null)
 * @method InventoryHasProducts|null findOneBy(array $criteria, array $orderBy = null)
 * @method InventoryHasProducts[]    findAll()
 * @method InventoryHasProducts[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InventoryHasProductsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, InventoryHasProducts::class);
    }

//    /**
//     * @return InventoryHasProducts[] Returns an array of InventoryHasProducts objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?InventoryHasProducts
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
