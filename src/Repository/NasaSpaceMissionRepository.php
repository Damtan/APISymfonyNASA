<?php

namespace App\Repository;

use App\Entity\NasaSpaceMission;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method NasaSpaceMission|null find($id, $lockMode = null, $lockVersion = null)
 * @method NasaSpaceMission|null findOneBy(array $criteria, array $orderBy = null)
 * @method NasaSpaceMission[]    findAll()
 * @method NasaSpaceMission[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NasaSpaceMissionRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, NasaSpaceMission::class);
    }

    // /**
    //  * @return NasaSpaceMission[] Returns an array of NasaSpaceMission objects
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
    public function findOneBySomeField($value): ?NasaSpaceMission
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
