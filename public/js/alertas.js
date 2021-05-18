/***
 * function para verificar se os campos foram preenchidos
 * e gerar uma mensagem de erro no campo se não estiver preenchido
 */
 $("#salvar").click(function(){
        /**
         * variavel que vai guaradar o estado do formulario se é vazio ou preeenchido
         * @var boolean
         */
        var campo_vazio = false;

        
        let regexNome = /^[A-zÀ-ú\s]+$/;
        if($('#nome').val() == '' || !regexNome.test($('#nome').val())){
            $('#nome').css({'border-color': '#A94442'});
            $("#div-nome-alert").empty();
            $("#div-nome-alert").append("<small id='passwordHelpBlock' class='form-text text-danger '> Nome é obrigatório!</small>");
            campo_vazio = true;
        }

        if($('#email').val() == ''){
            $('#email').css({'border-color': '#A94442'});
            $("#div-email-alert").empty();
            $("#div-email-alert").append("<small id='passwordHelpBlock' class='form-text text-danger '> E-mail é obrigatório!</small>");
            campo_vazio = true;
        }

        let regexTelefone = /^\([0-9]{2}\)[0-9]{5}-[0-9]{4}$/;
        if($('#telefone').val() == '' || !regexTelefone.test($('#telefone').val())){
            $('#telefone').css({'border-color': '#A94442'});
            $("#div-telefone-alert").empty();
            $("#div-telefone-alert").append("<small id='passwordHelpBlock' class='form-text text-danger '> Telefone é obrigatório!</small>");
            campo_vazio = true;
        }

        if($('#foto').val() == ''){
            $('#foto').css({'border-color': '#A94442'});
            $("#div-foto-alert").empty();
            $("#div-foto-alert").append("<small id='passwordHelpBlock' class='form-text text-danger '> Adicione uma foto!</small>");
            campo_vazio = true;
        }

        //verifica se existe campo vazio
        //se sim retorna false e cancela o envio do formulario
        if(campo_vazio) return false;
    })

/***
 * function para verificar se os campos foram preenchidos
 * e gerar uma mensagem de erro no campo se não estiver preenchido
 */
 $("#editar").click(function(){
    /**
     * variavel que vai guaradar o estado do formulario se é vazio ou preeenchido
     * @var boolean
     */
    var campo_vazio = false;

    let regexNome = /^[A-zÀ-ú\s]+$/;
    if($('#nome').val() == '' || !regexNome.test($('#nome').val())){
        $('#nome').css({'border-color': '#A94442'});
        $("#div-nome-alert").empty();
        $("#div-nome-alert").append("<small id='passwordHelpBlock' class='form-text text-danger '> Nome inválido, verifique a ortografia!</small>");
        campo_vazio = true;
    }

    if($('#email').val() == ''){
        $('#email').css({'border-color': '#A94442'});
        $("#div-email-alert").empty();
        $("#div-email-alert").append("<small id='passwordHelpBlock' class='form-text text-danger '> E-mail é obrigatório!</small>");
        campo_vazio = true;
    }
    
    let regexTelefone = /^\([0-9]{2}\)[0-9]{5}-[0-9]{4}$/;
    if($('#telefone').val() == '' || !regexTelefone.test($('#telefone').val())){
        $('#telefone').css({'border-color': '#A94442'});
        $("#div-telefone-alert").empty();
        $("#div-telefone-alert").append("<small id='passwordHelpBlock' class='form-text text-danger '> Verifique se está digitando no formato certo!</small>");
        campo_vazio = true;
    }

    //verifica se existe campo vazio
    //se sim retorna false e cancela o envio do formulario
    if(campo_vazio) return false;
})

$("#excluir").click(function(){
    
    if(confirm('Deseja excluir o contato?')){
        return true;
    }

    return false;
})



