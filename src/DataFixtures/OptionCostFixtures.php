<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Product;
use App\DataFixtures\UserFixtures;
use App\DataFixtures\OptionFixtures;
use App\DataFixtures\ContactFixtures;
use App\DataFixtures\CalendarFixtures;
use App\Entity\OptionCost;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class OptionCostFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        $products=$manager->getRepository(Product::class)->findAll();
        $options=$manager->getRepository(Option::class)->findAll();

            foreach($options as $option){
                $optionCost=  new OptionCost;
                $optionCost->getProduct($faker->randomElement($products));
                $optionCost->setPrice($faker->randomFloat(2,0,100));
                }
           

        $manager->flush();
    }
    public function getDependencies(): array
    {
        return [OptionFixtures::class];
        return [Product::class];
        return [ContactFixtures::class];
        return [CalendarFixtures::class];
        return [UserFixtures::class];
    }
}