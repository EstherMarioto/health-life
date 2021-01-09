<!DOCTYPE html>
<?php
  include '../../conexao/conexao.php';
  include 'header.php';
?>
<br/><br/>
 
<html>
  <head>
    <meta charset="UTF-8">
    <!-- Última versão CSS compilada e minificada -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Médicos</title>
    <link rel="icon"  alt="logo do Health & Life " href="../../img/logo">
  </head>
  <style>
    .container .row img{
      box-sizing: border-box;
      box-shadow: 0 10px 80px #333;
      width: 200px;
    }
    .container .row img:hover {
      background: #333;
      color: #fff;
    }
  </style>
  
  <body>
    </br></br>

    <div class ="container">  

      <h3 class="text-center" ><i><b>Especialidades</b></i></h3>
    
    </div>
    </br><br/>

    <div class ="container">
      <div class="row">

        <a href="medicos.php?especialidade= <?= $especialidade = 2; ?>"><img style="margin-left:  70px;" class="rounded-circle" src="img/dentistaa.jpg"></a> 
        <a href="medicos.php?especialidade= <?= $especialidade = 5; ?>"><img style="margin-left: 70px;" class="rounded-circle" src="img/pediatraa.jpg"></a>
        <a href="medicos.php?especialidade= <?= $especialidade = 1; ?>"><img style="margin-left: 70px;" class="rounded-circle" src="img/Clinico Gerall.jpg"></a>
        <a href="medicos.php?especialidade= <?= $especialidade = 6; ?>"><img style="margin-left:  70px;" class="rounded-circle" src="img/Nutricionistaa.jpg"></a>    
      </div>
      <br/>

      <h5 class="text-center">&nbsp;&nbsp;&nbsp; <b>Dentista </b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>Pediatra</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Clinico Geral</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Nutricionista </b> </h5>
    
    </div>
    </br>
    <div class ="container">
      <div class="row">

        <a href="medicos.php?especialidade= <?= $especialidade = 4; ?>"><img style="margin-left:  70px;" class="rounded-circle" src="img/ginecologistaa.jpg"></a> 
        <a href="medicos.php?especialidade= <?= $especialidade = 7; ?>"><img style="margin-left: 70px;" class="rounded-circle" src="img/psicologia.jpg"></a>
        <a href="medicos.php?especialidade= <?= $especialidade = 3; ?>"><img style="margin-left: 70px;" class="rounded-circle" src="img/fisioterapeuta.jpg"></a>
        <a href="medicos.php?especialidade= <?= $especialidade = 8; ?>"><img style="margin-left: 70px;" class="rounded-circle" src="img/fonoaudiologa.jpg"></a>    
      </div>
      <br/>
     
     <h5 class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>Ginecologista</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>Psicologia</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Fisioterapeuta</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Fonoaudióloga </b>&nbsp;&nbsp;&nbsp;&nbsp; </h5>
  
    </div>
    <br/><br/>
    <footer>
      <?php
        include '../../footer.php';
      ?>
    </footer>
  </body>
</html>