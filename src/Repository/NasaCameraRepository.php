<?php

namespace App\Repository;

use App\Entity\NasaCamera;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method NasaCamera|null find($id, $lockMode = null, $lockVersion = null)
 * @method NasaCamera|null findOneBy(array $criteria, array $orderBy = null)
 * @method NasaCamera[]    findAll()
 * @method NasaCamera[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NasaCameraRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, NasaCamera::class);
    }

    // /**
    //  * @return NasaCamera[] Returns an array of NasaCamera objects
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
    public function findOneBySomeField($value): ?NasaCamera
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
