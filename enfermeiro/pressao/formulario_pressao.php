<!DOCTYPE html>
<?php
  session_start();
  ?>
<html>
  <head>
    <meta charset="UTF-8">
    <!-- Última versão CSS compilada e minificada -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Cadastro do formulário</title>
  </head>

  <body>
    <?php
      include 'header.php';
      include '../../conexao/conexao.php';
      $paciente= $_GET['pressao'];
    

    ?>
    </br></br></br> <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="../home.php">Home</a></li>
        <li class="breadcrumb-item"><a href="../pesquisar/opcao.php?paciente=<?= $paciente;?>">Opções</a></li>
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
    </div><br><br/>
    
    <div class="container">  
      <div class="card painel">        
        <div class="row">
          <div class="col s2 m12 offset-m1 center" >
            <?php
              $sth = $pdo->prepare('SELECT *FROM tbl_pressão ');
              $sth->execute();
            ?>

            <form name="form1" action="insert_pressao.php" method="post">
              <input name="pre_paciente" type="hidden" value="<?= $paciente; ?>">
              <input name="pre_enfermeiro" type="hidden" value="<?= $_SESSION["health"]["id"]; ?>">
              <div class="form-row">
                <h3 class="col-md-12 text-center">Formulário de pressão</h3> 
                
                <br/> <br/><br/>
                <div class="form-group col-md-6">
                  <div class="container"> 
                    <label> <b> Data de exame de pressão  </b> </label>
                    <input type="date" class="form-control" name="pre_data" />
                  </div>
                </div>
                <div class="form-group col-md-6">
                  <div class="container"> 
                    <label> <b> Pressão </b> </label>
                    <input type="text" class="form-control" name="pre_pressao" />
                  </div>
                </div>
                
                <div class="form-group col-md-12">
                  <br/>
                  <div class="container">
                    <button type="button-submit" class="btn btn-outline-dark"> <b> Finalizar </b> </button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>  <!-- row -->
      </div><!-- card-panel -->
    </div><!-- container -->
    <br/><br/>
    <div class="container">
      <div class="row">
        <?php
          $sth = $pdo->prepare('select *from tbl_pressão p
          INNER JOIN tbl_enfermeiro e on  e.en_codigo = p.pre_enfermeiro
          where pre_cod = :pre_cod ');  
          $sth->bindValue(':pre_cod', 1);

          $sth->execute();
          foreach ($sth as $res) :
          extract($res);
        ?>

        <div class="col s3 m2">
          <div class="card" style="width: 14rem;">
            <img class="card-img-top" src="../pesquisar/img/p2.png" alt="Card image cap" style="background-color: #b9f6ca">
            <div class="card-body">
              <h5 class="card-title"><b>Exame de pressão</b></h5>
              <span class="card-title black-text">
                <h5><?= substr($pre_data, 0, 10); ?></h5>
              </span>
              <h6 style="height: 60px;" class="black-text"><?= substr($pre_pressao, 0, 38); ?></h6>
              <h6 style="height: 60px;" class="black-text"><b><?= substr($en_nome, 0, 38); ?></b></h6>
            </div>
          </div>
        </div>

        <?php 
          endforeach;
        ?>
      </div>
    </div>
    </br></br></br></br></br></br></br></br></br></br>

    <?php include '../../footer.php' ?>
  </body>

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</html>