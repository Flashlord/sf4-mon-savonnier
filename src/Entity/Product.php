<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProductRepository")
 */
class Product
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $label;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\PurchaseOrderHasProducts", mappedBy="product")
     */
    private $purchaseOrderHasProducts;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\CustomerOrderHasProducts", mappedBy="product")
     */
    private $customerOrderHasProducts;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\InventoryHasProducts", mappedBy="product")
     */
    private $inventoryHasProducts;

    public function __construct()
    {
        $this->purchaseOrderHasProducts = new ArrayCollection();
        $this->customerOrderHasProducts = new ArrayCollection();
        $this->inventoryHasProducts = new ArrayCollection();
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
     * @return Collection|PurchaseOrderHasProducts[]
     */
    public function getPurchaseOrderHasProducts(): Collection
    {
        return $this->purchaseOrderHasProducts;
    }

    public function addPurchaseOrderHasProduct(PurchaseOrderHasProducts $purchaseOrderHasProduct): self
    {
        if (!$this->purchaseOrderHasProducts->contains($purchaseOrderHasProduct)) {
            $this->purchaseOrderHasProducts[] = $purchaseOrderHasProduct;
            $purchaseOrderHasProduct->setProduct($this);
        }

        return $this;
    }

    public function removePurchaseOrderHasProduct(PurchaseOrderHasProducts $purchaseOrderHasProduct): self
    {
        if ($this->purchaseOrderHasProducts->contains($purchaseOrderHasProduct)) {
            $this->purchaseOrderHasProducts->removeElement($purchaseOrderHasProduct);
            // set the owning side to null (unless already changed)
            if ($purchaseOrderHasProduct->getProduct() === $this) {
	            $purchaseOrderHasProduct->setProduct(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|CustomerOrderHasProducts[]
     */
    public function getCustomerOrderHasProducts(): Collection
    {
        return $this->customerOrderHasProducts;
    }

    public function addCustomerOrderHasProduct(CustomerOrderHasProducts $customerOrderHasProduct): self
    {
        if (!$this->customerOrderHasProducts->contains($customerOrderHasProduct)) {
            $this->customerOrderHasProducts[] = $customerOrderHasProduct;
            $customerOrderHasProduct->setProduct($this);
        }

        return $this;
    }

    public function removeCustomerOrderHasProduct(CustomerOrderHasProducts $customerOrderHasProduct): self
    {
        if ($this->customerOrderHasProducts->contains($customerOrderHasProduct)) {
            $this->customerOrderHasProducts->removeElement($customerOrderHasProduct);
            // set the owning side to null (unless already changed)
            if ($customerOrderHasProduct->getProduct() === $this) {
                $customerOrderHasProduct->setProduct(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|InventoryHasProducts[]
     */
    public function getInventoryHasProducts(): Collection
    {
        return $this->inventoryHasProducts;
    }

    public function addInventoryHasProduct(InventoryHasProducts $inventoryHasProduct): self
    {
        if (!$this->inventoryHasProducts->contains($inventoryHasProduct)) {
            $this->inventoryHasProducts[] = $inventoryHasProduct;
            $inventoryHasProduct->setProduct($this);
        }

        return $this;
    }

    public function removeInventoryHasProduct(InventoryHasProducts $inventoryHasProduct): self
    {
        if ($this->inventoryHasProducts->contains($inventoryHasProduct)) {
            $this->inventoryHasProducts->removeElement($inventoryHasProduct);
            // set the owning side to null (unless already changed)
            if ($inventoryHasProduct->getProduct() === $this) {
                $inventoryHasProduct->setProduct(null);
            }
        }

        return $this;
    }
}
