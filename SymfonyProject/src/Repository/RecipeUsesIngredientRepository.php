<?php

namespace App\Repository;

use App\Entity\RecipeUsesIngredient;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<RecipeUsesIngredient>
 *
 * @method RecipeUsesIngredient|null find($id, $lockMode = null, $lockVersion = null)
 * @method RecipeUsesIngredient|null findOneBy(array $criteria, array $orderBy = null)
 * @method RecipeUsesIngredient[]    findAll()
 * @method RecipeUsesIngredient[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RecipeUsesIngredientRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RecipeUsesIngredient::class);
    }

    //    /**
    //     * @return RecipeUsesIngredient[] Returns an array of RecipeUsesIngredient objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('r')
    //            ->andWhere('r.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('r.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?RecipeUsesIngredient
    //    {
    //        return $this->createQueryBuilder('r')
    //            ->andWhere('r.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
