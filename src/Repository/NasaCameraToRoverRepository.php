<?php

namespace App\Repository;

use App\Entity\NasaCameraToRover;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method NasaCameraToRover|null find($id, $lockMode = null, $lockVersion = null)
 * @method NasaCameraToRover|null findOneBy(array $criteria, array $orderBy = null)
 * @method NasaCameraToRover[]    findAll()
 * @method NasaCameraToRover[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NasaCameraToRoverRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, NasaCameraToRover::class);
    }

    // /**
    //  * @return NasaCameraToRover[] Returns an array of NasaCameraToRover objects
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
    public function findOneBySomeField($value): ?NasaCameraToRover
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
