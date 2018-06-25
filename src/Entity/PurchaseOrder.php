<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PurchaseOrderRepository")
 */
class PurchaseOrder
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\PurchaseOrderHasProducts", mappedBy="purchaseOrder")
     */
    private $purchaseOrderHasProducts;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\PurchaseOrderHasOrderStatuses", mappedBy="purchaseOrder")
     */
    private $purchaseOrderHasOrderStatuses;

    
    public function __construct()
    {
        $this->purchaseOrderHasProducts = new ArrayCollection();
        $this->purchaseOrderHasOrderStatuses = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @return Collection|PurchaseOrderHasProducts[]
     */
    public function getPurchaseOrderHasProducts(): Collection
    {
        return $this->purchaseOrderHasProducts;
    }

    public function addSupplyOrdersHasProduct(PurchaseOrderHasProducts $purchaseOrderHasProducts): self
    {
        if (!$this->$purchaseOrderHasProducts->contains($purchaseOrderHasProducts)) {
            $this->$purchaseOrderHasProducts[] = $purchaseOrderHasProducts;
	        $purchaseOrderHasProducts->setPurchaseOrder($this);
        }

        return $this;
    }

    public function removePurchaseOrdersHasProduct(PurchaseOrderHasProducts $purchaseOrderHasProduct): self
    {
        if ($this->purchaseOrderHasProducts->contains($purchaseOrderHasProduct)) {
            $this->purchaseOrderHasProducts->removeElement($purchaseOrderHasProduct);
            // set the owning side to null (unless already changed)
            if ($purchaseOrderHasProduct->getPurchaseOrder() === $this) {
	            $purchaseOrderHasProduct->setPurchaseOrder(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|PurchaseOrderHasOrderStatuses[]
     */
    public function getPurchaseOrderHasOrderStatuses(): Collection
    {
        return $this->purchaseOrderHasOrderStatuses;
    }

    public function addPurchaseOrderHasOrderStatus(PurchaseOrderHasOrderStatuses $purchaseOrderHasOrderStatus): self
    {
        if (!$this->purchaseOrderHasOrderStatuses->contains($purchaseOrderHasOrderStatus)) {
            $this->purchaseOrderHasOrderStatuses[] = $purchaseOrderHasOrderStatus;
            $purchaseOrderHasOrderStatus->setPurchaseOrder($this);
        }

        return $this;
    }

    public function removePurchaseOrderHasOrderStatus(PurchaseOrderHasOrderStatuses $purchaseOrderHasOrderStatus): self
    {
        if ($this->purchaseOrderHasOrderStatuses->contains($purchaseOrderHasOrderStatus)) {
            $this->purchaseOrderHasOrderStatuses->removeElement($purchaseOrderHasOrderStatus);
            // set the owning side to null (unless already changed)
            if ($purchaseOrderHasOrderStatus->getPurchaseOrder() === $this) {
                $purchaseOrderHasOrderStatus->setPurchaseOrder(null);
            }
        }

        return $this;
    }
}
