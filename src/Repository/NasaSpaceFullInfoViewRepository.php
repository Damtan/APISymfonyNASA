<?php

namespace App\Repository;

use App\Entity\NasaSpaceFullInfoView;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method NasaSpaceFullInfoView|null find($id, $lockMode = null, $lockVersion = null)
 * @method NasaSpaceFullInfoView|null findOneBy(array $criteria, array $orderBy = null)
 * @method NasaSpaceFullInfoView[]    findAll()
 * @method NasaSpaceFullInfoView[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NasaSpaceFullInfoViewRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, NasaSpaceFullInfo::class);
    }

    // /**
    //  * @return NasaSpaceFullInfo[] Returns an array of NasaSpaceFullInfo objects
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
    public function findOneBySomeField($value): ?NasaSpaceFullInfo
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
