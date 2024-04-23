<?php

namespace App\Repository;

use App\Entity\Administrator;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query\ResultSetMapping;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Administrator>
 *
 * @method Administrator|null find($id, $lockMode = null, $lockVersion = null)
 * @method Administrator|null findOneBy(array $criteria, array $orderBy = null)
 * @method Administrator[]    findAll()
 * @method Administrator[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AdministratorRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Administrator::class);
    }

    public function validateUserPassword($id, $password) : ?bool
    {
        $rsm = new ResultSetMapping();
        $rsm->addScalarResult('id', 'id');
        $rsm->addScalarResult('name', 'name');
        $query = $this->getEntityManager()->createNativeQuery(
            'SELECT a.id, a.name FROM administrator a
            WHERE a.id = :id
            AND a.password = PASSWORD(:password)',
            $rsm
        );
        $query->setParameters([
            ":id" => $id,
            ":password" => $password,
        ]);
        
        $results = $query->getArrayResult();

        return count($results) == 1;
    }

    //    /**
    //     * @return Administrator[] Returns an array of Administrator objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('a')
    //            ->andWhere('a.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('a.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Administrator
    //    {
    //        return $this->createQueryBuilder('a')
    //            ->andWhere('a.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
