<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Option;
use App\Entity\OptionCost;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\String\Slugger\SluggerInterface;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

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
        
      
      
            $option= new Option();
          
            $option->setSlug(strtolower($this->slugger->slug($option->getName())));
            $manager->persist($option);
    
    
    $manager->flush();
    }
   
}
