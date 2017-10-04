<?php

namespace GfiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ContactCustomer
 *
 * @ORM\Table(name="contact_customer")
 * @ORM\Entity(repositoryClass="GfiBundle\Repository\ContactCustomerRepository")
 */
class ContactCustomer
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
     * @var string
     *
     * @ORM\Column(name="firstName", type="string", length=255)
     */
    private $firstName;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateCreation", type="datetime")
     */
    private $dateCreation;

    /**
     * @ORM\OneToMany(targetEntity="CustomerCard", mappedBy="idContact")
     */
    private $customerCard;

    /**
     * @ORM\ManyToOne(targetEntity="Customer", inversedBy="contactCustomer")
     * @ORM\JoinColumn(name="customer", referencedColumnName="id")
     */
    private $customer;
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->customerCard = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return ContactCustomer
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     *
     * @return ContactCustomer
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set dateCreation
     *
     * @param \DateTime $dateCreation
     *
     * @return ContactCustomer
     */
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    /**
     * Get dateCreation
     *
     * @return \DateTime
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    /**
     * Add customerCard
     *
     * @param \GfiBundle\Entity\CustomerCard $customerCard
     *
     * @return ContactCustomer
     */
    public function addCustomerCard(\GfiBundle\Entity\CustomerCard $customerCard)
    {
        $this->customerCard[] = $customerCard;

        return $this;
    }

    /**
     * Remove customerCard
     *
     * @param \GfiBundle\Entity\CustomerCard $customerCard
     */
    public function removeCustomerCard(\GfiBundle\Entity\CustomerCard $customerCard)
    {
        $this->customerCard->removeElement($customerCard);
    }

    /**
     * Get customerCard
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCustomerCard()
    {
        return $this->customerCard;
    }

    /**
     * Set customer
     *
     * @param \GfiBundle\Entity\Customer $customer
     *
     * @return ContactCustomer
     */
    public function setCustomer(\GfiBundle\Entity\Customer $customer = null)
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * Get customer
     *
     * @return \GfiBundle\Entity\Customer
     */
    public function getCustomer()
    {
        return $this->customer;
    }
}
