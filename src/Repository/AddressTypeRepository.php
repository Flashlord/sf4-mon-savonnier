<?php

namespace App\Repository;

use App\Entity\AdressType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method AdressType|null find($id, $lockMode = null, $lockVersion = null)
 * @method AdressType|null findOneBy(array $criteria, array $orderBy = null)
 * @method AdressType[]    findAll()
 * @method AdressType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AddressTypeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, AdressType::class);
    }

//    /**
//     * @return AdressType[] Returns an array of AdressType objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?AdressType
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
