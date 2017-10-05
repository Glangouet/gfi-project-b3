<?php

namespace GfiBundle\Form;

use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CustomerCardType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('keySuccessFactor')
            ->add('durationMonth')
            ->add('nbDayWeek')
            ->add('startAtTheLatest', DateTimeType::class, array(
                'format' => 'dd-MM-YYYY'
            ))
            ->add('location')
            ->add('rate')
            ->add('title')
            ->add('fullDescription')
            ->add('contactsCustomer', EntityType::class, array(
                'class' => 'GfiBundle:ContactCustomer',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('cc')
                        ->leftJoin('GfiBundle:Customer', 'c', 'WITH', 'c.id = cc.customer')
                        ->orderBy('c.name', 'ASC');
                },
                'choice_label' => function ($value, $key, $index) {
                    if ($value == true) {
                        $label =
                            $value->getCustomer()->getName() . ' ' .
                            $value->getName() . ' ' .
                            $value->getFirstName()
                        ;
                        return $label;
                    }
                    return strtoupper($key);
                },
                'multiple' => true
            ))
            ->add('users', EntityType::class, array(
                'class' => 'GfiBundle:User',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('u')
                        ->orderBy('u.username', 'ASC');
                },
                'choice_label' => 'username',
                'multiple' => true
            ))
            ->add('Ajouter cette fiche', SubmitType::class, array(
                'attr' => array(
                    "class" => "btn btn-primary"
                )
            ));
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'GfiBundle\Entity\CustomerCard'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'gfibundle_customercard';
    }


}
