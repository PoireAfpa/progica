<?php

namespace App\Repository;

use App\Entity\Product;
use App\Entity\Search;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Product|null find($id, $lockMode = null, $lockVersion = null)
 * @method Product|null findOneBy(array $criteria, array $orderBy = null)
 * @method Product[]    findAll()
 * @method Product[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Product::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(Product $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(Product $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    public function findSearchByFields($field){
        return $this->createQueryBuilder('q')
        ->andWhere('q.keyword = :keyword')
        ->setParameter('keyword', $field->getKeyword())
        ->orderBy('q.id', 'ASC')
        ->setMaxResults(10)
        ->getQuery()
        ->getResult()
    ;
    }

    public function findAllSearch(): array{

        return $this->findAll();
       /* $query = $this->createQueryBuilder('q');
        if($search->getKeyword()){
            $query = $query
                        ->andWhere('q.keyword > :keyword')
                        ->setParameter('keyword', $search->getKeyword());
        }
        if($search->getMinSurface()){
            $query = $query
                        ->andWhere('q.surface >= :minSurface')
                        ->setParameter('minSurface', $search->getMinSurface());
        }
        if($search->getMinRoom()){
            $query = $query
                        ->andWhere('q.room >= :minRoom')
                        ->setParameter('minRoom', $search->getMinRoom());
        }
        if($search->getMaxPrice()){
            $query = $query
                        ->andWhere('q.price <= :maxPrice')
                        ->setParameter('maxPrice', $search->getMaxPrice());
        }
        if($search->getMinPeople()){
            $query = $query
                        ->andWhere('q.people >= :minPeople')
                        ->setParameter('minPeople', $search->getMinPeople());
        }
        if($search->getPet()){
            $query = $query
                        ->andWhere('q.pet = :pet')
                        ->setParameter('pet',$search->getPet());
        }
        if($search->getSmoker()){
            $query = $query
                        ->andWhere('q.smoker = :smoker')
                        ->setParameter('smoker',$search->getSmoker());
        }
        return $query->getQuery()
                     ->getResult();*/
    }


    // /**
    //  * @return Product[] Returns an array of Product objects
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

    /*
    public function findOneBySomeField($value): ?Product
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
