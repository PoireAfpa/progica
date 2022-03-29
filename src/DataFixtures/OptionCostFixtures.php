<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Option;
use App\Entity\Product;
use App\Entity\OptionCost;
use App\DataFixtures\OptionFixtures;
use App\DataFixtures\ProductFixtures;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class OptionCostFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        
    
        $faker = Factory::create('fr_FR');

       
        $options = $manager->getRepository(Option::class)->findAll();

     
        $products = $manager->getRepository(Product::class)->findAll();

      

        foreach ($products as $product) {
            foreach ($options as $option) {
                for ($i = 1; $i <= 14; $i++) {
                  
                    $optionCost = new OptionCost();
                    $optionCost->setOption($option);
                    $optionCost->setProduct($product);
                    $optionCost->setPrice($faker->randomFloat(2,0,100)); 
               } 
            $manager->persist($optionCost); 
            }
              
        }
      $manager->flush();
         
    }
    public function getDependencies(): array
    {
        return [OptionFixtures::class];
        return [ProductFixtures::class];
    }
}