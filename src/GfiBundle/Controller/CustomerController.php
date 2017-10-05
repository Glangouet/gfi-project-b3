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
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function listAction(Request $request)
    {
        $serviceCustomer = $this->get('gfi.customer');
        $list = $serviceCustomer->returnAllCustomers();
        return $this->render('GfiBundle:Gfi/Customer:listCustomer.html.twig', array(
            'list' => $list
        ));
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
     * @param Customer $customer
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function editAction(Customer $customer, Request $request)
    {
        $form = $this->createForm(CustomerType::class, $customer);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $serviceCustomer = $this->get('gfi.customer');
            $response = $serviceCustomer->editCustomer($form, $customer);
            return new JsonResponse($response);
        } else {
            return $this->render('GfiBundle:Gfi/Customer:editCustomer.html.twig', array(
                'form' => $form->createView()
            ));
        }
    }

}
