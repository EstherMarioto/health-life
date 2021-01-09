<!doctype html>
<?php

     session_start();
     include '../../conexao/conexao.php';
     $sth = $pdo->prepare('select *from tbl_img_dado where im_enfermeiro = :im_enfermeiro');
     $sth->bindValue(':im_enfermeiro', $_SESSION["health"]["id"]);
     $sth->execute();
     $resultado = $sth->fetch(PDO::FETCH_ASSOC);
     extract($resultado);
 ?>
 <?php
    $sth = $pdo->prepare('
        select *from tbl_enfermeiro e 
        INNER JOIN tbl_genero g on e.en_genero = g.tipo_genero_codigo
        INNER JOIN tbl_opcao o on e.en_aprov_exame = o.op_codigo
        where e.en_login = :en_login
    ');

    $sth->bindValue(':en_login', $_SESSION["health"]["id"]);
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
        
        </br> <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="../home.php">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Usuario</li>
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
    </div>
            <div class="row">
              <div class="card" style="width: 20rem;">
                <div class="card-body" style="background-color: #a7ffeb">
                    <center>
                    <?php
                        $sth = $pdo->prepare('select *from tbl_img_dado where im_detalhe = :im_detalhe and im_enfermeiro = :im_enfermeiro');
                        $sth->bindValue(':im_enfermeiro',$en_codigo);
                        $sth->bindValue(':im_detalhe', 9 );
                        $sth->execute();
                        $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                        extract($resultado);

                        echo "<img src='../../secretario/cadastro_enfermeiro/img/" . $im_dado. "' alt='Fotos' width='190' height='190' class='rounded-circle'  />";
                    ?>

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
                              <form name="form1" action="Update/Img1.php" method="POST" enctype = "multipart/form-data">
                                <div class="input-field col s2"> 
                                  <input name="im_enfermeiro" type="hidden" value="<?= $im_enfermeiro; ?>" data-length="200">
                                  <input name="detalhe" type="hidden" value="<?= 9; ?>">
                                  <div class="file-field input-field">
                                  <span class="text-body">Imagem</span>
                                  <div class="btn">
                                      <input type="file" class="custom-file" name="fileUpload" id="customFileLang" lang="es" required placeholder=" Selecionar Imagem">
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

                    <center> <h5 class="card-text"><b><?php echo $en_nome;?></b></h5> </center>
                    <br/>
                  
                    <div class="row text-center ">
                        <div class="col-lg-7">
                            <h5 class="card-text"><?php echo $en_dt_nasc;?></h5>
                        </div>
                        <div class="col-lg-5">
                            <h5 class="card-text"><?php echo $tipo_genero_tipo;?></h5>
                        </div>
                    </div>
                    <br/> <br/>
                    
                    <center><h5 class="card-text "><b>Email:</b></h5></center>
                    <br/>
                    <center> <h5 class="card-text "><?php echo $en_email;?></h5></center>
                    <br/><br/><br/><br/>
                          
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
                            <form name="form2" action="Update/update_en.php" method="POST">    
                              <div class="input-field col s2">
                                <input name="en_codigo" type="hidden"value="<?= $en_codigo; ?>" data-length="200">
                                <div class="text-left">
                                  <label>Data de Nascimento</label>
                                </div>
                                <input type="date" class="form-control" name="en_dt_nasc"/>
                              </div>       
                              <div class="input-field col s2">
                                <input name="en_codigo" type="hidden"value="<?= $en_codigo; ?>" data-length="200">
                                <div class="text-left">
                                  <label>Gênero</label>
                                </div>
                                <select name="en_genero" class="form-control">
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
              
                              <div class="input-field col s2">
                                <input name="en_codigo" type="hidden"value="<?= $en_codigo; ?>" data-length="200">
                                <div class="text-left">
                                  <label>Nome</label>
                                </div>
                                <input name="en_nome" type="text" class="form-control"placeholder="Nome Completo"> 
                              </div>
                       
                              <div class="input-field col s2">
                                <input name="en_codigo" type="hidden"value="<?= $en_codigo; ?>" data-length="200">
                                <div class="text-left">
                                  <label>Email</label>
                                </div>
                                <input type="text" class="form-control" name="en_email" placeholder="Email"/>
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
        
              <div class="col-lg-9 right">
              <br/>
                <div class="card" style="width: 63rem;">
                  <div class="card-body" style="background-color: #a7ffeb">
                    <center> <h2 class="card-title"><b>Informações</b></h2> </center>
                    <br/><br/><br/>
                      <div class = "row">
                        <div class="col-lg-4">
                          <h5 class="card-text"><b>RG :</b><span>!</span><?php echo $en_RG;?></h5>
                        </div>         
                        <div class="col-lg-4">
                          <h5 class="card-text"><b>CPF :</b><span>!</span><?php echo $en_CPF;?></h5>
                        </div>
                        <div class="col-lg-4">
                          <h5 class="card-text"><b>Telefone :</b><span>!</span><?php echo $en_telefone;?></h5>
                        </div>
                      </div>

                      <br/><br/><br/>
                      <br/><br/><br/>

                      <div class="row ">
                        <div class="col-lg-4">
                          <h5 class="card-text"><b>Aprovação do exame :</b><span>!</span><?php echo $op_tipo;?></h5>
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
                          <h5 class="card-text"><b>Unidade :</b><span>!</span><?php echo $un_tipo;?></h5>
                          <div class="text-right">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#exampleModal12">
                              Atualizar Unidade
                            </button>
                          </div>

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
                                  <form name="form3" action="Update/updateUni.php" method="POST">           
                                    <div class="input-field col s2">
                                      <input name="lo_codigo" type="hidden"value="<?= $en_login; ?>" data-length="200">
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
                      
                      <div class="text-right">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#exampleModal1">
                          Atualizar
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Atualizar</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <form name="form4" action="Update/updateInfo.php" method="POST">    
                                  <div class="input-field col s2">
                                    <input name="en_codigo" type="hidden"value="<?= $en_codigo; ?>" data-length="200">
                                    <label>RG</label>  
                                    <input name="en_RG" placeholder="RG" data-length="9" class="form-control input-  Zmd" required="" type="text" />
                                  </div>                                    
                                  <div class="input-field col s2">
                                    <input name="en_codigo" type="hidden"value="<?= $en_codigo; ?>" data-length="200">
                                    <label>CPF</label>  
                                    <input name="en_CPF" placeholder="CPF" data-length="11" class="form-control input-  Zmd" required="" type="text" />
                                  </div>
                                  <div class="input-field col s2">
                                    <input name="en_codigo" type="hidden"value="<?= $en_codigo; ?>" data-length="200">
                                    <label>Telefone</label>  
                                    <input name="en_telefone" placeholder="(xx)xxxx-xxxx" data-length="11" class="form-control input-  Zmd" required="" type="text" />
                                  </div>
                                  <div class="input-field col s2">
                                    <input name="en_codigo" type="hidden" value="<?= $en_codigo; ?>" data-length="200">
                                    <div class="text-left">
                                      <label>Aprovação exame</label>
                                    </div>
                                    <select name="en_aprov_exame" class="form-control">
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
                        </br></br>
                      </div>
                      <br/><br/>

                      <div class="row ">
                        <div class="col-lg-4">
                          <h5 class="card-text"><b>Comprovante RG :</b><span>!</span><br/><br/>
                            <?php
                              $sth = $pdo->prepare('select *from tbl_img_dado where im_detalhe = :im_detalhe and im_enfermeiro = :im_enfermeiro');
                              $sth->bindValue(':im_enfermeiro',$en_codigo);
                              $sth->bindValue(':im_detalhe', 2 );
                              $sth->execute();
                              $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                              extract($resultado);

                              echo "<img src='../../secretario/cadastro_enfermeiro/img/" . $im_dado. "' alt='Fotos' width='190' height='190' class='circle responsive-img' />";
                            ?>
                          </h5>
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
                                    <form name="form5" action="Update/updateImg2.php" method="POST" enctype = "multipart/form-data">
                                      <div class="input-field col s2"> 
                                        <input name="im_enfermeiro" type="hidden" value="<?= $im_enfermeiro; ?>" data-length="200">
                                        <input name="detalhe" type="hidden" value="<?= 2; ?>">
                                        <div class="file-field input-field">
                                          <span class="text-body">Imagem</span>
                                          <div class="btn">
                                            <input type="file" class="custom-file" name="fileUpload" id="customFileLang" lang="es" required placeholder=" Selecionar Imagem">
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
                            <h5 class="card-text"><b>Comprovante RG :</b><span>!</span><br/><br/>
                                <?php
                                    $sth = $pdo->prepare('select *from tbl_img_dado where im_detalhe = :im_detalhe and im_enfermeiro = :im_enfermeiro');
                                    $sth->bindValue(':im_enfermeiro',$en_codigo);
                                    $sth->bindValue(':im_detalhe', 12 );
                                    $sth->execute();
                                    $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                                    extract($resultado);

                                    echo "<img src='../../secretario/cadastro_enfermeiro/img/" . $im_dado. "' alt='Fotos' width='190' height='190' class='circle responsive-img' />";
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
                                      <form name="form6" action="Update/updateImg3.php" method="POST" enctype = "multipart/form-data">
                                        <div class="input-field col s2"> 
                                          <input name="im_enfermeiro" type="hidden" value="<?= $im_enfermeiro; ?>" data-length="200">
                                          <input name="detalhe" type="hidden" value="<?= 12; ?>">
                                          <div class="file-field input-field">
                                            <span class="text-body">Imagem</span>
                                             <div class="btn">
                                              <input type="file" class="custom-file" name="fileUpload" id="customFileLang" lang="es" required placeholder=" Selecionar Imagem">
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
                            <h5 class="card-text"><b>Comprovante de escolaridade :</b><span>!</span><br/><br/>
                                <?php
                                    $sth = $pdo->prepare('select *from tbl_img_dado where im_detalhe = :im_detalhe and im_enfermeiro = :im_enfermeiro');
                                    $sth->bindValue(':im_enfermeiro',$en_codigo);
                                    $sth->bindValue(':im_detalhe', 3 );
                                    $sth->execute();
                                    $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                                    extract($resultado);

                                    echo "<img src='../../secretario/cadastro_enfermeiro/img/" . $im_dado. "' alt='Fotos' width='190' height='190' class='circle responsive-img' />";
                            
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
                                      <form name="form7" action="Update/updateImg4.php" method="POST" enctype = "multipart/form-data">
                                        <div class="input-field col s2"> 
                                          <input name="im_enfermeiro" type="hidden" value="<?= $im_enfermeiro; ?>" data-length="200">
                                          <input name="detalhe" type="hidden" value="<?= 3; ?>">
                                          <div class="file-field input-field">
                                            <span class="text-body">Imagem</span>
                                            <div class="btn">
                                              <input type="file" class="custom-file" name="fileUpload" id="customFileLang" lang="es" required placeholder=" Selecionar Imagem">
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
                        <br/><br/>

                        <div class="row ">
                          <div class="col-lg-4">
                            <h5 class="card-text"><b>Comprovante de escolaridade :</b><span>!</span><br/><br/>
                              <?php
                                    $sth = $pdo->prepare('select *from tbl_img_dado where im_detalhe = :im_detalhe and im_enfermeiro = :im_enfermeiro');
                                    $sth->bindValue(':im_enfermeiro',$en_codigo);
                                    $sth->bindValue(':im_detalhe', 13 );
                                    $sth->execute();
                                    $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                                    extract($resultado);

                                    echo "<img src='../../secretario/cadastro_enfermeiro/img/" . $im_dado. "' alt='Fotos' width='190' height='190' class='circle responsive-img' />";
                        
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
                                      <form name="form7" action="Update/updateImg5.php" method="POST" enctype = "multipart/form-data">
                                        <div class="input-field col s2"> 
                                          <input name="im_enfermeiro" type="hidden" value="<?= $im_enfermeiro; ?>" data-length="200">
                                          <input name="detalhe" type="hidden" value="<?= 13; ?>">
                                          <div class="file-field input-field">
                                            <span class="text-body">Imagem</span>
                                            <div class="btn">
                                              <input type="file" class="custom-file" name="fileUpload" id="customFileLang" lang="es" required placeholder=" Selecionar Imagem">
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
                            <h5 class="card-text"><b>Comprovante de Residência :</b><br/><br/> 
                              <?php
                                    $sth = $pdo->prepare('select *from tbl_img_dado where im_detalhe = :im_detalhe and im_enfermeiro = :im_enfermeiro');
                                    $sth->bindValue(':im_enfermeiro',$en_codigo);
                                    $sth->bindValue(':im_detalhe', 1 );
                                    $sth->execute();
                                    $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                                    extract($resultado);

                                    echo "<img src='../../secretario/cadastro_enfermeiro/img/" . $im_dado. "' alt='Fotos' width='190' height='190' class='circle responsive-img' />";
                                    
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
                                      <form name="form8" action="Update/updateImg6.php" method="POST" enctype = "multipart/form-data">
                                        <div class="input-field col s2"> 
                                          <input name="im_enfermeiro" type="hidden" value="<?= $im_enfermeiro; ?>" data-length="200">
                                          <input name="detalhe" type="hidden" value="<?= 1; ?>">
                                          <div class="file-field input-field">
                                            <span class="text-body">Imagem</span>
                                            <div class="btn">
                                              <input type="file" class="custom-file" name="fileUpload" id="customFileLang" lang="es" required placeholder=" Selecionar Imagem">
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