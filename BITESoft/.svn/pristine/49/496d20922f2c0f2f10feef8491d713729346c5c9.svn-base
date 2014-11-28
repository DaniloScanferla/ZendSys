<?php

namespace Produto\Fixture;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Produto\Entity\Tipo;

class LoadTipo extends AbstractFixture implements OrderedFixtureInterface{
    
    public function getOrder() {
        return 11;
    }
    
    public function load(ObjectManager $manager) {
        
        $tipo = new Tipo;
        $tipo->setNome('Moda');
        $tipo->setCodigo('MOD');
        $manager->persist($tipo);
        
        $tipo = new Tipo;
        $tipo->setNome('Restaurante');
        $tipo->setCodigo('REST');
        $manager->persist($tipo);
        
        $manager->flush();
    }
}
