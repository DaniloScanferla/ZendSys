<?php

namespace User\Fixture;

use Doctrine\Common\DataFixtures\AbstractFixture,
    Doctrine\Common\Persistence\ObjectManager,
    Doctrine\Common\DataFixtures\OrderedFixtureInterface;
    
use User\Entity\User;

class LoadUser extends AbstractFixture implements OrderedFixtureInterface{
    
    public function getOrder() {
        return 100;
    }
    
    public function load(ObjectManager $manager) {
        
        $user = new User();
        $user->setNome("Admin")
             ->setEmail("admin@admin.com")
             ->setPassword("admin")
             ->setActive(true);
        
        $manager->persist($user);
        
        $manager->flush();
        
    }
}
