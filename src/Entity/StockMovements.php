<?php
/**
 * Created by PhpStorm.
 * User: d4rkfl4sh
 * Date: 10/06/18
 * Time: 03:02
 */

namespace App\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\StockMovementsRepository")
 */
class StockMovements
{
	/**
	 * @ORM\Id
	 * @ORM\GeneratedValue
	 * @ORM\Column(type="integer")
	 * @var integer id
	 */
	private $id;
	
	/**
	 * @ORM\Column(type="integer")
	 * @var integer product_id
	 */
	private $product_id;
	
	/**
	 * @ORM\Column(type="integer")
	 * @var integer value
	 */
	private $value;

 /**
  * @ORM\ManyToOne(targetEntity="App\Entity\StockMovementTypes", inversedBy="stockMovements")
  * @ORM\JoinColumn(nullable=false)
  */
 private $type;

 /**
  * @ORM\ManyToOne(targetEntity="App\Entity\Products", inversedBy="stockMovements")
  */
 private $product;


 
 public function __construct()
 {
     $this->product = new ArrayCollection();
 }
	
	/**
	 * @return int
	 */
	public function getId(): int
	{
		return $this->id;
	}
	
	/**
	 * @param int $id
	 *
	 * @return StockMovements
	 */
	public function setId(int $id): StockMovements
	{
		$this->id = $id;
		
		return $this;
	}
	
	/**
	 * @return int
	 */
	public function getProductId(): int
	{
		return $this->product_id;
	}
	
	/**
	 * @param int $product_id
	 *
	 * @return StockMovements
	 */
	public function setProductId(int $product_id): StockMovements
	{
		$this->product_id = $product_id;
		
		return $this;
	}
	
	/**
	 * @return int
	 */
	public function getValue(): int
	{
		return $this->value;
	}
	
	/**
	 * @param int $value
	 *
	 * @return StockMovements
	 */
	public function setValue(int $value): StockMovements
	{
		$this->value = $value;
		
		return $this;
	}
	
	/**
	 * @return StockMovementTypes|null
	 */
	public function getType(): ?StockMovementTypes
 {
     return $this->type;
 }
	
	/**
	 * @param StockMovementTypes|null $type
	 *
	 * @return StockMovements
	 */
	public function setType(?StockMovementTypes $type): self
 {
     $this->type = $type;
     return $this;
 }

 public function getProduct(): ?Products
 {
     return $this->product;
 }

 public function setProduct(?Products $product): self
 {
     $this->product = $product;
     return $this;
 }
}