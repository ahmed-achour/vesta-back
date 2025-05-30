<?php

namespace App\Repository;

use App\Entity\Financials;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Financials>
 *
 * @method Financials|null find($id, $lockMode = null, $lockVersion = null)
 * @method Financials|null findOneBy(array $criteria, array $orderBy = null)
 * @method Financials[]    findAll()
 * @method Financials[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FinancialsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Financials::class);
    }

//    /**
//     * @return Financials[] Returns an array of Financials objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('f.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Financials
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
