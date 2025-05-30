<?php

namespace App\Repository;

use App\Entity\Bedrooms;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Bedrooms>
 *
 * @method Bedrooms|null find($id, $lockMode = null, $lockVersion = null)
 * @method Bedrooms|null findOneBy(array $criteria, array $orderBy = null)
 * @method Bedrooms[]    findAll()
 * @method Bedrooms[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BedroomsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Bedrooms::class);
    }

//    /**
//     * @return Bedrooms[] Returns an array of Bedrooms objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('b.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Bedrooms
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
