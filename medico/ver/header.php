<!doctype html>

<?php
include '../../conexao/conexao.php';
?>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Health & Life</title>
  </head>
  <body>

   <nav class="navbar fixed-top navbar-expand-lg navbar-light " style="background-color: #1de9b6;">
   <img src="../../img/logo" alt="logo do Health & Life" width='40' height='40' />
  <span>&nbsp;&nbsp;&nbsp;</span>
      <a class="navbar-brand" href="../home.php"><span class="text-white"><i><b>Health & Life</b></i><span></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"></button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        </ul>
        <form class="form-inline my-2 my-lg-0">
    
          <div class="nav-item">
            <a class="nav-link" href="../perfil/usuario.php"><span class="text-white">Usuário </span></a>
          </div>

          <div class="nav-item">
            <a class="nav-link" href="../contato/addcontato.php"><span class="text-white">Contato </span></a>
          </div>
          <div class="nav-item">
            <a class="nav-link" href="../pesquisar/formulario_pacientes.php"><span class="text-white">Pacientes </span></a>
          </div>
          <div class="nav-item">
          <a class="nav-link" href="../../sair.php"> <span class="text-white"> Sair </span></a>
          </div>

        </form>
      </div>
    </nav>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>