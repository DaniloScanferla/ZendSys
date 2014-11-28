<?php

namespace Produto\Form;

use Zend\Form\Form;

class Tipo extends Form{
    
    public function __construct($name = null){
        parent::__construct('tipos');
            
        $this->add(array(
            'name' => 'id',
            'attributes' => array(
                'type' => 'hidden',
                'placeholder' => 'ID',
            ),
     ))->add(array(
            'name' => 'nome',
            'type' => 'text',
            'id' => 'nome',
            'attributes' => array('placeholder' => 'Nome do produto','class' => 'input'),
            'options' => array('label' => '','column-size' => 'sm-5', 'add-on-prepend' => 'Nome', 'label_attributes' => array('class' => 'col-sm-2'))
        ))->add(array(
            'name' => 'codigo',
            'type' => 'text',
            'id' => 'codigo',
            'attributes' => array('placeholder' => 'Código do tipo do produto','class' => 'input' ),
            'options' => array('label' => '','column-size' => 'sm-5', 'add-on-prepend' => 'Código', 'label_attributes' => array('class' => 'col-sm-2'))
        ))->add(array(
           'name' => 'submit',
           'type' => 'Zend\Form\Element\Submit',
            'attributes' => array('value' => 'Salvar','class' => 'btn btn-success '),
            'options' => array('column-size' => 'sm-5 col-sm-offset-2')
        ));
    }
}

