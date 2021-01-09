<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/stylebtn.css" >
    <title>Pesquisar</title>

  </head>
  
  <body>
    <?php 
    session_start();
      include '../../conexao/conexao.php';
      include 'header.php';
    ?>
     <br/><br/><br/>
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

    <div class="container" style="background-color: #1de9b6">
      <div class="row">
        <div class="col s2 m12 offset-m1 center" style="background-color: #1de9b6">
          </br>

          <figcaption>
            <form method="POST" action="search_pacientes.php">
              <center>
                <div class="form-row"> 
                  <div class="form-group col-md-10">
                    <div class="input-field">
                      <input class="form-control" type="text" name="pesquisar" placeholder="Pesquisar" aria-label="Search">
                    </div>
                  </div>
                  <div class="form-group col-md-2">
                    <button class="btn aqua-gradient btn-rounded btn-sm my-0" type="submit">Pesquisar</button>
                  </div>
                </div>
              </center>
            </form>
          </figcaption>  
        </div>
      </div>
    </div>
    <br/><br/>

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

                    $sth = $pdo->prepare('select *from tbl_paciente');
                    $sth->execute();
                    foreach ($sth as $res) :
                    extract($res);
                
                
         ?>
          <tbody>
         
            <tr>
           
              <th scope="row">
                <span class="card-title black-text">
                  <h6><?= substr($p_codigo, 0, 10); ?></h6>
                </span>
              </th>
              <td> <a href="../ver/ver.php?id=<?= $p_login; ?>"><h6><?= substr($p_nome, 0, 38); ?></h6></a</td>
              <td><h6><?= substr($p_dtnasc, 0, 38); ?></h6></td>
              <td><h6><?= substr($p_telefone, 0, 38); ?></h6></td>
              
              <hr/>
            </tr>
           
          </tbody>
          <?php
            endforeach;
          ?>
<?php
 }else{
  $sth = $pdo->prepare('select *from tbl_paciente_ubs');
  $sth->execute();
  foreach ($sth as $res) :
  extract($res);


?>
 <tbody>
         
         <tr>
        
           <th scope="row">
             <span class="card-title black-text">
               <h6><?= substr($p_codigo, 0, 10); ?></h6>
             </span>
           </th>
           <td> <a href="../ver/ver_ubs.php?id=<?= $p_loginn; ?>"><h6><?= substr($p_nome, 0, 38); ?></h6></a</td>
           <td><h6><?= substr($p_dtnasc, 0, 38); ?></h6></td>
           <td><h6><?= substr($p_telefone, 0, 38); ?></h6></td>
           
           <hr/>
         </tr>
        
       </tbody>
          <?php
            endforeach;
          ?>
          <?php
          };
          ?>
        </table>
      </div>
    </div>
    </br></br></br></br></br>

    <?php include '../../footer.php' ?>

  </body>
  
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</html>