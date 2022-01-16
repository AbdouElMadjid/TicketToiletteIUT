<?php

namespace App\Repository;

use App\Entity\TicketToilette;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TicketToilette|null find($id, $lockMode = null, $lockVersion = null)
 * @method TicketToilette|null findOneBy(array $criteria, array $orderBy = null)
 * @method TicketToilette[]    findAll()
 * @method TicketToilette[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TicketToiletteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TicketToilette::class);
    }

    // /**
    //  * @return TicketToilette[] Returns an array of TicketToilette objects
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
    public function findOneBySomeField($value): ?TicketToilette
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
