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
  
    <br><br><br>
    <div class="form-row">
      <div class="form-group col-md-0"> 
        <img src="https://img.icons8.com/material-rounded/26/000000/user-male-circle.png"/>
      </div>
      <?php
        include '../header.php';
        include '../conexao/conexao.php';
        $sth = $pdo->prepare('select * from tbl_tipo_login where tipo_logi_codigo = :tipo');
        $sth->bindValue(':tipo', 3);
        $sth->execute();
        $resultado = $sth->fetch(PDO::FETCH_ASSOC);
        extract($resultado);
      ?>

      <h5><?php echo $tipo_logi_tipo ?></h5>
    </div>  
    
    <center>
      <h2><span class="blach-text">Cadastrar Secretário</span></h2>
    </center>
  
    <br>
    <div class = "container">
      <div class = "card painel">
        <form method="post" action="insert_secretario.php" enctype = "multipart/form-data">               
          <div class = "container">
          <br>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label>Nome</label>
                <input type="name"  name="se_nome" class="form-control">
              </div>
              <div class="form-group col-md-2">
                <label >Data de Nascimento</label>
                <input type="date" name="se_dt_nasc" class="form-control" >
              </div>
              <div class="form-group col-md-3">
                <label>RG</label>
                <input  type="int" name="se_RG" class="form-control">
              </div>
              <div class="form-group col-md-3">
                <label>CPF</label>
                <input  type="int" name="se_CPF" class="form-control">
              </div>
            </div>
            <br>
            <div class="form-row">
              <div class="form-group col-md-3">
                <label>(DDD) Telefone</label>
                <input  type="text" name="se_telefone" class="form-control">
              </div>
              <div class="form-group col-md-3">
                <label>Login</label>
                <input  type="text" name="se_login" class="form-control">
              </div>
              <div class="form-group col-md-3">
                <label>Senha</label>
                <input  type="password" name="se_senha" class="form-control">
              </div>
              <div class="form-group col-md-3">
                <label>Confirmar Senha</label>
                <input  type="password" name="se_confirmar" class="form-control">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-3">
                <label>Gênero</label>
                <select class="form-control" name="se_genero">
                  <?php
                    $sth = $pdo->prepare(" SELECT * FROM tbl_genero");
                    $sth->execute();

                    foreach ($sth as $res) {
                    extract($res);
                    echo '<option value="' . $tipo_genero_codigo . '">' . $tipo_genero_tipo . '</option>';
                    }
                  ?>
                </select>
              </div>
              <div class="form-group col-md-3">
                <label>Unidade</label>
                <select class="form-control" name="se_unidade">
                  <?php
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
                   
              </div>
            
              <div class ="text-right">
              <br>
                <button type="submit" class="btn btn-primary">Cadastrar</button>
              </div>
              <br><br>
            </div>
          </form>
        </div>
      </div>
    </div>
    </br></br></br></br>
    <h1></h1>
    <h1></h1>
    <?php 
      include '../footer.php';
    ?>
  </body>
</html>