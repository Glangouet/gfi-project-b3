<?php

namespace GfiBundle\Controller;

use GfiBundle\Entity\CustomerCard;
use Symfony\Bridge\Doctrine\Tests\Fixtures\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class ApiController extends Controller
{
    /**
     * @param User $id
     * @return JsonResponse
     */
    public function cardsByUserAction($id)
    {
        $serviceUser = $this->get('fos_user.user_manager');
        $user = $serviceUser->findUserBy(array('id' => $id));
        $serviceCard = $this->get('gfi.card');
        $list = $serviceCard->returnCardsByUser($user);
        return new JsonResponse($list);
    }

    /**
     * @return JsonResponse
     */
    public function cardsByUserSessionAction()
    {
        $serviceCard = $this->get('gfi.card');
        $list = $serviceCard->returnCardsByUser($this->getUser());
        return new JsonResponse($list);
    }


    /**
     * @param $id
     * @return JsonResponse
     */
    public function detailCardAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $repoCard = $em->getRepository('GfiBundle:CustomerCard');
        $card = $repoCard->find($id);
        $serviceCard = $this->get('gfi.card');
        $detail = $serviceCard->returnCard($card);
        return new JsonResponse($detail);
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function removeCardAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $repoCard = $em->getRepository('GfiBundle:CustomerCard');
        $card = $repoCard->find($id);
        $serviceCard = $this->get('gfi.card');
        $response = $serviceCard->removeCard($card);
        return new JsonResponse($response);
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function removeCustomerAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $repoCustomer = $em->getRepository('GfiBundle:Customer');
        $customer = $repoCustomer->find($id);
        $serviceCustomer = $this->get('gfi.customer');
        $response = $serviceCustomer->removeCustomer($customer);
        return new JsonResponse($response);
    }

    /**
     * @param $id1
     * @param $id2
     * @return JsonResponse
     */
    public function removeCustomerContactAction($id1, $id2)
    {
        $em = $this->getDoctrine()->getManager();
        $repoContactCustomer = $em->getRepository('GfiBundle:ContactCustomer');
        $contactCustomer = $repoContactCustomer->find($id2);
        $serviceCustomer = $this->get('gfi.customer');
        $response = $serviceCustomer->removeContactCustomer($contactCustomer);
        return new JsonResponse($response);
    }
    
}