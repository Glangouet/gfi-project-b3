<?php

namespace GfiBundle\Controller;

use GfiBundle\Entity\customer;
use GfiBundle\Entity\customer_card;
use GfiBundle\Form\customer_cardType;
use GfiBundle\Form\customerType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class GfiController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function listCardAction()
    {
        return $this->render('GfiBundle:Gfi:listCard.html.twig');
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function detailCardAction()
    {
        return $this->render('GfiBundle:Gfi:detailCard.html.twig');
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function createCustomerAction(Request $request)
    {
        $form = $this->createForm(customerType::class, $customer = new customer());
        $form->handleRequest($request);
        return $this->render('GfiBundle:Gfi:createCustomer.html.twig', array(
            'form' => $form->createView()
        ));
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function createCardAction(Request $request)
    {
        $form = $this->createForm(customer_cardType::class, $card = new customer_card());
        $form->handleRequest($request);
        return $this->render('GfiBundle:Gfi:createCard.html.twig', array(
            'form' => $form->createView()
        ));
    }
    
}
