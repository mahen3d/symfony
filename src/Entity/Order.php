<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Order
 *
 * @ORM\Table(name="`order`", indexes={@ORM\Index(name="fk_order_customer1_idx", columns={"customer_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\OrderRepository")
 */
class Order {
    const ORDER_STATUS_COMPLETED = 'completed';
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="bigint", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="order_status", type="string", length=20, nullable=true, options={"default"="'pending'"})
     */
    private $orderStatus = 'pending';

    /**
     * @var float|null
     *
     * @ORM\Column(name="order_total", type="float", precision=10, scale=2, nullable=true, options={"default"="0.00"})
     */
    private $orderTotal = '0.00';

    /**
     * @var string|null
     *
     * @ORM\Column(name="created_date_time", type="datetime", nullable=true, options={"default"="NULL"})
     */
    private $createdDateTime = 'NULL';
    
    /**
     * @var integer
     *
     * @ORM\Column(name="customer_id", type="integer", length=15)
     */
    private $customerId;
    
    /**
     * @var Customer
     *
     * @ORM\ManyToOne(targetEntity="Customer")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="customer_id", referencedColumnName="id")
     * })
     * /
    private $customer;
    */
    public function getId(): ?string {
        return $this->id;
    }

    public function getOrderStatus(): ?string {
        return $this->orderStatus;
    }

    public function setOrderStatus(?string $orderStatus): self {
        $this->orderStatus = $orderStatus;

        return $this;
    }

    public function getOrderTotal(): ?float {
        return $this->orderTotal;
    }

    public function setOrderTotal(?float $orderTotal): self {
        $this->orderTotal = $orderTotal;
        return $this;
    }

    public function getCreatedDateTime(): ?\DateTime {
        return $this->createdDateTime;
    }

    public function setCreatedDateTime(?\DateTime $createdDateTime): self {
        $this->createdDateTime = $createdDateTime;
        return $this;
    }

    /*
    public function getCustomer(): ?Customer {
        return $this->customer;
    }

    public function setCustomer(?Customer $customer): self {
        $this->customer = $customer;

        return $this;
    }*/
    
    public function setCustomerId($customerId) {
        $this->customerId = $customerId;
        return $this;
    }
    
    public function getCustomerId() {
        return $this->customerId;
    }
}