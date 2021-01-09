<!DOCTYPE html>
<?php
  session_start();
?>
<html>
  <head>
    <meta charset="UTF-8">
    <!-- Última versão CSS compilada e minificada -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Health & Life</title>

  </head>
  <body>
    <?php include 'header.php' ;
    include '../../conexao/conexao.php' ?>
       <br/>
    <div class="form-row">
      <div class="form-group col-md-0"> 
        <img src="https://img.icons8.com/material-rounded/26/000000/user-male-circle.png"/>
      </div>
      <?php
        $sth = $pdo->prepare('select * from tbl_tipo_login where tipo_logi_codigo = :tipo');
        $sth->bindValue(':tipo', 3);
        $sth->execute();
        $resultado = $sth->fetch(PDO::FETCH_ASSOC);
        extract($resultado);
      ?>

      <h5><?php echo $tipo_logi_tipo ?></h5>
    </div>  
    

    <div class="container">
      <div class="row">
        <div class="col s2 m12 offset-m1 center">
          </br>
          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><b>Paciente</b></a>
            </li>
          </ul>
          </br>
    
          <script>
            $('#myTab a').on('click', function (e) {
            e.preventDefault()
            $(this).tab('show')
            });
          </script>
          <div class="tab-content">
            <?php
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
              if($un_dtl_unidade == 2 ){
            ?>
         
            <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
              <div class="container">
                <div class="row">
                  <table class="table table-striped">
                    <tbody>
                      <tr>
                        <th scope="col">Inscrição</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Data de nascimento</th>
                        <th scope="col">Telefone</th>
                      </tr>
                    </tbody>

                    <?php
                      $sth = $pdo->prepare('select *from tbl_paciente where p_status = :p_status ');
                      $sth->bindValue(':p_status', 1);
                      $sth->execute();
                      foreach ($sth as $res) :
                      extract($res);
                    ?>

                  <tbody>
                    <tr>
                      <th scope="row"><span class="card-title black-text">
                        <h5><?= substr($p_codigo, 0, 10); ?></h5>
                      </span></th>
                      <td><h5><a href="paciente.php?paciente=<?=$p_codigo;?> "><?= substr($p_nome, 0, 38); ?></a></h5></td>
                      <td><h5><?= substr($p_dtnasc, 0, 38); ?></h5></td>
                      <td><h5><?= substr($p_telefone, 0, 38); ?></h5></td>
                      <hr/>
                    </tr>
                  </tbody>

                  <?php
                    endforeach;
                  ?>
                </table>
              </div>
            </div>
          </div> 
          <?php
            }else{
           ?>
            
            <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="container">
              <div class="row">

                <table class="table table-striped">
                  <tbody>
                    <tr>
                      <th scope="col">Inscrição</th>
                      <th scope="col">Nome</th>
                      <th scope="col">Data de nascimento</th>
                    </tr>
                  </tbody>

                  <?php
                    $sth = $pdo->prepare('select *from tbl_paciente_ubs where p_status = :p_status ');
                    $sth->bindValue(':p_status', 1);
                    $sth->execute();
                    foreach ($sth as $res) :
                    extract($res);
                  ?>

                  <tbody>
                    <tr>
                      <th scope="row"><span class="card-title black-text">
                        <h5><?= substr($p_codigo, 0, 10); ?></h5>
                      </span></th>
                      <td><h5><a href="paciente_ubs.php?paciente=<?=$p_codigo;?>"><?= substr($p_nome, 0, 38); ?></a></h5></td>
                      <td><h5><?= substr($p_dtnasc, 0, 38); ?></h5></td>
                      <hr/>
                    </tr>
                  </tbody>

                <?php
                  endforeach;
                ?>
              </table>
            </div>
          </div>
        </div>
      </div>
      <?php
        };
      ?>
    </br></br>


    
    </body>


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</html>