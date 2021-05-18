<?php

Login::usuarioNaoLogado();



if(isset($_GET['id'], $_GET['delete']))
    Contato::excluirContato($_GET['id']);

$contatos = Contato::listarContatosTela(['id_usuario'=>$_SESSION['usuario']['id']]);//colocar id_usuario


loadView('tabela', ['contatos' => $contatos]);
