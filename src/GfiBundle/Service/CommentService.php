<?php

namespace GfiBundle\Service;

use Doctrine\ORM\EntityManager;
use GfiBundle\Entity\Comment;
use GfiBundle\Entity\CustomerCard;
use GfiBundle\Entity\User;
use Symfony\Component\Form\Form;

class CommentService
{
    /**
     * @var EntityManager
     */
    private $em;

    /**
     * @var User
     */
    private $currentUser;

    /**
     * CardService constructor.
     * @param EntityManager $em
     * @param User $user
     */
    public function __construct(EntityManager $em, User $user)
    {
        $this->em = $em;
        $this->currentUser = $user;
    }

    /**
     * @param Comment $comment
     * @return array
     */
    public function returnComment(Comment $comment)
    {
        return array(
            'userId' => $comment->d,
            'userName' => $comment->d,
            'idComment' => $comment->getId(),
            'title' => $comment->getTitle(),
            'comment' => $comment->getComment()
        );
    }

    /**
     * @param CustomerCard $card
     * @return array
     */
    public function returnCommentsCard(CustomerCard $card)
    {
        $comments = $card->getComments();
        $response = array();
        foreach ($comments as $comment) {
            $response[] = $this->returnComment($comment);
        }
        return $response;
    }

    /**
     * @param Form $form
     * @param Comment $comment
     * @return mixed
     */
    public function addComment(Form $form, Comment $comment)
    {
        if ($form->isValid()) {
            $this->em->persist($comment);
            $this->em->flush();
            $response['success'] = true;
            $response['message'] = "Commentaire ajouté avec succès";
        } else {
            $response['success'] = false;
            $response['message'] = "Une erreur est présente dans votre formuaire";
            $response['data'] = $this->returnComment($comment);
        }
        return $response;
    }

    /**
     * @param Comment $comment
     * @return mixed
     */
    public function removeComment(Comment $comment)
    {
        if ($comment->getUser() == $this->currentUser || in_array('ROLE_ADMIN', $comment->getUser()->getRoles()))
        {
            $this->em->remove($comment);
            $this->em->flush();
            $response['success'] = true;
            $response['message'] = "Commentaire supprumé";
        } else {
            $response['success'] = false;
            $response['message'] = "Vous n'avez pas les droits de supression";
        }
        return $response;
    }
}