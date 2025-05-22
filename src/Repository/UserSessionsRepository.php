<?php

namespace App\Repository;

use App\Entity\UserSessions;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<UserSessions>
 *
 * @method UserSessions|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserSessions|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserSessions[]    findAll()
 * @method UserSessions[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserSessionsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UserSessions::class);
    }

//    /**
//     * @return UserSessions[] Returns an array of UserSessions objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('u.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?UserSessions
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
