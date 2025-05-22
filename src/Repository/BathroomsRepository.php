<?php

namespace App\Repository;

use App\Entity\Bathrooms;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Bathrooms>
 *
 * @method Bathrooms|null find($id, $lockMode = null, $lockVersion = null)
 * @method Bathrooms|null findOneBy(array $criteria, array $orderBy = null)
 * @method Bathrooms[]    findAll()
 * @method Bathrooms[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BathroomsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Bathrooms::class);
    }

//    /**
//     * @return Bathrooms[] Returns an array of Bathrooms objects
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

//    public function findOneBySomeField($value): ?Bathrooms
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
