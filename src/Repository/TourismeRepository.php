<?php

namespace App\Repository;

use App\Entity\Tourisme;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Tourisme|null find($id, $lockMode = null, $lockVersion = null)
 * @method Tourisme|null findOneBy(array $criteria, array $orderBy = null)
 * @method Tourisme[]    findAll()
 * @method Tourisme[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TourismeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Tourisme::class);
    }

    // /**
    //  * @return Tourisme[] Returns an array of Tourisme objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Tourisme
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
