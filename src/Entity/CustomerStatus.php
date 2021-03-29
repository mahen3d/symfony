<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CustomerStatus
 *
 * @ORM\Table(name="customer_status")
 * @ORM\Entity(repositoryClass="App\Repository\CustomerStatusRepository")
 */
class CustomerStatus {
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="smallint", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="code", type="string", length=10, nullable=true, options={"default"="NULL"})
     */
    private $code = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="name", type="string", length=30, nullable=true, options={"default"="NULL"})
     */
    private $name = 'NULL';

    public function getId(): ?int {
        return $this->id;
    }

    public function getCode(): ?string {
        return $this->code;
    }

    public function setCode(?string $code): self {
        $this->code = $code;

        return $this;
    }

    public function getName(): ?string {
        return $this->name;
    }

    public function setName(?string $name): self {
        $this->name = $name;

        return $this;
    }
    
    public function __toString() {
        return $this->name;
    }
}