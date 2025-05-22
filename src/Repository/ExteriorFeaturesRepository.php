<?php

namespace App\Repository;

use App\Entity\ExteriorFeatures;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ExteriorFeatures>
 *
 * @method ExteriorFeatures|null find($id, $lockMode = null, $lockVersion = null)
 * @method ExteriorFeatures|null findOneBy(array $criteria, array $orderBy = null)
 * @method ExteriorFeatures[]    findAll()
 * @method ExteriorFeatures[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExteriorFeaturesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ExteriorFeatures::class);
    }

//    /**
//     * @return ExteriorFeatures[] Returns an array of ExteriorFeatures objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('e.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ExteriorFeatures
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
