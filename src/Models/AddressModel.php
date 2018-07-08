<?php

namespace App\Models;
use JMS\Serializer\Annotation as JMS;
use Symfony\Component\Validator\Constraints as Assert;


class AddressModel
{
	/**
	 * @var integer
	 * @JMS\Type("integer")
	 * @Assert\NotBlank(message="Please specify a customer id value")
	 * @Assert\Type("integer")
	 */
	private $customerId;
	
	/**
	 * @var string
	 * @JMS\Type("string")
	 * @Assert\NotBlank(message="Please specify at least one address line")
	 * @Assert\Type("string")
	 */
	private $addressLine1;
	
	/**
	 * @var string
	 * @JMS\Type("string")
	 * @Assert\Type("string")
	 */
	private $addressLine2;
	
	/**
	 * @var string
	 * @JMS\Type("string")
	 * @Assert\NotBlank(message="Please specify the zip code")
	 * @Assert\Type("string")
	 */
	private $zipCode;
	
	/**
	 * @var string
	 * @JMS\Type("string")
	 * @Assert\NotBlank()
	 * @Assert\Type("string")
	 */
	private $city;
	
	/**
	 * @var string
	 * @JMS\Type("string")
	 * @Assert\NotBlank(message="Please specify the address type")
	 * @Assert\Type("string")
	 */
	private $addressTypeLabel;
	
	
	/**
	 * @return int
	 */
	public function getCustomerId(): int
	{
		return $this->customerId;
	}
	
	/**
	 * @param int $customerId
	 *
	 * @return AddressModel
	 */
	public function setCustomerId(int $customerId): AddressModel
	{
		$this->customerId = $customerId;
		
		return $this;
	}
	
	/**
	 * @return string
	 */
	public function getAddressLine1(): string
	{
		return $this->addressLine1;
	}
	
	/**
	 * @param string $addressLine1
	 *
	 * @return AddressModel
	 */
	public function setAddressLine1(string $addressLine1): AddressModel
	{
		$this->addressLine1 = $addressLine1;
		
		return $this;
	}
	
	/**
	 * @return string
	 */
	public function getAddressLine2(): string
	{
		return $this->addressLine2;
	}
	
	/**
	 * @param string $addressLine2
	 *
	 * @return AddressModel
	 */
	public function setAddressLine2(string $addressLine2): AddressModel
	{
		$this->addressLine2 = $addressLine2;
		
		return $this;
	}
	
	/**
	 * @return string
	 */
	public function getZipCode(): string
	{
		return $this->zipCode;
	}
	
	/**
	 * @param string $zipCode
	 *
	 * @return AddressModel
	 */
	public function setZipCode(string $zipCode): AddressModel
	{
		$this->zipCode = $zipCode;
		
		return $this;
	}
	
	/**
	 * @return string
	 */
	public function getCity(): string
	{
		return $this->city;
	}
	
	/**
	 * @param string $city
	 *
	 * @return AddressModel
	 */
	public function setCity(string $city): AddressModel
	{
		$this->city = $city;
		
		return $this;
	}
	
	/**
	 * @return string
	 */
	public function getAddressTypeLabel(): string
	{
		return $this->addressTypeLabel;
	}
	
	/**
	 * @param string $addressTypeLabel
	 *
	 * @return AddressModel
	 */
	public function setAddressTypeLabel(string $addressTypeLabel): AddressModel
	{
		$this->addressTypeLabel = $addressTypeLabel;
		
		return $this;
	}
}