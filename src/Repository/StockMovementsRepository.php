<?php
/**
 * Created by PhpStorm.
 * User: d4rkfl4sh
 * Date: 10/06/18
 * Time: 03:18
 */

namespace App\Repository;

use App\Entity\Products;
use App\Entity\StockMovements;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Symfony\Component\Config\Definition\Exception\Exception;

class StockMovementsRepository extends ServiceEntityRepository
{
	public function __construct(RegistryInterface $registry)
	{
		parent::__construct($registry, StockMovements::class);
	}
	
	public function getStockForAProduct(Products $product)
	{
		/** @var StockMovements $baseInventory */
		$baseInventory =
			$this->createQueryBuilder('sm')
			->join('sm.product', 'p')
			->join('sm.type', 't')
			->where("p.id = :product_id")
			->andWhere("t.label = :stock_movement_type")
			->setParameter('product_id', $product->getId())
			->setParameter("stock_movement_type", "inventory")
			->orderBy('sm.id','desc')
			->getQuery()
			->getOneOrNullResult();
		
		if(is_null($baseInventory)) {
			throw new Exception("This article is not in stock");
		}
		
	}
	
}