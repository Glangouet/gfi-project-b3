<?php

namespace GfiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Customer
 *
 * @ORM\Table(name="customer")
 * @ORM\Entity(repositoryClass="GfiBundle\Repository\CustomerRepository")
 */
class Customer
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
     * @var \DateTime
     *
     * @ORM\Column(name="creationDate", type="datetime")
     */
    private $creationDate;

    /**
     * @ORM\OneToMany(targetEntity="ContactCustomer", mappedBy="customer")
     */
    private $contactCustomer;
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->creationDate = new \DateTime();
        $this->contactCustomer = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Customer
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
     * Set creationDate
     *
     * @param \DateTime $creationDate
     *
     * @return Customer
     */
    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;

        return $this;
    }

    /**
     * Get creationDate
     *
     * @return \DateTime
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * Add contactCustomer
     *
     * @param \GfiBundle\Entity\ContactCustomer $contactCustomer
     *
     * @return Customer
     */
    public function addContactCustomer(\GfiBundle\Entity\ContactCustomer $contactCustomer)
    {
        $this->contactCustomer[] = $contactCustomer;

        return $this;
    }

    /**
     * Remove contactCustomer
     *
     * @param \GfiBundle\Entity\ContactCustomer $contactCustomer
     */
    public function removeContactCustomer(\GfiBundle\Entity\ContactCustomer $contactCustomer)
    {
        $this->contactCustomer->removeElement($contactCustomer);
    }

    /**
     * Get contactCustomer
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getContactCustomer()
    {
        return $this->contactCustomer;
    }
}
