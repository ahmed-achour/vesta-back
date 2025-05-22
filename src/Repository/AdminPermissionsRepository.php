<?php

namespace App\Repository;

use App\Entity\AdminPermissions;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<AdminPermissions>
 *
 * @method AdminPermissions|null find($id, $lockMode = null, $lockVersion = null)
 * @method AdminPermissions|null findOneBy(array $criteria, array $orderBy = null)
 * @method AdminPermissions[]    findAll()
 * @method AdminPermissions[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AdminPermissionsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AdminPermissions::class);
    }

//    /**
//     * @return AdminPermissions[] Returns an array of AdminPermissions objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('a.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?AdminPermissions
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
