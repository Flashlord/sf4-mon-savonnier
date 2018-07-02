<?php

namespace App\Controller;

use App\Entity\Customer;
use FOS\RestBundle\Controller\Annotations as Rest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class CustomerController extends BaseController
{
	/**
	 * Get a customer identified by its id
	 * @Rest\Get("/customers/{id}")
	 * @ParamConverter("customer", class="App\Entity\Customer")
	 *
	 * @param Customer $customer
	 *
	 * @return \Symfony\Component\HttpFoundation\Response
	 *
	 */
	public function getOneCustomerAction(Customer $customer)
	{
		return $this->sendResponse($customer, Response::HTTP_OK);
	}
	
	
	/**
	 * Get all customers
	 * @Rest\Get("/customers")
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function getCustomersAction()
	{
		$allCustomers = $this->getDoctrine()
			->getRepository(Customer::class)
			->findAll();
		
		if(empty($allCustomers)) {
			return $this->sendResponse(null, Response::HTTP_NOT_FOUND);
		}
		
		return $this->sendResponse($allCustomers, Response::HTTP_OK);
	}
	
	
	/**
	 * Create a customer
	 * @Rest\Post("/customers")
	 * @ParamConverter("customer", converter="fos_rest.request_body")
	 *
	 * @param Customer $customer
	 *
	 * @return Response
	 */
	public function createCustomerAction(Customer $customer)
	{
		$this->validateEntity($customer);
		$this->em->persist($customer);
		$this->em->flush();
		
		return $this->sendResponse($customer, Response::HTTP_CREATED);
	}
	
	
	/**
	 * Delete a customer
	 *
	 * @Rest\Delete("/customers/{id}")
	 * @ParamConverter("customer", class="App:Customer")
	 * @param Customer $customer
	 *
	 * @return Response
	 */
	public function deleteCustomerAction(Customer $customer)
	{
		$this->em->remove($customer);
		$this->em->flush();
		return $this->sendResponse(null,Response::HTTP_NO_CONTENT);
	}
	
	
	/**
	 * @Rest\Put("/customers/{id}")
	 * @ParamConverter("customer", converter="fos_rest.request_body")
	 * @param Customer $customer
	 * @param $id
	 *
	 * @return Response
	 * @todo a terminer...
	 */
	public function updateCustomerAction(Customer $customer,$id) {
		return $this->sendResponse(null,Response::HTTP_FORBIDDEN);
		
		$entityToModify = $this->getDoctrine()
			->getRepository(Customer::class)
			->find($id);
		
		if(empty($entityToModify)) {
			throw new BadRequestHttpException("No customer with id ".$id);
		}
		
		$this->validateEntity($customer);
	}
	
}