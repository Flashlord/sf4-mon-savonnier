<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CustomerOrderHasOrderStatusesRepository")
 */
class CustomerOrderHasOrderStatuses
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\CustomerOrder", inversedBy="customerOrderHasOrderStatuses")
     * @ORM\JoinColumn(nullable=false)
     */
    private $CustomerOrder;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\OrderStatuses", inversedBy="customerOrderHasOrderStatuses")
     * @ORM\JoinColumn(nullable=false)
     */
    private $OrderStatus;

    /**
     * @ORM\Column(type="datetime")
     */
    private $CreatedAt;

    public function getId()
    {
        return $this->id;
    }

    public function getCustomerOrder(): ?CustomerOrder
    {
        return $this->CustomerOrder;
    }

    public function setCustomerOrder(?CustomerOrder $CustomerOrder): self
    {
        $this->CustomerOrder = $CustomerOrder;

        return $this;
    }

    public function getOrderStatus(): ?OrderStatuses
    {
        return $this->OrderStatus;
    }

    public function setOrderStatus(?OrderStatuses $OrderStatus): self
    {
        $this->OrderStatus = $OrderStatus;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->CreatedAt;
    }

    public function setCreatedAt(\DateTimeInterface $CreatedAt): self
    {
        $this->CreatedAt = $CreatedAt;

        return $this;
    }
}
