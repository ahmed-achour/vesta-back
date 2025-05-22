<?php

namespace App\Repository;

use App\Entity\InteriorFeatures;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<InteriorFeatures>
 *
 * @method InteriorFeatures|null find($id, $lockMode = null, $lockVersion = null)
 * @method InteriorFeatures|null findOneBy(array $criteria, array $orderBy = null)
 * @method InteriorFeatures[]    findAll()
 * @method InteriorFeatures[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InteriorFeaturesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, InteriorFeatures::class);
    }

//    /**
//     * @return InteriorFeatures[] Returns an array of InteriorFeatures objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('i.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?InteriorFeatures
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
