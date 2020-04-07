<?php

namespace App\Repository;

use App\Entity\Booking;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Booking|null find($id, $lockMode = null, $lockVersion = null)
 * @method Booking|null findOneBy(array $criteria, array $orderBy = null)
 * @method Booking[]    findAll()
 * @method Booking[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BookingRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Booking::class);
    }

    // /**
    //  * @return Booking[] Returns an array of Booking objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Booking
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function findPersonBookings($person) {
        $qb = $this->createQueryBuilder('b')
            ->where('b.person = :person')
            ->setParameter('person', $person);

        $query = $qb->getQuery();

        return $query->execute();
    }

    public function findHousingBookings($housing) {
        $qb = $this->createQueryBuilder('b')
            ->where('b.housing = :housing')
            ->setParameter('housing', $housing);

        $query = $qb->getQuery();

        return $query->execute();
    }

    public function findCurrent($person) {
        $today = \DateTime::createFromFormat( "Y-m-d H:i:s", date("Y-m-d 00:00:00") );

        $qb = $this->createQueryBuilder('b')
            ->where('b.person = :person')
            ->andWhere('b.beginningDate <= :today')
            ->andWhere('b.endingDate >= :today')
            ->setParameter('person', $person)
            ->setParameter('today', $today);

        $query = $qb->getQuery();

        return $query->execute();
    }

    public function findBookingToDate($date) {
        $qb = $this->createQueryBuilder('b')
            ->where('b.beginningDate <= :date')
            ->andWhere('b.endingDate >= :date')
            ->setParameter('date', $date);

        $query = $qb->getQuery();

        return $query->execute();
    }
}
