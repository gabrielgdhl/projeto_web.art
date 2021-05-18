<?php

class Usuario{
    /**
    * nome da tabela no banco de dados do sistema
    * @var string
    */
    public $nomeTabela = 'usuarios';

    /**
    * id do usuario no bd
    * @var int
    */
    public $id;

    /**
     * nome do usuario
     * @var string
     */
    public $nome;

    /**
     * email do usuario
     * @var string
     */
    public $email;

    /**
     * senha do usuario
     * @var string
     */
    private $senha;

    public function getSenha(){
        return $this->senha;
    }

    /**
     * método responsavel por limpar espaçoes e criptografar a senha
     */
    public function  formataSenha($senha){
        $senhaFormatada = trim($senha);
        $this->senha =  password_hash($senhaFormatada, PASSWORD_DEFAULT);
    }
    
    /**
     * método responsavel por inserir um Usuario no banco de dados
     * @return boolean
     */
    public function salvarUsuario(){
        $bd = new Database($this->nomeTabela);
        $this->id = $bd->inserir([
                                    'nome'      => $this->nome,
                                    'email'     => $this->email,
                                    'senha'     => $this->senha
                                ]);
        return true;
    }

    /**
     * método que busca um USUARIO no banco de dados
     * @param array[condicoes];
     * @return Contato instancia do tipo contato
     */
    public static function buscarUmContatoEmail($valor){
        return (new Database('usuarios'))->select(['email'=>$valor])->fetchObject(self::class);
        
     }
}