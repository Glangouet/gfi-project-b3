<?php

namespace GfiBundle\Form;

use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
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
            ->add('startAtTheLatest')
            ->add('location')
            ->add('rate')
            ->add('contactCustomer', EntityType::class, array(
                'class' => 'GfiBundle:ContactCustomer',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('u')
                        ->orderBy('u.name', 'ASC');
                },
                'choice_label' => 'name',
                'multiple' => true
            ))
            ->add('Ajouter cette fiche', SubmitType::class, array(
                'attr' => array(
                    "class" => "btn btn-primary"
                )
            ))
        ;
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
