<?php

namespace App\Repository;

use App\Entity\Visitation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Visitation>
 *
 * @method Visitation|null find($id, $lockMode = null, $lockVersion = null)
 * @method Visitation|null findOneBy(array $criteria, array $orderBy = null)
 * @method Visitation[]    findAll()
 * @method Visitation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VisitationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Visitation::class);
    }

//    /**
//     * @return Visitation[] Returns an array of Visitation objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('v.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Visitation
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
