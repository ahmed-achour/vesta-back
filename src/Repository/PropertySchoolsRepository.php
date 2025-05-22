<?php

namespace App\Repository;

use App\Entity\PropertySchools;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PropertySchools>
 *
 * @method PropertySchools|null find($id, $lockMode = null, $lockVersion = null)
 * @method PropertySchools|null findOneBy(array $criteria, array $orderBy = null)
 * @method PropertySchools[]    findAll()
 * @method PropertySchools[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PropertySchoolsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PropertySchools::class);
    }

//    /**
//     * @return PropertySchools[] Returns an array of PropertySchools objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?PropertySchools
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
