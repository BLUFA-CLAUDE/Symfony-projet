<?php

namespace App\Repository;

use App\Entity\Propriete;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Propriete|null find($id, $lockMode = null, $lockVersion = null)
 * @method Propriete|null findOneBy(array $criteria, array $orderBy = null)
 * @method Propriete[]    findAll()
 * @method Propriete[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProprieteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Propriete::class);
    }

    
    // /**
    //  * @return Propriete[] Returns an array of Propriete objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */


    /**
     * @return Propriete[] Returns an array of Propriete objects
     */
    public function findAllvisible(): array
    {
        return $this->findVisibleQuery()
        ->where('p.solde=false')
        ->getQuery()
        ->getResult();
    }

    /**
     * @return Propriete[] Returns an array of Propriete objects
     */
    public function findLatest(): array
    {
        return $this->findVisibleQuery()
        ->where('p.solde=false')
        ->setMaxResults(4)
        ->getQuery()
        ->getResult();
    }

    private function findVisibleQuery(): QueryBuilder
    {
        return $this->createQueryBuilder('p')
        ->where('p.solde=false');
    }
    /*
    public function findOneBySomeField($value): ?Propriete
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
