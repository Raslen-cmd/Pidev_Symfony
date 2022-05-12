<?php

namespace App\Repository;

use App\Entity\Produit;
use App\Entity\Categorie;
use App\Repository\ProduitRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;
use App\Data\SearchData;
use Knp\Component\Pager\PaginatorInterface;
use Knp\Bundle\PaginatorBundle\Pagination\SlidingPagination ;
use Doctrine\ORM\QueryBuilder;
use App\Repository\PaginationInterface;



/**
 * @method Produit|null find($id, $lockMode = null, $lockVersion = null)
 * @method Produit|null findOneBy(array $criteria, array $orderBy = null)
 * @method Produit[]    findAll()
 * @method Produit[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProduitRepository extends ServiceEntityRepository
{
    /**
     * @var PaginatorInterface 
     */
    private $paginator;

    public function __construct(ManagerRegistry $registry,PaginatorInterface $paginator)
    {
        parent::__construct($registry, Produit::class);
        $this->paginator = $paginator;
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(Produit $entity, bool $flush = true): void
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
    public function remove(Produit $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return Produit[] Returns an array of Produit objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Produit
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

/**
 * recupere les produits en lien avec une recherche
 * @return produit[]
 */
public function findSearch(SearchData $search): array
{   $query= $this
    ->createQueryBuilder('p')
    ->select('c','p')
    ->join('p.idCat','c');

    if(!empty($search->q)){
        $query= $query
        ->andWhere('p.nomPdt LIKE :q')
        ->setParameter('q', "%{$search->q}%");
    }
    if(!empty($search->min)){
        $query= $query
        ->andWhere('p.prix <= :min')
        ->setParameter('min', $search->min);
    }
    if(!empty($search->max)){
        $query= $query
        ->andWhere('p.prix <= :max')
        ->setParameter('max', $search->max);
    }
    if(!empty($search->categorie)){
        $query= $query
        ->andWhere('c.nomCat IN (:categorie)')
        ->setParameter('categorie', $search->categorie);
    }
    return $query->getQuery()->getResult();
   
}
}
