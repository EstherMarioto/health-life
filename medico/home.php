<!doctype html>
<?php
  include '../conexao/conexao.php';
  $id = filter_input(INPUT_GET, "paciente", FILTER_SANITIZE_NUMBER_INT);

?>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- calendario -->
    <link href='css/core/main.min.css' rel='stylesheet' />
    <link href='css/daygrid/main.min.css' rel='stylesheet' />
    <link href='css/personalizado.css' rel='stylesheet' />
    <script src='js/core/main.min.js'></script>
    <script src='js/interaction/main.min.js'></script>
    <script src='js/daygrid/main.min.js'></script>
    <script src='js/core/locales/pt-br.js'></script>
    <script src='js/personalizado.js'></script>
    
    <title>Health & Life</title>
  </head>
  <nav class="navbar fixed-top navbar-expand-lg navbar-light " style="background-color: #1de9b6;">
  <img src="../img/logo" alt="logo do Health & Life" width='40' height='40' />
  <span>&nbsp;&nbsp;&nbsp;</span> 
      <a class="navbar-brand" href="home.php"><span class="text-white"><i><b>Health & Life</b></i><span></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"></button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        </ul>
        <form class="form-inline my-2 my-lg-0">
    
          <div class="nav-item">
            <a class="nav-link" href="perfil/usuario.php"><span class="text-white">Usuário </span></a>
          </div>

          <div class="nav-item">
            <a class="nav-link" href="contato/addcontato.php?id=<?= $id;?>"><span class="text-white">Contato </span></a>
          </div>
          <div class="nav-item">
            <a class="nav-link" href="pesquisar/formulario_pacientes.php"><span class="text-white">Pacientes </span></a>
          </div>
          <div class="nav-item">
            <a class="nav-link" href="../sair.php"><span class="text-white">Sair </span></a>
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
  <body>    
   <br><br>
    <div id='calendar'></div>
    <div class="modal fade" id="visual" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title"> Consulta </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
           </button>
          </div>
          <div class="modal-body">
            <dl class="row text-center">
            <script>
              var nome = querySelectorByld('#title');
              </script>
              <dt class="col-sm-6">Paciente: </dt>
              <a href=" " id="paciente"><dd id="title" ></dd></a>
            </dl>
            <dl class="row text-center">
              <dt class="col-sm-6"> Data e Hora: </dt>
              <dd class=" col-sm-4" id="start"></dd>
            </dl>
          </div>
          <div class="modal-footer">

          <div class="text-right">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#exampleModal20">
              Atualizar Unidade
            </button>
          </div>

          <!-- Modal -->
          <div class="modal fade" id="exampleModal20" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Atualizar</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form name="form1" action="consulta/updateDH.php" method="POST">       
                  <div class="input-field col s2">
                    <div class="text-left">
                      <label>Data e Hora</label>
                        </div>
                          <input type="data time" class="form-control" name="start" />
                        </div>
      
                        <div class="modal-footer">
                          <input class="modal-close waves-effect waves-green btn-flat" type="submit" value="Confirmar"/>
                       </div>
                      </form>
                    </div>  
                  </div>
                </div>
              </div>
            </div>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalConfirmDelete">Cancelar consulta</button>
          </div>
        </div>
      </div>
    </div>
   
    <!--Modal: modalConfirmDelete-->
    <div class="modal fade" id="modalConfirmDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
      <div class="modal-dialog modal-sm modal-notify modal-danger" role="document">
        <!--Content-->
        <div class="modal-content text-center">
          <!--Header-->
          <div class="modal-header d-flex justify-content-center">
            <p class="heading">Você tem certeza que deseja cancelar essa consulta?</p>
          </div>
          <!--Body-->
          <div class="modal-body">
            <svg xmlns="http://www.w3.org/2000/svg " x="0px" y="0px"width="100" height="100"viewBox="0 0 172 172"style=" fill:#000000;" class="#">
            <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#e74c3c"><path d="M141.04,13.76h-110.08c-9.4944,0 -17.2,7.7056 -17.2,17.2v110.08c0,9.4944 7.7056,17.2 17.2,17.2h110.08c9.4944,0 17.2,-7.7056 17.2,-17.2v-110.08c0,-9.4944 -7.7056,-17.2 -17.2,-17.2zM119.4024,114.5176l-4.8848,4.8848l-28.5176,-28.5176l-28.5176,28.5176l-4.8848,-4.8848l28.5176,-28.5176l-28.5176,-28.5176l4.8848,-4.8848l28.5176,28.5176l28.5176,-28.5176l4.8848,4.8848l-28.5176,28.5176z"></path></g></g></svg>
          </div>
          <!--Footer-->
          <div class="modal-footer flex-center">
            <a href="consulta/delete.php" class="btn  btn-outline-danger">Sim</a>
            <a type="button" class="btn  btn-danger waves-effect text-white" data-dismiss="modal">Não</a>
          </div>
        </div>
        <!--/.Content-->
      </div>
    </div>
    <br/><br/><br/>
    <div class="container">
      <div class="card">
        <div class="card-header" style="background-color: #1de9b6;" >
          <center>
            <h4 class="text-white">
              Mensagem
            </h4>
         </center>
        </div>
        <?php
         
         $sth = $pdo->prepare('select *from tbl_mensagem m
        INNER JOIN tbl_login l on m.me_medico = l.lo_codigo');
        $sth->execute();
        
        if($sth->rowCount() > 0){
        foreach ($sth as $res) :
        extract($res);
      ?>
      <div class="card-body">
        <blockquote class="blockquote mb-0 "  >
          <div class="card">
            <div class="card-body">  
            <?php
              $sth = $pdo->prepare('select * from tbl_login l
              INNER JOIN tbl_tipo_login t on l.lo_tipo = t.tipo_logi_codigo
              INNER JOIN tbl_unidade u on l.lo_unidade = u.un_codigo
              where l.lo_codigo = :cod
              ');
              $sth->bindValue(':cod', $lo_codigo);
              $sth->execute();
              $resultado = $sth->fetch(PDO::FETCH_ASSOC);
              extract($resultado);
            ?>
              <h5 class="card-title"><?= substr($me_titulo, 0, 50); ?></h5>
              <p class="card-text"><small><?= substr($me_assunto, 0, 100); ?></small></p>
              <p class="card-text text-right"><small class="text-muted"><?php echo $un_tipo ?></small></p>
              <p class="card-text text-right"><small class="text-muted"><?php echo $me_data ?></small></p>
              
              <div class="text-right">
                <div class="text-right">
               <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#exampleModal">
                  <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"width="25" height="25"viewBox="0 0 172 172"style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                    <path d="M0,172v-172h172v172z" fill="none"></path>
                      <g fill="#e74c3c">
                        <path d="M74.53333,17.2c-1.53406,-0.02082 -3.01249,0.574 -4.10468,1.65146c-1.09219,1.07746 -1.70703,2.54767 -1.70704,4.08187h-34.32161c-2.06765,-0.02924 -3.99087,1.05709 -5.03322,2.843c-1.04236,1.78592 -1.04236,3.99474 0,5.78066c1.04236,1.78592 2.96558,2.87225 5.03322,2.843h103.2c2.06765,0.02924 3.99087,-1.05709 5.03322,-2.843c1.04236,-1.78592 1.04236,-3.99474 0,-5.78066c-1.04236,-1.78592 -2.96558,-2.87225 -5.03322,-2.843h-34.32161c-0.00001,-1.53421 -0.61486,-3.00442 -1.70704,-4.08187c-1.09219,-1.07746 -2.57061,-1.67228 -4.10468,-1.65146zM34.4,45.86667v91.73333c0,6.33533 5.13133,11.46667 11.46667,11.46667h80.26667c6.33533,0 11.46667,-5.13133 11.46667,-11.46667v-91.73333z"></path>
                    </g></g>
                  </svg>
                </button>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Excluir</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body text-left">
                        Tem certeza que deseja excluir esse lembrete?
                      </div>
                      <div class="modal-footer">
                        <a href="delete.php?me_codigo=<?= $me_codigo ?>"><button type="button" class="btn btn-primary">Sim</button></a>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"> Não</button>
        
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </blockquote>
        </div>
        <?php
          endforeach;
        } else {
          ?>
          <br/> <br/>
          <center><b><i><h4> Sem mensagens no momento.</h4></i></b></center>
          <?php  
            };
          ?>
            <br/> <br/>
      </div>
    </div>      
    <br/><br/>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script>
      $('#myModal').modal(options)
    </script>
  </body>
  <?php
    include '../footer.php';
  ?>
</html>
