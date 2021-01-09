<!doctype html>
<?php
    session_start();
    include '../conexao/conexao.php';
    $sth = $pdo->prepare('select *from tbl_login where lo_codigo = :lo_codigo');
    $sth->bindValue(':lo_codigo', $_SESSION["health"]["id"]);
    $sth->execute();
    $resultado = $sth->fetch(PDO::FETCH_ASSOC);
    extract($resultado);
    if ($lo_tipo == 4 ){

?>
        <html lang="en">
        <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Health & Life</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet"  href="style.css">
    <link rel="icon"  alt="logo do Health & Life "href="../img/logo">

  </head>
  <body>

  <nav class="navbar fixed-top navbar-expand-lg navbar-light " style="background-color: #1de9b6;">
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
                <span class="text-white"> Usuário </span>
              </a>
              <div class="dropdown-menu " aria-labelledby="navbarDropdown">
                <a class="dropdown-item " href="usuario/usuario.php">Perfil</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="carteiraVacinacao/carteira.php">Carteira de Vacinação</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="consultas/consultas.php">Consultas Pendentes</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="consultas/consultas2.php">Consultas Realizadas</a>

              </div>
            </div>
          </ul>
          <a class="nav-link" href="medicos/index.php"><span class="text-white">  Marcar Consulta  </span></a>
          <a class="nav-link" href="contato/addcontato.php"> <span class="text-white"> Contato </span></a>
          <a class="nav-link" href="../sair.php"> <span class="text-white"> Sair </span></a>
          <a  class="nav-link" href="mensagem.php">
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
          </div>
          
        </form>
      </div>
    </nav>
    </br>
   
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script type="text/javascript">
      $('.dropdown-toggle').dropdown()
      $('.toast').toast(option)
    </script>
    <body>
       
       
    <br>   <br>   <br>
        <center><h1><i> Controle de Pressão </i></h1> </center>

        <br>
        <?php
           $sth = $pdo->prepare('select *from tbl_pressao p
           INNER JOIN tbl_login l on  l.lo_codigo = p.pre_enfermeiro
           where p.pre_paciente = :pre_paciente ');  
           $sth->bindValue(':pre_paciente',  $_SESSION["health"]["id"]);
 
           $sth->execute();
          if($sth->rowCount() > 0){
            ?> 

       <div class="container">
      <div class="row">
        <?php
         
          foreach ($sth as $res) :
          extract($res);
        ?>

        <div class="col s3 m2">
          <div class="card" style="width: 14rem;">
            <img class="card-img-top" src="img/p2.png" alt="Card image cap" style="background-color: #b9f6ca">
            <div class="card-body">
              <h5 class="card-title"><b>Exame de pressão</b></h5>
              <span class="card-title black-text">
                <h5><?= substr($pre_data, 0, 10); ?></h5>
              </span>
              <h6 style="height: 60px;" class="black-text"><?= substr($pre_pressao, 0, 38); ?></h6>
              <?php
                $sth = $pdo->prepare('select *from tbl_enfermeiro where en_login = :en_login ');  
                $sth->bindValue(':en_login',$pre_enfermeiro );
 
                $sth->execute();
                $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                extract($resultado);
              ?>
              <h6 style="height: 60px;" class="black-text"><b><?= substr($en_nome, 0, 38); ?></b></h6>
            </div>
          </div>
        </div>

        <?php 
          endforeach;
        ?>
      </div>
    </div>    
    <?php
  } else {
    ?>
    <br/>
    <center><b><i><h4> Sem medidas de pressão no momento.</h4></i></b></center>
    <?php  
      };
        ?>
    <br/> <br/>
    <?php
        include '../footer.php';
    ?>   
  
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        
</body>
</html>
<?php
    }else {
      
      $paciente = $_GET['paciente'];
       
      $sth = $pdo->prepare('select *from tbl_login where lo_codigo = :lo_codigo');
      $sth->bindValue(':lo_codigo', $_SESSION["health"]["id"] );
      $sth->execute();
      $resultado = $sth->fetch(PDO::FETCH_ASSOC);
      extract($resultado);
      if ($lo_tipo == 1 ){
        ?>
        <html lang="en">
        <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Health & Life</title>
    <link rel="icon"  alt="logo do Health & Life "href="../img/logo">
  </head>
   <nav class="navbar fixed-top navbar-expand-lg navbar-light " style="background-color: #1de9b6;">
   <img src="../img/logo" alt="logo do Health & Life" width='40' height='40' />
  <span>&nbsp;&nbsp;&nbsp;</span>
      <a class="navbar-brand" href="../enfermeiro/home.php"><span class="text-white"><i><b>Health & Life</b></i><span></a>
     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"></button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        </ul>
      </div>
      <form class="form-inline my-2 my-lg-0">
      <div class="nav-item">
        <a class="nav-link" href="../sair.php"> <span class="text-white"> Sair </span></a>
      </div>
    </form>
    </nav>
   

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <br/>
    <body>
        
        <br>
        <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="../enfermeiro/home.php">Home</a></li>
        <li class="breadcrumb-item"><a href="../enfermeiro/pesquisar/opcao.php?paciente=<?= $paciente;?>">Opções</a></li>
        <li class="breadcrumb-item"><a href="../enfermeiro/ver/ver.php?paciente=<?= $paciente;?>">Paciente</a></li>
        <li class="breadcrumb-item active" aria-current="page">Pressão</li>
      </ol>
    </nav>
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
        <center><h1><i> Controle de Pressão </i></h1> </center>

        <br>
        <?php
          $sth = $pdo->prepare('select *from tbl_pressao p
          INNER JOIN tbl_login l on  l.lo_codigo = p.pre_enfermeiro
          where p.pre_paciente = :pre_paciente ');  
          $sth->bindValue(':pre_paciente', $paciente);

          $sth->execute();
          if($sth->rowCount() > 0){
            ?> 
       <div class="container">
      <div class="row">
        <?php
          foreach ($sth as $res) :
          extract($res);
        ?>

        <div class="col s3 m2">
          <div class="card" style="width: 14rem;">
            <img class="card-img-top" src="img/p2.png" alt="Card image cap" style="background-color: #b9f6ca">
            <div class="card-body">
              <h5 class="card-title"><b>Exame de pressão</b></h5>
              <span class="card-title black-text">
                <h5><?= substr($pre_data, 0, 10); ?></h5>
              </span>
              <h6 style="height: 60px;" class="black-text"><?= substr($pre_pressao, 0, 38); ?></h6>
              <?php
                $sth = $pdo->prepare('select *from tbl_enfermeiro where en_login = :en_login ');  
                $sth->bindValue(':en_login',$pre_enfermeiro );
 
                $sth->execute();
                $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                extract($resultado);
              ?>
              <h6 style="height: 60px;" class="black-text"><b><?= substr($en_nome, 0, 38); ?></b></h6>
            </div>
          </div>
        </div>

        <?php 
          endforeach;
          ?>
         
          
      </div>
    </div>
    <?php
  } else {
    ?>
    <br/>
    <center><b><i><h4> Sem medidas de pressão no momento.</h4></i></b></center>
    <?php  
      };
        ?>
    <br/> <br/>

    <?php
        include '../footer.php';
    ?>   
  
  
</body>
</html>
<?php
    }else{
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
      <a class="navbar-brand" href="home.php"><span class="text-white"><i><b>Health & Life</b></i><span></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"></button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        </ul>
        <form class="form-inline my-2 my-lg-0">
    
          <div class="nav-item">
            <a class="nav-link" href="../medico/perfil/usuario.php"><span class="text-white">Usuário </span></a>
          </div>

          <div class="nav-item">
            <a class="nav-link" href="../medico/contato/addcontato.php"><span class="text-white">Contato </span></a>
          </div>
          <div class="nav-item">
            <a class="nav-link" href="../medico/pesquisar/formulario_pacientes.php"><span class="text-white">Pacientes </span></a>
          </div>
          <div class="nav-item">
          <a class="nav-link" href="../../sair.php"> <span class="text-white"> Sair </span></a>
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
          $sth->bindValue(':tipo', 2);
          $sth->execute();
          $resultado = $sth->fetch(PDO::FETCH_ASSOC);
          extract($resultado);
        ?>

        <h5><?php echo $tipo_logi_tipo ?></h5>

      </div>
    </div>
        <center><h1><i> Controle de Pressão </i></h1> </center>

        <br>
        <?php
          $sth = $pdo->prepare('select *from tbl_pressao p
          INNER JOIN tbl_login l on  l.lo_codigo = p.pre_enfermeiro
          where p.pre_paciente = :pre_paciente ');  
          $sth->bindValue(':pre_paciente', $paciente);

          $sth->execute();
          if($sth->rowCount() > 0){
            ?> 
       <div class="container">
      <div class="row">
        <?php
          foreach ($sth as $res) :
          extract($res);
        ?>

        <div class="col s3 m2">
          <div class="card" style="width: 14rem;">
            <img class="card-img-top" src="img/p2.png" alt="Card image cap" style="background-color: #b9f6ca">
            <div class="card-body">
              <h5 class="card-title"><b>Exame de pressão</b></h5>
              <span class="card-title black-text">
                <h5><?= substr($pre_data, 0, 10); ?></h5>
              </span>
              <h6 style="height: 60px;" class="black-text"><?= substr($pre_pressao, 0, 38); ?></h6>
              <?php
                $sth = $pdo->prepare('select *from tbl_enfermeiro where en_login = :en_login ');  
                $sth->bindValue(':en_login',$pre_enfermeiro );
 
                $sth->execute();
                $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                extract($resultado);
              ?>
              <h6 style="height: 60px;" class="black-text"><b><?= substr($en_nome, 0, 38); ?></b></h6>
            </div>
          </div>
        </div>

        <?php 
          endforeach;
          ?>
         
          
      </div>
    </div>
    <?php
  } else {
    ?>
    <br/>
    <center><b><i><h4> Sem medidas de pressão no momento.</h4></i></b></center>
    <?php  
      };
        ?>
    <br/> <br/>

    <?php
        include '../footer.php';
    ?>   
  
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
      <?php
    };
  };
    
?>

