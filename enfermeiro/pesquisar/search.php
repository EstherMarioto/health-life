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
      include 'header.php';
      include '../../conexao/conexao.php';
    ?>
    </br></br></br>
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
      </br>
      <div class="container" style="background-color: #1de9b6">
        <div class="row">
          <div class="col s2 m12 offset-m1 center" style="background-color: #1de9b6">
            </br>
            <form method="POST" action="search.php">
              <center>
                <div class="form-row">
                  <div class="form-group col-md-10">
                    <div class="input-field">
                      <input class="form-control" type="text"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" name="pesquisar" placeholder="Pesquise o número do prontuário..." aria-label="Search">
                    </div>
                  </div>
                  <div class="form-group col-md-2">
                    <button class="btn aqua-gradient btn-rounded btn-sm my-0" type="submit">Pesquisar</button>
                  </div>
                </div>
              </center> 
            </form>
          </div>
          <?php
            $pesquisar = $_POST['pesquisar'];
          ?>
          <div class="row center">
            <?php
        
              $sth = $pdo->prepare("SELECT * FROM tbl_prontuario WHERE pr_codigo LIKE '%$pesquisar%' ");
              $sth->execute();
              foreach ($sth as $res) :
              extract($res);
            ?>
            <?php
              endforeach;
            ?>
          </div>
        </div>
      </div>
      </br>

      <div class="container">
        <div class="row">
          <?php

            $sth = $pdo->prepare('select *from tbl_prontuario p
              INNER JOIN tbl_endereco e on p.pr_endereco = e.en_codigo
            where pr_codigo = :pr_codigo ');
            $sth->bindValue(':pr_codigo', $pesquisar);
            $sth->execute();
            foreach ($sth as $res) :
            extract($res);
          ?>
          <div class="col s3 m2">
            <div class="card" style="width: 14rem;">
              <img class="card-img-top" src="img/p.png" alt="Card image cap" style="background-color: #b9f6ca" alt="Card image" data-toggle="modal" data-target="#modalRelatedContent">
              <div class="card-body">
                <span class="card-title black-text">
                  <h5><i>Matrícula: <?= substr($pr_codigo, 0, 10); ?></i></h5>
                </span>
                <br/>
                <h6>Rua: <?= substr($en_rua, 0, 38); ?>
                N°: <?= substr($en_numero, 0, 38); ?></h6>
                

                <h6>Bairro: <?= substr($en_bairro, 0, 38); ?></h6>
                <br/>
                <h6><?= substr($pr_data, 0, 38); ?></h6>
              </div>
            </div>
          </div>
          <?php
            endforeach;
          ?>
        </div>
      </div>
      <!--Modal: modalRelatedContent-->
      <div class="modal fade right" id="modalRelatedContent" tabindex="-1" role="dialog"aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
        <div class="modal-dialog modal-side modal-bottom-right modal-notify modal-info" role="document">
          <!--Content-->
          <div class="modal-content">
            <!--Header-->
            <div class="modal-header">
              <p class="heading"> <b>Nome dos integrantes: </b></p>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" class="white-text">&times;</span>
              </button>
            </div>
            <!--Body-->
            <div class="modal-body">
              <div class="row">
                <div class="col-5">
                  <img src="img/int.jpg"class="img-fluid" alt="">
                </div>
                <div class="col-7">
                  <b>
                    <?php 
                      $sth = $pdo->prepare("select *from tbl_paciente where p_prontuario = :p_prontuario");
                      $sth->bindValue(':p_prontuario', $pesquisar);
                      //Executa
                      $sth->execute();
                      echo '<h6>' .'   </h6>';
                      echo '<table class="striped">';

                      foreach ($sth as $res) {
                        extract($res);
                  
                        echo '<tr>';
                        echo '<tr>'.  '<a href ="opcao.php?paciente='.$p_login.'">' .$p_nome. '</a>' .' </tr><br/>';
                        echo '<tr>';
                     
                     
                      }
                  
                      echo '</table>';
                    ?>
                  </b>
                </div>
              </div>
            </div>
          </div>
          <!--/.Content-->
        </div>
      </div>
      <!--Modal: modalRelatedContent-->

      <style>
        .btn.aqua-gradient {
          color: #fff;
          -webkit-transition: .5s ease;
          transition: .5s ease;
        }
      .btn.btn-sm {
        padding: .5rem 1.6rem;
        font-size: .64rem;
      }
      .btn-rounded {
        border-radius: 10em;
      }
      .btn {
        margin: .375rem;
        margin-top: 0.375rem;
        margin-bottom: 0.375rem;
        color: inherit;
        text-transform: uppercase;
        word-wrap: break-word;
        white-space: normal;
        cursor: pointer;
        border: 0;
        border-radius: .125rem;
        -webkit-box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12);
        box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12);
        -webkit-transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,-webkit-box-shadow .15s ease-in-out;
        transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,-webkit-box-shadow .15s ease-in-out;
        transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
        transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out,-webkit-box-shadow .15s ease-in-out;
        padding: .84rem 2.14rem;
        font-size: .81rem;
      }
      .aqua-gradient {
        background: linear-gradient(40deg,#2096ff,#05ffa3) !important;
      }
      .mb-0, .my-0 {
        margin-bottom: 0 !important;
      }
      .mt-0, .my-0 {
        margin-top: 0 !important;
      }
      .btn {
        padding: .25rem .5rem;
        font-size: .875rem;
        line-height: 1.5;
        border-radius: .2rem;
        display: inline-block;
        font-weight: 400;
        color: #212529;
        text-align: center;
      }
    </style>
    </br></br></br>

    <?php include '../../footer.php' ?>

  </body>

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</html>