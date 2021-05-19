<?php

class Login {

    public static function validaLogin($email, $senha){
        
        if($usuario = self::filtraEmailLogin($email)){
            if(password_verify($senha, $usuario->getSenha()))
                self::iniciaSessao($usuario);
        }
        return false;
    }

    /**
     * método que inicia a sessão
     */
    public static function iniciaSessao($usuario){
        session_start();        

        $_SESSION['usuario'] =['id'=> $usuario->id, 
                               'nome'=>$usuario->nome];
        header("Location: home.php");
    }
    /**
     * filtra email
     * @param string com o emal enviado pelo usuário
     * @return Usuario
     */
    public static function filtraEmailLogin($email){
        $email = trim($email);
        
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            return null;
        }

        /**
         * objeto que vai guardar as informações do usuario
         */
        if($usuario = Usuario::buscarUmContatoEmail($email)){
            return $usuario;
        }
        
        
        
        return null;
    }

    /**
     * verifica sessao
     * @return boolean
     */
    public static function validaSessao(){
        if(session_status() !== PHP_SESSION_ACTIVE){
            session_start();
        }
        
        return isset($_SESSION['usuario']['id']);
    }

    /**
     * verifica se o usuario esta logado
     */
    public static function usuarioLogado(){
        if(self::validaSessao()){
           header("Location: home.php");
        }
    }

    /**
     * verifica se o usuario esta logado
     */
    public static function usuarioNaoLogado(){
        if(!self::validaSessao()){
           header("Location: index.php");
        }
    }

    /**
     * sair da sessaõ
     */
    public static function sairSessao(){
        session_start();
        session_destroy();
        header("Location: index.php");
    }

}