<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Contact;
use App\Entity\AvailabilityContact;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class AvailabilityContactFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {   $faker = Factory::create('fr_FR');
        $week=['lundi', 'mardi', 'mercredi' ,'jeudi', 'vendredi'];
        $contacts = $manager->getRepository(Contact::class)->findAll();
        
       
      for($i=1;$i<30;$i++){
            $availabilityContact= new AvailabilityContact();
            $availabilityContact->setDay($faker->randomElement($week));
            $availabilityContact->setHourStart($faker->numberBetween(6,14).":00");
            $availabilityContact->setHourEnd(strval(intval($availabilityContact->getHourStart())+8).":00");
            $availabilityContact->setContact($faker->randomElement($contacts));
            $manager->persist($availabilityContact); 
        }
     

       $manager->flush();
    }
   public function getDependencies(): array
    {
        return [ContactFixtures::class];
        
    }
}