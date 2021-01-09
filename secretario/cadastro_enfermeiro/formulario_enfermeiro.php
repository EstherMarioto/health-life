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
    $lo_codigo= $_GET['lo_codigo'];
   

    include 'header.php' 
  ?>
    <br><br><br>
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
    
  <center>
    <h2><span class="blach-text">Cadastrar Enfermeiro</span></h2>
  </center>
  
  <br>
<?php
$lo_codigo= $_GET['lo_codigo'];
?>
  <div class = "container">
    <div class = "card painel">
      <form method="post" action="insert_enfermeiro.php" enctype = "multipart/form-data">
      <input name="en_login" type="hidden" value="<?= $lo_codigo; ?>">                
        <div class = "container">
        <br>
          <div class="form-row">
            <div class="form-group col-md-4">
              <label>Nome</label>
              <input type="name"  name="en_nome" class="form-control">
            </div>
            <div class="form-group col-md-2">
              <label >Data de Nascimento</label>
              <input type="date" name="en_dt_nasc" class="form-control" >
            </div>
            <div class="form-group col-md-3">
              <label>RG</label>
              <input  type="int" name="en_RG" class="form-control">
            </div>
            <div class="form-group col-md-3">
              <label>CPF</label>
              <input  type="int" name="en_CPF" class="form-control">
            </div>
          </div>
        <br>

          <div class="form-row">
            <div class="form-group col-md-3">
              <label>(DDD) Telefone</label>
              <input  type="int" name="en_telefone" class="form-control">
            </div>
            <div class="form-group col-md-4">
              <label >Email</label>
              <input type="email" name="en_email" class="form-control">
            </div>
            <div class="form-group col-md-3">
              <label>Gênero</label>
              <select class="form-control" name="en_genero">
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
              <select class="form-control" name="en_aprov_exame">
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
            <label> Foto </label>
              <input type="file" class="custom-file" name="en_foto" id="customFileLang" lang="es" required placeholder=" Selecionar Imagem">
            </div>
                   
            <div class="form-group col-md-3"> 
            <label> Comprovante Residência </label>
              <input type="file" class="custom-file" name="en_comp_residencia" id="customFileLang" lang="es" required placeholder=" Selecionar Imagem">
            </div>

            <div class="form-group col-md-3"> 
            <label> Comp. Escolaridade - Frente </label>
              <input type="file" class="custom-file" name="en_comp_escolaridade" id="customFileLang" lang="es" required placeholder=" Selecionar Imagem">
            </div>

            <div class="form-group col-md-3"> 
            <label> Comp. Escolaridade - Verso </label>
              <input type="file" class="custom-file" name="en_comp_escolaridade2" id="customFileLang" lang="es" required placeholder=" Selecionar Imagem">
            </div>
          </div>

            <div class="form-row">
            <div class="form-group col-md-3">
            <label> Comprovante RG - Frente</label>
              <input type="file" class="custom-file" name="en_comp_rg" id="customFileLang" lang="es" required placeholder=" Selecionar Imagem">
            </div>

            <div class="form-group col-md-3">
            <label> Comprovante RG - Verso</label>
              <input type="file" class="custom-file" name="en_comp_rg2" id="customFileLang" lang="es" required placeholder=" Selecionar Imagem">
            </div>
          </div>
          <div class ="text-right">
          <button type="submit" class="btn btn-primary">Cadastrar</button>
          </div>
          <br><br>
        </div>
      </form>
    </div>
  </div>
  <h1></h1>
  <h1></h1>
  <?php 
    include '../../footer.php';
  ?>
</body>
</html>