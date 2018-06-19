<?php

namespace App\DataFixtures;

use App\Entity\StockMovementTypes;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class StockMovementTypeFixtures extends Fixture
{
	
	/**
	 * Load data fixtures with the passed EntityManager
	 *
	 * @param ObjectManager $manager
	 */
	public function load(ObjectManager $manager)
	{
		$stockMovementTypes = ['inventory', 'sale order', 'procurement', 'disposal'];
		foreach($stockMovementTypes as $type)
		{
			$stockMovementType = new StockMovementTypes();
			$stockMovementType->setLabel($type);
			$manager->persist($stockMovementType);
		}
		
		$manager->flush();
	}
}