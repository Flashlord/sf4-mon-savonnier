<?php

namespace App\Repository;

use App\Entity\OrderStatuses;
use App\Entity\Product;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Symfony\Component\Config\Definition\Exception\Exception;

/**
 * @method Product|null find($id, $lockMode = null, $lockVersion = null)
 * @method Product|null findOneBy(array $criteria, array $orderBy = null)
 * @method Product[]    findAll()
 * @method Product[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Product::class);
    }
	
	/**
	 * Compute global stock for this product
	 * @param Product $product
	 * @return int
	 */
    public function getStock(Product $product)
    {
    	$qte = (int) $this->createQueryBuilder('p')
		    ->join('p.purchaseOrderHasProducts','purchase')
		    ->join('p.customerOrderHasProducts', 'customer')
		    ->select('SUM(purchase.quantity) - SUM(customer.quantity)')
		    ->getQuery()
		    ->getOneOrNullResult()[1];
		    
		  return $this->getLastInventoryStock($product) + $qte;
    }
	
	/**
	 * @param Product $product
	 * @return int
	 */
    private function getLastInventoryStock(Product $product)
    {
	    $lastInventory = $product->getInventoryHasProducts()->last();
	    if(null == $lastInventory) return 0;
	
	    return (int) $lastInventory->getQuantity();
    }
	
	/**
	 * Compute available Stock
	 * @param Product $product
	 * @return int
	 */
    public function getAvailableStock(Product $product)
    {
	    $qte = (int) $this->createQueryBuilder('p')
		    ->join('p.purchaseOrderHasProducts','purchaseOrderHasProducts')
		    ->join('p.customerOrderHasProducts', 'customerOrderHasProducts')
		    ->join('purchaseOrderHasProducts.purchaseOrder', 'purchaseOrder')
		    ->join('purchaseOrder.purchaseOrderHasOrderStatuses','purchaseOrderHasOrderStatuses')
		    ->join('purchaseOrderHasOrderStatuses.OrderStatus','purchaseOrderStatus')
		    ->join('customerOrderHasProducts.customerOrder', 'customerOrder')
		    ->join('customerOrder.customerOrderHasOrderStatuses', 'customerOrderHasOrderStatuses')
		    ->join('customerOrderHasOrderStatuses.OrderStatus', 'customerOrderStatus')
		    ->andwhere('purchaseOrderStatus.type = '.OrderStatuses::PURCHASE_TYPE)
		    ->andWhere('customerOrderStatus.type = '.OrderStatuses::CUSTOMER_TYPE)
		    ->andWhere('purchaseOrderStatus.isStockAvailable = true')
		    ->andWhere('customerOrderStatus.isStockAvailable = true')
		    ->select('SUM(purchase.quantity) - SUM(customer.quantity)')
		    ->getQuery()
		    ->getOneOrNullResult()[1];
	    
	    return $this->getLastInventoryStock($product) + $qte;
    }
}
