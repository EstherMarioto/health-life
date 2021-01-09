<?php
include '../../conexao/conexao.php';
include 'header.php';

?>
<!doctype html>
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
  <br><br>
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
      <div class="card">
        <div class="card-header" style="background-color: #1de9b6;" >
          <center>
            <h4 class="text-white">
              Mensagens
            </h4>
          </center>
        </div> 
        <?php
              $sth = $pdo->prepare('select *from tbl_contato c 
                INNER JOIN tbl_login l on c.con_paciente = l.lo_codigo');
               
                $sth->execute();
          
          if($sth->rowCount() > 0){
          foreach ($sth as $res) :
          extract($res);
        
        ?>
        <div class="card-body">
          <blockquote class="blockquote mb-0" >
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
                <h5 class="card-title"><?= substr($tipo_logi_tipo, 0, 50); ?></h5>
                <h5 class="card-title"><?= substr($con_assunto, 0, 50); ?></h5>
                <p class="card-text"><small><?= substr($con_mensagem, 0, 100); ?></small></p>
                <p class="card-text text-right"><small class="text-muted"><?php echo $un_tipo ?></small></p>
                <p class="card-text text-right"><small class="text-muted"><?php echo $con_data ?></small></p>
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
                      <a href="delete.php?con_codigo=<?= $con_codigo ?>"><button type="button" class="btn btn-primary">Sim</button></a>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"> Não</button>
        
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
    </div>
    <br/><br/>
    <?php
      include '../../footer.php';

    ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script><script type="text/javascript">
   
  </body>
</html>