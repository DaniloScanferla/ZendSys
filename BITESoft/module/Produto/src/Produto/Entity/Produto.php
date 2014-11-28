<?php

namespace Produto\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;

/**
 * @ORM\Table(name="produtos")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity(repositoryClass="Produto\Entity\ProdutoRepository")
 *
 */
class Produto {

    /**
     *@ORM\Id
     *@ORM\Column(type="integer")
     *@ORM\GeneratedValue
     */
    protected $id;
    
    /**
     *@ORM\ManyToOne(targetEntity="Produto\Entity\Tipo")
     *@ORM\JoinColumn(name="type_id", referencedColumnName="id")
     */
    protected $type;
    
    /**
     *@ORM\Column(type="text")
     *@var string
     */
    protected $nome;
    
    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $sku;
    
    /**
     *@ORM\Column(type="datetime", name="created_at")
     */
    protected $createdAt;
    
    /**
     *@ORM\Column(type="datetime", name="updated_at")
     */
    protected $updatedAt;
    
    
    public function __construct(array $options = array()){
        (new Hydrator\ClassMethods)->hydrate($options, $this);
        
        $this->createdAt = new \DateTime("now");
        $this->updatedAt = new \DateTime("now");
        
        $this->sku = strtoupper(substr($this->nome, 0, 3)).substr(md5($this->nome), 0, 10);
    }


    public function getId() {
        return $this->id;
    }

    public function getType() {
        return $this->type;
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
    
    public function getSku() {
        return $this->sku;
    }

    public function setSku($sku) {
        $this->sku = $sku;
        return $this;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setType($type) {
        $this->type = $type;
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
        
        return array(
          'id' => $this->id,
          'nome' => $this->nome,
          'type' => $this->type->getNome(),
          'sku' => $this->sku
        );
    }

}
