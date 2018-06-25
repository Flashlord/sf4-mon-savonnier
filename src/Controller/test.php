<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use App\Services\StockManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class test extends Controller
{
	/**
	 * @Route("/test");
	 * @param StockManager $stockManager
	 * @param ProductRepository $productRepository
	 *
	 * @return Response
	 */
	public function getStock(StockManager $stockManager, ProductRepository $productRepository)
	{
		$product = $productRepository->find(1);
		return new Response($stockManager->getStock($product));
	}
	
}

