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
     * @ORM\Column(name="dateCard", type="datetime")
     */
    private $dateCard;

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
     * @ORM\Column(name="consultantName", type="text")
     */
    private $consultantName;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="userCards")
     * @ORM\JoinColumn(name="idUser", referencedColumnName="id")
     */
    private $idUser;


    /**
     * @ORM\ManyToOne(targetEntity="Customer", inversedBy="customerCards")
     * @ORM\JoinColumn(name="idCustomer", referencedColumnName="id")
     */
    private $idCustomer;

    /**
     * @ORM\ManyToOne(targetEntity="ContactCustomer", inversedBy="contactCards")
     * @ORM\JoinColumn(name="idContact", referencedColumnName="id")
     */
    private $idContact;

    /**
     * @ORM\OneToOne(targetEntity="Status", inversedBy="statusCards")
     * @ORM\JoinColumn(name="idStatus", referencedColumnName="id")
     */
    private $idStatus;

    /**
     * @ORM\OneToOne(targetEntity="Comment", inversedBy="commentCards")
     * @ORM\JoinColumn(name="idComment", referencedColumnName="id")
     */
    private $idComment;


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
     * Set dateCard
     *
     * @param \DateTime $dateCard
     *
     * @return CustomerCard
     */
    public function setDateCard($dateCard)
    {
        $this->dateCard = $dateCard;

        return $this;
    }

    /**
     * Get dateCard
     *
     * @return \DateTime
     */
    public function getDateCard()
    {
        return $this->dateCard;
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
     * Set consultantName
     *
     * @param string $consultantName
     *
     * @return CustomerCard
     */
    public function setConsultantName($consultantName)
    {
        $this->consultantName = $consultantName;

        return $this;
    }

    /**
     * Get consultantName
     *
     * @return string
     */
    public function getConsultantName()
    {
        return $this->consultantName;
    }

    /**
     * Set idUser
     *
     * @param \GfiBundle\Entity\User $idUser
     *
     * @return CustomerCard
     */
    public function setIdUser(\GfiBundle\Entity\User $idUser = null)
    {
        $this->idUser = $idUser;

        return $this;
    }

    /**
     * Get idUser
     *
     * @return \GfiBundle\Entity\User
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * Set idCustomer
     *
     * @param \GfiBundle\Entity\customer $idCustomer
     *
     * @return CustomerCard
     */
    public function setIdCustomer(\GfiBundle\Entity\customer $idCustomer = null)
    {
        $this->idCustomer = $idCustomer;

        return $this;
    }

    /**
     * Get idCustomer
     *
     * @return \GfiBundle\Entity\customer
     */
    public function getIdCustomer()
    {
        return $this->idCustomer;
    }

    /**
     * Set idContact
     *
     * @param \GfiBundle\Entity\contact_customer $idContact
     *
     * @return customerCard
     */
    public function setIdContact(\GfiBundle\Entity\contact_customer $idContact = null)
    {
        $this->idContact = $idContact;

        return $this;
    }

    /**
     * Get idContact
     *
     * @return \GfiBundle\Entity\contact_customer
     */
    public function getIdContact()
    {
        return $this->idContact;
    }
}
