<?php

namespace Produto\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;

/**
 * @ORM\Table(name="tipos_produto")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity(repositoryClass="Produto\Entity\TipoRepository")
 *
 */
class Tipo {

    /**
     *@ORM\Id
     *@ORM\Column(type="integer")
     *@ORM\GeneratedValue
     */
    protected $id;
    
    /**
     *@ORM\Column(type="text")
     *@var string
     */
    protected $nome;
    
    /**
     *@ORM\Column(type="text", length=20)
     *@var string
     */
    protected $codigo;
    
    /**
     *@ORM\Column(type="datetime", name="created_at")
     */
    protected $createdAt;
    
    /**
     *@ORM\Column(type="datetime", name="updated_at")
     */
    protected $updatedAt;
    
    
    public function __construct($options = array()){
        (new Hydrator\ClassMethods)->hydrate($options, $this);
        
        $this->createdAt = new \DateTime("now");
        $this->updatedAt = new \DateTime("now");
    }


    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getCreatedAt() {
        return $this->createdAt;
    }

    public function getUpdatedAt() {
        return $this->updatedAt;
    }
    
    public function getCodigo() {
        return $this->codigo;
    }

    public function setCodigo($codigo) {
        $this->codigo = $codigo;
        return $this;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setNome($nome) {
        $this->nome = $nome;
        return $this;
    }

    /**
    * @ORM\prePersist
    */
    public function setCreatedAt() {
        $this->createdAt = new \DateTime("now");
        return $this;
    }

    /**
    * @ORM\prePersist
    */
    public function setUpdatedAt() {
        $this->updatedAt = new \DateTime("now");
        return $this;
    }

    public function __toString(){
        return $this->nome;
    }
    
    public function toArray(){
        return (new Hydrator\ClassMethods)->extract($this);
    }

}
