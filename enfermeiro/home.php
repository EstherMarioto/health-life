<!DOCTYPE html>
<?php 
session_start();
include '../conexao/conexao.php';
?>
<html>
  <head>
    <meta charset="UTF-8">
    <!-- Última versão CSS compilada e minificada -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet"  href="css/stylebtn.css">
    <title>Home do enfermeiro</title>

  </head>

  <body>

    <?php

      $id = $_GET['id'];
      include 'header.php';
    ?>
    
    <br/>
    <div class="form-row">
      <div class="form-group col-md-0"> 
        <img src="https://img.icons8.com/material-rounded/26/000000/user-male-circle.png"/>
      </div>
      <div class="form-group col-md-0"> 
        <?php
          $sth = $pdo->prepare('select * from tbl_tipo_login where tipo_logi_codigo = :tipo');
          $sth->bindValue(':tipo', 1);
          $sth->execute();
          $resultado = $sth->fetch(PDO::FETCH_ASSOC);
          extract($resultado);
        ?>

        <h5><?php echo $tipo_logi_tipo ?></h5>

        </div>
      </div>
      </br></br>
      <div class="container" style="background-color: #1de9b6">
        <div class="row">
          <div class="col s2 m12 offset-m1 center" style="background-color: #1de9b6">
            </br>
            <figcaption>
              <?php 
                $sth = $pdo->prepare('select *from tbl_login where lo_codigo = :lo_codigo');
                $sth->bindValue(':lo_codigo', $_SESSION["health"]["id"]);
                $sth->execute();
                $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                extract($resultado);
                $sth = $pdo->prepare('select *from tbl_unidade where un_codigo = :lo_unidade');
                $sth->bindValue(':lo_unidade', $lo_unidade);
                $sth->execute();
                $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                extract($resultado);
                if($un_dtl_unidade == 2){
              ?>
              <form method="POST" action="pesquisar/search.php">
                <center>
                  <div class="form-row">
                    <div class="form-group col-md-10">
                      <div class="input-field">
                        <input class="form-control" type="text"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" name="pesquisar" placeholder="Pesquise o número do prontuário" aria-label="Search">
                      </div>
                    </div>
                    <div class="form-group col-md-2">
                      <button class="btn aqua-gradient btn-rounded btn-sm my-0" type="submit">Pesquisar</button>
                    </div>
                  </center>
                </div>   
              </form>
              <?php 
                }else{
              ?>
              <form method="POST" action="pesquisar/ubs.php">
                <center>
                  <div class="form-row">
                    <div class="form-group col-md-10">
                      <div class="input-field">
                        <input class="form-control" type="text"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" name="pesquisar" placeholder="Pesquise o número de inscrição" aria-label="Search">
                      </div>
                    </div>
                    <div class="form-group col-md-2">
                      <button class="btn aqua-gradient btn-rounded btn-sm my-0" type="submit">Pesquisar</button>
                    </div>
                  </center>
                </div>   
              </form>
              <?php 
                  };
                ?>
            </figcaption>
          </div>
        </div>
      </div>
      <br><br><br>

      <style>
        .container .row img{
          box-sizing: border-box;
          box-shadow: 0 20px 50px #333;
        }
        .container .row img:hover {
          background: #333;
          color: #fff;
        }
      </style>

      <div class ="container">
        <div class="row">
          <a href="mensagem.php"><img style="margin-left: 140px;" class="rounded-circle" src="img/mural.jpeg"></a>
          <a href="perfil/usuario.php"><img style="margin-left: 100px;" class="rounded-circle" src="img/usuario.png"></a>
          <a href="contato/addcontato.php?id=<?= $id;?>"><img style="margin-left: 100px;" class="rounded-circle" src="img/email.jpeg"></a>
        </div>
        <br/>
     
        <div class = "row">
          <h5 class="text-left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b> Mensagem </b>
          <h5 class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b> Perfil </b>
          <h5 class="text-right">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b> Contato </b>
     
        </div>
      </div>
      <br><br><br><br>
      <?php include '../footer.php' ?>
  </body>

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</html>