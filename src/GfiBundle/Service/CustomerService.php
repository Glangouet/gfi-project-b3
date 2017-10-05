<?php

namespace GfiBundle\Service;

use Doctrine\ORM\EntityManager;
use GfiBundle\Entity\ContactCustomer;
use GfiBundle\Entity\Customer;
use GfiBundle\Entity\CustomerCard;
use GfiBundle\Entity\User;
use Symfony\Component\Form\Form;

class CustomerService
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
     * @param Customer $customer
     * @return array
     */
    public function returnCustomer(Customer $customer)
    {
        $customerContacts = $customer->getContactCustomer()->getValues();
        $contacts = array();
        foreach ($customerContacts as $customerContact) {
            $contacts[] = array(
                'contact_name' => $customerContact->getName(),
                'contact_id' => $customerContact->getId(),
                'contact_first_name' => $customerContact->getFirstName()
            );
        }

        return array(
            'customer_id' => $customer->getId(),
            'customer_name' => $customer->getName(),
            'date_creation' => $customer->getCreationDate()->format('d M Y'),
            'customer_contact' => $contacts
        );
    }

    /**
     * @param ContactCustomer $contactCustomer
     * @return array
     */
    public function returnContactCustomer(ContactCustomer $contactCustomer)
    {
        return array(
            'contact_customer_id' => $contactCustomer->getId(),
            'contact_customer_name' => $contactCustomer->getName(),
            'contact_customer_first_name' => $contactCustomer->getFirstName()
        );
    }

    /**
     * @return array
     */
    public function returnAllCustomers()
    {
        $response = array();
        $repoCustomers = $this->em->getRepository("GfiBundle:Customer");
        $customers = $repoCustomers->findAll();
        foreach ($customers as $customer) {
            $response[] = $this->returnCustomer($customer);
        }
        return $response;
    }

    /**
     * @param Form $form
     * @param Customer $customer
     * @return mixed
     */
    public function addCustomer(Form $form, Customer $customer)
    {
        if ($form->isValid()) {
            $this->em->persist($customer);
            $this->em->flush();
            $response['success'] = true;
            $response['message'] = "Client ajoutée avec succès";
            $response['data'] = $this->returnCustomer($customer);
        } else {
            $response['success'] = false;
            $response['message'] = "Une erreur est présente dans votre formuaire";
        }
        return $response;
    }

    /**
     * @param Form $form
     * @param Customer $customer
     * @return mixed
     */
    public function editCustomer(Form $form, Customer $customer)
    {
        if ($form->isValid()) {
            $this->em->persist($customer);
            $this->em->flush();
            $response['success'] = true;
            $response['message'] = "Client modifié avec succès";
            $response['data'] = $this->returnCustomer($customer);
        } else {
            $response['success'] = false;
            $response['message'] = "Une erreur est présente dans votre formuaire";
        }
        return $response;
    }

    /**
     * @param Customer $customer
     * @return mixed
     */
    public function removeCustomer(Customer $customer)
    {
        if (in_array('ROLE_ADMIN', $this->currentUser->getRoles())) {
            $this->em->remove($customer);
            $this->em->flush();
            $response['success'] = true;
            $response['message'] = "Client supprimé";
        } else {
            $response['success'] = false;
            $response['message'] = "Vous n'avez pas les droits de supression";
        }
        return $response;
    }

    /**
     * @param Form $form
     * @param ContactCustomer $contactCustomer
     * @return mixed
     */
    public function addContactCustomer(Form $form, ContactCustomer $contactCustomer)
    {
        if ($form->isValid()) {
            $this->em->persist($contactCustomer);
            $this->em->flush();
            $response['success'] = true;
            $response['message'] = "Contact ajouté avec succès";
            $response['data'] = $this->returnContactCustomer($contactCustomer);
        } else {
            $response['success'] = false;
            $response['message'] = "Une erreur est présente dans votre formuaire";
        }
        return $response;
    }

    /**
     * @param ContactCustomer $contactCustomer
     * @return mixed
     */
    public function removeContactCustomer(ContactCustomer $contactCustomer)
    {
        if (in_array('ROLE_ADMIN', $this->currentUser->getRoles())) {
            $this->em->remove($contactCustomer);
            $this->em->flush();
            $response['success'] = true;
            $response['message'] = "Contact supprimé";
        } else {
            $response['success'] = false;
            $response['message'] = "Vous n'avez pas les droits de supression";
        }
        return $response;
    }

    /**
     * @param Form $form
     * @param ContactCustomer $contactCustomer
     * @return mixed
     */
    public function editContactCustomer(Form $form, ContactCustomer $contactCustomer)
    {
        if ($form->isValid()) {
            $this->em->persist($contactCustomer);
            $this->em->flush();
            $response['success'] = true;
            $response['message'] = "Contact édité avec succès";
            $response['data'] = $this->returnContactCustomer($contactCustomer);
        } else {
            $response['success'] = false;
            $response['message'] = "Une erreur est présente dans votre formuaire";
        }
        return $response;
    }
}