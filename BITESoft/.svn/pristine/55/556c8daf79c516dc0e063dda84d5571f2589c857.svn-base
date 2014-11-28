<?php

namespace Produto\Fixture;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Produto\Entity\Produto;

class LoadProduto extends AbstractFixture implements OrderedFixtureInterface{
    
    public function getOrder() {
        return 12;
    }
    
    public function load(ObjectManager $manager) {
        $tipo1 = $manager->getReference('Produto\Entity\Tipo', 1);
        $tipo2 = $manager->getReference('Produto\Entity\Tipo', 2);
        
        $produto = new Produto;
        $produto->setNome("Blusa")
                  ->setType($tipo1);
        $manager->persist($produto);
        
        $produto = new Produto;
        $produto->setNome("Garfo")
                  ->setType($tipo2);
        $manager->persist($produto);
        
        
        $manager->flush();
    }
     
     
}
