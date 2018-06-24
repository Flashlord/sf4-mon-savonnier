<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CustomerOrderRepository")
 */
class CustomerOrder
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\CustomerOrderHasProducts", mappedBy="customerOrder")
     */
    private $customerOrderHasProducts;
    

    public function __construct()
    {
        $this->customerOrderHasProducts = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @return Collection|CustomerOrderHasProducts[]
     */
    public function getCustomerOrderHasProducts(): Collection
    {
        return $this->customerOrderHasProducts;
    }

    public function addCustomerOrdersHasProduct(CustomerOrderHasProducts $customerOrdersHasProduct): self
    {
        if (!$this->customerOrderHasProducts->contains($customerOrdersHasProduct)) {
            $this->customerOrderHasProducts[] = $customerOrdersHasProduct;
            $customerOrdersHasProduct->setCustomerOrder($this);
        }

        return $this;
    }

    public function removeCustomerOrdersHasProduct(CustomerOrderHasProducts $customerOrderHasProduct): self
    {
        if ($this->customerOrderHasProducts->contains($customerOrderHasProduct)) {
            $this->customerOrderHasProducts->removeElement($customerOrderHasProduct);
            // set the owning side to null (unless already changed)
            if ($customerOrderHasProduct->getCustomerOrder() === $this) {
                $customerOrderHasProduct->setCustomerOrder(null);
            }
        }

        return $this;
    }
}
