<?php

namespace App\Repository;

use App\Entity\ClasseOuvert;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ClasseOuvert>
 *
 * @method ClasseOuvert|null find($id, $lockMode = null, $lockVersion = null)
 * @method ClasseOuvert|null findOneBy(array $criteria, array $orderBy = null)
 * @method ClasseOuvert[]    findAll()
 * @method ClasseOuvert[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ClasseOuvertRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ClasseOuvert::class);
    }

//    /**
//     * @return ClasseOuvert[] Returns an array of ClasseOuvert objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ClasseOuvert
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
