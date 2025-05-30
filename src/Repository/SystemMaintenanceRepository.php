<?php

namespace App\Repository;

use App\Entity\SystemMaintenance;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SystemMaintenance>
 *
 * @method SystemMaintenance|null find($id, $lockMode = null, $lockVersion = null)
 * @method SystemMaintenance|null findOneBy(array $criteria, array $orderBy = null)
 * @method SystemMaintenance[]    findAll()
 * @method SystemMaintenance[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SystemMaintenanceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SystemMaintenance::class);
    }

//    /**
//     * @return SystemMaintenance[] Returns an array of SystemMaintenance objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?SystemMaintenance
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
