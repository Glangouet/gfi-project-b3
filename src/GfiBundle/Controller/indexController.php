<?php

namespace GfiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class IndexController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        return $this->render('GfiBundle:Gfi:index.html.twig');
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function listCardAction()
    {
        return $this->render('Gfibundle:Gfi:listCard.html.twig');
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function detailCardAction()
    {
        return $this->render('GfiBundle:Gfi:detailCard.html.twig');
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function createCardAction()
    {
        return $this->render('GfiBundle:Gfi:createCard.html.twig');
    }
    
}
