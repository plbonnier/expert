<?php

namespace App\Repository;

use App\Entity\PhotoBlog;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PhotoBlog>
 *
 * @method PhotoBlog|null find($id, $lockMode = null, $lockVersion = null)
 * @method PhotoBlog|null findOneBy(array $criteria, array $orderBy = null)
 * @method PhotoBlog[]    findAll()
 * @method PhotoBlog[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PhotoBlogRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PhotoBlog::class);
    }

//    /**
//     * @return PhotoBlog[] Returns an array of PhotoBlog objects
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

//    public function findOneBySomeField($value): ?PhotoBlog
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
