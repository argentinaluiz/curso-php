<?php

namespace SON\Database;
use Doctrine\ORM\EntityManager;

class Database{
    
    private $em;
    private $post_titulo;
    private $post_conteudo;
    
    public function __construct(EntityManager $em)
    {
        //Injecao de dependencia, entity manager
        $this->em = $em;
    }
    
    public function insert(array $dados){
        $this->post_titulo = $dados['titulo'];
        $this->post_conteudo = $dados['conteudo'];
        
        if(!empty($this->post_titulo) || !empty($this->post_conteudo)){
            $grava = new \SON\Entity\Post;
            $grava->setTitulo($this->post_titulo);
            $grava->setconteudo($this->post_conteudo);
    
            $this->em->persist($grava);
            $this->em->flush();            
        } else {            
           return false;
        }
    }
}

