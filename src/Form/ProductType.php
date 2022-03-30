<?php

namespace App\Form;

use App\Entity\Product;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title')
            ->add('description')
            ->add('image')
            ->add('peakSeasonPrice')
            ->add('offSeasonPrice')
            ->add('surface')
            ->add('room')
            ->add('people')
            ->add('animal')
            ->add('smoker')
            ->add('animalCost')
            ->add('slug')
            //->add('productOwner')
            //->add('option')
            //->add('productContact')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }
}
