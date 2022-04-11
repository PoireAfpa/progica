<?php

namespace App\Form;

use App\Repository\CitiesRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\RangeType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class SearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('keyword', TextType::class, [
                'label' => 'Mot clé',
                'required' => false
            ])
            ->add('maxPrice', RangeType::class, [
                'data_class' => null,
                'label' => 'Prix maximum',
                'required' => false,
                "error_bubbling" => true,
                'attr' => [
                    "class" => "slider",
                    "type" => "range",
                    "min" => 0,
                    "max" => 2000
                ]
            ])
            ->add('minSurface', NumberType::class, [
                'label' => 'Surface du gîte',
                'required' => false,
                'attr' => [
                    'min' => 0
                  ]
            ])
            ->add('minRoom', IntegerType::class, [
                'label' => 'Nombre de pièces',
                'required' => false,
                'attr' => [
                    'min' => 1
                  ]
            ])
            ->add('minPeople', IntegerType::class, [
                'label' => 'Nombre de couchage',
                'required' => false,
                'attr' => [
                    'min' => 1
                  ]
            ])
            ->add('pet', CheckboxType::class, [
                'label' => 'Animaux (Cochez si oui)',
                'required' => false
            ])
            ->add('smoker', CheckboxType::class, [
                'label' => 'Fumeur (Cochez si oui)',
                'required' => false
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => 'App\Entity\Search',
            'method' => 'get',
            'csrf_protection' => false
        ]);
    }

}
