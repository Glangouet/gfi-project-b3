<?php

namespace GfiBundle\Controller;

use GfiBundle\Entity\customer;
use GfiBundle\Form\customerType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CustomerController extends Controller
{

    /**
     * @param Request $request
     */
    public function listAction(Request $request)
    {

    }
    
    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function createAction(Request $request)
    {
        $form = $this->createForm(customerType::class, $customer = new customer());
        $form->handleRequest($request);
        return $this->render('GfiBundle:Gfi/Customer:createCustomer.html.twig', array(
            'form' => $form->createView()
        ));
    }

    /**
     * @param Request $request
     */
    public function editAction(Request $request)
    {
        
    }

    /**
     * @param $id
     */
    public function viewAction($id)
    {
        
    }

}
