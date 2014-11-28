<?php

namespace Produto\Entity;

use Doctrine\ORM\EntityRepository;

class ProdutoRepository extends EntityRepository{
    
    public function fetchType(){
        
        $entities = $this->findAll();
        $array = array();
        
        foreach($entities as $entity){
            $array[$entity->getId()] = $entity->getNome();
        }
        
        return $array;
    }
}
