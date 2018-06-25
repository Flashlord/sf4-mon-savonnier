<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Index;
use Doctrine\ORM\Mapping\Table;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OrderStatusesRepository")
 * @Table(name="order_statuses", indexes={@Index(name="type_idx", columns={"type"})})
 */
class OrderStatuses
{
		const CUSTOMER_TYPE = 'customer';
		const PURCHASE_TYPE = 'purchase';
	
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=45)
     */
    private $label;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\PurchaseOrderHasOrderStatuses", mappedBy="OrderStatus")
     */
    private $purchaseOrderHasOrderStatuses;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\CustomerOrderHasOrderStatuses", mappedBy="OrderStatus")
     */
    private $customerOrderHasOrderStatuses;

    /**
     * @ORM\Column(type="string", length=45)
     */
    private $type;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isStockAvailable;

    
    public function __construct()
    {
        $this->purchaseOrderHasOrderStatuses = new ArrayCollection();
        $this->customerOrderHasOrderStatuses = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): self
    {
        $this->label = $label;

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
            $purchaseOrderHasOrderStatus->setOrderStatus($this);
        }

        return $this;
    }

    public function removePurchaseOrderHasOrderStatus(PurchaseOrderHasOrderStatuses $purchaseOrderHasOrderStatus): self
    {
        if ($this->purchaseOrderHasOrderStatuses->contains($purchaseOrderHasOrderStatus)) {
            $this->purchaseOrderHasOrderStatuses->removeElement($purchaseOrderHasOrderStatus);
            // set the owning side to null (unless already changed)
            if ($purchaseOrderHasOrderStatus->getOrderStatus() === $this) {
                $purchaseOrderHasOrderStatus->setOrderStatus(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|CustomerOrderHasOrderStatuses[]
     */
    public function getCustomerOrderHasOrderStatuses(): Collection
    {
        return $this->customerOrderHasOrderStatuses;
    }

    public function addCustomerOrderHasOrderStatus(CustomerOrderHasOrderStatuses $customerOrderHasOrderStatus): self
    {
        if (!$this->customerOrderHasOrderStatuses->contains($customerOrderHasOrderStatus)) {
            $this->customerOrderHasOrderStatuses[] = $customerOrderHasOrderStatus;
            $customerOrderHasOrderStatus->setOrderStatus($this);
        }

        return $this;
    }

    public function removeCustomerOrderHasOrderStatus(CustomerOrderHasOrderStatuses $customerOrderHasOrderStatus): self
    {
        if ($this->customerOrderHasOrderStatuses->contains($customerOrderHasOrderStatus)) {
            $this->customerOrderHasOrderStatuses->removeElement($customerOrderHasOrderStatus);
            // set the owning side to null (unless already changed)
            if ($customerOrderHasOrderStatus->getOrderStatus() === $this) {
                $customerOrderHasOrderStatus->setOrderStatus(null);
            }
        }

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }
    
    public function setCustomerType()
    {
    	$this->type = self::CUSTOMER_TYPE;
    }
    
    public function setPurchaseType()
    {
    	$this->type = self::PURCHASE_TYPE;
    }

    public function getIsStockAvailable(): ?bool
    {
        return $this->isStockAvailable;
    }

    public function setIsStockAvailable(bool $isStockAvailable): self
    {
        $this->isStockAvailable = $isStockAvailable;

        return $this;
    }
}
