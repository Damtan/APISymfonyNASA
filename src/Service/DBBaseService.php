<?php


namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;


class DBBaseService
{
    protected $entityManager;


    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    protected function getManager()
    {
        return $this->entityManager;
    }

    protected function commit($entityRecord)
    {
        $this->getManager()->persist($entityRecord);
        $this->getManager()->flush();
    }

    private function getRepository($entityClass)
    {
        return $this->getManager()->getRepository($entityClass);
    }

    public function getOneBy(string $className, array $parameters)
    {
        $repository = $this->getRepository($className);

        return $repository->findOneBy($parameters);
    }

    public function getAll(string $className, array $parameters = [], array $ordersBY = ['id' => 'ASC'])
    {
        $repository = $this->getRepository($className);

        if (!empty($parameters)) {
            $result = $repository->findBy($parameters, $ordersBY);
        } else {
            $result = $repository->findAll();
        }

        return $result;
    }

    public function getAllWtithCondition(string $className, string $condtion, array $parameters = [], array $ordersBY = ['t.id' => 'ASC'])
    {
        $qb = $this->getManager()->createQueryBuilder();
        $qb
            ->select('t')
            ->from($className, 't')
            ->Where($condtion)
            ->setParameters($parameters)
            ->orderBy(key($ordersBY), $ordersBY[key($ordersBY)]);

        $result = $qb->getQuery()->getResult();

        return $result;
    }
}