<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Option;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\String\Slugger\SluggerInterface;


class OptionFixtures extends Fixture 
{
    protected $slugger;
    public function __construct(SluggerInterface $slugger)
    {
        $this->slugger=$slugger;
    }
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        
      
      
        $equipements = [];
        $equipement1 = new Option;
        $equipement1->setName("Climatisation");
        $equipement1->setType("Equipement");
        $equipement1->setSlug(strtolower($this->slugger->slug($equipement1->getName())));
        $manager->persist($equipement1);

        $equipement2 = new Option;
        $equipement2->setName("Sèche-linge");
        $equipement2->setType("Equipement");
        $equipement2->setSlug(strtolower($this->slugger->slug($equipement2->getName())));
        $manager->persist($equipement2);

        $equipement3 = new Option;
        $equipement3->setName("Lave-Linge");
        $equipement3->setType("Equipement");
        $equipement3->setSlug(strtolower($this->slugger->slug($equipement3->getName())));
        $manager->persist($equipement3);

        $equipement4 = new Option;
        $equipement4->setName("Fer à repasser");
        $equipement4->setType("Equipement");
        $equipement4->setSlug(strtolower($this->slugger->slug($equipement4->getName())));
        $manager->persist($equipement4);

        $equipement5 = new Option;
        $equipement5->setName("Sèche-cheveux");
        $equipement5->setType("Equipement");
        $equipement5->setSlug(strtolower($this->slugger->slug($equipement5->getName())));
        $manager->persist($equipement5);

        $equipement6 = new Option;
        $equipement6->setName("Télévision");
        $equipement6->setType("Equipement");
        $equipement6->setSlug(strtolower($this->slugger->slug($equipement6->getName())));
        $manager->persist($equipement6);

        $equipement7 = new Option;
        $equipement7->setName("Piscine");
        $equipement7->setType("Equipement");
        $equipement7->setSlug(strtolower($this->slugger->slug($equipement7->getName())));
        $manager->persist($equipement7);

        $equipement8 = new Option;
        $equipement8->setName("Barbecue");
        $equipement8->setType("Equipement");
        $equipement8->setSlug(strtolower($this->slugger->slug($equipement8->getName())));
        $manager->persist($equipement8);

        $equipement9 = new Option;
        $equipement9->setName("Jacuzzi");
        $equipement9->setType("Equipement");
        $equipement9->setSlug(strtolower($this->slugger->slug($equipement9->getName())));
        $manager->persist($equipement9);

        $equipement10 = new Option;
        $equipement10->setName("Parking");
        $equipement10->setType("Equipement");
        $equipement10->setSlug(strtolower($this->slugger->slug($equipement10->getName())));
        $manager->persist($equipement10);

        array_push($equipements, $equipement1, $equipement2, $equipement3, $equipement4, $equipement5, $equipement6, $equipement7, $equipement8, $equipement9,$equipement10);

        $services = [];

        $service1 = new Option;
        $service1->setName("Location de Vélo");
        $service1->setType("Service");
        $service1->setSlug(strtolower($this->slugger->slug($service1->getName())));
        $manager->persist($service1);

        $service2 = new Option;
        $service2->setName("Ménage fin de séjour");
        $service2->setType("Service");
        $service2->setSlug(strtolower($this->slugger->slug($service2->getName())));
        $manager->persist($service2);

        $service3 = new Option;
        $service3->setName("Petit-déjeuner");
        $service3->setType("Service");
        $service3->setSlug(strtolower($this->slugger->slug($service3->getName())));
        $manager->persist($service3);

        $service4 = new Option;
        $service4->setName("Wifi");
        $service4->setType("Service");
        $service4->setSlug(strtolower($this->slugger->slug($service4->getName())));
        $manager->persist($service4);

        array_push($services, $service1, $service2,$service3,$service4);

        $manager->flush();
    
    

    }
   
}
