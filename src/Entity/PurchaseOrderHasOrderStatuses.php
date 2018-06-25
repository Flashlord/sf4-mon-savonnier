<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PurchaseOrderHasOrderStatusesRepository")
 */
class PurchaseOrderHasOrderStatuses
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\PurchaseOrder", inversedBy="purchaseOrderHasOrderStatuses")
     * @ORM\JoinColumn(nullable=false)
     */
    private $purchaseOrder;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\OrderStatuses", inversedBy="purchaseOrderHasOrderStatuses")
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

    public function getPurchaseOrder(): ?PurchaseOrder
    {
        return $this->purchaseOrder;
    }

    public function setPurchaseOrder(?PurchaseOrder $purchaseOrder): self
    {
        $this->purchaseOrder = $purchaseOrder;

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
