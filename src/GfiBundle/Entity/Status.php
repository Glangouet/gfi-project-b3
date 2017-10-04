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
     * @ORM\Column(name="statusHistory", type="string", length=255)
     */
    private $statusHistory;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity="CustomerCard", inversedBy="idState")
     */
    private $states;

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
}

