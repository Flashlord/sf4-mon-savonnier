<?php
namespace App\Models;

use JMS\Serializer\Annotation as JMS;
use Symfony\Component\Validator\Constraints as Assert;

class CustomerModel
{
	/**
	 * @JMS\Type("string")
	 * @Assert\NotBlank(message="Please specify a title for this customer")
	 * @Assert\Type("string")
	 */
	private $title;
	
	/**
   * @JMS\Type("string")
	 * @Assert\NotBlank(message="Please specify customer's firstname")
	 * @Assert\Type("string")
   */
	private $firstname;
	
	/**
   * @JMS\Type("string")
	 * @Assert\NotBlank(message="Please specify customer's lastname")
	 * @Assert\Type("string")
   */
	private $lastname;
	
	
	/**
	 * @return mixed
	 */
	public function getTitle()
	{
		return $this->title;
	}
	
	/**
	 * @param mixed $title
	 *
	 * @return CustomerModel
	 */
	public function setTitle($title)
	{
		$this->title = $title;
		
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getFirstname()
	{
		return $this->firstname;
	}
	
	/**
	 * @param mixed $firstname
	 *
	 * @return CustomerModel
	 */
	public function setFirstname($firstname)
	{
		$this->firstname = $firstname;
		
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getLastname()
	{
		return $this->lastname;
	}
	
	/**
	 * @param mixed $lastname
	 *
	 * @return CustomerModel
	 */
	public function setLastname($lastname)
	{
		$this->lastname = $lastname;
		
		return $this;
	}
	
}