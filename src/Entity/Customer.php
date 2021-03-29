<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Customer
 *
 * @ORM\Table(name="customer", indexes={@ORM\Index(name="fk_customer_customer_status1_idx", columns={"customer_status_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\CustomerRepository")
 */
class Customer {
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
     * @ORM\Column(name="name", type="string", length=150, nullable=true, options={"default"="NULL"})
     */
    private $name = 'NULL';

    /**
     * @var CustomerStatus
     *
     * @ORM\ManyToOne(targetEntity="CustomerStatus")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="customer_status_id", referencedColumnName="id")
     * })
     */
    private $customerStatus;

    public function getId(): ?string {
        return $this->id;
    }

    public function getName(): ?string {
        return $this->name;
    }

    public function setName(?string $name): self {
        $this->name = $name;
        return $this;
    }

    public function getCustomerStatus(): ?CustomerStatus {
        return $this->customerStatus;
    }

    public function setCustomerStatus(?CustomerStatus $customerStatus): self {
        $this->customerStatus = $customerStatus;
        return $this;
    }
}