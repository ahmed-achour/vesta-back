<?php

namespace App\Repository;

use App\Entity\TaxHistory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TaxHistory>
 *
 * @method TaxHistory|null find($id, $lockMode = null, $lockVersion = null)
 * @method TaxHistory|null findOneBy(array $criteria, array $orderBy = null)
 * @method TaxHistory[]    findAll()
 * @method TaxHistory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TaxHistoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TaxHistory::class);
    }

//    /**
//     * @return TaxHistory[] Returns an array of TaxHistory objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('t.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?TaxHistory
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
