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
     * @param Request $request
     */
    public function listAction(Request $request)
    {

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
