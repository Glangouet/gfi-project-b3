<?php

namespace GfiBundle\Controller;

use GfiBundle\Entity\CustomerCard;
use GfiBundle\Entity\StatusHistory;
use GfiBundle\Form\CustomerCardType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class CardController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function listAction()
    {
        if (!$this->getUser()) return $this->redirectToRoute('fos_user_security_login');
        else {
            $serviceCard = $this->get('gfi.card');
            $list = $serviceCard->returnCardsByUser($this->getUser());
            return $this->render('GfiBundle:Gfi/Card:listCard.html.twig', array(
                'list' => $list
            ));
        }
    }

    /**
     * @param Request $request
     * @return JsonResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function createAction(Request $request)
    {
        $form = $this->createForm(CustomerCardType::class, $card = new CustomerCard());
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $serviceCard = $this->get('gfi.card');
            $response = $serviceCard->addCard($form, $card);
            return new JsonResponse($response);
        }
        return $this->render('GfiBundle:Gfi/Card:createCard.html.twig', array(
            'form' => $form->createView()
        ));
    }

    /**
     * @param CustomerCard $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function editAction(CustomerCard $id)
    {
        
        return $this->render('GfiBundle:Gfi/Card:editCard.html.twig');
    }

    /**
     * @param CustomerCard $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function viewAction(CustomerCard $id)
    {
        return $this->render('GfiBundle:Gfi/Card:viewCard.html.twig');
    }
    
}
