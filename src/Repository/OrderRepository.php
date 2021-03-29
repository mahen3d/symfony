<?php

namespace App\Repository;

use App\Entity\Order;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Order|null find($id, $lockMode = null, $lockVersion = null)
 * @method Order|null findOneBy(array $criteria, array $orderBy = null)
 * @method Order[]    findAll()
 * @method Order[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OrderRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry) {
        parent::__construct($registry, Order::class);
    }
    
    /**
     * This function add some dummy data in database
     */
    public function addDummyData() {
        for($index = 0; $index < 100; $index ++) {
            $sql = "INSERT INTO `order`(order.customer_id, order.order_status, order.order_total, order.created_date_time)
                SELECT id, ELT(1 + RAND() * 3, 'pending','cancelled','completed','declined'), round(rand() * 100 + 10, 2), CURRENT_TIMESTAMP - INTERVAL FLOOR(RAND() * 150) DAY FROM customer WHERE id > 1 + RAND() * 5000 AND id < 1 + RAND() * 5000";
            
            
            $this->getEntityManager()->getConnection()->prepare($sql)->execute();
        }
    }

    // /**
    //  * @return Order[] Returns an array of Order objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Order
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
