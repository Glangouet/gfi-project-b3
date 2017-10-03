<?php

namespace GfiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * customer_card
 *
 * @ORM\Table(name="customer_card")
 * @ORM\Entity(repositoryClass="GfiBundle\Repository\customer_cardRepository")
 */
class customer_card
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
     * @ORM\Column(name="date_card", type="datetime")
     */
    private $dateCard;

    /**
     * @var string
     *
     * @ORM\Column(name="contact_name", type="string", length=255)
     */
    private $contactName;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="full_description", type="text")
     */
    private $fullDescription;

    /**
     * @var string
     *
     * @ORM\Column(name="key_success_factor", type="string", length=255)
     */
    private $keySuccessFactor;

    /**
     * @var int
     *
     * @ORM\Column(name="duration_month", type="integer")
     */
    private $durationMonth;

    /**
     * @var int
     *
     * @ORM\Column(name="nb_day_week", type="integer")
     */
    private $nbDayWeek;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="start_at_the_latest", type="datetime")
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
     * @ORM\Column(name="consultant_name", type="text")
     */
    private $consultantName;

    /**
     * @var string
     *
     * @ORM\Column(name="statut", type="string", length=255)
     */
    private $statut;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="userCards")
     * @ORM\JoinColumn(name="id_user", referencedColumnName="id")
     */
    private $idUser;


    /**
     * @ORM\ManyToOne(targetEntity="customer", inversedBy="customerCards")
     * @ORM\JoinColumn(name="id_customer", referencedColumnName="id")
     */
    private $idCustomer;

    /**
     * @ORM\ManyToOne(targetEntity="contact_customer", inversedBy="contactCards")
     * @ORM\JoinColumn(name="id_contact", referencedColumnName="id")
     */
    private $idContact;


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
     * @return customer_card
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
     * Set contactName
     *
     * @param string $contactName
     *
     * @return customer_card
     */
    public function setContactName($contactName)
    {
        $this->contactName = $contactName;

        return $this;
    }

    /**
     * Get contactName
     *
     * @return string
     */
    public function getContactName()
    {
        return $this->contactName;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return customer_card
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
     * @return customer_card
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
     * Set keySuccessFactor
     *
     * @param string $keySuccessFactor
     *
     * @return customer_card
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
     * @return customer_card
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
     * @return customer_card
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
     * @return customer_card
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
     * @return customer_card
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
     * @return customer_card
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
     * @return customer_card
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
     * Set statut
     *
     * @param string $statut
     *
     * @return customer_card
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * Get statut
     *
     * @return string
     */
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * Set idUser
     *
     * @param \GfiBundle\Entity\User $idUser
     *
     * @return customer_card
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
     * @return customer_card
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
     * @return customer_card
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
