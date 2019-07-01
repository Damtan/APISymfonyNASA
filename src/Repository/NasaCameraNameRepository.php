<?php

namespace App\Repository;

use App\Entity\NasaCameraName;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method NasaCameraName|null find($id, $lockMode = null, $lockVersion = null)
 * @method NasaCameraName|null findOneBy(array $criteria, array $orderBy = null)
 * @method NasaCameraName[]    findAll()
 * @method NasaCameraName[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NasaCameraNameRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, NasaCameraName::class);
    }

    // /**
    //  * @return NasaCameraName[] Returns an array of NasaCameraName objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('n.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?NasaCameraName
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
