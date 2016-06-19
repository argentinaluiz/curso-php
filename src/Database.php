<?php

class Database
{
    private $db;
    private $id;
    private $nome;
    private $nota;
    
    public function __construct(\PDO $obj_db)
    {
        $this->db = $obj_db;
    }
    
    public function listar()
    {
        $sql = 'SELECT * FROM alunos';
        $stmt = $this->db->query($sql);
        
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    
    public function inserir()
    { 
        $sql = 'INSERT INTO alunos (aluno_nome, aluno_nota) VALUES (:nome, :nota)';
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':nome', $this->getNome(), PDO::PARAM_STR);
        $stmt->bindValue(':nota', $this->getNota(), PDO::PARAM_INT);
        
        if($stmt->execute()){
            return true;
        } else {
            die('<br>' . print_r($statement->errorInfo(), true) . '<br>');
        }
    }
    
    public function alterar()
    {  
        $sql = 'UPDATE alunos SET aluno_nome = :nome, aluno_nota = :nota WHERE aluno_id = :id';
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $this->getId());
        $stmt->bindValue(':nome', $this->getNome());
        $stmt->bindValue(':nota', $this->getNota());
        
        if($stmt->execute()){
            return true;
        } else {
            die('<br>' . print_r($statement->errorInfo(), true) . '<br>');
        }
    }
    
    public function deletar()
    {  
        $sql = 'DELETE FROM alunos WHERE aluno_id = :id';
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

    function getNota()
    {
        return $this->nota;
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

    function setNota($nota)
    {
        $this->nota = $nota;
        return $this;
    }
            
}

