<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Health & Life</title>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,700' rel='stylesheet' type='text/css' />

  </head>
  <body>
    <?php
     
      include 'header.php' 
    ?>
    <br><br>
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
    
    <center><h2><span class="blach-text">Cadastrar Medico</span></h2></center>
    <br>
    <?php
    $lo_codigo= $_GET['lo_codigo'];
    ?>
    <div class = "container">
      <div class = "card painel">
      <form method="post" action="insert_medico.php" enctype = "multipart/form-data">
      <input name="me_login" type="hidden" value="<?= $lo_codigo; ?>"> 
        <div class = "container">
        <br>
          <div class="form-row">
            <div class="form-group col-md-4">
              <label>Nome</label>
              <input type="name"  name="me_nome" class="form-control">
            </div>
            <div class="form-group col-md-2">
              <label >Data de Nascimento</label>
              <input type="date" name="me_dt_nasc" class="form-control" >
            </div>
            <div class="form-group col-md-3">
              <label>RG</label>
              <input  type="int" name="me_RG" class="form-control">
            </div>
            <div class="form-group col-md-3">
              <label>CPF</label>
              <input  type="int" name="me_CPF" class="form-control">
            </div>
          </div>
          <br>
        
          <div class="form-row">
            <div class="form-group col-md-3">
              <label>(DDD) Telefone</label>
              <input  type="int" name="me_telefone" class="form-control">
            </div>
            <div class="form-group col-md-4">
              <label >Email</label>
              <input type="email" name="me_email" class="form-control">
            </div>
            <div class="form-group col-md-3">
              <label>Gênero</label>
              <select class="form-control" name="me_genero">
                <?php
                  session_start();
                  include '../../conexao/conexao.php';
                  $sth = $pdo->prepare(" SELECT * FROM tbl_genero");
                  $sth->execute();

                  foreach ($sth as $res) {
                  extract($res);
                  echo '<option value="' . $tipo_genero_codigo . '">' . $tipo_genero_tipo . '</option>';
                  }
                ?>
              </select>
            </div>
            
            <div class="form-group col-md-2">
              <label>Aprovado no Exame</label>
              <select class="form-control" name="me_aprov_exame">
                <?php
                  $sth = $pdo->prepare(" SELECT * FROM tbl_opcao");
                  $sth->execute();

                  foreach ($sth as $res) {
                  extract($res);
                  echo '<option value="' . $op_codigo . '">' . $op_tipo . '</option>';
                  }
                ?>
              </select>
            </div>
          </div>

          <br> 

          <div class="form-row">

            <div class="form-group col-md-3">
              <label>Especialidade</label>
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


            <div class="form-group col-md-3"> 
              <label> Foto </label>
              <input type="file" class="custom-file" name="me_foto" id="customFileLang" lang="es" required placeholder=" Selecionar Imagem">
            </div>
            <div class="form-group col-md-3"> 
              <label> Comprovante RG - Frente </label>
              <input type="file" class="custom-file" name="me_comp" id="customFileLang" lang="es" required placeholder=" Selecionar Imagem">
            </div>

            <div class="form-group col-md-3"> 
              <label> Comprovante RG - Verso </label>
              <input type="file" class="custom-file" name="me_comp_rg2" id="customFileLang" lang="es" required placeholder=" Selecionar Imagem">
            </div>           
          </div>  

          <br><br>
          
           <div class="form-row">
            <div class="form-group col-md-3"> 
              <label> Comprovante Residência </label>
              <input type="file" class="custom-file" name="me_comp_residencia" id="customFileLang" lang="es" required placeholder=" Selecionar Imagem">
            </div>
                   
            <div class="form-group col-md-3"> 
              <label> Titulo de Eleitor - Frente </label>
              <input type="file" class="custom-file" name="me_titulo_eleitor" id="customFileLang" lang="es" required placeholder=" Selecionar Imagem">
            </div>

            <div class="form-group col-md-3"> 
              <label> Titulo de Eleitor - Verso </label>
              <input type="file" class="custom-file" name="me_titulo_eleitor2" id="customFileLang" lang="es" required placeholder=" Selecionar Imagem">
            </div>

            <div class="form-group col-md-3"> 
              <label> Certidão Casamento/Nascimento </label>
              <input type="file" class="custom-file" name="me_certidao_cas" id="customFileLang" lang="es" required placeholder=" Selecionar Imagem">
            </div>
            </div>
            <br/>
          
        <div class="form-row">
          <div class="form-group col-md-3"> 
              <label> Documento PIS </label>
              <input type="file" class="custom-file" name="me_doc_pis" id="customFileLang" lang="es" required placeholder=" Selecionar Imagem">
            </div>

            <div class="form-group col-md-3"> 
              <label> Carteira de trabalho - Frente</label>
              <input type="file" class="custom-file" name="me_car_trab" id="customFileLang" lang="es" required placeholder=" Selecionar Imagem">
            </div>

            <div class="form-group col-md-3"> 
              <label> Carteira de trabalho - Verso</label>
              <input type="file" class="custom-file" name="me_car_trab2" id="customFileLang" lang="es" required placeholder=" Selecionar Imagem">
            </div>
  <!-- Imposto de renda, fazer forma de pdf -->
            <div class="form-group col-md-3"> 
              <label> Declaraçâo de Bens </label>
              <input type="file" class="custom-file" name="me_declaracao_bens" id="customFileLang" lang="es" required placeholder=" Selecionar Imagem">
            </div>
        </div>

            <br/>

        <div class="form-row">
            <div class="form-group col-md-3"> 
              <label> Comp. Escolaridade - Frente </label>
              <input type="file" class="custom-file" name="me_comp_esc" id="customFileLang" lang="es" required placeholder=" Selecionar Imagem">
            </div>

            <div class="form-group col-md-3"> 
              <label> Comp. Escolaridade - Verso</label>
              <input type="file" class="custom-file" name="me_comp_esc2" id="customFileLang" lang="es" required placeholder=" Selecionar Imagem">
            </div>

          </div>
          <br><br>
        
          <button type="button-submit" class="btn btn-primary">Cadastrar</button>

      </form>
      
      </div> 
    </div> 
    </div> 
    <br><br><br>
    <?php 
    include '../../footer.php';
  ?>
  </body>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</html>