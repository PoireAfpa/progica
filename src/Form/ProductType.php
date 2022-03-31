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
                'label' => 'Prix haute saison'
            ])
            ->add('offSeasonPrice', NumberType::class, [
                'label' => 'Prix basse saison'
            ])
            ->add('surface', NumberType::class, [
                'label' => 'Surface du gîte'
            ])
            ->add('room', IntegerType::class, [
                'label' => 'Nombre de pièces'
            ])
            ->add('people', IntegerType::class, [
                'label' => 'Nombre de couchage'
            ])
            ->add('animal', CheckboxType::class, [
                'label' => 'Animaux autorisés (Cochez si oui)',
            ])
            ->add('smoker', CheckboxType::class, [
                'label' => 'Gîte fumeur (Cochez si oui)',
            ])
            ->add('animalCost', NumberType::class, [
                'label' => 'Supplément pour animaux'
            ])
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
