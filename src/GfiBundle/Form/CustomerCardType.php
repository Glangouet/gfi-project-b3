<?php

namespace GfiBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CustomerCardType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('dateCard')->add('contactName')->add('title')->add('fullDescription')->add('keySuccessFactor')->add('durationMonth')->add('nbDayWeek')->add('startAtTheLatest')->add('location')->add('rate')->add('consultantName')->add('statut')->add('idUser')->add('idCustomer')->add('idContact');
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'GfiBundle\Entity\customer_card'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'gfibundle_customer_card';
    }


}
