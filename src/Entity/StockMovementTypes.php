<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\StockMovementTypesRepository")
 */
class StockMovementTypes
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $label;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\StockMovements", mappedBy="type", orphanRemoval=true)
     */
    private $stockMovements;
    

    public function __construct()
    {
        $this->stockMovements = new ArrayCollection();
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
     * @return Collection|StockMovements[]
     */
    public function getStockMovements(): Collection
    {
        return $this->stockMovements;
    }
	
	/**
	 * @param StockMovements $stockMovement
	 *
	 * @return StockMovementTypes
	 */
	public function addStockMovement(StockMovements $stockMovement): self
    {
        if (!$this->stockMovements->contains($stockMovement)) {
            $this->stockMovements[] = $stockMovement;
            $stockMovement->setType($this);
        }

        return $this;
    }
	
	/**
	 * @param StockMovements $stockMovement
	 *
	 * @return StockMovementTypes
	 */
	public function removeStockMovement(StockMovements $stockMovement): self
    {
        if ($this->stockMovements->contains($stockMovement)) {
            $this->stockMovements->removeElement($stockMovement);
            // set the owning side to null (unless already changed)
            if ($stockMovement->getType() === $this) {
                $stockMovement->setType(null);
            }
        }

        return $this;
    }
}
