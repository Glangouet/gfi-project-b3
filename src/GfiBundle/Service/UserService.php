<?php

namespace GfiBundle\Service;

use Doctrine\ORM\EntityManager;

class UserService
{
    
    /**
     * @var EntityManager
     */
    protected $em;

    /**
     * UserService constructor.
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * @param $mdp
     * @return mixed
     */
    public function hashMdp($mdp) 
    {
        return md5($mdp);
    }

    /**
     * @param $ROLE
     * @return array
     */
    public function returnUserByRole($ROLE) {
        $repoUser = $this->em->getRepository("GfiWebBundle:UserRepository");
        return $repoUser->findBy(array("role" => $ROLE));
    }
}