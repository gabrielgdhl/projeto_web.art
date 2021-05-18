<?php

Login::usuarioNaoLogado();

if(isset($_FILES['foto']) && count($_POST) > 0){
    //adicionando array com as informações da foto
    $foto = $_FILES['foto'];
    if(Arquivo::validarArquivo($foto['type'], $foto['size'])){
        
        //instanciando um objeto de arquivo
        $objetoArquivo = new Arquivo($foto['name'], $foto['tmp_name']);

        if($objetoArquivo->uploadArquivo()){
            
            $contato = new Contato();
            $contato->nome      = Contato::filtraNome($_POST['nome']);
            $contato->email     = Contato::filtraEmail($_POST['email']);
            $contato->telefone  = Contato::filtraTelefone($_POST['telefone']);
            $contato->foto      = $objetoArquivo->nomeArquivo;
            $contato->id_usuario = $_SESSION['usuario']['id'];

            
            if(!isset($contato->nome , $contato->email, $contato->telefone, $contato->foto, $contato->id_usuario)){
                header("Location: cadastro.php?erro=2");
                exit;
            }
    
            
            $contato->inserirContato();
            header("Location: home.php?success=2");
            exit;
        }
        
    }else{
        header("Location: cadastro.php?erro=1");
    }

}

loadView('cadastro');


            
             

