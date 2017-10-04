<?php 

namespace GfiBundle\Service;

use Doctrine\ORM\EntityManager;
use GfiBundle\Entity\Customer;
use GfiBundle\Entity\CustomerCard;
use GfiBundle\Entity\User;
use Symfony\Component\Form\Form;

class CardService 
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

    public function returnCard(CustomerCard $card)
    {
        return array(
            'commercial_id' => $card->getUser()->getId(),
            'commercial_name' => $card->getUser()->getUsername(),
            'customer_contact_name' => $card->getIdContact()->getName(),
            'customer_contact_id' => $card->getIdContact()->getId(),
            'customer_company' => $card->getIdContact()->getName(),
            'creation_date' => $card->getDateCard(),
            'duration_month' => $card->getDurationMonth(),
            'location' => $card->getLocation(),
            'nb_day_by_week' => $card->getNbDayWeek(),
            'key_sucess_factor' => $card->getKeySuccessFactor(),
            'rate' => $card->getRate(),
            'date_start_at_the_latest' => $card->getStartAtTheLatest(),
            'date_creation' => $card->getDateCreation(),
            'date_modification' => $card->getDateModification()
        );
    }

    /**
     * @param Customer $customer
     * @return array
     */
    public function returnCardsByCustomer(Customer $customer)
    {
        $response = array();
        $cards = $customer->getCustomerCards()->getValues();
        foreach ($cards as $card) {
            $response[] = $this->returnCard($card);
        }
        return $response;
    }

    /**
     * @param User $user
     * @return array
     */
    public function returnCardsByUser(User $user)
    {
        $response = array();
        $cards = $user->getUserCards()->getValues();
        foreach ($cards as $card) {
            $response[] = $this->returnCard($card);
        }
        return $response;
    }

    /**
     * @param Form $form
     * @param CustomerCard $card
     * @return mixed
     */
    public function addCard(Form $form, CustomerCard $card)
    {
        if ($form->isValid()) {
            $card->setUser($this->currentUser);
            $this->em->persist($card);
            $this->em->flush();
            $response['success'] = true;
            $response['message'] = "Fiche ajoutée avec succès";
            $response['data'] = $this->returnCard($card);
        } else {
            $response['success'] = false;
            $response['message'] = "Une erreur est présente dans votre formuaire";
        }
        return $response;
    }

    /**
     * @param CustomerCard $card
     * @return mixed
     */
    public function removeCard(CustomerCard $card)
    {
        if ($card->getIdUser() == $this->currentUser || in_array('ROLE_ADMIN', $this->currentUser->getRoles()))
        {
            $this->em->remove($card);
            $this->em->flush();
            $response['success'] = true;
            $response['message'] = "Fiche supprimée";
        } else {
            $response['success'] = false;
            $response['message'] = "Vous n'avez pas les droits de supression";
        }
        return $response;
    }
}