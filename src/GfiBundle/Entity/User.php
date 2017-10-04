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
     * @ORM\OneToMany(targetEntity="CustomerCard", mappedBy="user")
     */
    protected $userCards;

    /**
     * @ORM\OneToMany(targetEntity="Comment", mappedBy="user")
     */
    private $comments;


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
     * Remove userCard
     *
     * @param \GfiBundle\Entity\CustomerCard $userCard
     */
    public function removeUserCard(\GfiBundle\Entity\CustomerCard $userCard)
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

    /**
     * Add comment
     *
     * @param \GfiBundle\Entity\Comment $comment
     *
     * @return User
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
