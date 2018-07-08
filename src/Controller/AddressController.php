<?php

namespace App\Controller;

use App\Entity\Address;
use App\Models\AddressModel;
use App\Serializer\Manager\AddressManager;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as Rest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class AddressController extends BaseController
{
	private $manager;
	
	public function __construct(AddressManager $manager)
	{
		$this->manager = $manager;
	}
	
	
	/**
	 * Get an address identified by its id
	 * @Rest\Get("/address/{id}")
	 * @ParamConverter("address", class="App\Entity\Address")
	 * @param Address $address
	 *
	 * @return Response
	 */
	public function getOneAction(Address $address)
	{
		return $this->sendResponse($address, Response::HTTP_OK);
	}
	
	/**
	 * Get all addresses. Not useful for now.
	 * @Rest\Get("/address")
	 */
	public function getAllAction()
	{
		throw new AccessDeniedHttpException("Not implemented for now.");
	
	}
	
	/**
	 * Create an Address for a customer
	 * @Rest\Post("/address")
	 * @ParamConverter("addressModel", converter="fos_rest.request_body")
	 *
	 * @param AddressModel $addressModel
	 *
	 * @return Response
	 */
	public function createAction(AddressModel $addressModel)
	{
		$address = $this->manager->populateAndSaveEntity($addressModel);
		return $this->sendResponse($address, Response::HTTP_CREATED);
	
	}
	
	/**
	 * @Rest\Delete("/address/{id}")
	 * @ParamConverter("address", class="App:Address")
	 */
	public function deleteAction(Address $address)
	{
		$this->manager->deleteAddress($address);
		return $this->sendResponse(null, Response::HTTP_NO_CONTENT);
	}
}