<?php

namespace App\Repository;

use App\Entity\NasaRover;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method NasaRover|null find($id, $lockMode = null, $lockVersion = null)
 * @method NasaRover|null findOneBy(array $criteria, array $orderBy = null)
 * @method NasaRover[]    findAll()
 * @method NasaRover[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NasaRoverRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, NasaRover::class);
    }

    // /**
    //  * @return NasaRover[] Returns an array of NasaRover objects
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
    public function findOneBySomeField($value): ?NasaRover
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
