<?php

namespace App\Repository;

use App\Entity\ClimateRisks;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ClimateRisks>
 *
 * @method ClimateRisks|null find($id, $lockMode = null, $lockVersion = null)
 * @method ClimateRisks|null findOneBy(array $criteria, array $orderBy = null)
 * @method ClimateRisks[]    findAll()
 * @method ClimateRisks[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ClimateRisksRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ClimateRisks::class);
    }

//    /**
//     * @return ClimateRisks[] Returns an array of ClimateRisks objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ClimateRisks
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
