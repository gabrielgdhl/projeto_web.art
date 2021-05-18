<?php

class Contato{

  /**
    * nome da tabela no banco de dados do sistema
    * @var string
    */
   private $nomeTabela = 'contatos';

    /**
     * id do contato no bd
     * @var int
     */
    public $id;

    /**
     * id do usuario que é dono da informação
     * @var int
     */
    public $id_usuario;

    /**
     * nome do contato
     * @var varchar
     */
    public $nome;

    /**
     * email do contato no bd
     * @var varchar
     */
    public $email;
    
    /**
     * telefone do contato no bd
     * @var varchar
     */
    public $telefone;


    /**
     * id do contato no bd
     * @var foto
     */
    public $foto;

    /**
     * método responsavel por inserir o contato no banco de dados
     * @return boolean
     */
    public function inserirContato(){
        $bd = new Database($this->nomeTabela);
        $this->id = $bd->inserir([
                                    'nome'      => $this->nome,
                                    'email'     => $this->email,
                                    'telefone'  => $this->telefone,
                                    'foto'      => $this->foto,
                                    'id_usuario'=> $this->id_usuario
                                ]);
        return true;
    }

    /**
     * método que busca os contatos no banco de dados
     * @param array[condicoes], string de colunas, strind de ordem, numeric quantidade;
     * @return Contato instancias do tipo contato
     */
    public static function buscarContatos($where = [], $colunas = '*', $order = null , $limit = null){
        $db = new Database('contatos');
        return $db->select($where, $colunas, $order, $limit)->fetchAll(PDO::FETCH_CLASS, self::class);
       
    }

    /**
     * método que busca um contato no banco de dados
     * @param array[condicoes];
     * @return Contato instancia do tipo contato
     */
    public static function buscarUmContato($valor){
       return (new Database('contatos'))->select(['id'=>$valor])->fetchObject(self::class);
       
    }

    /**
     * metodo pra atualizar as informações do contato
     * @return boolean
     */
    public function atualizarContato(){
        return (new Database('contatos'))->update('id='.$this->id, [
                                                                      'nome'      => $this->nome,
                                                                      'email'     => $this->email,
                                                                      'telefone'  =>$this->telefone,
                                                                      'foto'      =>$this->foto
                                                                      ]);
    }

    /**
     * método para excluir usuário do BD
     * @param int 
     * @return boolean
     */
    public static function excluirContato($id){
        return (new Database('contatos'))->delete($id);
    }

    /**
     * método para validar os nomes 
     * @param string
     */
    public static function filtraNome($nome){
        $nome = trim($nome);
        if(!preg_match("/^[A-zÀ-ú\s]+$/", $nome))
            return null;
        
        return $nome;
    }

    /**
     * método responsável por validar o email
     * @param string com email enviado pelo usuario
     * @return string
     */
    public static function filtraEmail($email, $tabela = null){
        
        $tabelaFomatada = isset($tabela)? $tabela : 'contatos';

        $objBancoDados = new Database($tabelaFomatada);
        $email = trim($email);
       
        if($objBancoDados->select(['email' => $email], 'email')->fetch()){
            return null;
        }
        
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            return null;
        }
        
        return $email;
    }

    /**
     * método que valida o telefone
     * @param string
     * @return boolean
     */
    public static function filtraTelefone($telefone){

        if(!preg_match("/^\([0-9]{2}\)[0-9]{5}-[0-9]{4}$/", $telefone)) return null;
        
        return $telefone;
    }

    /**
     * método responsável por validar o email para edição
     * @param string com email enviado pelo usuario
     * @return string
     */
    public static function filtraEmailAlterar($email){

        $email = trim($email);
        
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            return null;
        }
        
        return $email;
    }

    public static function listarContatosTela($where = []){
        
        $listaContatos = '';

        //buscando instancia no BD
        $contatos = self::buscarContatos($where);
        
        //verifica se existe instancia
        if(!$contatos){
            return '<tr>
                        <td style="text-align:center;" colspan="6">
                            <h1> Adicione itens a lista!! </h1>
                        </td>
                    </tr>';
        }

        foreach($contatos as $contato){

            $listaContatos .= ' <tr >
                                        <td>
                                            <img width="30" src="'.EXIBE_IMG_PATH.'/'.$contato->foto.'" />
                                        </td>
                                        <td>'.$contato->nome.'</td>
                                        <td>'.$contato->email.'</td>
                                        <td>'.$contato->telefone.'</td> 
                                        <td>
                                            <a class="btn btn-success" href="editar.php?id='.$contato->id.'">Editar</a>
                                        </td>
                                        <td>
                                            <a class="btn btn-danger" id ="excluir" href="home.php?id='.$contato->id.'&delete=1">Excluir</a>
                                        </td>
                                    </tr>';
        }

        return $listaContatos;

    }

    
}//fim da classe Usuário