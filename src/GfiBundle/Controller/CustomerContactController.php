<?php

namespace GfiBundle\Controller;

use GfiBundle\Entity\ContactCustomer;
use GfiBundle\Entity\Customer;
use GfiBundle\Form\ContactCustomerType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class CustomerContactController extends Controller
{

    /**
     * @param Customer $customer
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function listAction(Customer $customer)
    {
        return $this->render('GfiBundle:Gfi/ContactCustomer:listContactCustomer.html.twig', array(
            'customer' => $customer
        ));
    }

    /**
     * @param Customer $id
     * @param Request $request
     * @return JsonResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function createAction(Customer $id, Request $request)
    {
        $form = $this->createForm(ContactCustomerType::class, $contactCustomer = new ContactCustomer());
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $serviceCustomer = $this->get('gfi.customer');
            $contactCustomer->setCustomer($id);
            $response = $serviceCustomer->addContactCustomer($form, $contactCustomer);
            return new JsonResponse($response);
        }
        return $this->render('GfiBundle:Gfi/ContactCustomer:createContactCustomer.html.twig', array(
            'form' => $form->createView(),
            'customer' => $id
        ));
    }

    /**
     * @param Customer $id1
     * @param ContactCustomer $id2
     * @param Request $request
     * @return JsonResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function editAction(Customer $id1, ContactCustomer $id2, Request $request)
    {
        $form = $this->createForm(ContactCustomerType::class, $id2);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $serviceCustomer = $this->get('gfi.customer');
            $response = $serviceCustomer->editContactCustomer($form, $id2);
            return new JsonResponse($response);
        } else {
            return $this->render('GfiBundle:Gfi/ContactCustomer:editContactCustomer.html.twig', array(
                'form' => $form->createView(),
                'customer' => $id1
            ));
        }
    }

}
