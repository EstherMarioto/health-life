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
<br><br>
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
        <h2 class="text-center"><b><i>Atualizar Publicações</i></b></h2>
        <?php
            include '../../conexao/conexao.php';          
            $sth = $pdo->prepare('SELECT *FROM tbl_mural ');
            $sth->execute();
            
          ?>
       
       <form name="form1" action="updateMural.php" method="POST">
       
       <div class="form-row">
              <div class="form-group col-md-6">
              <input name="mu_codigo" type="hidden" value="<?= $mu_codigo; ?>" data-length="200">
                <label><b> Titulo </b></label>
                <input type="text" class="form-control" name="mu_titulo" placeholder="Titulo da sua Publicação" />
              </div>

              <div class="form-group col-md-3">
              <input name="mu_codigo" type="hidden" value="<?= $mu_codigo; ?>" data-length="200">
                <label><b>Data</b></label>
                <input type="date" class="form-control" name="mu_data"/>
              </div>

              <div class="form-group col-md-3">
              <input name="mu_codigo" type="hidden" value="<?= $mu_codigo; ?>" data-length="200">
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

              
            </div> 
              <br/>

            <div class="form-row">
              <div class="form-group col-md-1"></div>
              <div class="form-group col-md-5">
              <input name="mu_codigo" type="hidden" value="<?= $mu_codigo; ?>" data-length="200">
                <label for="exampleFormControlTextreal"><b> Assunto</b></label>
                <textarea class="form-control" name="mu_assunto" placeholder="Assunto" rows="3"></textarea>
              </div>
         </div>
            <div class="form-group col-md-2"></div>


              <div class="input-field col s5">
            <button type="submit" class="btn btn-primary">Atualizar</button>
            </div>
          
          </form>
        </div> 
      </div> 
    </div>
 <h1></h1>
 <br>
 <h1></h1>

              

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