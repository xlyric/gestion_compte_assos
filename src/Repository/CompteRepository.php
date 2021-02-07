<?php

namespace App\Repository;

use App\Entity\Compte;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Compte|null find($id, $lockMode = null, $lockVersion = null)
 * @method Compte|null findOneBy(array $criteria, array $orderBy = null)
 * @method Compte[]    findAll()
 * @method Compte[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CompteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Compte::class);
    }

    public function getLast()
    {
        return $this->createQueryBuilder('c')
            ->orderBy('c.id', 'DESC')
            ->setMaxResults(15)
            ->getQuery()
            ->getResult()
        ;
    }

    public function getbilancode($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.codecompta = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'DESC')
            ->getQuery()
            ->getResult()
        ;
    }
   
    public function getbilan($annee)
    {
        return $this->createQueryBuilder('c')
            ->where('YEAR(c.date) = :val')
            ->setParameter('val', $annee)
            ->orderBy('c.codecompta', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }

    public function getannee()
    {
        return $this->createQueryBuilder('d')
            ->select('YEAR(d.date) as year')
            ->orderBy('year', 'DESC')
            ->groupBy('year')
            ->getQuery()
            ->getResult()
        ;
    }

    // /**
    //  * @return Compte[] Returns an array of Compte objects
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
    public function findOneBySomeField($value): ?Compte
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
