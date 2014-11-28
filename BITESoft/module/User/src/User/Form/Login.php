<?php

namespace User\Form;

use Zend\Form\Form;

class Login extends Form{
    
     public function __construct($name = null){
        parent::__construct('Login');
            
        $this->add(array(
            'name' => 'email',
            'type' => 'email',
            'id' => 'email',
            'attributes' => array('placeholder' => 'Seu@email.com','class' => 'input-lg'),
            'options' => array('label' => '','column-size' => 'sm-5', 'add-on-prepend' => 'Email', 'label_attributes' => array('class' => 'col-sm-2'))
        ))->add(array(
            'name' => 'password',
            'type' => 'password',
            'id' => 'password',
            'attributes' => array('placeholder' => 'Sua senha','class' => 'input-lg' ),
            'options' => array('label' => '','column-size' => 'sm-5', 'add-on-prepend' => 'Senha', 'label_attributes' => array('class' => 'col-sm-2'))
        ))->add(array(
           'name' => 'submit',
           'type' => 'Zend\Form\Element\Submit',
            'attributes' => array('value' => 'Entrar','class' => 'btn btn-lg btn-success btn-block'),
            'options' => array('column-size' => 'sm-5 col-sm-offset-2')
        ));
        
    }
}