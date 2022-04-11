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

    public function findAllSearch(Search $search): array{

        $query=$this
        ->createQueryBuilder('product');
       

        if (!empty ($search->getKeyword())){
            
            $query=$query
            ->andWhere('product.title LIKE :keyword')
            ->setParameter('keyword','%'.$search->getKeyword().'%');
        }
        if(!empty($search->getMinSurface())){
            $query = $query
                        ->andWhere('product.surface >= :minSurface')
                        ->setParameter('minSurface', $search->getMinSurface());
        }
        if($search->getMinRoom()){
            $query = $query
                        ->andWhere('product.room >= :minRoom')
                        ->setParameter('minRoom', $search->getMinRoom());
        }
        if($search->getMaxPrice()){
            $query = $query
                        ->andWhere('product.price <= :maxPrice')
                        ->setParameter('maxPrice', $search->getMaxPrice());
        }
        if($search->getMinPeople()){
            $query = $query
                        ->andWhere('product.people >= :minPeople')
                        ->setParameter('minPeople', $search->getMinPeople());
        }
        if($search->getPet()){
            $query = $query
                        ->andWhere('product.animal = 1');
                      
        }
        if($search->getSmoker()){
            $query = $query
                        ->andWhere('product.smoker = 1');
                
        }

        return $query->getQuery()->getResult();
      
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
