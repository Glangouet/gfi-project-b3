<?php

namespace GfiBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StatusHistoryType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', ChoiceType::class, array(
                'choices' => array(
                    "open" => "open",
                    'win' => 'win',
                    'lost' => 'lost'
                ),
                'label' => 'Modifier l\'état de cette fiche'
            ))
            ->add("Modifier l'etat", SubmitType::class, array(
                'attr' => array(
                    'class' => 'btn btn-primary'
                )
            ));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'GfiBundle\Entity\StatusHistory'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'gfibundle_statushistory';
    }


}
