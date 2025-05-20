<?php

namespace App\Repository;

use App\Entity\Plant;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Plant>
 */
class PlantRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Plant::class);
    }

//    /**
//     * @return Plant[] Returns an array of Plant objects
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

//    public function findOneBySomeField($value): ?Plant
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }

    public function searchByCriteria(array $criteria)
    {
        $qb = $this->createQueryBuilder('p')
            ->leftJoin('p.category', 'c');

        if (!empty($criteria['category'])) {
            $qb->andWhere('c.nom = :category')
                ->setParameter('category', $criteria['category']);
        }
        if (!empty($criteria['maintenanceDifficulty'])) {
            $qb->andWhere('p.maintenanceDifficulty = :md')
                ->setParameter('md', $criteria['maintenanceDifficulty']);
        }
        if (!empty($criteria['soilType'])) {
            $qb->andWhere('p.soilType = :soil')
                ->setParameter('soil', $criteria['soilType']);
        }
        if (!empty($criteria['wateringNeeds'])) {
            $qb->andWhere('p.wateringNeeds = :water')
                ->setParameter('water', $criteria['wateringNeeds']);
        }

        return $qb->getQuery()->getResult();
    }
}
