<?php

namespace App\Repository;

use App\Entity\EnchereMembersRoom;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method EnchereMembersRoom|null find($id, $lockMode = null, $lockVersion = null)
 * @method EnchereMembersRoom|null findOneBy(array $criteria, array $orderBy = null)
 * @method EnchereMembersRoom[]    findAll()
 * @method EnchereMembersRoom[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EnchereMembersRoomRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EnchereMembersRoom::class);
    }

    // /**
    //  * @return EnchereMembersRoom[] Returns an array of EnchereMembersRoom objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?EnchereMembersRoom
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
