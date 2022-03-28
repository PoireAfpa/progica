<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\String\Slugger\SluggerInterface;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class UserFixtures extends Fixture 
{ 
    protected $slugger;
    public function __construct(SluggerInterface $slugger)
    {
        $this->slugger=$slugger;
    }
   
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        $roles=['ROLE_OWNER','ROLE_ADMIN','ROLE_CUSTOMER','ROLE_USER'];
       
        
       

        for ($i=1; $i<50; $i++){
            $user= new User();
            $user->setEmail($faker->email());
            $user->setRoles([$faker->randomElement($roles)]);
            $user->setPassword($faker->password());
            $user->setFirstName($faker->firstName());
            $user->setLastName($faker->lastName());
            $user->setTel($faker->phoneNumber());
            $user->setSlug(strtolower($this->slugger->slug($user->getFirstName())));
            $manager->persist($user);
      
    
    }
    $manager->flush();
    }
   
}
