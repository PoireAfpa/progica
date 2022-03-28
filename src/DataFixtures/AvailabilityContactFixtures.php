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
    
        $contacts = $manager->getRepository(Contact::class)->findAll();
        
       
      for($i=1;$i<30;$i++){
            $availabilityContact= new AvailabilityContact();
            $availabilityContact->setDay($faker->dayOfWeek(5));
            $availabilityContact->setHourStart($faker->time('H:i'));
            $availabilityContact->setHourEnd($faker->time('H:i'));
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