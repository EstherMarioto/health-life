<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <!-- Última versão CSS compilada e minificada -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <title>Home do enfermeiro</title>

  </head>

  <body>
    <?php
    session_start();
      $paciente = $_GET['paciente'];
      include '../../conexao/conexao.php';
      include 'header.php';
        
    ?>
    <br><br><br><nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="../home.php">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Opções</li>
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
    <br><br>

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
                 <a href="../vacinacao/vacina.php?vacina=<?= $paciente;?>"><img style="margin-left: 140px;" class="rounded-circle" src="img/vacina.jpeg"></a>
                <?php 
                  }else{
                ?>
                <a href="../vacinacao/vacina_ubs.php?vacina=<?= $paciente;?>"><img style="margin-left: 140px;" class="rounded-circle" src="img/vacina.jpeg"></a>
                 <?php 
                  };
                ?>
                <?php
                  if($un_dtl_unidade == 2){
                ?>
                <a href="../ver/ver.php?paciente=<?= $paciente;?>"><img style="margin-left: 100px;" class="rounded-circle" src="img/med.jpeg"></a>
                <?php 
                  }else{
                ?>
                <a href="../ver/ver_ubs.php?paciente=<?= $paciente;?>"><img style="margin-left: 100px;" class="rounded-circle" src="img/med.jpeg"></a>
                <?php 
                 };
                 ?>

        <a href="../pressao/formulario_pressao.php?pressao=<?= $paciente;?>"><img style="margin-left: 100px;" class="rounded-circle" src="img/pr.jpeg"></a>
      </div>
    </div>
    <br>
    <div class="row">       
      <?php echo $paciente; ?>       
      <h4 style="margin-left: 290px;"><b>Vacinação </b></h4>
      <h4 style="margin-left: 240px;"><b>Consulta</b></h4>
      <h4 style="margin-left: 180px;"><b>Controle de Pressão</b></h4>
    </div>
    <br><br><br><br>
    
    <?php include '../../footer.php' ?>
  </body>

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</html>