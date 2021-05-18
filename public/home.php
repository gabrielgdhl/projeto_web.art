<?php
//CLASS RESPONSAVEL PELO AUTOLOAD
require_once __DIR__.'/../app/config/config.php';


//TEMPLATES DA PÁGINA
include 'header.php';

require_once CONTROLLER_PATH.'/listaControl.php';

include 'footer.php';
