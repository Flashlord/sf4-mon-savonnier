<?php

namespace App\Controller;

use App\Entity\Customer;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\View\View;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\ConstraintViolationList;

class CustomerController extends FOSRestController
{
	/**
	 * Get a customer identified by its id
	 * @Rest\Get("/customers/{id}")
	 * @ParamConverter("customer", converter="fos_rest.request_body")
	 *
	 * @param Customer $customer
	 *
	 * @return \Symfony\Component\HttpFoundation\Response
	 * @internal param int $id
	 *
	 */
	public function getOneCustomerAction(Customer $customer)
	{
		$view = view::create($customer, Response::HTTP_OK);
		return $this->handleView($view);
	}
	
	
	/**
	 * Get all customers
	 * @Rest\Get("/customers")
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function getCustomersAction()
	{
		$view = view::create($this->getDoctrine()
			                     ->getRepository(Customer::class)
			                     ->findAll(), Response::HTTP_OK);
		return $this->handleView($view);
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
		var_dump($customer); die;
		/** @var ConstraintViolationList $errors */
		$errors = $this->container->get('validator')->validate($customer);
		if(count($errors))
		{
			return $this->handleView(View::create($errors[0]->getMessage(), Response::HTTP_BAD_REQUEST));
		}
		
		$this->getDoctrine()->getManager()->persist($customer);
		$this->getDoctrine()->getManager()->flush();
		
		return $this->handleView(View::create($customer,201));
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
		$this->getDoctrine()->getManager()->remove($customer);
		$this->getDoctrine()->getManager()->flush();
		return $this->handleView(view::create(null, Response::HTTP_NO_CONTENT));
	}
	
	
	/**
	 * @param $title
	 * @param $firstname
	 * @param $lastname
	 */
	public function updateCustomerAction($title, $firstname, $lastname) {
	
	}
	
}