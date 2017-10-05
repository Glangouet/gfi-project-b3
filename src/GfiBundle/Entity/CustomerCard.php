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
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     * 
     * @ORM\Column(name="fullDescription", type="text")
     */
    private $fullDescription;

    /**
     * @ORM\ManyToMany(targetEntity="User")
     */
    private $users;

    /**
     * @ORM\ManyToMany(targetEntity="ContactCustomer")
     */
    private $contactsCustomer;

    /**
     * @ORM\OneToMany(targetEntity="StatusHistory", mappedBy="customerCard", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="statusHistory", referencedColumnName="id")
     */
    private $statusHistory;

    /**
     * @ORM\OneToMany(targetEntity="Comment", mappedBy="card", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="comments", referencedColumnName="id")
     */
    private $comments;
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->dateCreation = new \DateTime();
        $this->dateModification = new \DateTime();
        $this->contactCustomer = new \Doctrine\Common\Collections\ArrayCollection();
        $this->statusHistory = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set title
     *
     * @param string $title
     *
     * @return CustomerCard
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set fullDescription
     *
     * @param string $fullDescription
     *
     * @return CustomerCard
     */
    public function setFullDescription($fullDescription)
    {
        $this->fullDescription = $fullDescription;

        return $this;
    }

    /**
     * Get fullDescription
     *
     * @return string
     */
    public function getFullDescription()
    {
        return $this->fullDescription;
    }

    /**
     * Add user
     *
     * @param \GfiBundle\Entity\User $user
     *
     * @return CustomerCard
     */
    public function addUser(\GfiBundle\Entity\User $user)
    {
        $this->users[] = $user;

        return $this;
    }

    /**
     * Remove user
     *
     * @param \GfiBundle\Entity\User $user
     */
    public function removeUser(\GfiBundle\Entity\User $user)
    {
        $this->users->removeElement($user);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * Add contactsCustomer
     *
     * @param \GfiBundle\Entity\ContactCustomer $contactsCustomer
     *
     * @return CustomerCard
     */
    public function addContactsCustomer(\GfiBundle\Entity\ContactCustomer $contactsCustomer)
    {
        $this->contactsCustomer[] = $contactsCustomer;

        return $this;
    }

    /**
     * Remove contactsCustomer
     *
     * @param \GfiBundle\Entity\ContactCustomer $contactsCustomer
     */
    public function removeContactsCustomer(\GfiBundle\Entity\ContactCustomer $contactsCustomer)
    {
        $this->contactsCustomer->removeElement($contactsCustomer);
    }

    /**
     * Get contactsCustomer
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getContactsCustomer()
    {
        return $this->contactsCustomer;
    }

    /**
     * Add statusHistory
     *
     * @param \GfiBundle\Entity\StatusHistory $statusHistory
     *
     * @return CustomerCard
     */
    public function addStatusHistory(\GfiBundle\Entity\StatusHistory $statusHistory)
    {
        $this->statusHistory[] = $statusHistory;

        return $this;
    }

    /**
     * Remove statusHistory
     *
     * @param \GfiBundle\Entity\StatusHistory $statusHistory
     */
    public function removeStatusHistory(\GfiBundle\Entity\StatusHistory $statusHistory)
    {
        $this->statusHistory->removeElement($statusHistory);
    }

    /**
     * Get statusHistory
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getStatusHistory()
    {
        return $this->statusHistory;
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
