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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet"  href="style.css">
    <title>Health & Life</title>
  </head>
  <body>
  <?php
    include 'header.php';
  ?> 
  <br><br>
  
  <!-- Nav tabs -->
  <section class="container">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Criança</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Adolescente</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="messages-tab" data-toggle="tab" href="#messages" role="tab" aria-controls="messages" aria-selected="false">Adulto</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="settings-tab" data-toggle="tab" href="#settings" role="tab" aria-controls="settings" aria-selected="false">Idoso</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="settings2-tab" data-toggle="tab" href="#settings2" role="tab" aria-controls="settings2" aria-selected="false">Gestante</a>
      </li>
    </ul>
  </section>
  <!-- Primeiro -->
  <div class="tab-content">
    <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">    
      <section class="container">
        <div class="row">
          <div class="col-lg-10">
            <div class="row"> 
              <div class="col-lg-1">
                <br>
                <h3> <b> Vacinas </b> </h3>
                <br>
              </div>
            </div>
          </div>
        <br>
        <figure class="col-lg-12">
          <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"width="50" height="50"viewBox="0 0 172 172" style=" fill:#000000;">
            <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
              <path d="M0,172v-172h172v172z" fill="none"></path>
                <g fill="#cccccc">
                  <path d="M82.56,6.88v158.24h6.88v-158.24z"></path>
                </g>
            </g>
          </svg> 
        </figure>

        <div class="col-lg-10">
          <div class="row"> 
            <figure class="col-lg-1">
              <img src="https://img.icons8.com/nolan/64/syringe.png"/>
            </figure>
            <div class="col-lg-8">
              <p> <b>  BCG (Bacilo Calmette-Guerin)</b> </p>
              <p> Previne as formas graves de tuberculose</p>
            </div>
          </div>
        </div>

        <figure class="col-lg-12">
          <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"width="50" height="50"viewBox="0 0 172 172" style=" fill:#000000;">
            <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
              <path d="M0,172v-172h172v172z" fill="none"></path>
                <g fill="#cccccc">
                  <path d="M82.56,6.88v158.24h6.88v-158.24z"></path>
                </g>
            </g>
          </svg> 
        </figure>

        <div class="col-lg-10">
          <div class="row"> 
            <figure class="col-lg-1">
              <img src="https://img.icons8.com/nolan/64/syringe.png"/>
            </figure>
            <div class="col-lg-8">
              <p><b>  Hepatite B </b> </p>
              <p>Previne a hepatite do tipo B</p>
            </div>
          </div>
        </div>

        <figure class="col-lg-12">
          <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"width="50" height="50"viewBox="0 0 172 172" style=" fill:#000000;">
            <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
              <path d="M0,172v-172h172v172z" fill="none"></path>
                <g fill="#cccccc">
                  <path d="M82.56,6.88v158.24h6.88v-158.24z"></path>
                </g>
            </g>
          </svg> 
        </figure>

        <div class="col-lg-10">
          <div class="row"> 
            <figure class="col-lg-1">
              <img src="https://img.icons8.com/nolan/64/syringe.png"/>
            </figure>
            <div class="col-lg-8">
              <p><b>  dT </b> </p>    
              <p>Previne difteria e tétano</p>
            </div>
          </div>
        </div>

        <figure class="col-lg-12">
          <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"width="50" height="50"viewBox="0 0 172 172" style=" fill:#000000;">
            <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
              <path d="M0,172v-172h172v172z" fill="none"></path>
                <g fill="#cccccc">
                  <path d="M82.56,6.88v158.24h6.88v-158.24z"></path>
                </g>
            </g>
          </svg> 
        </figure>

        <div class="col-lg-10">
          <div class="row"> 
            <figure class="col-lg-1">
              <img src="https://img.icons8.com/nolan/64/syringe.png"/>
            </figure>
            <div class="col-lg-8">
              <p> <b> VIP (Poliomielite inativada) </b> </p>
              <p>Previne paralisia infantil</p>
            </div>
          </div>
        </div>

        <figure class="col-lg-12">
          <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"width="50" height="50"viewBox="0 0 172 172" style=" fill:#000000;">
            <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
              <path d="M0,172v-172h172v172z" fill="none"></path>
                <g fill="#cccccc">
                  <path d="M82.56,6.88v158.24h6.88v-158.24z"></path>
                </g>
            </g>
          </svg> 
        </figure>

        <div class="col-lg-10">
          <div class="row"> 
            <figure class="col-lg-1">
              <img src="https://img.icons8.com/nolan/64/syringe.png"/>
            </figure>
            <div class="col-lg-7">
              <p> <b> HPV </b> </p>
              <p>Em meninas, cânceres do colo de útero,vulva,vagina,ânus,orofaringe e verrugas genitais  </p>
              <p>Em meninos, cânceres de pênis, ânus, orofaringe e verrugas genitais</p>
            </div>
          </div>
        </div>

        <figure class="col-lg-12">
          <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"width="50" height="50"viewBox="0 0 172 172" style=" fill:#000000;">
            <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
              <path d="M0,172v-172h172v172z" fill="none"></path>
                <g fill="#cccccc">
                  <path d="M82.56,6.88v158.24h6.88v-158.24z"></path>
                </g>
            </g>
          </svg> 
        </figure>

        <div class="col-lg-10">
          <div class="row"> 
            <figure class="col-lg-1">
              <img src="https://img.icons8.com/nolan/64/syringe.png"/>
            </figure>
            <div class="col-lg-8">
              <p> <b> SCR </b> </p>     
              <p>Previne sarampo, caxumba e rubéola</p>
            </div>
          </div>
        </div>

        <figure class="col-lg-12">
          <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"width="50" height="50"viewBox="0 0 172 172" style=" fill:#000000;">
            <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
              <path d="M0,172v-172h172v172z" fill="none"></path>
                <g fill="#cccccc">
                  <path d="M82.56,6.88v158.24h6.88v-158.24z"></path>
                </g>
            </g>
          </svg> 
        </figure>

        <div class="col-lg-10">
          <div class="row"> 
            <figure class="col-lg-1">
              <img src="https://img.icons8.com/nolan/64/syringe.png"/>
            </figure>
            <div class="col-lg-7">
              <p> <b> Meningocócia C </b> </p>   
              <p>Previne doenças causadas pelo meningococo C (meningites e outras infecções)</p>
            </div>
          </div>
        </div>

        <figure class="col-lg-12">
          <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"width="50" height="50"viewBox="0 0 172 172" style=" fill:#000000;">
            <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
              <path d="M0,172v-172h172v172z" fill="none"></path>
                <g fill="#cccccc">
                  <path d="M82.56,6.88v158.24h6.88v-158.24z"></path>
                </g>
            </g>
          </svg> 
        </figure>

        <div class="col-lg-10">
          <div class="row"> 
            <figure class="col-lg-1">
              <img src="https://img.icons8.com/nolan/64/syringe.png"/>
            </figure>
            <div class="col-lg-7">
              <p><b> Febre Amarela </b> </p>  
              <p>Previne a febre amarela</p>
            </div>
          </div>
        </div>
      </section>
    </div>

    <!-- Segundo -->

    <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab"> 
      <section class="container">
        <div class="row">
          <div class="col-lg-10">
            <div class="row"> 
              <div class="col-lg-1">
                <br>
                <h3> <b> Vacinas </b> </h3>
                <br>
              </div>
            </div>
          </div>
          <br>
       
          <figure class="col-lg-12">
            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"width="50" height="50"viewBox="0 0 172 172" style=" fill:#000000;">
              <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                <path d="M0,172v-172h172v172z" fill="none"></path>
                  <g fill="#cccccc">
                    <path d="M82.56,6.88v158.24h6.88v-158.24z"></path>
                  </g>
              </g>
            </svg> 
          </figure>

          <div class="col-lg-10">
            <div class="row"> 
              <figure class="col-lg-1">
                <img src="https://img.icons8.com/nolan/64/syringe.png"/>
              </figure>
              <div class="col-lg-7">
                <p> <b> HPV </b> </p>
                <p>Em meninas, cânceres do colo de útero,vulva,vagina,ânus,orofaringe e verrugas genitais  </p>
                <p>Em meninos, cânceres de pênis, ânus, orofaringe e verrugas genitais</p>
              </div>
            </div>
          </div>

          <figure class="col-lg-12">
            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"width="50" height="50"viewBox="0 0 172 172" style=" fill:#000000;">
              <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                <path d="M0,172v-172h172v172z" fill="none"></path>
                  <g fill="#cccccc">
                    <path d="M82.56,6.88v158.24h6.88v-158.24z"></path>
                  </g>
              </g>
            </svg> 
          </figure>

          <div class="col-lg-10">
            <div class="row"> 
              <figure class="col-lg-1">
                <img src="https://img.icons8.com/nolan/64/syringe.png"/>
              </figure>
              <div class="col-lg-7">
                <p> <b> Meningocócia C </b> </p>
                <p>Previne doenças causadas pelo meningococo C (meningites e outras infecções)</p>
              </div>
            </div>
          </div>

          <figure class="col-lg-12">
            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"width="50" height="50"viewBox="0 0 172 172" style=" fill:#000000;">
              <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                <path d="M0,172v-172h172v172z" fill="none"></path>
                  <g fill="#cccccc">
                    <path d="M82.56,6.88v158.24h6.88v-158.24z"></path>
                </g>
              </g>
            </svg> 
          </figure>

          <div class="col-lg-10">
            <div class="row"> 
              <figure class="col-lg-1">
                <img src="https://img.icons8.com/nolan/64/syringe.png"/>
              </figure>
              <div class="col-lg-8">
                <p> <b>  Hepatite B </b> </p>
                <p>Previne a hepatite do tipo B</p>
              </div>
            </div>
          </div>

          <figure class="col-lg-12">
            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"width="50" height="50"viewBox="0 0 172 172" style=" fill:#000000;">
              <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                <path d="M0,172v-172h172v172z" fill="none"></path>
                  <g fill="#cccccc">
                    <path d="M82.56,6.88v158.24h6.88v-158.24z"></path>
                </g>
              </g>
            </svg> 
          </figure>

          <div class="col-lg-10">
            <div class="row"> 
              <figure class="col-lg-1">
                <img src="https://img.icons8.com/nolan/64/syringe.png"/>
              </figure>
              <div class="col-lg-7">
                <p> <b> Febre Amarela </b> </p>
                <p>Previne a febre amarela</p>
              </div>
            </div>
        </div>

        <figure class="col-lg-12">
          <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"width="50" height="50"viewBox="0 0 172 172" style=" fill:#000000;">
            <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
              <path d="M0,172v-172h172v172z" fill="none"></path>
                <g fill="#cccccc">
                  <path d="M82.56,6.88v158.24h6.88v-158.24z"></path>
                </g>
            </g>
          </svg> 
        </figure>

        <div class="col-lg-10">
          <div class="row"> 
            <figure class="col-lg-1">
              <img src="https://img.icons8.com/nolan/64/syringe.png"/>
            </figure>
            <div class="col-lg-8">
              <p> <b>  dT </b> </p>
              <p>Previne difteria e tétano</p>
            </div>
          </div>
        </div>
      </section>
    </div>

    <!-- Terceiro -->

    <div class="tab-pane" id="messages" role="tabpanel" aria-labelledby="messages-tab">
      <section class="container">
        <div class="row">
          <div class="col-lg-10">
            <div class="row"> 
              <div class="col-lg-1">
                <br>
                <h3> <b> Vacinas </b> </h3>
                <br>
              </div>
            </div>
          </div>
          <br>
       
          <figure class="col-lg-12">
            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"width="50" height="50"viewBox="0 0 172 172" style=" fill:#000000;">
              <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                <path d="M0,172v-172h172v172z" fill="none"></path>
                  <g fill="#cccccc">
                    <path d="M82.56,6.88v158.24h6.88v-158.24z"></path>
                  </g>
              </g>
            </svg> 
          </figure>

          <div class="col-lg-10">
            <div class="row"> 
              <figure class="col-lg-1">
                <img src="https://img.icons8.com/nolan/64/syringe.png"/>
              </figure>
              <div class="col-lg-8">
                <p><b>  dT </b> </p>
                <p>Previne difteria e tétano</p>
              </div>
            </div>
          </div>

          <figure class="col-lg-12">
            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"width="50" height="50"viewBox="0 0 172 172" style=" fill:#000000;">
              <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                <path d="M0,172v-172h172v172z" fill="none"></path>
                  <g fill="#cccccc">
                    <path d="M82.56,6.88v158.24h6.88v-158.24z"></path>
                  </g>
              </g>
            </svg> 
          </figure>

          <div class="col-lg-10">
            <div class="row"> 
              <figure class="col-lg-1">
                <img src="https://img.icons8.com/nolan/64/syringe.png"/>
              </figure>
              <div class="col-lg-8">
                <p><b> Hepatite B </b> </p> 
                <p>Previne a hepatite do tipo B </p>
              </div>
            </div>
          </div>

          <figure class="col-lg-12">
            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"width="50" height="50"viewBox="0 0 172 172" style=" fill:#000000;">
              <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                <path d="M0,172v-172h172v172z" fill="none"></path>
                  <g fill="#cccccc">
                    <path d="M82.56,6.88v158.24h6.88v-158.24z"></path>
                  </g>  
              </g>
            </svg> 
          </figure>

          <div class="col-lg-10">
            <div class="row"> 
              <figure class="col-lg-1">
                <img src="https://img.icons8.com/nolan/64/syringe.png"/>
              </figure>
              <div class="col-lg-8">
                <p> <b> SCR </b> </p>
                <p>Previne sarampo, caxumba e rubéola</p>
              </div>
            </div>
          </div>

          <figure class="col-lg-12">
            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"width="50" height="50"viewBox="0 0 172 172" style=" fill:#000000;">
              <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                <path d="M0,172v-172h172v172z" fill="none"></path>
                  <g fill="#cccccc">
                    <path d="M82.56,6.88v158.24h6.88v-158.24z"></path>
                  </g>
              </g>
            </svg> 
          </figure>

          <div class="col-lg-10">
            <div class="row"> 
              <figure class="col-lg-1">
                <img src="https://img.icons8.com/nolan/64/syringe.png"/>
              </figure>
              <div class="col-lg-7">
                <p> <b> Febre Amarela </b> </p>
                <p>Previne a febre amarela</p>
              </div>
            </div>
          </div> 
        </section>
      </div>
    
      <!-- Quarto -->
      <div class="tab-pane" id="settings" role="tabpanel" aria-labelledby="settings-tab"> 
        <section class="container">
          <div class="row">
            <div class="col-lg-10">
              <div class="row"> 
                <div class="col-lg-1">
                  <br>
                  <h3> <b> Vacinas </b> </h3>
                  <br>
                </div>
              </div>
            </div>
            <br>

            <figure class="col-lg-12">
              <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"width="50" height="50"viewBox="0 0 172 172" style=" fill:#000000;">
                <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                  <path d="M0,172v-172h172v172z" fill="none"></path>
                    <g fill="#cccccc">
                      <path d="M82.56,6.88v158.24h6.88v-158.24z"></path>
                    </g>
                </g>
              </svg> 
            </figure>

            <div class="col-lg-10">
              <div class="row"> 
                <figure class="col-lg-1">
                  <img src="https://img.icons8.com/nolan/64/syringe.png"/>
                </figure>
                <div class="col-lg-8">
                  <p> <b>  dT </b> </p>
                  <p>Previne difteria e tétano</p>
                </div>
              </div>
            </div>

            <figure class="col-lg-12">
              <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"width="50" height="50"viewBox="0 0 172 172" style=" fill:#000000;">
                <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                  <path d="M0,172v-172h172v172z" fill="none"></path>
                    <g fill="#cccccc">
                      <path d="M82.56,6.88v158.24h6.88v-158.24z"></path>
                    </g>
                </g>
              </svg> 
            </figure>

            <div class="col-lg-10">
              <div class="row"> 
                <figure class="col-lg-1">
                  <img src="https://img.icons8.com/nolan/64/syringe.png"/>
                </figure>
                <div class="col-lg-8">
                  <p><b> Hepatite B </b> </p>
                  <p>Previne a hepatite do tipo B </p>
                </div>
              </div>
            </div>

            <figure class="col-lg-12">
              <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"width="50" height="50"viewBox="0 0 172 172" style=" fill:#000000;">
                <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                  <path d="M0,172v-172h172v172z" fill="none"></path>
                    <g fill="#cccccc">
                      <path d="M82.56,6.88v158.24h6.88v-158.24z"></path>
                    </g>
                </g>
              </svg> 
            </figure>

            <div class="col-lg-10">
              <div class="row"> 
                <figure class="col-lg-1">
                  <img src="https://img.icons8.com/nolan/64/syringe.png"/>
                </figure>
                <div class="col-lg-8">
                  <p> <b> Influenza </b> </p>
                  <p>Previne a gripe</p>
                </div>
              </div>
            </div>

            <figure class="col-lg-12">
              <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"width="50" height="50"viewBox="0 0 172 172" style=" fill:#000000;">
                <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                  <path d="M0,172v-172h172v172z" fill="none"></path>
                    <g fill="#cccccc">
                      <path d="M82.56,6.88v158.24h6.88v-158.24z"></path>
                    </g>
                </g>
              </svg> 
            </figure>

            <div class="col-lg-10">
              <div class="row"> 
                <figure class="col-lg-1">
                  <img src="https://img.icons8.com/nolan/64/syringe.png"/>
                </figure>
                <div class="col-lg-7">
                  <p> <b> Febre Amarela </b> </p>
                  <p>Previne a febre amarela</p>
                </div>
              </div>
            </div>  
          </section>
        </div> 

        <!-- Quinto -->

        <div class="tab-pane" id="settings2" role="tabpanel" aria-labelledby="settings2-tab"> 
          <section class="container">
            <div class="row">
              <div class="col-lg-10">
                <div class="row"> 
                  <div class="col-lg-1">
                    <br>
                    <h3> <b> Vacinas </b> </h3>
                    <br>
                  </div>
                </div>
              </div>
              <br>

              <figure class="col-lg-12">
                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"width="50" height="50"viewBox="0 0 172 172" style=" fill:#000000;">
                  <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                    <path d="M0,172v-172h172v172z" fill="none"></path>
                      <g fill="#cccccc">
                        <path d="M82.56,6.88v158.24h6.88v-158.24z"></path>
                      </g>
                  </g>
                </svg> 
              </figure>

              <div class="col-lg-10">
                <div class="row"> 
                  <figure class="col-lg-1">
                    <img src="https://img.icons8.com/nolan/64/syringe.png"/>
                  </figure>
                  <div class="col-lg-8">
                    <p> <b>  dT </b> </p>
                    <p>Previne difteria e tétano</p>
                  </div>
                </div>
              </div>

              <figure class="col-lg-12">
                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"width="50" height="50"viewBox="0 0 172 172" style=" fill:#000000;">
                  <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                    <path d="M0,172v-172h172v172z" fill="none"></path>
                      <g fill="#cccccc">
                        <path d="M82.56,6.88v158.24h6.88v-158.24z"></path>
                      </g>
                  </g>
                </svg> 
              </figure>

              <div class="col-lg-10">
                <div class="row"> 
                  <figure class="col-lg-1">
                    <img src="https://img.icons8.com/nolan/64/syringe.png"/>
                  </figure>
                  <div class="col-lg-8">
                    <p> <b> Hepatite B </b> </p>
                    <p>Previne a hepatite do tipo B </p>
                  </div>
                </div>
              </div>

              <figure class="col-lg-12">
                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"width="50" height="50"viewBox="0 0 172 172" style=" fill:#000000;">
                  <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                    <path d="M0,172v-172h172v172z" fill="none"></path>
                      <g fill="#cccccc">
                        <path d="M82.56,6.88v158.24h6.88v-158.24z"></path>
                      </g>
                  </g>
                </svg> 
              </figure>

              <div class="col-lg-10">
                <div class="row"> 
                  <figure class="col-lg-1">
                    <img src="https://img.icons8.com/nolan/64/syringe.png"/>
                  </figure>
                  <div class="col-lg-8">
                    <p> <b> SCR </b> </p>
                    <p>Previne sarampo, caxumba e rubéola</p>
                  </div>
                </div>
              </div>

              <figure class="col-lg-12">
                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"width="50" height="50"viewBox="0 0 172 172" style=" fill:#000000;">
                  <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                    <path d="M0,172v-172h172v172z" fill="none"></path>
                      <g fill="#cccccc">
                        <path d="M82.56,6.88v158.24h6.88v-158.24z"></path>
                      </g>
                  </g>
                </svg> 
              </figure>

              <div class="col-lg-10">
                <div class="row"> 
                  <figure class="col-lg-1">
                    <img src="https://img.icons8.com/nolan/64/syringe.png"/>
                  </figure>
                  <div class="col-lg-7">
                    <p><b>dTpa</b> </p>
                    <p>Previne difteria, tétano e conquefuche</p>
                  </div>
                </div>
              </div>

              <figure class="col-lg-12">
                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"width="50" height="50"viewBox="0 0 172 172" style=" fill:#000000;">
                  <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                    <path d="M0,172v-172h172v172z" fill="none"></path>
                      <g fill="#cccccc">
                        <path d="M82.56,6.88v158.24h6.88v-158.24z"></path>
                      </g>
                  </g>
                </svg> 
              </figure>

              <div class="col-lg-10">
                <div class="row"> 
                  <figure class="col-lg-1">
                    <img src="https://img.icons8.com/nolan/64/syringe.png"/>
                  </figure>
                  <div class="col-lg-8">
                    <p><b>  Influenza </b> </p>
                    <p>Previne a gripe</p>
                  </div>
                </div>
              </div>  
            </section>
          </div>
        </div>
        <br><br><br>
        
        <?php
          include '../../footer.php';
        ?>   

        
      </body>
</html>