﻿<?php
  session_start();
  include '../conexao/conexao.php';
  
  $id = $_GET['id'];
  $mu_codigo = filter_input(INPUT_POST, 'mural', FILTER_DEFAULT);

  $sth = $pdo->prepare('select * from tbl_login where lo_codigo = :lo_codigo');
  $sth->bindValue(':lo_codigo',  $_SESSION["health"]["id"]);
  $sth->execute();
  $resultado = $sth->fetch(PDO::FETCH_ASSOC);
  extract($resultado);
  $sth = $pdo->prepare('select * from tbl_unidade where un_codigo = :un_codigo');
  $sth->bindValue(':un_codigo', $lo_unidade);
  $sth->execute();
  $resultado = $sth->fetch(PDO::FETCH_ASSOC);
  extract($resultado);
 
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet"  href="../paciente/style.css">
    <title>Health & Life</title>
  </head>
  <body>
  <nav class="navbar fixed-top navbar-expand-lg navbar-light" style="background-color: #1de9b6">

  <img src="../img/logo" alt="logo do Health & Life" width='40' height='40' />
  <span>&nbsp;&nbsp;&nbsp;</span>
      <a class="navbar-brand" href="home.php"><span class="text-white"><i><b>Health & Life</b></i><span></a> 
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        </ul>
        <form class="form-inline my-2 my-lg-0">
        <div class="row">
          <div class="nav-item dropdown">
            <ul class="navbar-nav mr-auto">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown " role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="text-white"> Contato </span>
              </a>
              <div class="dropdown-menu " aria-labelledby="navbarDropdown">
                <a class="dropdown-item " href="mensagem/mensagem_enfermeiro.php">Contato Enfermeiro</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="mensagem/mensagem_medico.php">Contato Médico</a>
                <div class="dropdown-divider"></div>
                <?php if($un_dtl_unidade == 2 ){ ?>
                <a class="dropdown-item" href="mensagem/mensagem_pac.php">Contato Paciente</a>
                <?php }else{ ?>
                <a class="dropdown-item" href="mensagem/mensagem_paciente.php">Consultas Paciente</a>
                <?php }; ?>
              </div>
            </div>
          </ul>
            <ul class="navbar-nav mr-auto">
              <a class="nav-link" href="http://localhost/health&Life/mibew/operator"> <span class="text-white"> Atendimento Online </span></a>
              <a class="nav-link" href="solicitacao/pesquisa_pacientes.php"> <span class="text-white"> Solicitações </span></a>
              <a class="nav-link" href="publicacoes/publicacoes.php"> <span class="text-white">Publicações </span></a>
              <a class="nav-link" href="pesquisar/pesquisas.php"> <span class="text-white"> Pesquisar </span></a>
              <a class="nav-link" href="../sair.php"> <span class="text-white"> Sair </span></a>
              <a  class="nav-link" href="contato/selectcontato.php">
                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30" viewBox="0 0 172 172"style=" fill:#000000;">
                  <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                    <path d="M0,172v-172h172v172z" fill="none">
                    </path>
                      <g fill="#ffffff">
                        <path d="M86,17.2c-6.33533,0 -11.46667,5.13133 -11.46667,11.46667v1.50052c-19.76997,5.10025 -34.4,23.004 -34.4,44.36615v13.72864c0,9.116 -1.8722,18.07416 -5.3638,26.40469h102.46094c-3.4916,-8.3248 -5.3638,-17.28869 -5.3638,-26.40469v-13.72864c0,-21.36214 -14.63003,-39.26589 -34.4,-44.36615v-1.50052c0,-6.33533 -5.13133,-11.46667 -11.46667,-11.46667zM28.66667,126.13333c-2.06765,-0.02924 -3.99087,1.05709 -5.03322,2.843c-1.04236,1.78592 -1.04236,3.99474 0,5.78066c1.04236,1.78592 2.96558,2.87225 5.03322,2.843h41.14114c-0.65925,1.83997 -1.00007,3.77884 -1.00781,5.73333c0,9.4993 7.7007,17.2 17.2,17.2c9.4993,0 17.2,-7.7007 17.2,-17.2c-0.00415,-1.95384 -0.34118,-3.8927 -0.99661,-5.73333h41.12995c2.06765,0.02924 3.99087,-1.05709 5.03322,-2.843c1.04236,-1.78592 1.04236,-3.99474 0,-5.78066c-1.04236,-1.78592 -2.96558,-2.87225 -5.03322,-2.843h-57.33333z">
                        </path>
                      </g>
                  </g>
                </svg>
              </a>
            </ul>
          </div>
        </form>
      </div>
  </nav>

  <br>

  <div class="form-row">
    <div class="form-group col-md-0"> 
      <img src="https://img.icons8.com/material-rounded/26/000000/user-male-circle.png"/>
    </div>
    <div class="form-group col-md-0"> 
      <?php
        $sth = $pdo->prepare('select * from tbl_tipo_login where tipo_logi_codigo = :tipo');
        $sth->bindValue(':tipo', 3);
        $sth->execute();
        $resultado = $sth->fetch(PDO::FETCH_ASSOC);
        extract($resultado);
      ?>

      <h5><?php echo $tipo_logi_tipo ?></h5>

    </div>
  </div>  
   
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  
    </ol>
      
    <div class="carousel-inner">
      <div class="carousel-item active">
        <?php
          $sth = $pdo->prepare('select * from tbl_mural where mu_tipo = :mu_tipo order by mu_codigo desc ');
          $sth->bindValue(':mu_tipo', 1);
          $sth->execute();
          $resultado = $sth->fetch(PDO::FETCH_ASSOC);
          extract($resultado);

          echo "<img src='../secretario/publicacoes/img/" . $mu_img. "' alt='Fotos' class='d-block w-100 ' />";
                                    
        ?>
      </div>
      <?php
        $sth = $pdo->prepare('select * from tbl_mural where mu_tipo = :mu_tipo order by mu_codigo desc limit 1,2 ');
        $sth->bindValue(':mu_tipo', 1);
        $sth->execute();
        foreach ($sth as $res) :
          extract($res);                                
      ?>
      <div class="carousel-item">
        <?php
          echo "<img src='../secretario/publicacoes/img/" . $mu_img. "' alt='Fotos' class='d-block w-100' />";
        ?>
      </div>
      <?php
        endforeach;
      ?>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span> 
    </a>
  </div>
  
  <br> <br>
  <div class="container">
    <div class="row">
      <?php
        $sth = $pdo->prepare('select * from tbl_mural where mu_tipo = :mu_tipo order by mu_codigo desc  ');
        $sth->bindValue(':mu_tipo', 2);
        $sth->execute();
        foreach ($sth as $res) :
        extract($res);
      ?>
      <div class="col-lg-4">
        <div class="containerr">
          <div class="card">
            <div class="face face1">
              <div class="content">
                <?php
                  echo "<img src='../secretario/publicacoes/img/" . $mu_img. "' alt='Fotos' width='1000' height='162' />";
                ?>  
                <h3><?php echo $mu_titulo ?></h3>
              </div>
            </div>
            <div class="face face2">
              <div class="content">
                <p><?php echo substr($mu_assunto, 0, 38); ?>...</p>
                <br>
                <p><?php echo $mu_data ?> </p>
                <center> <a href ="#"> Ver mais </a> </center>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php
        endforeach;
      ?>
    </div>
    </div>
    <br/><br/> 

    <?php
      include '../footer.php';
    ?> 

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script type="text/javascript">
      $('.carousel').carousel()
      $('.toast').toast(option)
    </script>
    
  </body>
</html>
