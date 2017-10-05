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
    public function cardsByUser(User $id)
    {
        $serviceCard = $this->get('gfi.card');
        $list = $serviceCard->returnCardsByUser($id);
        return new JsonResponse($list);
    }


    /**
     * @param CustomerCard $card
     * @return JsonResponse
     */
    public function detailCard(CustomerCard $card)
    {
        $serviceCard = $this->get('gfi.card');
        $detail = $serviceCard->returnCard($card);
        return new JsonResponse($detail);
    }
    
}