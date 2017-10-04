<?php

namespace GfiBundle\Controller;

use GfiBundle\Entity\customer_card;
use GfiBundle\Form\customer_cardType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CardController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function listAction()
    {
        if (!$this->getUser()) return $this->redirectToRoute('fos_user_security_login');
        else return $this->render('GfiBundle:Gfi/Card:listCard.html.twig');
    }
    
    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function createCardAction(Request $request)
    {
        $form = $this->createForm(customer_cardType::class, $card = new customer_card());
        $form->handleRequest($request);
        return $this->render('GfiBundle:Gfi/Card:createCard.html.twig', array(
            'form' => $form->createView()
        ));
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function editAction()
    {
        return $this->render('GfiBundle:Gfi/Card:editCard.html.twig');
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function viewAction()
    {
        return $this->render('GfiBundle:Gfi/Card:viewCard.html.twig');
    }
    
    
}
