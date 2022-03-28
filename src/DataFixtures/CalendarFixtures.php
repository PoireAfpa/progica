<?php

namespace App\DataFixtures;

use App\Entity\Calendar;
use Faker\Factory;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class CalendarFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        $products = $manager->getRepository(Product::class)->findAll();
        foreach($products as $product){
            $calendar= new Calendar();
            $calendar->setDateStart(\DateTimeImmutable::createFromMutable($faker()->datetime()));
            $calendar->setDateEnd(\DateTimeImmutable::createFromMutable($faker()->datetime()));
            $calendar->setProduct($product);
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