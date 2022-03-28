<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\User;
use App\Entity\Option;
use DateTimeImmutable;
use App\Entity\Product;
use App\Entity\Calendar;
use App\Entity\OptionCost;
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
        
        
        $otptionsCosts = $manager->getRepository(OptionCost::class)->findAll();
        $calendars = $manager->getRepository(Calendar::class)->findAll();
        $productOwners=$manager->getRepository(User::class)->findAll('OWNER');
        $contacts = $manager->getRepository(Contact::class)->findAll();
        for ($i=1; $i<30; $i++){
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
            $product->addCalendar($faker->randomElement($calendars));      
            $product->addOptionCost($faker->randomElement($otptionsCosts));
            $product->setContact($faker->randomElement($contacts));
            $product->setproductOwner($faker->randomElement($productOwners));
            $product->setSlug(strtolower($this->slugger->slug($product->getTitle())));
            $manager->persist($product);
    
    }
    $manager->flush();
    }
    public function getDependencies(): array
    {
        return [OptionFixtures::class];
        return [OptionCostFixtures::class];
        return [ContactFixtures::class];
        return [CalendarFixtures::class];
        return [UserFixtures::class];
    }
}