<?php

namespace App\DataFixtures;

use Faker\Factory;
use DateTimeImmutable;
use App\Entity\Product;
use App\Entity\Calendar;
use App\DataFixtures\ProductFixtures;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class CalendarFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        $products = $manager->getRepository(Product::class)->findAll();
       
        for($i=1;$i<30;$i++){
            $calendar= new Calendar();
            $calendar->setDateStart(DateTimeImmutable::createFromMutable($faker->datetime()));
            $calendar->setDateEnd(DateTimeImmutable::createFromMutable($faker->datetime()));
            $calendar->setProduct($faker->randomElement($products));
            $manager->persist($calendar);

        }
     


        //\DateTimeImmutable::createFromMutable(self::faker()->datetime()),
        $manager->flush();
    }
    public function getDependencies(): array
    {
        return [ProductFixtures::class];
    }
}