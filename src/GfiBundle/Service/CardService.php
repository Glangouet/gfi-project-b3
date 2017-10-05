<?php 

namespace GfiBundle\Service;

use Doctrine\ORM\EntityManager;
use GfiBundle\Entity\ContactCustomer;
use GfiBundle\Entity\Customer;
use GfiBundle\Entity\CustomerCard;
use GfiBundle\Entity\StatusHistory;
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

    /**
     * @param CustomerCard $card
     * @return array
     */
    public function returnCard(CustomerCard $card)
    {
        $contactsCustomer = $card->getContactsCustomer();
        $contact = array();

        foreach ($contactsCustomer as $contactCustomer) {
            $contact[] = array(
                'id' => $contactCustomer->getId(),
                'name' => $contactCustomer->getName(),
                'first_name' => $contactCustomer->getFirstName(),
                'date_creation' => $contactCustomer->getDateCreation()->format('d M Y'),
                'customer' => array(
                    'id' => $contactCustomer->getCustomer()->getId(),
                    'name' => $contactCustomer->getCustomer()->getName(),
                    'date_creation' => $contactCustomer->getCustomer()->getCreationDate()->format('d M Y')
                )
            );
        }

        $users = array();
        foreach ($card->getUsers() as $user) {
            $users[] = array(
                'id' => $user->getId(),
                'name' => $user->getUsername(),
                'email' => $user->getEmail()
            );
        }

        $historyStatus = array();
        foreach ($card->getStatusHistory() as $status) {
            $historyStatus[] = array(
                "name" => $status->getName(),
                "date" => $status->getDate()
            );
        }

        return array(
            'card_id' => $card->getId(),
            'commerciaux' => $users,
            'customer_contact' => $contact,
            'duration_month' => $card->getDurationMonth(),
            'location' => $card->getLocation(),
            'nb_day_by_week' => $card->getNbDayWeek(),
            'key_success_factor' => $card->getKeySuccessFactor(),
            'rate' => $card->getRate(),
            'date_start_at_the_latest' => $card->getStartAtTheLatest()->format('d M Y'),
            'date_creation' => $card->getDateCreation()->format('d M Y'),
            'date_modification' => $card->getDateModification()->format('d M Y'),
            'description' => $card->getFullDescription(),
            'title' => $card->getTitle(),
            'last_status' => $this->lastStatusCard($card),
            'status_history' => $historyStatus
        );
    }

    /**
     * @param ContactCustomer $customer
     * @return array
     */
    public function returnCardsByContactCustomer(ContactCustomer $customer)
    {
        $response = array();
        $cards = $customer->get()->getValues();
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
        $repoCard = $this->em->getRepository('GfiBundle:CustomerCard');
        $cards = $repoCard->cardsByUser($user);
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
            $verif = false;
            foreach ($card->getUsers() as $user) {
                if ($user == $this->currentUser) $verif = true;
            }
            if (!$verif) $card->addUser($this->currentUser);
            $this->em->persist($card);
            $this->em->flush();


            $statusHistory = new StatusHistory();
            $statusHistory->setName('Open');
            $statusHistory->setCustomerCard($card);
            $this->em->persist($statusHistory);
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
     * @param Form $form
     * @param CustomerCard $card
     * @return mixed
     */
    public function editCard(Form $form, CustomerCard $card)
    {
        if ($form->isValid()) {
            $this->em->persist($card);
            $this->em->flush();
            $response['success'] = true;
            $response['message'] = "Fiche éditée avec succès";
        } else {
            $response['succes'] = false;
            $response['message'] = "Erreur dans le formulaire";
        }
        return $response;
    }

    /**
     * @param CustomerCard $card
     * @return mixed
     */
    public function removeCard(CustomerCard $card)
    {
        if (in_array('ROLE_ADMIN', $this->currentUser->getRoles()))
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

    /**
     * @param CustomerCard $card
     * @param $status
     * @return bool
     */
    public function changeStatus(CustomerCard $card, $status)
    {
        if($this->lastStatusCard($card)->getName() != $status) {
            $newStatus = new StatusHistory();
            $newStatus->setCustomerCard($card);
            $newStatus->setName($status);
            $this->em->persist($newStatus);
            $this->em->flush();
            return array(
                'success' => true,
                'message' => "Status changé avec succès"
            );
        } else return array(
            'success' => false,
            'message' => "erreur surevenue"
        );
    }

    /**
     * @param CustomerCard $card
     * @return null|object
     */
    public function lastStatusCard(CustomerCard $card)
    {
        $repoHistoryStatus = $this->em->getRepository('GfiBundle:StatusHistory');
        $lastStatus = $repoHistoryStatus->findOneBy(array('customerCard' => $card), array('date' => 'DESC'));
        return $lastStatus;
    }
}