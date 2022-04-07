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
    private $citiesArray=[];

    /*public function __construct(CitiesRepository $citiesRepository)
    {
        $cities = $citiesRepository->findAll();
        foreach($cities as $city){
            $this->citiesArray[$city->getName()]=$city->getId();
        }
    }*/

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('keyword', TextType::class, [
                'label' => 'Mot clé',
                'required' => false
            ])
         
            ->add('price', RangeType::class, [
              
                'attr' => [
                    "class" => "slider",
                    "type" => "range",
                    "min" => 0,
                    "max" =>1000,
                    "step" => 100,
                ],
              
            ])

         

            ->add('surface', NumberType::class, [
                'label' => 'Surface du gîte',
                'required' => false,
                'attr' => [
                    'min' => 0
                  ]
            ])
            ->add('room', IntegerType::class, [
                'label' => 'Nombre de pièces',
                'required' => false,
                'attr' => [
                    'min' => 1
                  ]
            ])
            ->add('people', IntegerType::class, [
                'label' => 'Nombre de couchage',
                'required' => false,
                'attr' => [
                    'min' => 1
                  ]
            ])
            ->add('animal', CheckboxType::class, [
                'label' => 'Animaux (Cochez si oui)',
                'required' => false
            ])
            ->add('smoker', CheckboxType::class, [
                'label' => 'Fumeur (Cochez si oui)',
                'required' => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([

        ]);
    }

}
