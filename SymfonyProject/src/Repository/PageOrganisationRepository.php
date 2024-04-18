<?php

namespace App\Repository;

use App\Entity\PageOrganisation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PageOrganisation>
 *
 * @method PageOrganisation|null find($id, $lockMode = null, $lockVersion = null)
 * @method PageOrganisation|null findOneBy(array $criteria, array $orderBy = null)
 * @method PageOrganisation[]    findAll()
 * @method PageOrganisation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PageOrganisationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PageOrganisation::class);
    }

    //    /**
    //     * @return PageOrganisation[] Returns an array of PageOrganisation objects
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

    //    public function findOneBySomeField($value): ?PageOrganisation
    //    {
    //        return $this->createQueryBuilder('p')
    //            ->andWhere('p.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
