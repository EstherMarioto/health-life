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
    
  <center>
    <h2><span class="blach-text">Cadastrar Médico</span></h2>
  </center>
  
  <br>

  <div class = "container">
    <div class = "card painel">
      <form method="post" action="insert_login.php" enctype = "multipart/form-data">
      <input name="lo_tipo" type="hidden" value="<?= 2; ?>">
        <div class = "container">
        <br>
          <div class="form-row">
          <div class="form-group col-md-4">
              <label>Unidade</label>
              <select class="form-control" name="lo_unidade">
                <?php
                  session_start();
                  include '../../conexao/conexao.php';
                  $sth = $pdo->prepare(" SELECT * FROM tbl_unidade");
                  $sth->execute();

                  foreach ($sth as $res) {
                  extract($res);
                  echo '<option value="' . $un_codigo . '">' . $un_tipo . '</option>';
                  }
                ?>
              </select>
            </div>
            <div class="form-group col-md-4">
              <label>Numero de Inscrição</label>
              <input type="text"  name="lo_numero" class="form-control">
            </div>
            <div class="form-group col-md-4">
              <label >Senha</label>
              <input type="password" name="senha"  id="password" class="form-control" >
            </div>
            <br/>
            <h6><input type="checkbox" onclick="mostrarSenha()" >Mostrar Senha</input></h4>
                <br/>
          </div>
        <br>

          
          <button type="submit" class="btn btn-primary">Cadastrar</button>
          <br><br>
        </div>
      </form>
    </div>
  </div>
  <br><br>
  <h1></h1>
  <h1></h1>
  
  <?php 
    include '../../footer.php';
  ?>
    <script>
                function mostrarSenha() {
                    var tipo = document.getElementById("password");
                    if(tipo.type == "password"){
                        tipo.type = "text";
                    }else{
                        tipo.type = "password";
                    }
                }
            </script>  
</body>
</html>