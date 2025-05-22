<?php

namespace App\Repository;

use App\Entity\AdminRoleAssignments;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<AdminRoleAssignments>
 *
 * @method AdminRoleAssignments|null find($id, $lockMode = null, $lockVersion = null)
 * @method AdminRoleAssignments|null findOneBy(array $criteria, array $orderBy = null)
 * @method AdminRoleAssignments[]    findAll()
 * @method AdminRoleAssignments[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AdminRoleAssignmentsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AdminRoleAssignments::class);
    }

//    /**
//     * @return AdminRoleAssignments[] Returns an array of AdminRoleAssignments objects
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

//    public function findOneBySomeField($value): ?AdminRoleAssignments
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
