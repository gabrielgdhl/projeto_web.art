<?php

class Arquivo {

    /**
     * variavel responsavel por guardar o nome do arquivo
     * @var string nome do arquivo
     */
    public $nomeArquivo;

    /**
     * variavel para guardar o caminho do repositório temporario do arquivo
     * @var string nome do diretorio temporario do arquivo
     */
    private $nomeDiretorioArquivoTemp;


    public function __construct($nomeFile, $dirTempFile){
        $this->nomeArquivo              = self::nomeArquivoFormatado($nomeFile);
        $this->nomeDiretorioArquivoTemp = $dirTempFile;
    }

    /**
     * método responsavel por enviar as fotos para repositorio upload
     * @param file
     * @return boolean
     */
    public function uploadArquivo(){
        
        try{
            move_uploaded_file($this->nomeDiretorioArquivoTemp, UPLOAD_PATH.'/'.$this->nomeArquivo);
            return true;

        }catch(Exception $err){
            return false;
        }
    }

    /**
     * método responsavel por formatar o nome do arquivo
     * @param string nome do arquivo vindo do formulario
     * @return string com o nome do arquivo formatado
     */
    public static function nomeArquivoFormatado($nomeArquivo){
        
        $nomeArquivoFormatado = '';
        $nomeArquivoFormatado .= str_replace(':','-', date('d-m-Y-H-i-s-'));
        $nomeArquivoFormatado .= str_replace(' ', '-', $nomeArquivo);
        
        return $nomeArquivoFormatado;
                
    }

    /**
     * método responsavel por validar o arquivo vindo do formulario
     * @param string com informações do tipo do arquivo
     * @param string com informações do tamanho do arquivo
     * @return boolean
     */
    public static function validarArquivo($tipoArquivo, $tamanhoArquivo){

        if(($tipoArquivo !== 'image/png' && $tipoArquivo !== 'image/jpeg') || ($tamanhoArquivo > 5000000)) 
            return false;
        
        return true;


    }


}