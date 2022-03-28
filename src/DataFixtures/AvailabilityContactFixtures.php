<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\AvailabilityContact;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class AvailabilityContactFixtures extends Fixture //implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {   $faker = Factory::create('fr_FR');
        $week=["lundi","mardi","mercredi", "jeudi", "vendredi"," samedi", "dimanche"];
        $contacts = $manager->getRepository(Contact::class)->findAll();
        dd($contacts);
       
        /* foreach($contacts as $contact){
            $availabilityContact= new AvailabilityContact();
            $availabilityContact->setDay($faker->dayOfWeek(5));
            $availabilityContact->setHourStart($faker->time('H:i'));
            $availabilityContact->setHourEnd($faker->time('H:i'));
            $availabilityContact->setContact($contact);
            $manager->persist($availabilityContact); 
        }*/
     

       // $manager->flush();
    }
    /*public function getDependencies(): array
    {
        return [ContactFixtures::class];
        
    }*/
}