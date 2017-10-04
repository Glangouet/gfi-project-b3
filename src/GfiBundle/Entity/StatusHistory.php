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
     * Set statusHistory
     *
     * @param string $statusHistory
     *
     * @return Status
     */
    public function setStatusHistory($StatusHistory)
    {
        $this->Statushistory = $statusHistory;

        return $this;
    }

    /**
     * Get statusHistory
     *
     * @return string
     */
    public function getStatusHistory()
    {
        return $this->statusHistory;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Status
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
     * Set statusCards
     *
     * @param \GfiBundle\Entity\CustomerCard $statusCards
     *
     * @return Status
     */
    public function setStatusCards(\GfiBundle\Entity\CustomerCard $statusCards = null)
    {
        $this->statusCards = $statusCards;

        return $this;
    }

    /**
     * Get statusCards
     *
     * @return \GfiBundle\Entity\CustomerCard
     */
    public function getStatusCards()
    {
        return $this->statusCards;
    }
}
