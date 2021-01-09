<!doctype html>
<?php
session_start();
include '../../conexao/conexao.php';


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

  </head>
  <?php
    include 'header.php';
  ?>  
  <br/><br/>
  </br>
  <body >
    <?php

      $sth = $pdo->prepare('select *from tbl_login where lo_codigo = :lo_codigo');
      $sth->bindValue(':lo_codigo',  $_SESSION["health"]["id"]);
      $sth->execute();
      $resultado = $sth->fetch(PDO::FETCH_ASSOC);
      extract($resultado);

      $sth = $pdo->prepare('select *from tbl_unidade where un_codigo = :un_codigo');
      $sth->bindValue(':un_codigo', $lo_unidade);
      $sth->execute();
      $resultado = $sth->fetch(PDO::FETCH_ASSOC);
      extract($resultado); 
      
    ?>
    <center>
    <h2><span class="blach-text"><i>Contato</i></span></h2>
  </center>
  
  <br>
  <div class = "container">
    <div class = "card painel">
      <form method="post" action="insert_contato.php" enctype = "multipart/form-data">
        <input name="con_paciente" type="hidden" value="<?=$_SESSION["health"]["id"];?>">
        <input name="con_unidade" type="hidden" value="<?=$_SESSION["health"]["id"];?>">              
        <div class = "container">
          <br>
          <div class="form-row">
            <div class="form-group col-md-7">
              <label>Nome</label>
              <input type="name"  name="en_nome" class="form-control">
            </div>
            <div class="form-group col-md-5">
              <label>Data</label>
              <input  type="date" name="con_data" class="form-control">
            </div>
          </div>
          <div class="form-row">  
            <div class="form-group col-md-3">
              <label>Assunto</label>
              <input  type="int" name="con_assunto" class="form-control">
            </div>
            <div class="form-group col-md-9">
            <label for="exampleFormControlTextreal"> Mensagem</label>
                <textarea class="form-control" name="con_mensagem" placeholder="Assunto" rows="3"></textarea>
            </div>
            
            
          </div>
        <br>
          <div class ="text-right">
          <button type="submit" class="btn btn-primary">Enviar</button>
          </div>
          <br><br>
        </div>
      </form>
    
 
     
      <div class="container">
        <div class="row">
        <div class="form-group col-md-2"></div>
          <h5 >Telefone : <b><?php echo $un_telefone;?></b></h5>
          <div class="form-group col-md-2"></div>
          <h5>Endereço : <b><?php echo $un_local;?></b></h5>
        </div>
      </div>
    </div>
 
  </div>
