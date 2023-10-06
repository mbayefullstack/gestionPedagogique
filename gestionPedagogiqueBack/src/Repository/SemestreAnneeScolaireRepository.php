<?php

namespace App\Repository;

use App\Entity\SemestreAnneeScolaire;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SemestreAnneeScolaire>
 *
 * @method SemestreAnneeScolaire|null find($id, $lockMode = null, $lockVersion = null)
 * @method SemestreAnneeScolaire|null findOneBy(array $criteria, array $orderBy = null)
 * @method SemestreAnneeScolaire[]    findAll()
 * @method SemestreAnneeScolaire[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SemestreAnneeScolaireRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SemestreAnneeScolaire::class);
    }

//    /**
//     * @return SemestreAnneeScolaire[] Returns an array of SemestreAnneeScolaire objects
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

//    public function findOneBySomeField($value): ?SemestreAnneeScolaire
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
