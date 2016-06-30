<?php

class Database
{
    private $db;
    private $id;
    private $nome;
    private $nota;
    private $table = 'alunos';
    
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
    
    public function listar_pelo_id($id){
        $sql = 'SELECT * FROM ' . $this->getTable() . ' WHERE aluno_id = :aluno_id';
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':aluno_id', $id);
        
        if($stmt->execute()){
            return $stmt->fetch(\PDO::FETCH_ASSOC);
        } else {
            die('<br>' . print_r($stmt->errorInfo(), true) . '<br>');
        }
    }
    
    public function listar_user($user, $pass){
        $sql = 'SELECT * FROM ' . $this->getTable() . ' WHERE aluno_id = :id';
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id);
        
        if($stmt->execute()){
            return $stmt->fetch(\PDO::FETCH_ASSOC);
        } else {
            die('<br>' . print_r($stmt->errorInfo(), true) . '<br>');
        }
    }

    public function inserir()
    { 
        $sql = 'INSERT INTO alunos (aluno_nome, aluno_nota) VALUES (:aluno_nome, :aluno_nota)';
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':aluno_nome', $this->getNome(), PDO::PARAM_STR);
        $stmt->bindValue(':aluno_nota', $this->getNota(), PDO::PARAM_INT);
        
        if($stmt->execute()){
            return true;
        } else {
            die('<br>' . print_r($stmt->errorInfo(), true) . '<br>');
        }
    }
    
    public function alterar($id)
    {  
        $sql = 'UPDATE ' . $this->getTable() . ' SET aluno_nome = :aluno_nome, aluno_nota = :aluno_nota WHERE aluno_id = :aluno_id';
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':aluno_id', $id);
        $stmt->bindValue(':aluno_nome', $this->getNome());
        $stmt->bindValue(':aluno_nota', $this->getNota());
        
        if($stmt->execute()){
            return true;
        } else {
            die('<br>' . print_r($stmt->errorInfo(), true) . '<br>');
        }
    }
    
    public function deletar($id)
    {  
        $sql = 'DELETE FROM ' . $this->getTable() . ' WHERE aluno_id = :id';
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id);
        
        if($stmt->execute()){
            return true;
        } else {
            die('<br>' . print_r($stmt->errorInfo(), true) . '<br>');
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
    
    function getTable()
    {
        return $this->table;
    }

    function setTable($table)
    {
        $this->table = $table;
        return $this;
    }
}