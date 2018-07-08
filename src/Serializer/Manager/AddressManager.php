<?php

namespace App\Serializer\Manager;

use App\Entity\Address;
use App\Entity\AddressType;
use App\Entity\City;
use App\Entity\Customer;
use App\Models\AddressModel;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class AddressManager extends AbstractManager
{
	/**
	 * Create a new address entity with data from address model
	 *
	 * @param AddressModel $addressModel
	 *
	 * @return Address
	 *
	 */
	public function populateAndSaveEntity(AddressModel $addressModel)
	{
		$this->validateModel($addressModel);
		
		$address = new Address();
		$address->setAddressLine1($addressModel->getAddressLine1())
						->setAddressLine2($addressModel->getAddressLine2())
						->setCity($this->getOrCreateCity($addressModel))
						->setZipCode($addressModel->getZipCode())
						->setCustomer($this->getCustomer($addressModel));
		$this->em->persist($address);
		$this->em->flush();
		
		return $address;
	}
	
	/**
	 * Get or create a city
	 * @param AddressModel $addressModel
	 *
	 * @return City
	 */
	protected function getOrCreateCity(AddressModel $addressModel)
	{
		$city = $this->em->getRepository(City::class)
			->findOneBy(['name'=>strtolower($addressModel->getCity())]);
		
		if(empty($city))
		{
			$city = new City();
			$city->setName($addressModel->getCity());
			$this->em->persist($city);
			$this->em->flush();
		}
		
		return $city;
	}
	
	
	/**
	 * Get the address type
	 * @param AddressModel $addressModel
	 *
	 * @return AddressType
	 */
	protected function getAddressType(AddressModel $addressModel)
	{
		$addressType = $this->em->getRepository(AddressType::class)->findOneBy(
			['label' => strtolower($addressModel->getAddressTypeLabel())]
		);
		
		if(empty($addressType))
		{
			throw new BadRequestHttpException("This address type (".$addressModel->getAddressTypeLabel()." is invalid.");
		}
		
		return $addressType;
	}
	
	/**
	 * Get customer with its id
	 * @param AddressModel $addressModel
	 *
	 * @return Customer
	 */
	protected function getCustomer(AddressModel $addressModel)
	{
		$customer = $this->em->getRepository(Customer::class)->find($addressModel->getCustomerId());
		if(empty($customer))
		{
			throw new BadRequestHttpException("Can not find customer with id (".$addressModel->getCustomerId().")");
		}
		return $customer;
	}
	
	/**
	 * Delete an address from database
	 *
	 * @param Address $address
	 */
	public function deleteAddress(Address $address)
	{
		$this->em->remove($address);
		$this->em->flush();
	}
}