<?php

namespace GfiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CustomerCard
 *
 * @ORM\Table(name="customer_card")
 * @ORM\Entity(repositoryClass="GfiBundle\Repository\CustomerCardRepository")
 */
class CustomerCard
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
     * @var \DateTime
     *
     * @ORM\Column(name="dateCreation", type="datetime")
     */
    private $dateCreation;

    /**
     * @var \DateTime
     *
     *@ORM\Column(name="dateModification", type="datetime")
     */
    private $dateModification;

    /**
     * @var string
     *
     * @ORM\Column(name="keySuccessFactor", type="string", length=255)
     */
    private $keySuccessFactor;

    /**
     * @var int
     *
     * @ORM\Column(name="durationMonth", type="integer")
     */
    private $durationMonth;

    /**
     * @var int
     *
     * @ORM\Column(name="nbDayWeek", type="integer")
     */
    private $nbDayWeek;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="startAtTheLatest", type="datetime")
     */
    private $startAtTheLatest;

    /**
     * @var string
     *
     * @ORM\Column(name="location", type="string", length=255)
     */
    private $location;

    /**
     * @var float
     *
     * @ORM\Column(name="rate", type="float")
     */
    private $rate;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="userCards")
     * @ORM\JoinColumn(name="user", referencedColumnName="id")
     */
    private $user;

    /**
     * @ORM\OneToOne(targetEntity="ContactCustomer", inversedBy="customerCard")
     * @ORM\JoinColumn(name="idContact", referencedColumnName="id")
     */
    private $idContact;

    /**
     * @ORM\OneToMany(targetEntity="StatusHistory", mappedBy="customerCard")
     * @ORM\JoinColumn(name="status", referencedColumnName="id")
     */
    private $status;

    /**
     * @ORM\OneToMany(targetEntity="Comment", mappedBy="card")
     * @ORM\JoinColumn(name="comments", referencedColumnName="id")
     */
    private $comments;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->status = new \Doctrine\Common\Collections\ArrayCollection();
        $this->comments = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set dateCreation
     *
     * @param \DateTime $dateCreation
     *
     * @return CustomerCard
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
     * Set dateModification
     *
     * @param \DateTime $dateModification
     *
     * @return CustomerCard
     */
    public function setDateModification($dateModification)
    {
        $this->dateModification = $dateModification;

        return $this;
    }

    /**
     * Get dateModification
     *
     * @return \DateTime
     */
    public function getDateModification()
    {
        return $this->dateModification;
    }

    /**
     * Set keySuccessFactor
     *
     * @param string $keySuccessFactor
     *
     * @return CustomerCard
     */
    public function setKeySuccessFactor($keySuccessFactor)
    {
        $this->keySuccessFactor = $keySuccessFactor;

        return $this;
    }

    /**
     * Get keySuccessFactor
     *
     * @return string
     */
    public function getKeySuccessFactor()
    {
        return $this->keySuccessFactor;
    }

    /**
     * Set durationMonth
     *
     * @param integer $durationMonth
     *
     * @return CustomerCard
     */
    public function setDurationMonth($durationMonth)
    {
        $this->durationMonth = $durationMonth;

        return $this;
    }

    /**
     * Get durationMonth
     *
     * @return integer
     */
    public function getDurationMonth()
    {
        return $this->durationMonth;
    }

    /**
     * Set nbDayWeek
     *
     * @param integer $nbDayWeek
     *
     * @return CustomerCard
     */
    public function setNbDayWeek($nbDayWeek)
    {
        $this->nbDayWeek = $nbDayWeek;

        return $this;
    }

    /**
     * Get nbDayWeek
     *
     * @return integer
     */
    public function getNbDayWeek()
    {
        return $this->nbDayWeek;
    }

    /**
     * Set startAtTheLatest
     *
     * @param \DateTime $startAtTheLatest
     *
     * @return CustomerCard
     */
    public function setStartAtTheLatest($startAtTheLatest)
    {
        $this->startAtTheLatest = $startAtTheLatest;

        return $this;
    }

    /**
     * Get startAtTheLatest
     *
     * @return \DateTime
     */
    public function getStartAtTheLatest()
    {
        return $this->startAtTheLatest;
    }

    /**
     * Set location
     *
     * @param string $location
     *
     * @return CustomerCard
     */
    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location
     *
     * @return string
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set rate
     *
     * @param float $rate
     *
     * @return CustomerCard
     */
    public function setRate($rate)
    {
        $this->rate = $rate;

        return $this;
    }

    /**
     * Get rate
     *
     * @return float
     */
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * Set user
     *
     * @param \GfiBundle\Entity\User $user
     *
     * @return CustomerCard
     */
    public function setUser(\GfiBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \GfiBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set idContact
     *
     * @param \GfiBundle\Entity\ContactCustomer $idContact
     *
     * @return CustomerCard
     */
    public function setIdContact(\GfiBundle\Entity\ContactCustomer $idContact = null)
    {
        $this->idContact = $idContact;

        return $this;
    }

    /**
     * Get idContact
     *
     * @return \GfiBundle\Entity\ContactCustomer
     */
    public function getIdContact()
    {
        return $this->idContact;
    }

    /**
     * Add status
     *
     * @param \GfiBundle\Entity\StatusHistory $status
     *
     * @return CustomerCard
     */
    public function addStatus(\GfiBundle\Entity\StatusHistory $status)
    {
        $this->status[] = $status;

        return $this;
    }

    /**
     * Remove status
     *
     * @param \GfiBundle\Entity\StatusHistory $status
     */
    public function removeStatus(\GfiBundle\Entity\StatusHistory $status)
    {
        $this->status->removeElement($status);
    }

    /**
     * Get status
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Add comment
     *
     * @param \GfiBundle\Entity\Comment $comment
     *
     * @return CustomerCard
     */
    public function addComment(\GfiBundle\Entity\Comment $comment)
    {
        $this->comments[] = $comment;

        return $this;
    }

    /**
     * Remove comment
     *
     * @param \GfiBundle\Entity\Comment $comment
     */
    public function removeComment(\GfiBundle\Entity\Comment $comment)
    {
        $this->comments->removeElement($comment);
    }

    /**
     * Get comments
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getComments()
    {
        return $this->comments;
    }
}
