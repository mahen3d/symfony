<?php

namespace App\Repository;

use App\Entity\CustomerStatus;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CustomerStatus|null find($id, $lockMode = null, $lockVersion = null)
 * @method CustomerStatus|null findOneBy(array $criteria, array $orderBy = null)
 * @method CustomerStatus[]    findAll()
 * @method CustomerStatus[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CustomerStatusRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry) {
        parent::__construct($registry, CustomerStatus::class);
    }
    
    /**
     * This function add dummy customer status data
     */
    public function addDummyData() {
        if($this->count(['code'=>'AC']) == 0) {
            $customerStatus = new CustomerStatus();
            $customerStatus->setCode('AC')->setName('Active');
            $this->getEntityManager()->persist($customerStatus);
        }
        
        if($this->count(['code'=>'RE']) == 0) {
            $customerStatus = new CustomerStatus();
            $customerStatus->setCode('RE')->setName('Removed');
            $this->getEntityManager()->persist($customerStatus);
        }
    }

    // /**
    //  * @return CustomerStatus[] Returns an array of CustomerStatus objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CustomerStatus
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
