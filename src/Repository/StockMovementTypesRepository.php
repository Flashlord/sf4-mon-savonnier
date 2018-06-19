<?php

namespace App\Repository;

use App\Entity\StockMovementTypes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method StockMovementTypes|null find($id, $lockMode = null, $lockVersion = null)
 * @method StockMovementTypes|null findOneBy(array $criteria, array $orderBy = null)
 * @method StockMovementTypes[]    findAll()
 * @method StockMovementTypes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StockMovementTypesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, StockMovementTypes::class);
    }

//    /**
//     * @return StockMovementTypes[] Returns an array of StockMovementTypes objects
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
    public function findOneBySomeField($value): ?StockMovementTypes
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
