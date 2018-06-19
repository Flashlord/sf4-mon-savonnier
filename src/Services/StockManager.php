<?php

namespace App\Services;


use Doctrine\ORM\EntityManager;

class StockManager
{
	private $em;
	
	public function __construct(EntityManager $em) {
		$this->em = $em;
	}
	
	/**
	 * @param string $productId
	 */
	public function getStock(string $productId)
	{
	
	}
	
	
	public function addStockMovement(string $productId, int $value, string $movementType)
	{
	
	}
	
	
	public function doInventory()
	{
	
	}
	
}