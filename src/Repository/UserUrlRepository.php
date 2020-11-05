<?php

namespace App\Repository;

use App\Entity\UserUrl;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method UserUrl|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserUrl|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserUrl[]    findAll()
 * @method UserUrl[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserUrlRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UserUrl::class);
    }

    // /**
    //  * @return UserUrl[] Returns an array of UserUrl objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?UserUrl
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
