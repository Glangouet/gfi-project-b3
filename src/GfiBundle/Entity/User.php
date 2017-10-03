<?php

namespace GfiBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;

use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="User")
 * @ORM\Entity(repositoryClass="GfiBundle\Repository\UserRepository")
 */
class User extends BaseUser
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToMany(targetEntity="customer_card", mappedBy="id_user", cascade={"remove", "persist"})
     */
    protected $userCards;

    /**
     * Add userCard
     *
     * @param \GfiBundle\Entity\customer_card $userCard
     *
     * @return User
     */
    public function addUserCard(\GfiBundle\Entity\customer_card $userCard)
    {
        $this->userCards[] = $userCard;

        return $this;
    }

    /**
     * Remove userCard
     *
     * @param \GfiBundle\Entity\customer_card $userCard
     */
    public function removeUserCard(\GfiBundle\Entity\customer_card $userCard)
    {
        $this->userCards->removeElement($userCard);
    }

    /**
     * Get userCards
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUserCards()
    {
        return $this->userCards;
    }
}
