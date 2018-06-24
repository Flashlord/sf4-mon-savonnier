<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\InventoryHasProductsRepository")
 */
class InventoryHasProducts
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Inventory", inversedBy="inventoryHasProducts")
     * @ORM\JoinColumn(nullable=false)
     */
    private $inventory;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Product", inversedBy="inventoryHasProducts")
     * @ORM\JoinColumn(nullable=false)
     */
    private $product;
	
		/**
		 * @ORM\Column(type="smallint")
		 */
		private $quantity;

		
    public function getId()
    {
        return $this->id;
    }

    public function getInventory(): ?Inventory
    {
        return $this->inventory;
    }

    public function setInventory(?Inventory $inventory): self
    {
        $this->Inventory = $inventory;

        return $this;
    }

    public function getProduct(): ?Product
    {
        return $this->product;
    }

    public function setProduct(?Product $product): self
    {
        $this->product = $product;

        return $this;
    }
	
		/**
		 * @return mixed
		 */
		public function getQuantity()
		{
			return $this->quantity;
		}
		
		/**
		 * @param mixed $quantity
		 *
		 * @return InventoryHasProducts
		 */
		public function setQuantity($quantity)
		{
			$this->quantity = $quantity;
			return $this;
		}
	
}
