<?php

namespace App\Repository;

use App\Entity\NasaRoverName;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method NasaRoverName|null find($id, $lockMode = null, $lockVersion = null)
 * @method NasaRoverName|null findOneBy(array $criteria, array $orderBy = null)
 * @method NasaRoverName[]    findAll()
 * @method NasaRoverName[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NasaRoverNameRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, NasaRoverName::class);
    }

    // /**
    //  * @return NasaRoverName[] Returns an array of NasaRoverName objects
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
    public function findOneBySomeField($value): ?NasaRoverName
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
