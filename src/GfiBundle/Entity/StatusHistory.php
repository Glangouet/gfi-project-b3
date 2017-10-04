<?php

namespace GfiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * StatusHistory
 *
 * @ORM\Table(name="statusHistory")
 * @ORM\Entity(repositoryClass="GfiBundle\Repository\StatusHistoryRepository")
 */
class StatusHistory
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
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity="CustomerCard", inversedBy="status")
     */
    private $customerCard;

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
     * @return StatusHistory
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
     * Set date
     *
     * @param \DateTime $date
     *
     * @return StatusHistory
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set customerCard
     *
     * @param \GfiBundle\Entity\CustomerCard $customerCard
     *
     * @return StatusHistory
     */
    public function setCustomerCard(\GfiBundle\Entity\CustomerCard $customerCard = null)
    {
        $this->customerCard = $customerCard;

        return $this;
    }

    /**
     * Get customerCard
     *
     * @return \GfiBundle\Entity\CustomerCard
     */
    public function getCustomerCard()
    {
        return $this->customerCard;
    }
}
