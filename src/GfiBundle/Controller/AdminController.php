<?php

namespace GfiBundle\Controller;

use FOS\UserBundle\Form\Type\RegistrationFormType;
use GfiBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class AdminController extends Controller
{
    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function addUserAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(RegistrationFormType::class, $user = new User());
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                $em->persist($user);
                $em->flush();
                return new JsonResponse(true);
            }
        }
        return $this->render('GfiBundle:Gfi/admin:addUser.html.twig', array(
            'form' => $form->createView()
        ));
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function usersAction()
    {
        $em = $this->getDoctrine()->getManager();
        $repoUser = $em->getRepository('GfiBundle:User');
        $users = $repoUser->findAll();
        return $this->render('GfiBundle:Gfi/admin:users.html.twig', array(
            'users' => $users
        ));
    }
}
