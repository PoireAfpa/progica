<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\User;
use App\Entity\Contact;
use App\Entity\Product;
use App\Entity\Location;
use App\DataFixtures\UserFixtures;
use App\DataFixtures\ContactFixtures;
use App\DataFixtures\LocationFixtures;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\String\Slugger\SluggerInterface;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ProductFixtures extends Fixture implements DependentFixtureInterface
{
    protected $slugger;
    public function __construct(SluggerInterface $slugger)
    {
        $this->slugger=$slugger;
    }
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
      
        
        
        $productOwners=$manager->getRepository(User::class)->findAll(['ROLE_OWNER']);  
        $contacts = $manager->getRepository(Contact::class)->findAll();
        $locations=$manager->getRepository(Location::class)->findAll();
        for ($i=1; $i<30; $i++){
            dd($productOwners);
            $product= new Product();
            $product->setTitle($faker->words(3, true));
            $product->setDescription($faker->paragraph(1,true));
            $product->setImage($faker->imageUrl(360, 360, 'Ceci est un joli gite rural..', true, 'avec un peu d\'imagination', false));
            $product->setPeakSeasonPrice($faker->randomFloat(2,700,900));
            $product->setoffSeasonPrice($faker->randomFloat(2,400,600));
            $product->setSurface($faker->numberBetween(100,200));
            $product->setRoom($faker->numberBetween(2,5));
            $product->setPeople($faker->numberBetween(1,5));
            $product->setAnimal($faker->boolean());
            $product->setSmoker($faker->boolean());
            $product->setAnimalCost($faker->randomFloat(2,0,100));
            $product->setLocation($faker->randomElement($locations));
            $product->setContact($faker->randomElement($contacts));
            $product->setProductOwner($faker->randomElement($productOwners));
            $product->setSlug(strtolower($this->slugger->slug($product->getTitle())));
            $manager->persist($product);
    
    }
    $manager->flush();
    }
    public function getDependencies(): array
    {   
        return [LocationFixtures::class];
        return [UserFixtures::class];
        return [ContactFixtures::class];
     
        
    }
}