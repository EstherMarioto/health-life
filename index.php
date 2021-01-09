<!doctype html>
<?php
  include 'conexao/conexao.php';
  include 'header.php';
?>
?>
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
    <link rel="stylesheet" href="css/login.css">
        <link rel="stylesheet" href="css/let.css">
        <link rel="stylesheet" href="css/estilo.css">
      
  </head>

  <body>  
    </br></br></br></br></br></br></br></br></br></br> </br></br> </br>
  
    <div class="col-lg-12">
      <div class="box">
        <h2>Faça login na Estratégia Familiar</h2>
        <form name="form1" action="login/validar.php" method="post" >
          </br></br>
          <div class="inputBox">
            <input type="text" name="numail" id="email" type="email">
            <label>Inscrição</label>
          </div>
                
          <div class="inputBox">
            <input type="password" name="senha" id="password" type="password" >
            <label> Senha </label>
          </div>
          <p><input type="checkbox" onclick="mostrarSenha()" ><span>&nbsp;</span>Mostrar Senha</input></p>
          <br/>

          <input type="submit" name="entrar" value="Entrar">
        </form>
        <br/>    
        <a href="cadastrar/formulario_moradia.php"><button class="bt">Cadastrar</button></a>
             
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
      </div>
    </div>

    </br></br></br></br></br></br></br></br>
    <div style="  margin: 70px;">
      <div class="container"  style="background-color: #a7ffeb" >
        </br>
        <h3 class="text-center"><b><i> Qual Unidade Básica de Saúde deseja ter acesso?</i></b></h3>
        </br>
          <div class="row">
            <div class="col s2 m12 offset-m1 center" style="background-color: #64ffda">
              <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">  
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <div class="row">
                      <div class="container">
                   
                        <a href="login/loginOutro.php?id=<?= $id = 1; ?>"><img style="margin-left: 180px;" class="rounded-circle" src="img/UbsDaCruz1.png" ></a>
                        <a href="login/loginOutro.php?id=<?= $id = 2; ?>"><img style="margin: 60px;" class="rounded-circle" src="img/UbsCecap1.png"></a>
                        <a href="login/loginOutro.php?id=<?= $id = 3; ?>"><img class="rounded-circle" src="img/UbsIndustrial.png"></a>
                        
                      </div>
                      <h4 style="margin-left: 180px;"><b>UBS Bairro da Cruz</b></h4>
                      <h4 style="margin-left: 110px;"><b>UBS Cecap</b></h4>
                      <h4 style="margin-left: 140px;"><b>UBS Industrial</b></h4>
                    
                    </div>  
                  </div>

                  <div class="carousel-item">
                    <div class="row">
                      <div class="container">
                      <center>
                        <a href="login/loginOutro.php?id= <?= $id = 4; ?>"><img style="margin-left:  60px;" class="rounded-circle" src="img/UbsPinhalNovo.jpg"></a>
                        <a href="login/loginOutro.php?id= <?= $id = 5; ?>"><img style="margin: 60px;" class="rounded-circle" src="img/UbsSantaLucrecia.jpg"></a>
                        <a href="login/loginOutro.php?id= <?= $id = 6; ?>"><img class="rounded-circle" src="img/UbsSertaoVelho.jpg"></a>
                      </div>
                      <h4 style="margin-left: 190px;"><b>UBS Pinhal Novo </b></h4>
                      <h4 style="margin-left: 70px;"><b>UBS Santa Lucrécia</b></h4>
                      <h4 style="margin-left: 80px;"><b>UBS Sertão Velho</b></h4>
                      </center>
                    </div>
                  </div>

                  <div class="carousel-item">
                    <div class="row">
                      <div class="container">
                        <a href="login/loginOutro.php?id=<?= $id = 7; ?>">
                          <img style="margin-left: 180px;" class="rounded-circle" src="img/UbsVilaNunes.png">
                        </a>
                        <img style="margin: 67px " class="abacaxi" src="img/fundo.png">
                      </div>
                        <h4 style="margin-left: 205px;"><b>UBS Vila Nunes</b></h4>
                    </div>
                  </div>

                
                  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>

                  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
              </div>
              </br>
            </div>
          </div>
      </div>
     
    </div>
    </div>
 
      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
      <script type="text/javascript">
        $('.carousel').carousel()
      </script>
    </div>
  </body>
</html>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
    