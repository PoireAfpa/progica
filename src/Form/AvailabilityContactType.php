<?php

namespace App\Form;

use App\Entity\AvailabilityContact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AvailabilityContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('day')
            ->add('hourStart')
            ->add('hourEnd')
            ->add('availability')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => AvailabilityContact::class,
        ]);
    }
}
