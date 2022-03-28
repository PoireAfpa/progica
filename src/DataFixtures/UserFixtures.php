<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\String\Slugger\SluggerInterface;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class UserFixtures extends Fixture implements DependentFixtureInterface
{
   
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        $roles=['OWNER','ADMIN','CUSTOMER'];
        $products = $manager->getRepository(Product::class)->findAll();
       

        for ($i=1; $i<50; $i++){
            $user= new User();
            $user->setEmail($faker->email());
            $user->setRoles($faker->randomElement($roles));
            $user->setPassword($faker->password());
            $user->setFirstName($faker->firstName());
            $user->setLastName($faker->lastName());
            $user->setTel($faker->phoneNumber());
            $user->addProduct($faker->randomElement($products));
            $manager->persist($user);
    
    }
    $manager->flush();
    }
    public function getDependencies(): array
    {
        return [ProductFixtures::class];
    }
}
