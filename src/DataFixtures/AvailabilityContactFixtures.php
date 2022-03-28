<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\AvailabilityContact;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AvailabilityContactFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {   $faker = Factory::create('fr_FR');
        $contacts = $manager->getRepository(Contact::class)->findAll();
        foreach($contacts as $contact){
            $availabilityContact= new AvailabilityContact();
            $availabilityContact->setDay();
            $availabilityContact->setHourStart();
            $availabilityContact->setHourEnd();
            $availabilityContact->setContact($contact);
            $manager->persist($availabilityContact);

        }
     

        $manager->flush();
    }
}