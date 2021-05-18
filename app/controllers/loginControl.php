<?php

//Login::usuarioLogado();

if(count($_POST) > 1){
    
    Login::validaLogin($_POST['email'], $_POST['senha']);
}


loadView('login');