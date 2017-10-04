<?php

namespace GfiBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;

use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="user")
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
     * @ORM\OneToMany(targetEntity="CustomerCard", mappedBy="idUser")
     */
    protected $userCards;

    /**
     * Add userCard
     *
     * @param \GfiBundle\Entity\CustomerCard $userCard
     *
     * @return User
     */
    public function addUserCard(\GfiBundle\Entity\CustomerCard $userCard)
    {
        $this->userCards[] = $userCard;

        return $this;
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

    /**
     * Remove userCard
     *
     * @param \GfiBundle\Entity\CustomerCard $userCard
     */
    public function removeUserCard(\GfiBundle\Entity\CustomerCard $userCard)
    {
        $this->userCards->removeElement($userCard);
    }
}