</br></br>

    <footer class="page-footer font-small mdb-color pt-4" style="background-color: #1de9b6;">
      <div class="container text-center text-md-left">
        <div class="row text-center text-md-left mt-3 pb-3">
          <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
            <p class="text-uppercase mb-4 font-weight-bold text-white" >Health & Life</p>
            <p class="text-white">Tem que ver oque vai escrever ainda aqui.</p>
          </div>
          <hr class="w-100 clearfix d-md-none">
          <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
            <p class="text-uppercase mb-4 font-weight-bold text-white">Aqui também</p>
            <p>
              <a href="#!" class="text-white">link</a>
            </p>
            <p>
              <a href="#!" class="text-white">link</a>
            </p>
            <p>
              <a href="#!" class="text-white">link</a>
            </p>
            <p>
              <a href="#!" class="text-white">link</a>
            </p>
          </div>
  
          <hr class="w-100 clearfix d-md-none">  
          <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
            <p class="text-uppercase mb-4 font-weight-bold text-white">Titulo</p>
            <p>
              <a href="#!" class="text-white">link</a>
            </p>
            <p>
              <a href="#!" class="text-white">link</a>
            </p>
            <p>
              <a href="#!" class="text-white">link</a>
            </p>
            <p>
              <a href="#!" class="text-white">Help</a>
            </p>
          </div>
          
          <hr class="w-100 clearfix d-md-none">
          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
            <p class="text-uppercase mb-4 font-weight-bold text-white">Contato</p>
            <p class="text-white">
              <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="55" height="55" viewBox="0 0 172 172" style=" fill:#000000;">
                <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                  <path d="M0,172v-172h172v172z" fill="none"></path>
                  <path d="M86,86.86c-0.47496,0 -0.86,-0.38504 -0.86,-0.86v0c0,-0.47496 0.38504,-0.86 0.86,-0.86v0c0.47496,0 0.86,0.38504 0.86,0.86v0c0,0.47496 -0.38504,0.86 -0.86,0.86z" fill="#fffefe">
                  </path>
                  <g fill="#ffffff">
                    <path d="M86,55.23484l-1.52688,1.46049l-27.61653,27.61653l3.05375,3.05375l2.72182,-2.72182v24.56277h19.11913v-21.24348h8.49739v21.24348h19.11913v-24.56277l2.72182,2.72182l3.05375,-3.05375l-27.61653,-27.61653zM86,61.27596l19.11913,19.11913v24.56277h-10.62174v-21.24348h-16.99478v21.24348h-10.62174v-24.56277z">
                    </path>
                  </g>
                </g>
              </svg> 
              Endereço
            </p>
            <p class="text-white">
              <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"width="48" height="48"viewBox="0 0 172 172"style=" fill:#000000;">
                <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                  <path d="M0,172v-172h172v172z" fill="none"></path><path d="M86,86.86c-0.47496,0 -0.86,-0.38504 -0.86,-0.86v0c0,-0.47496 0.38504,-0.86 0.86,-0.86v0c0.47496,0 0.86,0.38504 0.86,0.86v0c0,0.47496 -0.38504,0.86 -0.86,0.86z" fill="#cccccc">
                  </path>
                  <g fill="#ffffff">
                    <path d="M86,54.46667c-17.37907,0 -31.53333,14.15426 -31.53333,31.53333c0,17.37907 14.15426,31.53333 31.53333,31.53333h15.76667v-6.30667h-15.76667c-13.97137,0 -25.22667,-11.2553 -25.22667,-25.22667c0,-13.97137 11.2553,-25.22667 25.22667,-25.22667c13.97137,0 25.22667,11.2553 25.22667,25.22667v4.73c0,2.65136 -2.07864,4.73 -4.73,4.73c-2.65136,0 -4.73,-2.07864 -4.73,-4.73v-4.73c0,-8.67034 -7.09633,-15.76667 -15.76667,-15.76667c-8.67034,0 -15.76667,7.09633 -15.76667,15.76667c0,8.67034 7.09633,15.76667 15.76667,15.76667c4.45741,0 8.47572,-1.89555 11.35077,-4.89629c1.99002,2.94394 5.35467,4.89629 9.1459,4.89629c6.05815,0 11.03667,-4.97852 11.03667,-11.03667v-4.73c0,-17.37907 -14.15426,-31.53333 -31.53333,-31.53333zM86,76.54c5.26196,0 9.46,4.19804 9.46,9.46c0,5.26196 -4.19804,9.46 -9.46,9.46c-5.26196,0 -9.46,-4.19804 -9.46,-9.46c0,-5.26196 4.19804,-9.46 9.46,-9.46z">
                    </path>
                  </g>
                </g>
              </svg> 
              email
            </p>

            <p class="text-white">
              <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"width="48" height="48"viewBox="0 0 172 172"style=" fill:#000000;">
                <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                  <path d="M0,172v-172h172v172z" fill="none">
                  </path>
                  <path d="M86,86.86c-0.47496,0 -0.86,-0.38504 -0.86,-0.86v0c0,-0.47496 0.38504,-0.86 0.86,-0.86v0c0.47496,0 0.86,0.38504 0.86,0.86v0c0,0.47496 -0.38504,0.86 -0.86,0.86z" fill="#cccccc">
                  </path>
                  <g fill="#ffffff">
                    <path d="M59.19667,62.35v5.676c0.15767,20.812 26.961,44.61967 44.77733,44.77733h5.83367c1.57667,0 2.99567,-1.26133 2.99567,-2.99567v-11.19433c0,-1.57667 -1.419,-2.99567 -2.99567,-2.99567l-12.771,-0.15767l-6.46433,6.77967c-4.09933,0 -20.65433,-16.555 -20.812,-20.812l6.77967,-6.46433v-12.771c0,-1.57667 -1.57667,-2.99567 -3.15333,-2.99567h-11.19433c-1.73433,0 -2.99567,1.57667 -2.99567,3.15333">
                    </path>
                  </g>
                </g>
              </svg> 
              numero
            </p>

            <p class="text-white">
              <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"width="48" height="48"viewBox="0 0 172 172"style=" fill:#000000;">
                <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                  <path d="M0,172v-172h172v172z" fill="none">
                  </path>
                  <path d="M86,86.86c-0.47496,0 -0.86,-0.38504 -0.86,-0.86v0c0,-0.47496 0.38504,-0.86 0.86,-0.86v0c0.47496,0 0.86,0.38504 0.86,0.86v0c0,0.47496 -0.38504,0.86 -0.86,0.86z" fill="#cccccc">
                  </path>
                  <g fill="#ffffff">
                    <path d="M59.19667,62.35v5.676c0.15767,20.812 26.961,44.61967 44.77733,44.77733h5.83367c1.57667,0 2.99567,-1.26133 2.99567,-2.99567v-11.19433c0,-1.57667 -1.419,-2.99567 -2.99567,-2.99567l-12.771,-0.15767l-6.46433,6.77967c-4.09933,0 -20.65433,-16.555 -20.812,-20.812l6.77967,-6.46433v-12.771c0,-1.57667 -1.57667,-2.99567 -3.15333,-2.99567h-11.19433c-1.73433,0 -2.99567,1.57667 -2.99567,3.15333">
                    </path>
                  </g>
                </g>
              </svg> 
              numero
            </p>
          </div>
        </div>

        <hr>
        <div class="row d-flex align-items-center">
          <div class="col-md-7 col-lg-8">
            <p class="text-center text-md-left text-white">© 2020 Copyright:</p>
          </div>
          <div class="col-md-5 col-lg-4 ml-lg-8">
            <div class="text-center text-md-right">
              <ul class="list-unstyled list-inline">
                <li class="list-inline-item">
                  <a class="btn-floating btn-sm rgba-white-slight mx-1">
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"width="80" height="80"viewBox="0 0 172 172"style=" fill:#000000;">
                      <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                        <path d="M0,172v-172h172v172z" fill="none">
                        </path>
                        <path d="M86,86.86c-0.47496,0 -0.86,-0.38504 -0.86,-0.86v0c0,-0.47496 0.38504,-0.86 0.86,-0.86v0c0.47496,0 0.86,0.38504 0.86,0.86v0c0,0.47496 -0.38504,0.86 -0.86,0.86z" fill="#cccccc">
                        </path>
                        <g fill="#ffffff">
                          <path d="M86,46.44c-21.81304,0 -39.56,17.74524 -39.56,39.56c0,21.81476 17.74696,39.56 39.56,39.56c21.81476,0 39.56,-17.74524 39.56,-39.56c0,-21.81476 -17.74524,-39.56 -39.56,-39.56zM98.04,70.52h-5.6588c-3.33336,0 -4.6612,0.7826 -4.6612,3.10632v5.49368h10.32l-1.72,8.6h-8.6v22.36h-10.32v-22.36h-5.16v-8.6h5.16v-4.77128c0,-7.267 2.89992,-12.42872 11.31932,-12.42872c4.50984,0 9.32068,1.72 9.32068,1.72z">
                          </path>
                        </g>
                      </g>
                    </svg>
                  </a>
                </li>

                <li class="list-inline-item">
                  <a class="btn-floating btn-sm rgba-white-slight mx-1">
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"width="80" height="80"viewBox="0 0 172 172"style=" fill:#000000;">
                      <defs>
                        <linearGradient x1="86" y1="52.18184" x2="0" y2="120.96034" gradientUnits="userSpaceOnUse" id="color-1_MP7jET0S1bw5_gr1">
                          <stop offset="0" stop-color="#ffffff">
                          </stop>
                          <stop offset="1" stop-color="#ffffff">  
                          </stop>
                        </linearGradient>
                        <linearGradient x1="86" y1="69.10234" x2="86" y2="102.53484" gradientUnits="userSpaceOnUse" id="color-2_MP7jET0S1bw5_gr2">
                          <stop offset="0" stop-color="#ffffff">
                          </stop>
                          <stop offset="1" stop-color="#ffffff">
                          </stop>
                        </linearGradient>
                      </defs>
            
                      <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                        <path d="M0,172v-172h172v172z" fill="none">
                        </path>
                        <path d="M86,86.86c-0.47496,0 -0.86,-0.38504 -0.86,-0.86v0c0,-0.47496 0.38504,-0.86 0.86,-0.86v0c0.47496,0 0.86,0.38504 0.86,0.86v0c0,0.47496 -0.38504,0.86 -0.86,0.86z" fill="#cccccc">
                        </path>
                        <g>
                          <path d="M110.1875,119.59375h-48.375c-5.18553,0 -9.40625,-4.22072 -9.40625,-9.40625v-48.375c0,-5.18553 4.22072,-9.40625 9.40625,-9.40625h48.375c5.18553,0 9.40625,4.22072 9.40625,9.40625v48.375c0,5.18553 -4.22072,9.40625 -9.40625,9.40625zM61.8125,55.09375c-3.70472,0 -6.71875,3.01403 -6.71875,6.71875v48.375c0,3.70472 3.01403,6.71875 6.71875,6.71875h48.375c3.70472,0 6.71875,-3.01403 6.71875,-6.71875v-48.375c0,-3.70472 -3.01403,-6.71875 -6.71875,-6.71875z" fill="url(#color-1_MP7jET0S1bw5_gr1)">
                          </path>
                          <path d="M107.43819,72.66597c-1.57891,0.70144 -3.27337,1.17309 -5.05519,1.38944c1.81809,-1.09247 3.21291,-2.82188 3.87,-4.87916c-1.69984,1.0105 -3.58378,1.74419 -5.58731,2.13925c-1.60309,-1.71597 -3.88881,-2.78425 -6.41775,-2.78425c-4.859,0 -8.79753,3.94928 -8.79753,8.82037c0,0.69069 0.07794,1.36256 0.22978,2.00891c-7.31,-0.36953 -13.79225,-3.87941 -18.13256,-9.21544c-0.75787,1.30478 -1.18922,2.82053 -1.18922,4.43572c0,3.05837 1.54934,5.75797 3.913,7.34225c-1.44319,-0.04569 -2.79769,-0.44344 -3.98422,-1.10591c0,0.03762 0,0.07256 0,0.11153c0,4.27447 3.0315,7.83541 7.052,8.64838c-0.73503,0.20291 -1.51306,0.31175 -2.31528,0.31175c-0.56841,0 -1.11934,-0.05509 -1.65819,-0.15856c1.12338,3.50181 4.36988,6.05494 8.21838,6.12481c-3.00731,2.36634 -6.80206,3.77325 -10.92469,3.77325c-0.71084,0 -1.40959,-0.04031 -2.09759,-0.12228c3.88881,2.50341 8.51534,3.96272 13.48319,3.96272c16.18144,0 25.03272,-13.44019 25.03272,-25.09319c0,-0.38431 -0.00941,-0.76594 -0.02553,-1.14219c1.71597,-1.24297 3.20753,-2.79769 4.386,-4.56741z" fill="url(#color-2_MP7jET0S1bw5_gr2)">
                          </path>
                        </g>
                      </g>
                    </svg>
                  </a>
                </li>

                <li class="list-inline-item">
                  <a class="btn-floating btn-sm rgba-white-slight mx-1">
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"width="80" height="80"viewBox="0 0 172 172"style=" fill:#000000;">
                      <defs>
                        <linearGradient x1="86" y1="49.38281" x2="86" y2="124.38825" gradientUnits="userSpaceOnUse" id="color-1_48166_gr1">
                          <stop offset="0" stop-color="#ffffff">
                          </stop>
                          <stop offset="1" stop-color="#ffffff">
                          </stop>
                        </linearGradient>
                    
                        <linearGradient x1="86" y1="57.44531" x2="86" y2="117.4545" gradientUnits="userSpaceOnUse" id="color-2_48166_gr2">
                          <stop offset="0" stop-color="#ffffff">
                          </stop> 
                          <stop offset="1" stop-color="#ffffff">
                          </stop>
                        </linearGradient>
                      </defs>
                      <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                        <path d="M0,172v-172h172v172z" fill="none">
                        </path>
                        <path d="M86,86.86c-0.47496,0 -0.86,-0.38504 -0.86,-0.86v0c0,-0.47496 0.38504,-0.86 0.86,-0.86v0c0.47496,0 0.86,0.38504 0.86,0.86v0c0,0.47496 -0.38504,0.86 -0.86,0.86z" fill="#cccccc">
                        </path>
                        <g>
                          <path d="M86.68531,120.9375c-13.53559,0 -25.73147,-7.37047 -31.82941,-19.23578c-2.48191,-4.85094 -3.79341,-10.27969 -3.79341,-15.70172c0,-5.42203 1.3115,-10.85078 3.79341,-15.70037c6.09794,-11.86666 18.29381,-19.23713 31.82941,-19.23713c9.07838,0 17.32228,3.14706 23.84216,9.09987l1.04947,0.95809l-11.76588,11.52938l-0.93928,-0.88016c-3.25591,-3.05031 -7.46991,-4.66147 -12.18512,-4.66147c-8.08534,0 -15.28247,5.19763 -17.9095,12.93494c-0.6665,1.95784 -1.00378,3.95734 -1.00378,5.94609c0,1.98472 0.33728,3.98287 1.00378,5.93937c2.623,7.72656 9.82013,12.91747 17.9095,12.91747c4.09575,0 7.85422,-1.04678 10.87094,-3.02747c2.76544,-1.81541 4.8375,-4.58488 5.848,-7.75612h-18.74934v-16.125h35.46963l0.172,1.14353c0.38431,2.53834 0.63962,4.76494 0.63962,7.37719c0,10.5565 -3.78669,19.78941 -10.66534,25.99484c-6.13422,5.54969 -14.29078,8.48444 -23.58684,8.48444zM86.68531,53.75c-12.52375,0 -23.80453,6.81147 -29.43753,17.77647c-2.32066,4.53516 -3.49778,9.40491 -3.49778,14.47353c0,5.06862 1.17712,9.93838 3.49912,14.47353c5.63166,10.965 16.91244,17.77647 29.43619,17.77647c8.61881,0 16.15188,-2.69422 21.78488,-7.79106c6.30756,-5.69078 9.77981,-14.21419 9.77981,-24.00072c0,-2.05191 -0.17066,-3.87 -0.44209,-5.83322h-30.46416v10.75h19.42525l-0.31578,1.60309c-0.89494,4.53784 -3.59856,8.5785 -7.42019,11.08728c-3.45478,2.26825 -7.72388,3.46822 -12.34638,3.46822c-9.23962,0 -17.46069,-5.92325 -20.45322,-14.74094c-0.76056,-2.23466 -1.14622,-4.52441 -1.14622,-6.80341c0,-2.28303 0.38566,-4.57412 1.14622,-6.81012c2.99656,-8.82575 11.21628,-14.75706 20.45322,-14.75706c4.95709,0 9.44253,1.56413 13.05319,4.5365l7.90528,-7.74672c-5.83859,-4.88722 -13.05319,-7.46184 -20.95981,-7.46184z" fill="url(#color-1_48166_gr1)">
                          </path>
                          <path d="M86,114.21875c-15.56063,0 -28.21875,-12.65947 -28.21875,-28.21875c0,-15.55928 12.65812,-28.21875 28.21875,-28.21875c5.27287,0 10.41406,1.46334 14.87128,4.23147l-1.419,2.28303c-4.02991,-2.50341 -8.68197,-3.827 -13.45228,-3.827c-14.07847,0 -25.53125,11.45278 -25.53125,25.53125c0,14.07847 11.45278,25.53125 25.53125,25.53125c13.62697,0 24.79487,-10.73119 25.49631,-24.1875h-20.12131v-2.6875h22.84375v1.34375c0,15.55928 -12.65813,28.21875 -28.21875,28.21875z" fill="url(#color-2_48166_gr2)">
                          </path>
                        </g>
                      </g>
                    </svg>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>      
    </footer>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="../../bootstrap/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  </body>
</html>
<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
