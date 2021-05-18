<?php

function loadView($viewName, $parametros = array()){
    if(count($parametros) > 0){
        foreach($parametros as $key => $valor){
            ${$key} = $valor;
        }
    }
    
    require_once VIEW_PATH."/$viewName.php";
}