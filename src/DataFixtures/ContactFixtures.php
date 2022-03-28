<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Contact;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\String\Slugger\SluggerInterface;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ContactFixtures extends Fixture 
{
    protected $slugger;
    public function __construct(SluggerInterface $slugger)
    {
        $this->slugger=$slugger;
    }
    public function load(ObjectManager $manager): void
    {
        
        $faker = Factory::create('fr_FR');
     
        
        
        
       

     for($i=1;$i<30;$i++){

            $contact= new Contact();
            $contact->setEmail($faker->email());
            $contact->setFirstName($faker->firstName());
            $contact->setLastName($faker->lastName());
            $contact->setMessage($faker->paragraph(2));
            $contact->setSlug(strtolower($this->slugger->slug($contact->getFirstName())));
            $manager->persist($contact);
     }
          
    
 
    $manager->flush();
    }
   
   
}
