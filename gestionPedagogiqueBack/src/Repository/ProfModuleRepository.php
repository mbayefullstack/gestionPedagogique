<?php

namespace App\Repository;

use App\Entity\ProfModule;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ProfModule>
 *
 * @method ProfModule|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProfModule|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProfModule[]    findAll()
 * @method ProfModule[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProfModuleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProfModule::class);
    }

//    /**
//     * @return ProfModule[] Returns an array of ProfModule objects
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

//    public function findOneBySomeField($value): ?ProfModule
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
