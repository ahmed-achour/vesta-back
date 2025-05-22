<?php

namespace App\Repository;

use App\Entity\AgencyMembers;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<AgencyMembers>
 *
 * @method AgencyMembers|null find($id, $lockMode = null, $lockVersion = null)
 * @method AgencyMembers|null findOneBy(array $criteria, array $orderBy = null)
 * @method AgencyMembers[]    findAll()
 * @method AgencyMembers[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AgencyMembersRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AgencyMembers::class);
    }

//    /**
//     * @return AgencyMembers[] Returns an array of AgencyMembers objects
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

//    public function findOneBySomeField($value): ?AgencyMembers
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
