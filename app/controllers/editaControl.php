<?php

Login::usuarioNaoLogado();

if(isset($_GET['editar']) && count($_POST) > 0){

    //passo para verifcar a existencia de arquivo no update
    $foto = isset($_FILES) ? $_FILES['foto'] : null;
    
    //faz as validações para instanciar um arquivo
    $objetoArquivo = (isset($foto) && Arquivo::validarArquivo($foto['type'], $foto['size'])) ? 
        new Arquivo($foto['name'], $foto['tmp_name']) : null;
    
    //verifica se foi instanciado o arquivo e atribui valor ao nome do arquivo que será enviado ao BD e envia o arquivo para o upload
    $nomeArquivo = $_POST['fotoNome'];

    if(isset($objetoArquivo)){
        $nomeArquivo = $objetoArquivo->nomeArquivo;
        $objetoArquivo->uploadArquivo();
    }    
    
       
    $contato = new Contato();
    $contato->id = $_POST['id']; 
    $contato->nome = Contato::filtraNome($_POST['nome']);
    $contato->email = Contato::filtraEmailAlterar($_POST['email']);
    $contato->telefone = Contato::filtraTelefone($_POST['telefone']);
    $contato->foto = $nomeArquivo;

    if(!isset($contato->nome, $contato->email, $contato->telefone)){
        header('Location: home.php?erro=5');
        exit;
    }
            
    $contato->atualizarContato();
    header('Location: home.php?success=5');
    exit;

        
    }



if(!isset($parametroGetId) || !is_numeric($parametroGetId))
    $contato = isset($_GET['id']) ? Contato::buscarUmContato($_GET['id']) : null ;


loadView('editar', ['nome'=>$contato->nome,
                    'email'=>$contato->email,
                    'telefone'=>$contato->telefone,
                    'foto'=>$contato->foto,
                    'id'=>$_GET['id']]);




