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
     * @ORM\Column(name="creation_date", type="datetime")
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
     * @param $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->customerCards = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set creationDate
     *
     * @param \DateTime $creationDate
     *
     * @return customer
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
     * Add customerCard
     *
     * @param \GfiBundle\Entity\customer_card $customerCard
     *
     * @return customer
     */
    public function addCustomerCard(\GfiBundle\Entity\customer_card $customerCard)
    {
        $this->customerCards[] = $customerCard;

        return $this;
    }

    /**
     * Remove customerCard
     *
     * @param \GfiBundle\Entity\customer_card $customerCard
     */
    public function removeCustomerCard(\GfiBundle\Entity\customer_card $customerCard)
    {
        $this->customerCards->removeElement($customerCard);
    }

    /**
     * Get customerCards
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCustomerCards()
    {
        return $this->customerCards;
    }
}
