<!DOCTYPE html>
<?php

  include '../../conexao/conexao.php';
  include 'header.php';
  $especialidade= $_GET['especialidade'];
?>


 <html>
  <head>
    <meta charset="UTF-8">
    <!-- Última versão CSS compilada e minificada -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Médicos</title>
    <link rel="icon"  alt="logo do Health & Life " href="../../img/logo">
  </head>
    
  <body>
    <?php

      $sth = $pdo->prepare('select * from tbl_especialidade where es_codigo = :es_codigo');
      $sth->bindValue(':es_codigo',$especialidade);
      $sth->execute();
      $resultado = $sth->fetch(PDO::FETCH_ASSOC);
      extract($resultado);
    ?>
    </br></br>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Especialidades</a></li>
        <li class="breadcrumb-item active" aria-current="page"><?php echo $es_tipo ?></li>
      </ol>
    </nav>
    <br/>
    <div class ="container">
      <h3 class="text-center" > <i><b>
        <?php 
          echo $es_tipo;
        ?>
      </b></i></h3>
    
    </div>
    </br></br>

    <div class="container">
      <div class="row"> 

        <?php

          $sth = $pdo->prepare('select * from tbl_medico where me_especialidade = :me_especialidade');
          $sth->bindValue(':me_especialidade', $especialidade);
          $sth->execute();

          foreach ($sth as $res) :
          extract($res);
        ?>
        <a href="../consulta/marcar_consulta.php?medico=<?= $me_login; ?>">
          <div class="col-md-3">
            <div class="card" style="width: 14rem;">
              <?php
                $sth = $pdo->prepare('select * from tbl_img_dado where im_medico = :im_medico and im_detalhe = :im_detalhe');
                $sth->bindValue(':im_medico', $me_codigo);
                $sth->bindValue(':im_detalhe', 9);

                $sth->execute();
                $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                extract($resultado);
              ?>
              <img class="card-img-top" src="../../secretario/cadastro_medico/img/<?= $im_dado; ?>" alt="Foto do Médico"  width='200' height='200' >
              <?php
              $sth = $pdo->prepare('select * from tbl_medico where me_codigo = :me_codigo');
          $sth->bindValue(':me_codigo', $im_medico);
          $sth->execute();
          $resultado = $sth->fetch(PDO::FETCH_ASSOC);
          extract($resultado);
          ?>
              <div class="card-body">
                <h5 style="height: 30px;" ><?= $me_nome; ?></h5>
              </div>
            </div>
          </div>
        </a>
        <?php
          endforeach;
        ?> 

      </div>
      
    </div>

    <br/><br/>
    <footer>
      <?php
        include '../../footer.php';
      ?>
    </footer>
    
  </body>

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</html>