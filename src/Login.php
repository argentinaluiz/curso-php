<?php
include_once 'Database.php';

class Login extends Database{ 
    private $login;
    private $senha;
    
    public function __construct(\PDO $obj_db)
    {
        parent::__construct($obj_db);
    }


    public function getLogin()
    {
        return $this->login;
    }

    public function getSenha()
    {
        return $this->senha;
    }

    public function setLogin($login)
    {
        $this->login = $login;
        return $this;
    }

    public function setSenha($senha)
    {
        $this->senha = $senha;
        return $this;
    }

        
    public function autentica(){        
        $user = trim($this->getLogin());
        $pass = trim(md5($this->getSenha()));
        
        $resultado = $this->listar_usuario($user, $pass);
        
        if(empty($resultado)){
            return false;
        } else {
            session_start();
            $_SESSION['permissao'] = true;           
            $_SESSION['nivel'] = $resultado['usuario_nivel'];           
            $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
            $_SESSION['navegador'] = $_SERVER['HTTP_USER_AGENT'];
            return true;
        }        
    }
    
    public function logout(){
        if(isset($_SESSION)){
            unset($_SESSION['permissao']);
            unset($_SESSION['nivel']);
            unset($_SESSION['ip']);
            unset($_SESSION['navegador']);
            session_destroy();
            return true;
        } else {
            return false;
        }
    }

    public function session_check(){
        if(isset($_SESSION) && !empty($_SESSION)){
            if($_SESSION['permissao']){
                return true;      
            }
        }
    }
    
}

