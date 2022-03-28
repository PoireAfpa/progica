<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Contact;
use App\Entity\AvailabilityContact;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\String\Slugger\SluggerInterface;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ContactFixtures extends Fixture implements DependentFixtureInterface
{
    protected $slugger;
    public function __construct(SluggerInterface $slugger)
    {
        $this->slugger=$slugger;
    }
    public function load(ObjectManager $manager): void
    {
        
        $faker = Factory::create('fr_FR');
        $availabilities=$manager->getRepository(AvailabilityContact::class)->findAll();
        $products = $manager->getRepository(Product::class)->findAll();
       

     foreach($products as $product){

            $contact= new Contact();
            $contact->setEmail($faker->email());
            $contact->setFirstName($faker->firstName());
            $contact->setLastName($faker->lastName());
            $contact->setMessage($faker->paragraph(2));
            $contact->addAvailability($faker->randomElement($availabilities));
            $contact->setSlug(strtolower($this->slugger->slug($product->getTitle())));
            $manager->persist($contact);
     }
          
    
 
    $manager->flush();
    }
    public function getDependencies(): array
    {
        return [productFixtures::class];
        return [AvailabilityContactFixtures::class];
    }
   
}
