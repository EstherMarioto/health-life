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

    <div class="container">
      <div class="row">
        <div class="col s2 m12 offset-m1 center" >
          </br>

          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><b>Enfermeiro</b></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls=" profile" aria-selected="false"><b>Médicos</b></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="messages-tab" data-toggle="tab" href="#messages" role="tab" aria-controls=" messages" aria-selected="false"><b>Pacientes</b></a>
            </li>
          </ul>
          </br>

          <div class="tab-content">
            <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
              <div class="container">
                <div class="row">
                  <table class="table table-striped">
                    <form method="POST" action="pesquisas_enfermeiro.php">
                      <center>
                        <div class="form-row"> 
                          <div class="form-group col-md-6">
                            <div class="input-field">
                              <input class="form-control" type="text" name="pesquisar" placeholder="Pesquisar" aria-label="Search">
                            </div>
                          </div>
                          
                          <div class="form-group col-md-2">
                            <button class="btn aqua-gradient btn-rounded btn-sm my-0" type="submit"> Pesquisar</button>
                          </div>
                    </form>
                          <div class ="right"> 
                            <div class="form-group col-md-4">
                              <button class="btn aqua-gradient btn-rounded btn-sm my-0" ><a href = "../cadastro_enfermeiro/cadastro_login.php"><span class=" text-white"> Cadastrar </span> </a> </button>
                            </div>
                          </div>
                       
                        </div>
                      </center>
                    
                  

                    <tbody>
                      <tr>
                        <th scope="col">Inscrição</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Data de nascimento</th>
                        <th scope="col">Telefone</th>
                      </tr>
                    </tbody>

                    <?php
                      $sth = $pdo->prepare('select *from tbl_enfermeiro');
                      $sth->execute();
                      foreach ($sth as $res) :
                      extract($res);
                    ?>

                    <tbody>
                      <tr>
                        <th scope="row">
                          <span class="card-title black-text">
                            <h6><?= substr($en_codigo, 0, 10); ?></h6>
                          </span>
                        </th>
                        <td><h6> <a href="usuarios/enfermeiro.php?id=<?= $en_login; ?>"><?= substr($en_nome, 0, 38); ?></a></h6></td>
                        <td><h6><?= substr($en_dt_nasc, 0, 38); ?></h6></td>
                        <td><h6><?= substr($en_telefone, 0, 38); ?></h6></td>
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

            <div class="tab-pane " id="profile" role="tabpanel" aria-labelledby="profile-tab">
              <div class="container">
                <div class="row">
                  <table class="table table-striped">
                    
                    <form method="POST" action="pesquisas_medico.php">  
                      <center>
                        <div class="form-row">
                          <div class="form-group col-md-6">
                            <div class="input-field">
                              <input class="form-control" type="text" name="pesquisar2" placeholder="Pesquisar" aria-label="Search">
                            </div>
                          </div>                    
                          <div class="form-group col-md-2">
                            <button class="btn aqua-gradient btn-rounded btn-sm my-0" type="submit">Pesquisar</button>
                          </div>
                          </form>
                          <div class ="right"> 
                            <div class="form-group col-md-4">
                              <button class="btn aqua-gradient btn-rounded btn-sm my-0" type="submit"><a href = "../cadastro_medico/cadastro_login.php"><span class=" text-white"> Cadastrar </span> </a> </button>
                            </div>
                          </div>
                        </div>
                      </center>
                

                    <tbody>
                      <tr>
                        <th scope="col">Inscrição</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Data de nascimento</th>
                        <th scope="col">Especialidade</th>
                        <th scope="col">Email</th>
                      </tr>
                    </tbody>

                    <?php
                      $sth = $pdo->prepare('select *from tbl_medico');
                      $sth = $pdo->prepare('select *from tbl_medico m 
                        INNER JOIN tbl_especialidade e on  e.es_codigo = m.me_especialidade
                        order by m.me_codigo DESC');
                      $sth->execute();
                      foreach ($sth as $res) :
                      extract($res);
                    ?>

                    <tbody>
                      <tr>
                        <th scope="row">
                          <span class="card-title black-text">
                            <h6><?= substr($me_codigo, 0, 10); ?></h6>
                          </span>
                        </th>
                        <td><h6> <a href="usuarios/medico.php?id=<?= $me_login; ?>" ><?= substr($me_nome, 0, 38); ?></a></h6></td>
                        <td><h6><?= substr($me_dt_nasc, 0, 38); ?></h6></td>
                        <td><h6><?= substr($es_tipo, 0, 38); ?></h6></td>
                        <td><h6><?= substr($me_email, 0, 38); ?></h6></td>
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

            <div class="tab-pane " id="messages" role="tabpanel" aria-labelledby="messages-tab">
              <div class="container">
                <div class="row">
                  <table class="table table-striped">
                    <form method="POST" action="pesquisas_paciente.php">
                      <center>
                        <div class="form-row">
                          <div class="form-group col-md-10">
                            <div class="input-field">
                              <input class="form-control" type="text" name="pesquisar3" placeholder="Pesquisar" aria-label="Search">
                            </div>
                          </div>
                          <div class="form-group col-md-2">
                            <button class="btn aqua-gradient btn-rounded btn-sm my-0" type="submit">Pesquisar</button>
                          </div>
                          
                        </div>  
                      </center>
                    </form>
    
                    <tbody>
                      <tr>
                        <th scope="col">Inscrição</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Data de nascimento</th>
                        <th scope="col">Telefone</th>
                      </tr>
                    </tbody>

                    <?php   
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
                        <td><h6> <a href="usuarios/paciente.php?id=<?= $p_login; ?>"><?= substr($p_nome, 0, 38); ?></a></h6></td>
                        <td><h6><?= substr($p_dtnasc, 0, 38); ?></h6></td>
                        <td><h6><?= substr($p_telefone, 0, 38); ?></h6></td>
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
        </div>              
      </div>                
    </div>                  
    
    </br></br></br></br></br></br></br></br></br></br>

  </body>
  <?php
    include '../../footer.php'; 
  ?>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
 <script>
    $('#myTab a').on('click', function (e) {
      e.preventDefault()
      $(this).tab('show')
    })
  </script>
</html>