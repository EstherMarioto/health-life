
<!doctype html>

<?php
        include '../../conexao/conexao.php';
        $mu_codigo = $_GET ['mu_codigo'];
          
  
?>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet"  href="../paciente/style.css">
    <title>Health & Life</title>
  </head>
  <body>
  
  <?php
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
  <br>
  <div class = "container">
    <div class = "card painel">
      <div class = "container">
        <br>
        <h2 class="text-center"><b><i>Publicações</i></b></h2>
          <?php
            include '../../conexao/conexao.php';          
            $sth = $pdo->prepare('SELECT *FROM tbl_mural ');
            $sth->execute();
          ?>
           <form name="form" action="insert_mural.php" method="post" enctype = "multipart/form-data">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label><b> Titulo </b></label>
                <input type="text" class="form-control" name="mu_titulo" placeholder="Titulo da sua Publicação" />
              </div>

              <div class="form-group col-md-3">
                <label><b>Data</b></label>
                <input type="date" class="form-control" name="mu_data"/>
              </div>

              <div class="form-group col-md-3">
                <label><b>Tipo</b></label>
                <select name="mu_tipo" class="form-control">
                  <?php
                    $sth = $pdo ->prepare('select * from tbl_tipo_mural');
                    $sth->execute(); 
                    foreach ($sth as $res){ 
                    extract($res);
                    echo'<option value="'. $tipo_mural_codigo .'">' . $tipo_mural_tipo . '</option>'; 
                    } 
                  ?>
                </select>
              </div>

              <div class="form-group col-md-1"></div> 
            </div> 
              <br/>

            <div class="form-row">
              <div class="form-group col-md-1"></div>
              <div class="form-group col-md-5">
                <label for="exampleFormControlTextreal"><b> Assunto</b></label>
                <textarea class="form-control" name="mu_assunto" placeholder="Assunto" rows="3"></textarea>
              </div>

            <div class="form-group col-md-1"></div>

            <div class="form-group col-md-4">
            <br/><br/><br/>
              <div class="custom-file">
                  <input type="file" class="custom-file-input" name="fileUpload" id="customFileLang" lang="es">
                  <label class="custom-file-label" for="customFileLang">Selecionar Imagem</label>
              </div>         
            </div>

            <div class="form-group col-md-4">
            <button type="submit" class="btn btn-primary">Cadastrar</button>
            </div>
            </div>
          </form>
        </div> 
      </div> 
    </div>
 <h1></h1>
 <br>
 <h1></h1>

 <center><h4 class="teal-text"><i> Publicações Cadastradas </i></h4></center>
    <table class="table table-striped">
      <tbody>
        <tr>
          <th scope="col">Tipo </th>
          <th scope="col">Titulo</th>
          <th scope="col">Assunto</th>
          <th scope="col">Imagem</th>
          <th scope="col">Data</th>
          <th scope="col"></th>
          <th scope="col"></th>
        </tr>
      </tbody>

      <div class="row center">
        <?php
          $sth = $pdo->prepare("SELECT * FROM tbl_mural");
          $sth->execute();
          foreach ($sth as $res) :
          extract($res);
        ?>

        <tbody>
          <tr>
            <th scope="row">
              <span class="card-title black-text">
                <h6><?= substr($mu_tipo, 0, 10); ?></h6>
              </span>
            </th>
            <td><h6><?= substr($mu_titulo, 0, 30); ?></a></h6></td>
            <td><h6><?= substr($mu_assunto, 0, 80); ?>...</h6></td>
            <td><h6><?= substr($mu_img, 0, 30); ?></h6>
            <a href="formulario_update_img.php?mu_codigo=<?=$mu_codigo;?>"> 
                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 172 172"style=" fill:#000000;">
                  <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                  <path d="M0,172v-172h172v172z" fill="none"></path>
                    <g fill="#67397c">
                      <path d="M86,21.5c-19.61127,0 -37.15804,8.82697 -48.97689,22.68978l-15.52311,-15.52311v43h43l-17.25879,-17.25879c9.1948,-11.28751 23.09893,-18.57454 38.75879,-18.57454c27.65617,0 50.16667,22.50333 50.16667,50.16667h14.33333c0,-35.561 -28.93183,-64.5 -64.5,-64.5zM21.5,86c0,35.56817 28.93183,64.5 64.5,64.5c19.61127,0 37.15804,-8.82697 48.97689,-22.68978l15.52311,15.52311v-43h-43l17.25879,17.25879c-9.1948,11.28751 -23.09893,18.57455 -38.75879,18.57455c-27.65617,0 -50.16667,-22.5105 -50.16667,-50.16667z"></path>
                   
                   </g>
                  </g>
                </svg>
              </div>
            
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

                      <form name="form1" action="insert1.php" method="POST">
                      <div class="input-field col s2">
                        <input name="mu_codigo" type="hidden" value="<?= $mu_codigo; ?>" data-length="200">
                        <div class="file-field input-field">
                        <div class="btn">
                        <i class="fa fa-user"></i>
                        <span>Imagem</span>
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





            </td>
            
            <td><h6><?= substr($mu_data, 0, 30); ?></h6></td>
            
            <td> 
           

           
            <?php echo '<a href="delete.php?mu_codigo='.$mu_codigo.'" class="waves-effect waves-orange btn deep-orange darken-1" style="width: 100%;">'?>
              <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"width="16" height="16"viewBox="0 0 172 172"style=" fill:#000000;">
                <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                <path d="M0,172v-172h172v172z" fill="none"></path>
                  <g>
                    <path d="M90.3,103.845l-52.2149,52.2149l-17.845,-17.845l52.2149,-52.2149l-52.2149,-52.2149l17.845,-17.845l52.2149,52.2149l52.2149,-52.2149l17.845,17.845l-52.2149,52.2149l52.2149,52.2149l-17.845,17.845z" fill="#e74c3c"></path>
                    <path d="M142.5149,18.9802l14.8049,14.8049l-49.1748,49.1748l-3.0401,3.0401l3.0401,3.0401l49.1748,49.1748l-14.8049,14.8049l-49.1748,-49.1748l-3.0401,-3.0401l-3.0401,3.0401l-49.1748,49.1748l-14.8049,-14.8049l49.1748,-49.1748l3.0401,-3.0401l-3.0401,-3.0401l-49.1748,-49.1748l14.8049,-14.8049l49.1748,49.1748l3.0401,3.0401l3.0401,-3.0401l49.1748,-49.1748M142.5149,12.9l-52.2149,52.2149l-52.2149,-52.2149l-20.8851,20.8851l52.2149,52.2149l-52.2149,52.2149l20.8851,20.8851l52.2149,-52.2149l52.2149,52.2149l20.8851,-20.8851l-52.2149,-52.2149l52.2149,-52.2149l-20.8851,-20.8851z" fill="#c74343"></path>
                  </g>
                </g>
              </svg>
              </a>
            </td>
            


            <td>
            <a href="formulario_update.php?mu_codigo=<?=$mu_codigo;?>"> 
                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 172 172"style=" fill:#000000;">
                  <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                  <path d="M0,172v-172h172v172z" fill="none"></path>
                    <g fill="#67397c">
                      <path d="M86,21.5c-19.61127,0 -37.15804,8.82697 -48.97689,22.68978l-15.52311,-15.52311v43h43l-17.25879,-17.25879c9.1948,-11.28751 23.09893,-18.57454 38.75879,-18.57454c27.65617,0 50.16667,22.50333 50.16667,50.16667h14.33333c0,-35.561 -28.93183,-64.5 -64.5,-64.5zM21.5,86c0,35.56817 28.93183,64.5 64.5,64.5c19.61127,0 37.15804,-8.82697 48.97689,-22.68978l15.52311,15.52311v-43h-43l17.25879,17.25879c-9.1948,11.28751 -23.09893,18.57455 -38.75879,18.57455c-27.65617,0 -50.16667,-22.5105 -50.16667,-50.16667z"></path>
                    </g>
                  </g>
                </svg>
            </a>
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

                      <form name="form1" action="updateMural.php" method="POST">
                    
                      <div class="input-field col s2">
                      <input name="mu_codigo" type="hidden" value="<?= $mu_codigo; ?>" data-length="200">
                      <div class="text-left">
                                <label>Tipo de mural</label>
                                </div>
                  <select name="mu_tipo" class="form-control">
                    <?php
                      $sth = $pdo ->prepare('select * from tbl_tipo_mural');
                      $sth->execute(); 
                      foreach ($sth as $res){ 
                        extract($res);
                        echo'<option value="'. $tipo_mural_codigo .'">' . $tipo_mural_tipo . '</option>'; 
                      } 
                    ?>
                  </select>
                </div>

                      <div class="input-field col s2">
                        <input name="mu_codigo" type="hidden" value="<?= $mu_codigo; ?>" data-length="200">
                        <div class="file-field input-field">
                                <label>Titulo</label>
                          
                       <input name="mu_titulo" placeholder="Titulo" class="form-control"/>
                      </div>
                      </div>



                        <div class="input-field col s2">
                        <input name="mu_codigo" type="hidden" value="<?= $mu_codigo; ?>" data-length="200">
                        <div class="file-field input-field">
                        <label for="exampleFormControlTextreal"><b> Assunto</b></label>
                <textarea class="form-control" name="mu_assunto" placeholder="Assunto" rows="3"></textarea>
                      </div>
                      </div>
                    </br>

                    
              
              
              <div class="input-field col s2">
                        <input name="mu_codigo" type="hidden" value="<?= $mu_codigo; ?>" data-length="200">
                        <div class="file-field input-field">
                                <label>Data</label>
                          
                       <input name="mu_data" type="date" class="form-control"/>
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
            </td>
          </tr>
          <?php
            endforeach;
          ?>
        </tbody>
      </div>
    </table>
              

<script>
</script>







  <?php
    include '../../footer.php'; 
  ?>
</body>

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</html>