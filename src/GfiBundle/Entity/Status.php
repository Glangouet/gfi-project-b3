<?php

namespace GfiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Status
 *
 * @ORM\Table(name="status")
 * @ORM\Entity(repositoryClass="GfiBundle\Repository\StatusRepository")
 */
class Status
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
     * @ORM\Column(name="history", type="string", length=255)
     */
    private $history;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @ORM\OneToOne(targetEntity="CustomerCard", mappedBy="idStatus")
     */
    private $statusCards;
    

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
     * Set history
     *
     * @param string $history
     *
     * @return Status
     */
    public function setHistory($history)
    {
        $this->history = $history;

        return $this;
    }

    /**
     * Get history
     *
     * @return string
     */
    public function getHistory()
    {
        return $this->history;
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
