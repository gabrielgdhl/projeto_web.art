<?php

// Login::usuarioNaoLogado();


if(count($_POST) > 0){

    $usuario = new Usuario();
    $usuario->nome      = Contato::filtraNome($_POST['nome']);
    $usuario->email     = Contato::filtraEmail($_POST['email'], $usuario->nomeTabela);
    $usuario->formataSenha($_POST['senha']);

    if(!isset($usuario->nome, $usuario->email)){
        header("Location: cadUsuario.php?erro=1");
        exit;
    }

    $usuario->salvarUsuario();
    header("Location: index.php?success=1");
    exit;
}

//loader da view
loadView('cadastroUsuario');