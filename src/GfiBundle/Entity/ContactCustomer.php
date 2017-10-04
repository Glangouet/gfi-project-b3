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
     * @ORM\Column(name="dateCreation", type="dateTime")
     */
    private $dateCreation;

    /**
     * @ORM\OneToMany(targetEntity="CustomerCard", mappedBy="idContact")
     */
    private $contactCards;

    /**
     * @ORM\ManyToOne(targetEntity="Customer", inversedBy="customer")
     * @ORM\JoinColumn(name="customer", referencedColumnName="id")
     */
    private $contacts;

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
     * Add contactCard
     *
     * @param \GfiBundle\Entity\CustomerCard $contactCard
     *
     * @return ContactCustomer
     */
    public function addContactCard(\GfiBundle\Entity\CustomerCard $contactCard)
    {
        $this->contactCards[] = $contactCard;

        return $this;
    }

    /**
     * Remove contactCard
     *
     * @param \GfiBundle\Entity\CustomerCard $contactCard
     */
    public function removeContactCard(\GfiBundle\Entity\CustomerCard $contactCard)
    {
        $this->contactCards->removeElement($contactCard);
    }

    /**
     * Get contactCards
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getContactCards()
    {
        return $this->contactCards;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->contactCards = new \Doctrine\Common\Collections\ArrayCollection();
    }

}
