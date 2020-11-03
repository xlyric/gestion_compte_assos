<?php

namespace App\Repository;

use App\Entity\Codecomptable;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Codecomptable|null find($id, $lockMode = null, $lockVersion = null)
 * @method Codecomptable|null findOneBy(array $criteria, array $orderBy = null)
 * @method Codecomptable[]    findAll()
 * @method Codecomptable[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CodecomptableRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Codecomptable::class);
    }

    // /**
    //  * @return Codecomptable[] Returns an array of Codecomptable objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Codecomptable
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
