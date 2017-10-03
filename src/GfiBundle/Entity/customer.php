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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="customer_card", mappedBy="idCustomer")
     */
    private $customerCards;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="creation_date", type="datetimetz")
     */
    private $creationDate;
    
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
    public function setName($name)
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * Get customer
     *
     * @return string
     */
    public function getName()
    {
        return $this->customer;
    }
}

