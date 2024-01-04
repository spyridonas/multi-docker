<?php

namespace App\Repository;

use App\Entity\SymptomHistory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SymptomHistory>
 *
 * @method SymptomHistory|null find($id, $lockMode = null, $lockVersion = null)
 * @method SymptomHistory|null findOneBy(array $criteria, array $orderBy = null)
 * @method SymptomHistory[]    findAll()
 * @method SymptomHistory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SymptomHistoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SymptomHistory::class);
    }

//    /**
//     * @return SymptomHistory[] Returns an array of SymptomHistory objects
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

//    public function findOneBySomeField($value): ?SymptomHistory
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
