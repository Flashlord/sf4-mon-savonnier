<?php

namespace App\Services;

use App\Entity\Product;
use App\Repository\ProductRepository;

class StockManager
{
	
	private $productRepository;
	
	/**
	 * StockManager constructor.
	 * @param ProductRepository $productRepository
	 */
	public function __construct(ProductRepository $productRepository)
	{
		$this->productRepository = $productRepository;
	}
	
	
	/**
	 * @param Product $product
	 * @return int
	 */
	public function getStock(Product $product)
	{
		return (int) $this->productRepository->getStock($product);
	}
}