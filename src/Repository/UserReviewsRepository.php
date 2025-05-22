<?php

namespace App\Repository;

use App\Entity\UserReviews;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<UserReviews>
 *
 * @method UserReviews|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserReviews|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserReviews[]    findAll()
 * @method UserReviews[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserReviewsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UserReviews::class);
    }

//    /**
//     * @return UserReviews[] Returns an array of UserReviews objects
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

//    public function findOneBySomeField($value): ?UserReviews
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
