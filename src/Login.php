<?php
include_once 'Database.php';

class Login extends Database{    
    
    public function login_user($username, $password){        
        $user = trim($username);
        $pass = trim(md5($password));
               
        $resultado = $this->listar_usuario($user, $pass);
        
        if(empty($resultado)){
            return false;
        } else {
            session_start();
            $_SESSION['permissao'] = true;
            $_SESSION['token'] = md5(date('Y-m-d'));
            $_SESSION['id_user'] = $resultado['user_id'];
            $_SESSION['login'] = $resultado['user_login'];
            $_SESSION['nome_user'] = $resultado['user_nome'];            
            $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
            $_SESSION['navegador'] = $_SERVER['HTTP_USER_AGENT'];          
           
        }
        
    }
    
    public function logout(){
        if(isset($_SESSION)){
            unset($_SESSION['permission']);
            unset($_SESSION['token']);
            unset($_SESSION['id_user']);
            unset($_SESSION['login']);
            unset($_SESSION['nome_user']);
            unset($_SESSION['ip']);
            unset($_SESSION['navegador']);
            session_destroy();
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

