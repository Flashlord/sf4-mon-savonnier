<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * @ORM\Entity(repositoryClass="App\Repository\CustomerRepository")
 * @JMS\AccessorOrder("custom", custom = {"id"})
 */
class Customer
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=45)
     * @Assert\NotBlank(message="Firstname can not be blank or null")
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=45)
     * @Assert\NotBlank(message="Lastname can not be blank or null")
     */
    private $lastname;
 	
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Title")
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotBlank(message="Title can not be blank or null")
     * @JMS\Type("Entity<App\Entity\Title>")
     * @JMS\Groups("excluded_by_default")
     */
    private $title;
	
		/**
	   * @JMS\VirtualProperty
		 * @JMS\SerializedName("title")
		 */
		public function getTitleLabel()
		{
			return $this->getTitle()->getLabel();
		}
    
    public function getId()
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }
	
    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getTitle(): ?Title
    {
        return $this->title;
    }

    public function setTitle(Title $title): self
    {
        $this->title = $title;

        return $this;
    }
}
