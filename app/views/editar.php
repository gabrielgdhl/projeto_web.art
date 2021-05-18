
<main class="col-lg-8">

        <div id="titul" class="titulo">
            <h1 class="align-self-center">Editar Contatos</h1>
        </div>

        <form action="editar.php?editar=1" method="post" enctype="multipart/form-data"> 
            <div class="form-goup mt-3">
                <label for="nome">NOME</label>
                <input class="form-control" type="text" value="<?= $nome ?>" name="nome" id="nome">
                <spam id="div-nome-alert"></spam>
            </div>

            <div class="form-goup mt-3">
                <label for="email">E-MAIL</label>
                <input class="form-control" type="email" value="<?= $email ?>" name="email" id="email" placeholder="Digite seu e-mail">
                <spam id="div-email-alert"></spam>
            </div>

            <div class="form-goup mt-3">
                <label for="telefone">TELEFONE</label>
                <input class="form-control" type="string"  maxlength="14" value="<?= $telefone?>" name="telefone" id="telefone" placeholder="(00)00000-0000">
                <spam id="div-telefone-alert"></spam>
            </div>

            <div class="form-goup mt-3">
                <label for="senha">FOTO</label>
                <input class="form-control-file" type="file" name="foto"  id="foto">
                <small id='passwordHelpBlock' class='form-text'><?=$foto ?></small>
                <spam id="div-foto-alert"></spam>
            </div>

            <input type="hidden" name="fotoNome" value="<?=$foto ?>">
            <input type="hidden" name="id" value="<?=$id ?>">

            <button id="editar" class="btn btn-primary mt-3">Editar</button>
        </form>
        
</main>
