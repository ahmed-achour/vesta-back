<?php

namespace App\Repository;

use App\Entity\UserVerifications;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<UserVerifications>
 *
 * @method UserVerifications|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserVerifications|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserVerifications[]    findAll()
 * @method UserVerifications[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserVerificationsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UserVerifications::class);
    }

//    /**
//     * @return UserVerifications[] Returns an array of UserVerifications objects
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

//    public function findOneBySomeField($value): ?UserVerifications
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
