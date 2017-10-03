<?php

namespace GfiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * customer
 *
 * @ORM\Table(name="customer")
 * @ORM\Entity(repositoryClass="GfiBundle\Repository\customerRepository")
 */
class customer
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="customer", type="string", length=255)
     */
    private $customer;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set customer
     *
     * @param string $customer
     *
     * @return customer
     */
    public function setCustomer($customer)
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * Get customer
     *
     * @return string
     */
    public function getCustomer()
    {
        return $this->customer;
    }
}

