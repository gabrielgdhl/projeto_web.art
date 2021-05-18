<?php

class Database{

    /**
     * endereço do host de banco de dados
     * @var string 
     */
    private $host = '127.0.0.1';

    /**
     * variável com usuario do banco de dados
     * @var string
     */
    private $username = 'root';

     /**
     * variável com a senha do banco de dados
     * @var array
     */
    private $password = '';

    /**
     * variável com o nome do Banco de dados
     * @var array
     */
    private $database = 'projeto_webart';

    /**
     * nome da tabela a ser modificada
     * @var string
     */
    private $nomeTabela;
    
    /**
     * variavel para guardar a conexao
     * @var PDO
     */
    private $conexao;

    
    function __construct($tabela = null){
        $this->nomeTabela = $tabela;
        $this->connection();
    }

    /**
     * Metodo que inicia conexão com BD
     * @return Conexao
     */
    public function connection(){

        try{
            $this->conexao = new PDO('mysql:host='.$this->host.';dbname='.$this->database, $this->username, $this->password);
            $this->conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $err){
            header('Location: index.php?erro=10');
            exit;
        }

    }// fim do método connection


    /**
     * @param string $query pra execução
     * @param array params
     * @return PDOStatement
     */
    public function executaQuery($query, $parametroExec = []){
        try{
            $statement = $this->conexao->prepare($query);
            $statement->execute($parametroExec);
            return $statement;
        }catch(PDOException $err){
            echo $err->getMessage();
            //header('Location: index.php?erro=11');
            exit;
        }
    }

    /**
     * Método pra cadastrar usúario no BD
     */
    public function inserir($valores){        
        $colunas = array_keys($valores);
        $binds = array_pad([], count($valores), '?');

        $query = 'INSERT INTO '. $this->nomeTabela. '('.implode(',', $colunas).') VALUES ('.implode(',', $binds).')';

        $this->executaQuery($query, array_values($valores));

        //retorna o ID
        return $this->conexao->lastInsertId();
       
    }

     /**
     * Método que vai gerar Query SELECT
     * @param array[filtros para consulta ex: ID = 1]
     * @param string define as colunas que vão ser buscadas no BD
     * @return string ou null
     */
    public function select($where = [], $colunas = '*', $order = null , $limit = null ){

        //formatar query
        $limite = strlen($limit) ? $limit : '';
        $ordem = strlen($order) ? $order : '';
        $query = 'SELECT '. $colunas .' FROM '. $this->nomeTabela . static::formatarWhere($where).' '. $limite;

        //executa e retorna valores
        return $this->executaQuery($query);

    }

    /**
     * método para atualizar os dados no BD
     * @param string com o valor do were
     * @param array com as chaves e valores vindo do model
     */
    public function update($where, $set){
        $colunas = array_keys($set);
        //formatar query
        $query = 'UPDATE '. $this->nomeTabela .' SET '.implode(' =?,', $colunas).' =? WHERE '.$where;
        
        $this->executaQuery($query, array_values($set));
        return true;
    }

    /**
     * método pra excluir dados do BD
     * @param string
     * @return boolean
     */
    public function delete($id){

        //formatar query
        $query = 'DELETE FROM '.$this->nomeTabela.' WHERE id = '.static::parametroFormatadoWhere($id);
        
        $this->executaQuery($query);
        return true;

    }

    /**
     * Método que vai adcionar os filtros das colunas
     * @return string com os filtros
     */
    private static function formatarWhere($filtros = []){

        $filtro = '';

        if(count($filtros) > 0){
            $filtro .= ' WHERE 1 = 1';
            
            foreach($filtros as $coluna => $valor){
                
                $filtro .= ' AND '.$coluna.' = '. static::parametroFormatadoWhere($valor);
                
            }
        }

        return $filtro;        
    }

    /**
     * formatar valor da comparação para colocar aspas a string
     * @param string or numero
     * @return valor formatado
     */
    private static function parametroFormatadoWhere($valor){
        if(is_null($valor)){
            return "null";
        }
        else if(gettype($valor) == 'string'){
            return "'$valor'";
        }
        else{
        return $valor;
        }
    }

 


}//fim da classe