<?php

namespace App\Repository;

use App\Entity\Ailleur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Ailleur|null find($id, $lockMode = null, $lockVersion = null)
 * @method Ailleur|null findOneBy(array $criteria, array $orderBy = null)
 * @method Ailleur[]    findAll()
 * @method Ailleur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AilleurRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Ailleur::class);
    }

    // /**
    //  * @return Ailleur[] Returns an array of Ailleur objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Ailleur
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
