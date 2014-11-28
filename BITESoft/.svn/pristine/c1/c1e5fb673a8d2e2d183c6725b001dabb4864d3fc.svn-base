<?php

namespace Produto\Form;

use Zend\Form\Form,
    Zend\Form\Element\Select;

class Produto extends Form{
    
    protected $types;
    
    public function __construct($name = null, array $types = null){
        parent::__construct($name);
        $this->types = $types;
        
        $this->setAttribute('method', 'post');
        
        $id = new \Zend\Form\Element\Hidden('id');
        $this->add($id);
        
        $nome = new \Zend\Form\Element\Text('nome');
        $nome->setLabel('Nome:')
             ->setAttribute('placeholder', 'Entre com o nome');
        $this->add($nome);
        
        $type = new Select();
        $type->setLabel('Type:')
             ->setName('type')   
             ->setOptions(array('value_options' => $types));
        $this->add($type);
        
        $this->add(array(
            'name' => 'submit',
            'type' => 'Zend\Form\Element\Submit',
            'attributes' => array(
                'value' => 'Salvar',
                'class' => 'btn-success'
            )
        ));
        
    }
}
