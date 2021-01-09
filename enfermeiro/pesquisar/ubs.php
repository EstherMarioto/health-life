<?php
  include '../../conexao/conexao.php';
  
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet"  href="style.css">
        <link rel="stylesheet"  href="../css/stylebtn.css">
    <title>Health & Life</title>
  </head>
  <body>
    <?php
      include 'header.php';
    ?>

    <br/> <br/> <br/>
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
    <div class="row center">
      <?php
        $pesquisar = $_POST['pesquisar'];

        $sth = $pdo->prepare("SELECT * FROM tbl_paciente_ubs WHERE p_codigo LIKE '%$pesquisar%' ");
        $sth->execute();
        foreach ($sth as $res) :
        extract($res);
      ?>
      <?php
        endforeach;
      ?>
    </div>
    <br/>
    <div class="container" style="background-color: #1de9b6">
      <div class="row">
        <div class="col s2 m12 offset-m1 center" style="background-color: #1de9b6">
          </br>
          <figcaption>
            <form method="POST" action="pesquisar/ubs.php">
              <center>
                <div class="form-row">
                  <div class="form-group col-md-10">
                    <div class="input-field">
                      <input class="form-control" type="text"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" name="pesquisar" placeholder="Pesquise o número de inscrição" aria-label="Search">
                    </div>
                  </div>
                  <div class="form-group col-md-2">
                    <button class="btn aqua-gradient btn-rounded btn-sm my-0" type="submit">Pesquisar</button>
                  </div>
                </center>
              </div>   
            </form>
          </figcaption>
          </div>
        </div>
      </div>
<br>
    <div class="container">
      <div class="row">
        <?php
        
          $sth = $pdo->prepare("SELECT * FROM tbl_paciente_ubs WHERE p_codigo = :p_codigo  ");
          $sth->bindValue(':p_codigo', $pesquisar);
          $sth->execute();
          $resultado = $sth->fetch(PDO::FETCH_ASSOC);
          extract($resultado);
        ?>
        </br>
        <div class="col s3 m2">
          <a href="opcao.php?paciente=<?=$p_loginn;?>">
          
            <div class="card" style="width: 14rem;">
            <center>
              <?php
                $sth = $pdo->prepare('select *from tbl_img_dado where im_detalhe = :im_detalhe and im_pac_ubs = :im_pac_ubs');
                $sth->bindValue(':im_pac_ubs',$p_codigo);
                $sth->bindValue(':im_detalhe', 9 );
                $sth->execute();
                $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                extract($resultado);

                echo "<img src='../../cadastrar/img/" . $im_dado. "' alt='Fotos' width='190' height='190' class='rounded-circle' />";
             ?>
          </center>
              <div class="card-body">
                <span class="card-title black-text">
                  <h5><i>Matrícula: <?= substr($p_codigo, 0, 10); ?></i></h5>
                </span>
                <br/>
                
                <h6>Nome: <?= substr($p_nome, 0, 10); ?></h6>
              </div>
            </div>
          </a>  
        </div>
      </div>
    </div>
    <br><br> 
      
    <?php
      include '../../footer.php';
    ?> 
   
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script type="text/javascript">
      $('.carousel').carousel()
      $('.toast').toast(option)
    </script>
    
  </body>
</html>