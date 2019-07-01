<?php

namespace App\Repository;

use App\Entity\NasaSpaceMissionToCamera;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method NasaSpaceMissionToCamera|null find($id, $lockMode = null, $lockVersion = null)
 * @method NasaSpaceMissionToCamera|null findOneBy(array $criteria, array $orderBy = null)
 * @method NasaSpaceMissionToCamera[]    findAll()
 * @method NasaSpaceMissionToCamera[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NasaSpaceMissionToCameraRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, NasaSpaceMissionToCamera::class);
    }

    // /**
    //  * @return NasaSpaceMissionToCamera[] Returns an array of NasaSpaceMissionToCamera objects
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
    public function findOneBySomeField($value): ?NasaSpaceMissionToCamera
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
