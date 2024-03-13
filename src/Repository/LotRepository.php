<?php

namespace App\Repository;

use App\Entity\Lot;
use App\Entity\Vente;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Lot>
 *
 * @method Lot|null find($id, $lockMode = null, $lockVersion = null)
 * @method Lot|null findOneBy(array $criteria, array $orderBy = null)
 * @method Lot[]    findAll()
 * @method Lot[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LotRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Lot::class);
    }


    public function findRandomLotsByVente(int $venteId, int $limit = 3): array
    {
        $qb = $this->createQueryBuilder('l')
            ->andWhere('l.vente = :venteId')
            ->setParameter('venteId', $venteId)
            ->orderBy('RAND()')
            ->setMaxResults($limit);

        return $qb->getQuery()->getResult();
    }

    public function findOneBySlug(string $slug): ?Lot
    {
        return $this->createQueryBuilder('l')
        ->andWhere('l.slug = :slug')
        ->setParameter('slug', $slug)
        ->getQuery()
        ->getOneOrNullResult();
    }

//    /**
//     * @return Lot[] Returns an array of Lot objects
//     */
}
