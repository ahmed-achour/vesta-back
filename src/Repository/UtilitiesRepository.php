<?php

namespace App\Repository;

use App\Entity\Utilities;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Utilities>
 *
 * @method Utilities|null find($id, $lockMode = null, $lockVersion = null)
 * @method Utilities|null findOneBy(array $criteria, array $orderBy = null)
 * @method Utilities[]    findAll()
 * @method Utilities[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UtilitiesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Utilities::class);
    }

//    /**
//     * @return Utilities[] Returns an array of Utilities objects
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

//    public function findOneBySomeField($value): ?Utilities
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
