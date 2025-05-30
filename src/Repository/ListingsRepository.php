<?php

namespace App\Repository;

use App\Entity\Listings;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Listings>
 *
 * @method Listings|null find($id, $lockMode = null, $lockVersion = null)
 * @method Listings|null findOneBy(array $criteria, array $orderBy = null)
 * @method Listings[]    findAll()
 * @method Listings[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ListingsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Listings::class);
    }

//    /**
//     * @return Listings[] Returns an array of Listings objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('l.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Listings
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
