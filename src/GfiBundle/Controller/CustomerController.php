<?php

namespace GfiBundle\Controller;

use GfiBundle\Entity\Customer;
use GfiBundle\Form\CustomerType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
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
        $form = $this->createForm(CustomerType::class, $customer = new Customer());
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $serviceCustomer = $this->get('gfi.customer');
            $response = $serviceCustomer->addCustomer($form, $customer);
            return new JsonResponse($response);
        }
        return $this->render('GfiBundle:Gfi/Customer:createCustomer.html.twig', array(
            'form' => $form->createView()
        ));
    }

    /**
     * @param $id
     * @param Request $request
     */
    public function editAction($id, Request $request)
    {
        
    }

    /**
     * @param $id
     */
    public function viewAction($id)
    {
        
    }

}
