
<main class="col-lg-8">

        <div id="titul" class="titulo">
            <h1 class="align-self-center">Cadastro de Contatos</h1>
        </div>

        <form action="" method="post" enctype="multipart/form-data"> 
            <div class="form-goup mt-3">
                <label for="nome">NOME</label>
                <input class="form-control" type="text" name="nome" id="nome" placeholder="Digite seu nome">
                <spam id="div-nome-alert"></spam>
            </div>

            <div class="form-goup mt-3">
                <label for="email">E-MAIL</label>
                <input class="form-control" type="email" name="email" id="email" placeholder="Digite seu e-mail">
                <spam id="div-email-alert"></spam>
            </div>

            <div class="form-goup mt-3">
                <label for="telefone">TELEFONE</label>
                <input class="form-control" type="tel" maxlength="14" name="telefone" id="telefone" placeholder="(00)00000-0000">
                <spam id="div-telefone-alert"></spam>
            </div>

            <div class="form-goup mt-3">
                <label for="senha">FOTO</label>
                <input class="form-control-file" type="file" name="foto" id="foto">
                <small id='passwordHelpBlock' class='form-text'> Arquivos válidos: jpeg ou png</small>
                <spam id="div-foto-alert"></spam>
            </div>
            <button id="salvar" class="btn btn-primary mt-3">Cadastrar</button>
        </form>
        
</main>
