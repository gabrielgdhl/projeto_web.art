<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/header.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    

    <title>Projeto webart</title>
  </head>
  <body>
    <nav class="navbar navbar-dark bg-dark text-white">
      <h1>webart Projeto</h1>
    </nav>
    <div class="container d-flex justify-content-center">
        <main class="col-lg-8">

                <div id="titul" class="titulo">
                    <h1 class="align-self-center">Cadastro de Usuário</h1>
                </div>

                <form action="" method="post"> 
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
                        <label for="senha">SENHA</label>
                        <input class="form-control" type="password" name="senha" id="senha" placeholder="Digite sua senha">
                        <spam id="div-senha-alert"></spam>
                    </div>

                    <button id="cadUser" class="btn btn-primary mt-3">Cadastrar</button>
                </form>
                <div class="mt-3">
                    <a href="index.php">Já possui conta?</a>
                </div>
                
        </main>
