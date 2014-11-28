<?php

namespace Produto\Controller;

use Base\Controller\CrudController;

class TiposController extends CrudController{

    public function __construct() {
        $this->entity = "Produto\Entity\Tipo";
        $this->service = "Produto\Service\Tipo";
        $this->form = "Produto\Form\Tipo";
        $this->controller = "tipos";
        $this->route = "produto/default";
    }
    
}
