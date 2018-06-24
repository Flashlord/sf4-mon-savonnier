<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\InventoryRepository")
 */
class Inventory
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
     * @ORM\OneToMany(targetEntity="App\Entity\InventoryHasProducts", mappedBy="inventory")
     */
    private $inventoryHasProducts;
    

    public function __construct()
    {
        $this->inventoryHasProducts = new ArrayCollection();
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
            $inventoryHasProduct->setInventory($this);
        }

        return $this;
    }

    public function removeInventoryHasProduct(InventoryHasProducts $inventoryHasProduct): self
    {
        if ($this->inventoryHasProducts->contains($inventoryHasProduct)) {
            $this->inventoryHasProducts->removeElement($inventoryHasProduct);
            // set the owning side to null (unless already changed)
            if ($inventoryHasProduct->getInventory() === $this) {
                $inventoryHasProduct->setInventory(null);
            }
        }

        return $this;
    }
}
