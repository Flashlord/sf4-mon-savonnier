<?php

namespace App\Serializer\Manager;

use App\Entity\Customer;
use App\Entity\Title;
use App\Models\CustomerModel;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class CustomerManager extends AbstractManager
{
	/**
	 * Create a new customer entity with data from customer model
	 *
	 * @param CustomerModel $customer
	 *
	 * @return Customer
	 */
	public function populateAndSaveCustomerEntity(CustomerModel $customer)
	{
		// Create entity and persist
		$newCustomer = new Customer();
		$newCustomer
			->setTitle($this->getTitle($customer->getTitle()))
			->setLastname($customer->getLastname())
			->setFirstname($customer->getFirstname());
		$this->validateEntity($newCustomer);
		
		$this->em->persist($newCustomer);
		$this->em->flush();
		
		return $newCustomer;
	}
	
	/**
	 * Delete a customer from database
	 * @param Customer $customer
	 */
	public function deleteCustomer(Customer $customer)
	{
		$this->em->remove($customer);
		$this->em->flush();
	}
	
	/**
	 * Retrieve title entity by its label
	 *
	 * @param $label
	 *
	 * @return Title
	 */
	protected function getTitle($label)
	{
		// Recherche du title
		$title = $this->em->getRepository(Title::class)
			->findOneBy(['label' => $label]);
		
		if(null === $title)
		{
			throw new BadRequestHttpException("Title ".$label." is invalid");
		}
		
		return $title;
	}
}