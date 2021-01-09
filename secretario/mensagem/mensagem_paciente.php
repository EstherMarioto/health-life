<?php
  include '../../conexao/conexao.php';
  include 'header.php';
?>

<body>
<br>
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
        <h2 class="text-center"><b><i>Contato Paciente Ubs</i></b></h2>
        <form name="form" method="post" action="insert/insert_paciente.php">
            <div class="form-row">
              <div class="form-group col-md-8">
                  <label><b>Médicos </b></label>
                    <select name="me_paciente_ubs" class="form-control">
                      <?php
                        $sth = $pdo ->prepare('select * from tbl_paciente_ubs');
                        $sth->execute(); 
                        foreach ($sth as $res){ 
                        extract($res);
                        echo'<option value="'. $p_codigo .'">' . $p_nome .'</option>'; 
                        } 
                      ?>
                    </select>
              </div>

              <div class="form-group col-md-4">
                <label><b>Data</b></label>
                <input type="date" class="form-control" name="me_data"/>
              </div>
            </div>
            <br><br>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label><b> Titulo </b></label>
                <input type="text" class="form-control" name="me_titulo" placeholder="Titulo da sua Publicação" />
              </div>
              
              <div class="form-group col-md-6">
                <label for="exampleFormControlTextreal"><b> Assunto</b></label>
                <textarea class="form-control" name="me_assunto" placeholder="Assunto" rows="3"></textarea>
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


  <?php
    include '../../footer.php'; 
  ?>
</body>

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</html>