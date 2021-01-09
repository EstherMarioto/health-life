<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <!-- Última versão CSS compilada e minificada -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/stylebtn.css" >
    <title>Pesquisar</title>

  </head>

  <body>

    <?php 
    include '../../conexao/conexao.php';
      include 'header.php';
    ?>
    
  <div class="form-row">
    <div class="form-group col-md-0"> 
      <img src="https://img.icons8.com/material-rounded/26/000000/user-male-circle.png"/>
    </div>
      <?php
        include '../../conexao/conexao.php';
        $sth = $pdo->prepare('select * from tbl_tipo_login where tipo_logi_codigo = :tipo');
        $sth->bindValue(':tipo', 3);
        $sth->execute();
        $resultado = $sth->fetch(PDO::FETCH_ASSOC);
        extract($resultado);
      ?>

      <h5><?php echo $tipo_logi_tipo ?></h5>
  </div>  
    <div class="container" >
      <nav aria-label="breadcrumb" >
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="pesquisas.php">Pesquisar</a></li>
          <li class="breadcrumb-item active" aria-current="page">Médico</li>
        </ol>
      </nav>
    </div>
    <div class="container" >
      <div class="row">
        <div class="col s2 m12 offset-m1 center" >
          </br>
          <div class="container">
            <div class="row">
              <table class="table table-striped">
                <form method="POST" action="pesquisas_medico.php">
                  <center>
                    <div class="form-row">    
                      <div class="form-group col-md-10">
                        <div class="input-field">
                          <input class="form-control" type="text" name="pesquisar2" placeholder="Pesquisar" aria-label="Search">
                        </div>
                      </div>
                      <div class="form-group col-md-2">
                        <button class="btn aqua-gradient btn-rounded btn-sm my-0" type="submit">Pesquisar</button>
                      </div>
                    </div>  
                  </center>
                </form>

                <?php
                  $pesquisar2 = $_POST['pesquisar2'];
                ?>

                <div class="row center">
                  <?php
                    $sth = $pdo->prepare("SELECT * FROM tbl_medico m
                    INNER JOIN tbl_especialidade e on m.me_especialidade = e.es_codigo WHERE me_nome LIKE '%$pesquisar2%'");
                    $sth->execute();
                    $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                    extract($resultado);
                  ?> 
                     
                  <tbody>
                    <tr>
                      <th scope="col">Inscrição</th>
                      <th scope="col">Nome</th>
                      <th scope="col">Data de nascimento</th>
                      <th scope="col">Especialidade</th>
                      <th scope="col">Email</th>
                    </tr>
                  </tbody>

                  <tbody>
                    <tr>
                      <th scope="row">
                        <span class="card-title black-text">
                          <h6><?= substr($me_codigo, 0, 10); ?></h6>
                        </span>
                      </th>
                      <td><h6><a href="usuarios/medico.php?id=<?= $me_login; ?>"><?= substr($me_nome, 0, 38); ?></a></h6></td>
                      <td><h6><?= substr($me_dt_nasc, 0, 38); ?></h6></td>
                      <td><h6><?=substr($es_tipo, 0, 38); ?></h6></td>
                      <td><h6><?= substr($me_email, 0, 38); ?></h6></td>
                      <hr/>
                    </tr>
                  </tbody>
                </div> 
              </table>
            </div>
          </div>
        </div> 
      </div>
    </div>
       
   </br></br></br></br></br>
    
  </body>
  <?php
    include '../../footer.php'; 
  ?>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
 
</html>