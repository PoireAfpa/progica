<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Cities;
use App\Entity\Location;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class LocationFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {   $faker = Factory::create('fr_FR');
        $cities=$manager->getRepository(Cities::class)->findAll();
        $departments=$manager->getRepository(Cities::class)->findAll();
        $regions=$manager->getRepository(Cities::class)->findAll();
        
        
       
       foreach($cities as $city){
            $city= new Location();
            $city->setRegion($faker->randomElement($regions));
            $city->setDepartment($faker->randomElement($departments));
            $city->setCity($faker->randomElement($cities));
            $city->getLongitude($faker->randomFloat());
            $city->getLatitude($faker->randomFloat());
            $manager->persist($city); 
        }
     

       $manager->flush();
    }
   public function getDependencies(): array
    {
        return [ContactFixtures::class];
        
    }
}