<?php

namespace GfiBundle\Controller;

use FOS\UserBundle\Form\Type\RegistrationFormType;
use GfiBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
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
        $form
            ->add('roles', ChoiceType::class, array(
                    'label' => "Roles",
                    'choices' => array(
                        'Admin' => 'ROLE_ADMIN',
                        'Commercial' => 'ROLE_COMMERCIAL',
                    ),
                    'multiple' => true
                )
            )
            ->add('name')
            ->add('firstname')
            ->add('phone')
            ->add('localisation')
        ;
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                $em->persist($user);
                $em->flush();
                $response = array(
                    'success' => true,
                    'message' => "This user has been created"
                );
                return new JsonResponse($response);
            } else {
                $response = array(
                    'success' => false,
                    'message' => "Une erreur est survenue"
                );
                return $response;
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
