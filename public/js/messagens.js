const urlParametros = new URLSearchParams(window.location.search);

const parametroSuccess = urlParametros.get('success');
const parametroErro = urlParametros.get('erro');
const url = window.location.pathname;


if(!!parametroErro || !!parametroSuccess){
    //verifica se está na página
    if((url.indexOf('home.php') !== -1)){
        
        //verifica parametro sucesso
        if(parametroSuccess == 1){
            $('#alerta').append(`<div class='alert alert-success role='alert'>
                                    Cadastro realizado com sucesso!
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button></div>`);
        }else if(parametroSuccess == 2){
            $('#alerta').append(`<div class='alert alert-success' role='alert'>
                                    Cadastro editado com sucesso!
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button></div>`);
        }
    }

    if((url.indexOf('cadastro.php') !== -1) || (url.indexOf('editar.php') !== -1) ){
        
        //verifica parametro sucesso
        if(parametroErro == 1){
            $('#alerta').append(`<div class='alert alert-danger role='alert'>
                                    Preencha corretamente os dados do seu contato, o e-mail não pode ser duplicado!
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button></div>`);
        }
    }

    if((url.indexOf('cadUsuario.php') !== -1)){
        
        //verifica parametro sucesso
        if(parametroErro == 1){
            $('#alerta').append(`<div class='alert alert-danger role='alert'>
                                    Preencha corretamente os seus dados, o e-mail não pode ser duplicado!
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button></div>`);
        }
        if(parametroSuccess == 1){
            $('#alerta').append(`<div class='alert alert-success role='alert'>
                                    Cadastro realizado com sucesso!
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button></div>`);
        }
    }

    if((url.indexOf('index.php') !== -1)){
        
        //verifica parametro sucesso
        if(parametroSuccess == 1){
            $('#alerta').append(`<div class='alert alert-success role='alert'>
                                    Cadastro realizado com sucesso!
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button></div>`);
        }
    }


}