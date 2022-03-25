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
        $options = $manager->getRepository(Option::class)->findAll();
        $users = $manager->getRepository(User::class)->findAll();
        $otptionsCosts = $manager->getRepository(OptionCost::class)->findAll();
        $calendars = $manager->getRepository(Calendar::class)->findAll();
        $productOwners=$manager->getRepository(User::class)->findAll('OWNER');

        for ($i=1; $i<30; $i++){
            $Product= new Product();
            $Product->setTitle($faker->words(3, true));
            $Product->setDescription($faker->paragraph(1,true));
            $Product->setImage($faker->imageUrl(360, 360, 'Ceci est un joli gite rural..', true, 'avec un peu d\'imagination', false));
            $Product->setPeakSeasonPrice($faker->randomFloat(2,700,900));
            $Product->setoffSeasonPrice($faker->randomFloat(2,400,600));
            $Product->setSurface($faker->numberBetween(100,200));
            $Product->setRoom($faker->numberBetween(2,5));
            $Product->setPeople($faker->numberBetween(1,5));
            $Product->setAnimal($faker->boolean());
            $Product->setAnimalCost($faker->randomFloat(2,0,100));
            $Product->addCalendar($faker->randomElement($calendars));
            for($j=1;$j<5;$j++){
                $Product->addOption($faker->randomElement($options));
            }
            $Product->addOptionCost($faker->randomElement($otptionsCosts));
            $Product->setProductContact($faker->randomElement($users));
            $Product->setProductOwner($faker->randomElement($productOwners));
            $Product->setSlug(strtolower($this->slugger->slug($Product->getTitle())));
            $manager->persist($Product);
    
    }
    $manager->flush();
    }
    public function getDependencies(): array
    {
        return [OptionFixtures::class];
        return [OptionCostFixtures::class];
        return [CalendarFixtures::class];
        return [UserFixtures::class];
    }
}