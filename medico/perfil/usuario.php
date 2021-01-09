<!doctype html>
<?php
    session_start();
    include '../../conexao/conexao.php';
?>

<?php
    $sth = $pdo->prepare('
        select *from tbl_medico m 
        INNER JOIN tbl_genero g on m.me_genero = g.tipo_genero_codigo
        INNER JOIN tbl_opcao o on m.me_aprov_exame = o.op_codigo
        INNER JOIN tbl_especialidade e on m.me_especialidade = e.es_codigo
        where m.me_login = :me_login
    ');

    $sth->bindValue(':me_login', $_SESSION["health"]["id"]);
    $sth->execute();
    $resultado = $sth->fetch(PDO::FETCH_ASSOC);
    extract($resultado);

?>

<html lang="en">
  <head>
     <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">

        <title>Health & Life</title>
    </head>
    <body>
        <?php
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

        <div class="row">
          <div class="card" style="width: 20rem;">
            <div class="card-body" style="background-color: #a7ffeb">
              <center>
                <?php
                  $sth = $pdo->prepare('select *from tbl_img_dado where im_detalhe = :im_detalhe and im_medico = :im_medico');
                  $sth->bindValue(':im_medico',$me_codigo);
                  $sth->bindValue(':im_detalhe', 9 );
                  $sth->execute();
                  $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                  extract($resultado);

                  echo "<img src='../../secretario/cadastro_medico/img/" . $im_dado. "' alt='Fotos' width='190' height='190' class='rounded-circle' />";
                            
                ?>
                
                <div class="text-right">
                       
                  <!-- Button trigger modal -->
                    <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#exampleModal2">
                      Atualizar
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Atualizar</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form name="form1" action="update/update1.php" method="POST" enctype = "multipart/form-data">
                              <div class="input-field col s3">
                                <input name="im_medico" type="hidden" value="<?= $im_medico; ?>" data-length="200">
                                <input name="detalhe" type="hidden" value="<?= 9; ?>">
                                <div class="file-field input-field">
                                  <span class="text-body">Imagem</span>
                                  <div class="btn">
                                    <input type="file" name="fileUpload"  required placeholder=" Selecionar Imagem">
                                  </div>
                                </div>
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

              </center>

              <center> <h5 class="card-text"><b><?php echo $me_nome ?></b></h5> </center>
              <br/>

              <div class="row text-center ">
                <div class="col-lg-7">
                  <h5 class="card-text"><?php echo $me_dt_nasc;?></h5>
                </div>
                <div class="col-lg-5">
                  <h5 class="card-text"><?php echo $tipo_genero_tipo;?></h5>
                </div>
              </div>
              <br/><br/>
                    
              <center><h5 class="card-text "><b>Email:</b></h5></center>
              <br/>
              <center> <h5 class="card-text "><?php echo $me_email ?></h5></center>
              <br/><br/><br/><br/>
                          
              <div class="row">
                <div class="container">
                  <div class="text-right">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#exampleModal">
                      Atualizar
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Atualizar</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form name="form2" action="updateMed.php" method="POST">   
                              <div class="input-field col s2">
                                <input name="me_codigo" type="hidden"value="<?= $me_codigo; ?>" data-length="200">
                                <div class="text-left">
                                  <label>Nome</label>
                                </div>
                                <input name="me_nome" type="text" class="form-control"placeholder="Nome Completo">    
                              </div>
                              <div class="input-field col s2">
                                <input name="me_codigo" type="hidden"value="<?= $me_codigo; ?>" data-length="200">
                                <div class="text-left">
                                  <label>Data de Nascimento</label>
                                </div>
                                <input type="date" class="form-control" name="me_dt_nasc"/>
                              </div>
                              <div class="input-field col s2">
                                <input name="me_codigo" type="hidden"value="<?= $me_codigo; ?>" data-length="200">
                                <div class="text-left">
                                  <label>Gênero</label>
                                </div>
                                <select name="me_genero" class="form-control">
                                  <?php
                                    $sth = $pdo ->prepare('select * from tbl_genero');
                                    $sth->execute(); 
                                    foreach ($sth as $res){ 
                                      extract($res);
                                      echo'<option value="'. $tipo_genero_codigo .'">' . $tipo_genero_tipo . '</option>'; 
                                    }  
                                  ?>
                                </select>
                              </div>
                              </br>
                             
                              <div class="input-field col s2">
                                <input name="me_codigo" type="hidden"value="<?= $me_codigo; ?>" data-length="200">
                                <div class="text-left">
                                  <label>Email</label>
                                </div>
                                <input type="text" class="form-control" name="me_email" placeholder="Email"/>
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
                </div>
              </div>
            </div>
          </div>
        
          <div class="col-lg-9 right">
            <br/>
            <div class="card" style="width: 63rem;">
              <div class="card-body" style="background-color: #a7ffeb">
                <center> <h2 class="card-title"><b>Informações</b></h2> </center>
                <br/><br/><br/>
                <div class="row">
                  <div class="col-lg-4">
                    <h5 class="card-text"><b>RG :</b><?php echo $me_RG;?></h5>
                  </div>
                  <div class="col-lg-4">
                    <h5 class="card-text"><b>CPF :</b><?php echo $me_CPF;?></h5>
                  </div>
                  <div class="col-lg-4">
                    <h5 class="card-text"><b>Especialidade :</b><?php echo $es_tipo;?></h5>
                  </div>
                </div>
                <br/><br/><br/>
                <div class="row ">
                  <div class="col-lg-4">
                    <h5 class="card-text"><b>Aprovação do exame :</b><?php echo $op_tipo;?></h5>
                  </div>    
                  <?php
                    $sth = $pdo->prepare('
                    select *from tbl_login l 
                    INNER JOIN tbl_unidade u on l.lo_unidade = u.un_codigo
                    where l.lo_codigo = :lo_codigo
                    ');

                    $sth->bindValue(':lo_codigo', $_SESSION["health"]["id"]);
                    $sth->execute();
                    $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                    extract($resultado);
                  ?>
                  <div class="col-lg-4">
                    <h5 class="card-text"><b>Unidade :</b><?php echo $un_tipo;?></h5>
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
                            <form name="form3" action="update/update2.php" method="POST">
                            <input name="lo_codigo" type="hidden"value="<?= $me_login; ?>" data-length="200">
                              <div class="input-field col s2">
                                <div class="text-left">
                                  <label>Unidade</label>
                                </div>
                                <select name="lo_unidade" class="form-control">
                                  <?php
                                    $sth = $pdo ->prepare('select * from tbl_unidade');
                                    $sth->execute(); 
                                    foreach ($sth as $res){ 
                                      extract($res);
                                      echo'<option value="'. $un_codigo .'">' . $un_tipo . '</option>'; 
                                    }  
                                  ?>
                                </select>
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
                </div>
                <br/><br/>

                <div class="text-right">
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#exampleModal3">
                    Atualizar
                  </button>
                  <!-- Modal -->
                  <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Atualizar</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form name="form4" action="updateM.php" method="POST">    
                            <div class="input-field col s2">
                              <input name="me_codigo" type="hidden" value="<?= $me_codigo; ?>" data-length="200">
                                <div class="text-left">
                                  <label>RG</label>
                                </div>
                                <input type="text" class="form-control" name="me_RG" />
                            </div>
                            <div class="input-field col s2">
                              <input name="me_codigo" type="hidden" value="<?= $me_codigo; ?>" data-length="200">
                              <div class="text-left">
                                <label>CPF</label>
                              </div>
                              <input type="text" class="form-control" name="me_CPF" />
                            </div>
                            <div class="input-field col s2">
                              <input name="me_codigo" type="hidden" value="<?= $me_codigo; ?>" data-length="200">
                              <div class="text-left">
                                <label>Especialidade</label>
                              </div>
                              <select name="me_especialidade" class="form-control">
                                <?php
                                  $sth = $pdo ->prepare('select * from tbl_especialidade');
                                  $sth->execute(); 
                                  foreach ($sth as $res){ 
                                  extract($res);
                                  echo'<option value="'. $es_codigo .'">' . $es_tipo . '</option>'; 
                                    } 
                                ?>
                              </select>
                            </div>                                        
 
                            <div class="input-field col s2">
                              <input name="me_codigo" type="hidden" value="<?= $me_codigo; ?>" data-length="200">
                                <div class="text-left">
                                  <label>Aprovação exame</label>
                                </div>
                                <select name="me_aprov_exame" class="form-control">
                                    <?php
                                      $sth = $pdo->prepare('select* from tbl_opcao ');
                                      $sth->execute();
                                      foreach ($sth as $res){
                                      extract($res);
                                      echo '<option value ="' . $op_codigo . '">' . $op_tipo . '</option>';
                                      }
                                    ?>
                                </select>
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
              </div>
            </div>
            <br/><br/>
            <div class="card" style="width: 63rem;">
              <div class="card-body" style="background-color: #a7ffeb">
                <center> <h2 class="card-title"><b>Comprovantes </b></h2> </center>
                <br/><br/>
                <div class="row ">
                  <div class="col-lg-4">
                    <h5 class="card-text"><b>Titulo de eleitor - Frente :</b>
                      <br/> <br/>
                        <?php
                          $sth = $pdo->prepare('select *from tbl_img_dado where im_detalhe = :im_detalhe and im_medico = :im_medico');
                          $sth->bindValue(':im_medico',$me_codigo);
                          $sth->bindValue(':im_detalhe', 4 );
                          $sth->execute();
                          $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                          extract($resultado);

                          echo "<img src='../../secretario/cadastro_medico/img/" . $im_dado. "' alt='Fotos' width='190' height='190' class='circle responsive-img' />";
                                                                      
                        ?>
                    </h5>                                
                    <div class="text-right">
                      <!-- Button trigger modal -->
                      <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#exampleModal4">
                        Atualizar
                      </button>
                      <!-- Modal -->
                      <div class="modal fade" id="exampleModal4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Atualizar</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form name="form5" action="update/update3.php" method="POST" enctype = "multipart/form-data">
                                <div class="input-field col s2"> 
                                  <input name="im_medico" type="hidden" value="<?= $im_medico; ?>" data-length="200">
                                  <input name="detalhe" type="hidden" value="<?= 4; ?>">
                                  <div class="file-field input-field">
                                    <span class="text-body">Imagem</span>
                                    <div class="btn">
                                      <input type="file" name="fileUpload"  required placeholder=" Selecionar Imagem">
                                    </div>
                                  </div>
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
                  </div>
                  </br>
                  <div class="col-lg-4">
                    <h5 class="card-text"><b>Titulo de eleitor - Verso :</b>
                      <br/> <br/>
                      <?php
                        $sth = $pdo->prepare('select *from tbl_img_dado where im_detalhe = :im_detalhe and im_medico = :im_medico');
                        $sth->bindValue(':im_medico',$me_codigo);
                        $sth->bindValue(':im_detalhe', 10 );
                        $sth->execute();
                        $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                        extract($resultado);

                        echo "<img src='../../secretario/cadastro_medico/img/" . $im_dado. "' alt='Fotos' width='190' height='190' class='circle responsive-img' />";
                                                                    
                      ?>
                    </h5>
                                                        
                    <div class="text-right">      
                       <!-- Button trigger modal -->
                      <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#exampleModal5">
                        Atualizar
                      </button>
                      <!-- Modal -->
                      <div class="modal fade" id="exampleModal5" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Atualizar</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                            <form name="form6" action="update/update4.php" method="POST" enctype = "multipart/form-data">
                                <div class="input-field col s2"> 
                                  <input name="im_medico" type="hidden" value="<?= $im_medico; ?>" data-length="200">
                                  <input name="detalhe" type="hidden" value="<?= 10; ?>">
                                  <div class="file-field input-field">
                                    <span class="text-body">Imagem</span>
                                    <div class="btn">
                                      <input type="file" name="fileUpload"  required placeholder=" Selecionar Imagem">
                                    </div>
                                  </div>
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
                  </div>
                  </br>
                  <div class="col-lg-4">
                    <h5 class="card-text"><b>Certidão Nasc. ou Casamento :</b> 
                      <br/> <br/>
                      <?php
                        $sth = $pdo->prepare('select *from tbl_img_dado where im_detalhe = :im_detalhe and im_medico = :im_medico');
                        $sth->bindValue(':im_medico',$me_codigo);
                        $sth->bindValue(':im_detalhe', 5 );
                        $sth->execute();
                        $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                        extract($resultado);

                        echo "<img src='../../secretario/cadastro_medico/img/" . $im_dado. "' alt='Fotos' width='190' height='190' class='circle responsive-img' />";
                      ?>
                    </h5>
                    <div class="text-right">
                       
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#exampleModal6">
                      Atualizar
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal6" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Atualizar</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                          <form name="form7" action="update/update5.php" method="POST" enctype = "multipart/form-data">
                            <div class="input-field col s2"> 
                              <input name="im_medico" type="hidden" value="<?= $im_medico; ?>" data-length="200">
                              <input name="detalhe" type="hidden" value="<?= 5; ?>">
                              <div class="file-field input-field">
                                <span class="text-body">Imagem</span>
                                <div class="btn">
                                  <input type="file" name="fileUpload"  required placeholder=" Selecionar Imagem">
                                </div>
                              </div>
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
              </div>
            </div>
            <br/>

            <div class="row ">
              <div class="col-lg-4">
                <h5 class="card-text"><b>Documento do PIS :</b>
                  <br/> <br/>
                  <?php
                    $sth = $pdo->prepare('select *from tbl_img_dado where im_detalhe = :im_detalhe and im_medico = :im_medico');
                    $sth->bindValue(':im_medico',$me_codigo);
                    $sth->bindValue(':im_detalhe', 6 );
                    $sth->execute();
                    $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                    extract($resultado);

                    echo "<img src='../../secretario/cadastro_medico/img/" . $im_dado. "' alt='Fotos' width='190' height='190' class='circle responsive-img' />";
                                                                
                  ?>
                </h5>
                              
                <div class="text-right">
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#exampleModal7">
                    Atualizar
                  </button>

                  <!-- Modal -->
                  <div class="modal fade" id="exampleModal7" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Atualizar</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form name="form8" action="update/update6.php" method="POST" enctype = "multipart/form-data">
                            <div class="input-field col s2"> 
                              <input name="im_medico" type="hidden" value="<?= $im_medico; ?>" data-length="200">
                              <input name="detalhe" type="hidden" value="<?= 6; ?>">
                              <div class="file-field input-field">
                                <span class="text-body">Imagem</span>
                                <div class="btn">
                                  <input type="file" name="fileUpload"  required placeholder=" Selecionar Imagem">
                                </div>
                              </div>
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
              </div>

              <div class="col-lg-4">
                <h5 class="card-text"><b>Carteira de Trabalho - Frente:</b>
                  <br/> <br/>
                  <?php
                    $sth = $pdo->prepare('select *from tbl_img_dado where im_detalhe = :im_detalhe and im_medico = :im_medico');
                    $sth->bindValue(':im_medico',$me_codigo);
                    $sth->bindValue(':im_detalhe', 7 );
                    $sth->execute();
                    $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                    extract($resultado);

                    echo "<img src='../../secretario/cadastro_medico/img/" . $im_dado. "' alt='Fotos' width='190' height='190' class='circle responsive-img' />";
                                                                
                  ?>
                </h5>

                <div class="text-right">
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#exampleModal8">
                    Atualizar
                  </button>

                  <!-- Modal -->
                  <div class="modal fade" id="exampleModal8" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Atualizar</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form name="form9" action="update/update7.php" method="POST" enctype = "multipart/form-data">
                            <div class="input-field col s2"> 
                              <input name="im_medico" type="hidden" value="<?= $im_medico; ?>" data-length="200">
                              <input name="detalhe" type="hidden" value="<?= 7; ?>">
                              <div class="file-field input-field">
                                <span class="text-body">Imagem</span>
                                <div class="btn">
                                  <input type="file" name="fileUpload"  required placeholder=" Selecionar Imagem">
                                </div>
                              </div>
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
              </div>

              <div class="col-lg-4">
                <h5 class="card-text"><b>Carteira de Trabalho - Verso:</b>
                  <br/> <br/>
                  <?php
                    $sth = $pdo->prepare('select *from tbl_img_dado where im_detalhe = :im_detalhe and im_medico = :im_medico');
                    $sth->bindValue(':im_medico',$me_codigo);
                    $sth->bindValue(':im_detalhe', 11 );
                    $sth->execute();
                    $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                    extract($resultado);

                    echo "<img src='../../secretario/cadastro_medico/img/" . $im_dado. "' alt='Fotos' width='190' height='190' class='circle responsive-img' />";
                                                                
                  ?>
                </h5>
                                  
                <div class="text-right">
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#exampleModal9">
                    Atualizar
                  </button>

                  <!-- Modal -->
                  <div class="modal fade" id="exampleModal9" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Atualizar</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form name="form10" action="update/update8.php" method="POST" enctype = "multipart/form-data">
                            <div class="input-field col s2"> 
                              <input name="im_medico" type="hidden" value="<?= $im_medico; ?>" data-length="200">
                              <input name="detalhe" type="hidden" value="<?= 11; ?>">
                              <div class="file-field input-field">
                                <span class="text-body">Imagem</span>
                                <div class="btn">
                                  <input type="file" name="fileUpload"  required placeholder=" Selecionar Imagem">
                                </div>
                              </div>
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
              </div>
            </div>
            <br/>
                               
            <div class="row ">
              <div class="col-lg-4">
                <h5 class="card-text"><b>Declaração de bens:</b>
                  <br/> <br/>
                  <?php
                    $sth = $pdo->prepare('select *from tbl_img_dado where im_detalhe = :im_detalhe and im_medico = :im_medico');
                    $sth->bindValue(':im_medico',$me_codigo);
                    $sth->bindValue(':im_detalhe', 8 );
                    $sth->execute();
                    $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                    extract($resultado);

                    echo "<img src='../../secretario/cadastro_medico/img/" . $im_dado. "' alt='Fotos' width='190' height='190' class='circle responsive-img' />";
                                                            
                  ?>
                </h5>                                   
                <div class="text-right">
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#exampleModal10">
                    Atualizar
                  </button>

                  <!-- Modal -->
                  <div class="modal fade" id="exampleModal10" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Atualizar</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form name="form11" action="update/update9.php" method="POST" enctype = "multipart/form-data">
                            <div class="input-field col s2"> 
                              <input name="im_medico" type="hidden" value="<?= $im_medico; ?>" data-length="200">
                              <input name="detalhe" type="hidden" value="<?= 8; ?>">
                              <div class="file-field input-field">
                                <span class="text-body">Imagem</span>
                                <div class="btn">
                                  <input type="file" name="fileUpload"  required placeholder=" Selecionar Imagem">
                                </div>
                              </div>
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
              </div>
            
            <br/>
            <div class="col-lg-4">
              <h5 class="card-text"><b>Escolaridade - Frente :</b>
                <br/> <br/>
                <?php
                  $sth = $pdo->prepare('select *from tbl_img_dado where im_detalhe = :im_detalhe and im_medico = :im_medico');
                  $sth->bindValue(':im_medico',$me_codigo);
                  $sth->bindValue(':im_detalhe', 3 );
                  $sth->execute();
                  $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                  extract($resultado);

                  echo "<img src='../../secretario/cadastro_medico/img/" . $im_dado. "' alt='Fotos' width='190' height='190' class='circle responsive-img' />";
                                                              
                ?>
              </h5>                                      
              <div class="text-right">      
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#exampleModal11">
                  Atualizar
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal11" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Atualizar</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form name="form12" action="update/update10.php" method="POST" enctype = "multipart/form-data">
                          <div class="input-field col s2"> 
                            <input name="im_medico" type="hidden" value="<?= $im_medico; ?>" data-length="200">
                            <input name="detalhe" type="hidden" value="<?= 3; ?>">
                            <div class="file-field input-field">
                              <span class="text-body">Imagem</span>
                              <div class="btn">
                                <input type="file" name="fileUpload"  required placeholder=" Selecionar Imagem">
                              </div>
                            </div>
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
            </div>
            <br/>

            <div class="col-lg-4">
              <h5 class="card-text"><b>Escolaridade - Verso :</b>
                <br/> <br/>
                <?php
                  $sth = $pdo->prepare('select *from tbl_img_dado where im_detalhe = :im_detalhe and im_medico = :im_medico');
                  $sth->bindValue(':im_medico',$me_codigo);
                  $sth->bindValue(':im_detalhe', 13 );
                  $sth->execute();
                  $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                  extract($resultado);

                  echo "<img src='../../secretario/cadastro_medico/img/" . $im_dado. "' alt='Fotos' width='190' height='190' class='circle responsive-img' />";
                                                              
                ?>
              </h5>

              <div class="text-right">
                       
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#exampleModal12">
                  Atualizar
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal12" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Atualizar</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form name="form13" action="update/update11.php" method="POST" enctype = "multipart/form-data">
                          <div class="input-field col s2"> 
                            <input name="im_medico" type="hidden" value="<?= $im_medico; ?>" data-length="200">
                            <input name="detalhe" type="hidden" value="<?= 13; ?>">
                            <div class="file-field input-field">
                              <span class="text-body">Imagem</span>
                              <div class="btn">
                                <input type="file" name="fileUpload"  required placeholder=" Selecionar Imagem">
                              </div>
                            </div>
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
            </div>
          </div>

          <div class="row">
            <div class="col-lg-4">
              <h5 class="card-text"><b>RG - Frente :</b>
                <br/> <br/>
                <?php
                  $sth = $pdo->prepare('select *from tbl_img_dado where im_detalhe = :im_detalhe and im_medico = :im_medico');
                  $sth->bindValue(':im_medico',$me_codigo);
                  $sth->bindValue(':im_detalhe', 2 );
                  $sth->execute();
                  $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                  extract($resultado);

                  echo "<img src='../../secretario/cadastro_medico/img/" . $im_dado. "' alt='Fotos' width='190' height='190' class='circle responsive-img' />";
                                                              
                ?>
              </h5>

              <div class="text-right">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#exampleModal13">
                  Atualizar
                </button>               

                <!-- Modal -->
                <div class="modal fade" id="exampleModal13" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Atualizar</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form name="form14" action="update/update12.php" method="POST" enctype = "multipart/form-data">
                          <div class="input-field col s2"> 
                            <input name="im_medico" type="hidden" value="<?= $im_medico; ?>" data-length="200">
                            <input name="detalhe" type="hidden" value="<?= 2; ?>">
                            <div class="file-field input-field">
                              <span class="text-body">Imagem</span>
                              <div class="btn">
                                <input type="file" name="fileUpload"  required placeholder=" Selecionar Imagem">
                              </div>
                            </div>
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
            </div>

            <div class="col-lg-4">
              <h5 class="card-text"><b>RG - Verso :</b>
                <br/> <br/>
                <?php
                  $sth = $pdo->prepare('select *from tbl_img_dado where im_detalhe = :im_detalhe and im_medico = :im_medico');
                  $sth->bindValue(':im_medico',$me_codigo);
                  $sth->bindValue(':im_detalhe', 12 );
                  $sth->execute();
                  $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                  extract($resultado);

                  echo "<img src='../../secretario/cadastro_medico/img/" . $im_dado. "' alt='Fotos' width='190' height='190' class='circle responsive-img' />";
                                                              
                ?>
              </h5>
                                     
              <div class="text-right">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#exampleModal14">
                  Atualizar
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal14" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Atualizar</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form name="form15" action="update/update13.php" method="POST" enctype = "multipart/form-data">
                          <div class="input-field col s2"> 
                            <input name="im_medico" type="hidden" value="<?= $im_medico; ?>" data-length="200">
                            <input name="detalhe" type="hidden" value="<?= 12; ?>">
                            <div class="file-field input-field">
                              <span class="text-body">Imagem</span>
                              <div class="btn">
                                <input type="file" name="fileUpload"  required placeholder=" Selecionar Imagem">
                              </div>
                            </div>
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
            </div>

            <div class="col-lg-4">
              <h5 class="card-text"><b>Residência :</b>
                <br/> <br/>
                  <?php
                    $sth = $pdo->prepare('select *from tbl_img_dado where im_detalhe = :im_detalhe and im_medico = :im_medico');
                    $sth->bindValue(':im_medico',$me_codigo);
                    $sth->bindValue(':im_detalhe', 1 );
                    $sth->execute();
                    $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                    extract($resultado);

                    echo "<img src='../../secretario/cadastro_medico/img/" . $im_dado. "' alt='Fotos' width='190' height='190' class='circle responsive-img' />";
                                                                
                  ?>
              </h5>

              <div class="text-right">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#exampleModal15">
                  Atualizar
                </button> 

                <!-- Modal -->
                <div class="modal fade" id="exampleModal15" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Atualizar</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form name="form16" action="update/update14.php" method="POST" enctype = "multipart/form-data">
                          <div class="input-field col s2"> 
                            <input name="im_medico" type="hidden" value="<?= $im_medico; ?>" data-length="200">
                            <input name="detalhe" type="hidden" value="<?= 1; ?>">
                            <div class="file-field input-field">
                              <span class="text-body">Imagem</span>
                              <div class="btn">
                                <input type="file" name="fileUpload"  required placeholder=" Selecionar Imagem">
                              </div>
                            </div>
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
            </div>
          </div>
        </div> 
      </div> 
    </div>  
  </div>  
</body>
              
    <br/><br/>
    <?php
        include '../../footer.php';
    ?>   
    <!-- Optional JavaScript -->
    
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        
    <script>
        $('#myTab a').on('click', function (e) {
            e.preventDefault()
            $(this).tab('show')
        })

    </script>
</body>
</html>