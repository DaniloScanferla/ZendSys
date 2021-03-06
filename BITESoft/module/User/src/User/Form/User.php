<?php

namespace User\Form;

use Zend\Form\Form,
    Zend\Form\Element\Select;

class User extends Form{
    
    protected $roles;
    
    public function __construct($name = null, array $roles = null, $options = array()) {
        parent::__construct('user', $options);
        $this->roles = $roles;
        
        $this->setInputFilter(new UserFilter());
        $this->setAttribute('method', 'POST');
        
        $id = new \Zend\Form\Element\Hidden('id');
        $this->add($id);
        
        $nome = new \Zend\Form\Element\Text("nome");
        $nome->setLabel("Nome: ")
                ->setAttribute('placeholder', 'Entre com o nome');
        $this->add($nome);
        
        $email = new \Zend\Form\Element\Text("email");
        $email->setLabel("Email: ")
                ->setAttribute('placeholder', 'Entre com o email');
        $this->add($email);
        
        $password = new \Zend\Form\Element\Password("password");
        $password->setLabel("Senha: ")
                ->setAttribute('placeholder', 'Entre com a senha');
        $this->add($password);
        
        $confirmation = new \Zend\Form\Element\Password("confirmation");
        $confirmation->setLabel("Redigite a senha: ")
                ->setAttribute('placeholder', 'Entre com a senha novamente');
        $this->add($confirmation);
        
        
        $csrf = new \Zend\Form\Element\Csrf("security");
        $this->add($csrf);
        
        $this->add(array(
           'name' => 'submit',
           'type' => 'Zend\Form\Element\Submit',
            'attributes' => array(
                'value' => 'Salvar',
                'class' => 'btn-sucess'
            )
        ));
    }
}
