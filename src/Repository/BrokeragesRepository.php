<?php

namespace App\Repository;

use App\Entity\Brokerages;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Brokerages>
 *
 * @method Brokerages|null find($id, $lockMode = null, $lockVersion = null)
 * @method Brokerages|null findOneBy(array $criteria, array $orderBy = null)
 * @method Brokerages[]    findAll()
 * @method Brokerages[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BrokeragesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Brokerages::class);
    }

//    /**
//     * @return Brokerages[] Returns an array of Brokerages objects
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

//    public function findOneBySomeField($value): ?Brokerages
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
