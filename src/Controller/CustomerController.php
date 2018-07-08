<?php

namespace App\Controller;

use App\Entity\Customer;
use App\Models\CustomerModel;
use App\Serializer\Manager\CustomerManager;
use FOS\RestBundle\Controller\Annotations as Rest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Response;

class CustomerController extends BaseController
{
	private $customerManager;
	
	/**
	 * CustomerController constructor.
	 *
	 * @param CustomerManager $customerManager
	 *
	 * @internal param ValidatorInterface $validator
	 * @internal param EntityManagerInterface $em
	 */
	public function __construct(CustomerManager $customerManager) {
		
		$this->customerManager = $customerManager;
	}
	
	
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
	public function getOneAction(Customer $customer)
	{
		return $this->sendResponse($customer, Response::HTTP_OK);
	}
	
	
	/**
	 * Get all customers
	 * @Rest\Get("/customers")
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function getAllAction()
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
	 * @ParamConverter("customerModel", converter="fos_rest.request_body")
	 *
	 * @param CustomerModel $customerModel
	 *
	 * @return Response
	 * @internal param Customer $customer
	 *
	 */
	public function createAction(CustomerModel $customerModel)
	{
		$customerEntity = $this->customerManager->populateAndSaveCustomerEntity($customerModel);
		return $this->sendResponse($customerEntity, Response::HTTP_CREATED);
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
	public function deleteAction(Customer $customer)
	{
		$this->customerManager->deleteCustomer($customer);
		return $this->sendResponse(null,Response::HTTP_NO_CONTENT);
	}
	
	
	/**
	 * Update customer data
	 * @Rest\Put("/customers/{id}")
	 * @ParamConverter("customer", converter="fos_rest.request_body")
	 *
	 * @return Response
	 * @internal param Customer $customer
	 * @internal param $id
	 * @todo     a terminer...
	 */
	public function updateCustomerAction() {
		return $this->sendResponse(null,Response::HTTP_FORBIDDEN);
	}
	
}