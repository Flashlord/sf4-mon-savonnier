<?php

namespace App\Repository;

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
	 * Compute stock for this product
	 * @param Product $product
	 * @return int
	 */
    public function getStock(Product $product)
    {
	    $lastInventory = $product->getInventoryHasProducts()->last();
	    if(null == $lastInventory) return 0;
	
	    $lastInventoryQuantity = (int) $lastInventory->getQuantity();
	    
    	$qte = (int) $this->createQueryBuilder('p')
		    ->join('p.purchaseOrderHasProducts','purchase')
		    ->join('p.customerOrdersHasProducts', 'customer')
		    ->select('SUM(purchase.quantity) - SUM(customer.quantity)')
		    ->getQuery()
		    ->getOneOrNullResult()[1];
		    
		  return $lastInventoryQuantity + $qte;
    }
}
