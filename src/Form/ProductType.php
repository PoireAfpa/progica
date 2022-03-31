<?php

namespace App\Form;

use App\Entity\Product;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'Nom du gîte'
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Description'
            ])
            ->add('image', TextType::class, [
                'label' => 'Photo'
            ])
            ->add('peakSeasonPrice', NumberType::class, [
                'label' => 'Prix haute saison',
                'attr' => [
                    'min' => 0
                  ]
            ])
            ->add('offSeasonPrice', NumberType::class, [
                'label' => 'Prix basse saison',
                'attr' => [
                    'min' => 0
                  ]
            ])
            ->add('surface', NumberType::class, [
                'label' => 'Surface du gîte',
                'attr' => [
                    'min' => 0
                  ]
            ])
            ->add('room', IntegerType::class, [
                'label' => 'Nombre de pièces',
                'attr' => [
                    'min' => 1
                  ]
            ])
            ->add('people', IntegerType::class, [
                'label' => 'Nombre de couchage',
                'attr' => [
                    'min' => 1
                  ]
            ])
            ->add('animal', CheckboxType::class, [
                'label' => 'Animaux autorisés (Cochez si oui)',
                'required' => false
            ])
            ->add('smoker', CheckboxType::class, [
                'label' => 'Gîte fumeur (Cochez si oui)',
                'required' => false
            ])
            ->add('animalCost', NumberType::class, [
                'label' => 'Supplément pour animaux',
                'attr' => [
                    'min' => 0
                  ]
            ])
            ->add('productOwner')
            ->add('option')
            ->add('optionCost')
            ->add('productContact')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }
}
