<?php

class Cliente
{
    private $db;
    private $id;
    private $nome;
    private $email;
    
    public function __construct(\PDO $obj_db)
    {
        $this->db = $obj_db;
    }
    
    public function listar()
    {
        $sql = 'SELECT * FROM clientes';
        $stmt = $this->db->query($sql);
        
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    
    public function inserir()
    { 
        $sql = 'INSERT INTO clientes (cliente_nome, cliente_email) VALUES (:nome, :email)';
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':nome', $this->getNome());
        $stmt->bindValue(':email', $this->getEmail());
        
        if($stmt->execute()){
            return true;
        } else {
            die('<br>' . print_r($statement->errorInfo(), true) . '<br>');
        }
    }
    
    public function alterar()
    {  
        $sql = 'UPDATE clientes SET cliente_nome = :nome, cliente_email = :email WHERE cliente_id = :id';
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $this->getId());
        $stmt->bindValue(':nome', $this->getNome());
        $stmt->bindValue(':email', $this->getEmail());
        
        if($stmt->execute()){
            return true;
        } else {
            die('<br>' . print_r($statement->errorInfo(), true) . '<br>');
        }
    }
    
    public function deletar()
    {  
        $sql = 'DELETE FROM clientes WHERE cliente_id = :id';
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $this->getId());
        
        if($stmt->execute()){
            return true;
        } else {
            die('<br>' . print_r($statement->errorInfo(), true) . '<br>');
        }
    } 
    
    function getDb()
    {
        return $this->db;
    }

    function getId()
    {
        return $this->id;
    }

    function getNome()
    {
        return $this->nome;
    }

    function getEmail()
    {
        return $this->email;
    }

    function setDb($db)
    {
        $this->db = $db;
        return $this;
    }

    function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }

    function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }
            
}

