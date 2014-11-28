<?php

namespace Produto\Service;

use Doctrine\ORM\EntityManager;
use Base\Service\AbstractService;

class Tipo extends AbstractService{
    
    public function __construct(EntityManager $em){
        parent::__construct($em);
        $this->entity = "Produto\Entity\Tipo"; 
    }
}
