<?php

namespace GfiBundle\Controller;

use GfiBundle\Entity\Comment;
use GfiBundle\Entity\CustomerCard;
use GfiBundle\Entity\StatusHistory;
use GfiBundle\Form\CommentType;
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
     * @param CustomerCard $card
     * @param Request $request
     * @return JsonResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function editAction(CustomerCard $card, Request $request)
    {
        $form = $this->createForm(CustomerCardType::class, $card);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $serviceCard = $this->get('gfi.card');
            $response = $serviceCard->editCard($form, $card);
            return new JsonResponse($response);
        }
        return $this->render('GfiBundle:Gfi/Card:editCard.html.twig', array(
            'form' => $form->createView()
        ));
    }

    /**
     * @param CustomerCard $id
     * @param Request $request
     * @return JsonResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function viewAction(CustomerCard $id, Request $request)
    {
        $serviceComment = $this->get('gfi.comment');
        $coms = $serviceComment->returnCommentsCard($id);

        $form = $this->createForm(CommentType::class, $comment = new Comment());
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $response = $serviceComment->addComment($form, $comment, $id);
            return new JsonResponse($response);
        }
        return $this->render('GfiBundle:Gfi/Card:viewCard.html.twig', array(
            'card' => $id,
            'form' => $form->createView(),
            'coms' => $coms
        ));
    }
    
}
