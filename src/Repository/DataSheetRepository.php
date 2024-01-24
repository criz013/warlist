<?php

namespace App\Repository;

use App\Entity\DataSheet;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<DataSheet>
 *
 * @method DataSheet|null find($id, $lockMode = null, $lockVersion = null)
 * @method DataSheet|null findOneBy(array $criteria, array $orderBy = null)
 * @method DataSheet[]    findAll()
 * @method DataSheet[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DataSheetRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DataSheet::class);
    }

//    /**
//     * @return DataSheet[] Returns an array of DataSheet objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('d.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?DataSheet
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
