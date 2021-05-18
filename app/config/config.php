<?php

/**
 * Configurando timezone
 */
date_default_timezone_set('America/Manaus');

/**
 * Configurando idioma
 */
setlocale(LC_TIME, 'pt_br', 'pt_br.utf-8', 'portuguese');

/**
 * constantes com nome dos pacotes
 */
define('CONTROLLER_PATH', realpath(dirname(__FILE__,2). '/controllers'));
define('MODEL_PATH', realpath(dirname(__FILE__,2). '/models'));
define('VIEW_PATH', realpath(dirname(__FILE__,2). '/views'));
define('UPLOAD_PATH', realpath(dirname(__FILE__,2). '/assets/upload/'));
define('EXIBE_IMG_PATH', '../app/assets/upload');

/**
 * Classes incluidas no autoload
 */


 //classe de conexao com BD
 require_once 'Database.class.php';
 require_once 'loader.php';


 //models 
 require_once MODEL_PATH.'/Contato.class.php';
 require_once MODEL_PATH.'/Usuario.class.php';
 require_once MODEL_PATH.'/Arquivo.class.php';
 require_once MODEL_PATH.'/Login.class.php';
 
 