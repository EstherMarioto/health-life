<?php
  include '../../conexao/conexao.php';
  session_start()
?>
<?php
 
  $sth = $pdo->prepare('select *from tbl_paciente_ubs where p_loginn = :p_loginn ');     
  $sth->bindValue(':p_loginn', $_SESSION["health"]["id"]);
  $sth->execute();
  $resultado = $sth->fetch(PDO::FETCH_ASSOC);
  extract($resultado);
?>
<?php 
 
  $sth = $pdo->prepare('
    select *from tbl_paciente_ubs p 
    INNER JOIN tbl_endereco e on p.p_endereco = e.en_codigo
    where p.p_loginn = :p_loginn '
  );
      
  $sth->bindValue(':p_loginn', $_SESSION["health"]["id"]);
  $sth->execute();
  $resultado = $sth->fetch(PDO::FETCH_ASSOC);
  extract($resultado);
?>


<!doctype html>
<html lang="en">
  <body>
   <?php
      include 'header.php';
   ?> 
    <br><br>
   
    <section class="container">
      <div class="table-responsive">
        <table class="table table-bordered " style="background-color: #a7ffeb" >
          <thead  style="border: 2px solid #000000;" height="30px">
            <tr>
              <td style="border: 2px solid #000000;" height="30px" colspan="2"><center><h4>Informações Pessoais</h4></center></td>
            </tr> 
          </thead>
          <tbody>
            <tr>
              <th style="border: 2px solid #000000;" height="30px" scope="row">Nome Completo : <?php echo $p_nome ;?></th>
              <th style="border: 2px solid #000000;" height="30px">Nome da mãe :  <?php echo $p_nome_mae ;?></th>
            </tr>

            <tr style ="border: 2px solid #000000;" height="30px">
              <th scope="row">Nome do Pai :  <?php echo $p_nome_pai ;?></th>
              <th style="border: 2px solid #000000;" height="30px">Endereço : <?php echo $en_rua ;?></th>
            </tr>
            <tr style="border: 2px solid #000000;" height="30px">
            <?php 
              $sth = $pdo->prepare('
                select *from tbl_paciente_ubs p 
                INNER JOIN tbl_genero g on p.p_genero = g.tipo_genero_codigo
                where p.p_loginn = :p_loginn '
              );
                  
              $sth->bindValue(':p_loginn', $_SESSION["health"]["id"]);
              $sth->execute();
              $resultado = $sth->fetch(PDO::FETCH_ASSOC);
              extract($resultado);
            ?>
              <th scope="row">Gênero : <?php echo $tipo_genero_tipo ;?></th>
              <th style="border: 2px solid #000000;" height="30px">CEP : <?php echo $en_cep ;?></th>
            </tr>
            <tr style="border: 2px solid #000000;" height="30px">
              <th scope="row">Data de Nascimento :  <?php echo $p_dtnasc ;?></th>
              <th style="border: 2px solid #000000;" height="30px">Telefone : <?php echo $p_telefone ;?></th>
            </tr>            
          </tbody>
        </table>
      </div>
    </section>   
    </br></br>

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
        <?php 
        $sth = $pdo->prepare('select *from tbl_paciente_ubs where p_loginn = :p_loginn ' );  
        $sth->bindValue(':p_loginn',  $_SESSION["health"]["id"]);
        $sth->execute();
        $resultado = $sth->fetch(PDO::FETCH_ASSOC);
        extract($resultado);
        if($p_genero == 2){
      ?>
        <li class="nav-item">
          <a class="nav-link" id="settings2-tab" data-toggle="tab" href="#settings2" role="tab" aria-controls="settings2" aria-selected="false">Gestante</a>
        </li>
        <?php 
        }else{};
      ?>
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
            <?php
              $sth = $pdo->prepare('select *from tbl_vacina v 
                INNER JOIN tbl_login l on v.vc_enfermeiro = l.lo_codigo
                INNER JOIN tbl_qual_vacina q on v.vc_nome = q.qv_codigo
                where vc_tipo = :vc_tipo and vc_paciente = :vc_paciente');
              
              $sth->bindValue(':vc_paciente', $_SESSION["health"]["id"]);
              $sth->bindValue(':vc_tipo', 1);
              $sth->execute();
              
              if ($sth->rowCount() > 0) :
              foreach ($sth as $res) :
              extract($res);
            ?>

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
                  <p><b> Vacina :</b> <?php echo $qv_tipo ?></p>
                  <p><b> Data de validade :</b> <?php 
                    $ano = substr($vc_datav,0,4);
                    $mes=substr($vc_datav,4,4);
                    $dia=substr($vc_datav,8,2);
                   
                  echo $dia; echo $mes; echo $ano; ?></p>
                  <p><b> Lote :</b> <?php echo $vc_lote ?>
                  <b> | Cod : </b> <?php echo $vc_cod ?></p>
                  <p><b> Aplicador : </b><?php 
                    $sth = $pdo->prepare('select *from tbl_enfermeiro where en_login = :en_login ' );  
                    $sth->bindValue(':en_login', $lo_codigo);
                    $sth->execute();
                    $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                    extract($resultado);
                  echo $en_nome ?> 
                  <b> | Data : </b> <?php 
                   $ano2 = substr($vc_data,0,4);
                   $mes2 =substr($vc_data,4,4);
                   $dia2 =substr($vc_data,8,2);

                   echo $dia2; echo $mes2; echo $ano2; ?> </p>

                </div>
              </div>
            </div>
            <?php
              endforeach;
              else : echo ' <center> <p> <h5> Nenhuma vacina no momento </h5> </p> </center> ';
              endif;
            ?>
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
            <?php
              $sth = $pdo->prepare('select *from tbl_vacina v 
                INNER JOIN tbl_login l on v.vc_enfermeiro = l.lo_codigo
                INNER JOIN tbl_qual_vacina q on v.vc_nome = q.qv_codigo
                where vc_tipo = :vc_tipo and vc_paciente = :vc_paciente');
              
              $sth->bindValue(':vc_paciente', $_SESSION["health"]["id"]);
              $sth->bindValue(':vc_tipo', 2);
              $sth->execute();
              
              if ($sth->rowCount() > 0) :
              foreach ($sth as $res) :
              extract($res);
            ?>
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
                  <p><b> Vacina :</b> <?php echo $qv_tipo ?></p>
                  <p><b> Data de validade :</b> <?php 
                    $ano = substr($vc_datav,0,4);
                    $mes=substr($vc_datav,4,4);
                    $dia=substr($vc_datav,8,2);
                   
                  echo $dia; echo $mes; echo $ano; ?></p>
                  <p><b> Lote :</b> <?php echo $vc_lote ?>
                  <b> | Cod : </b> <?php echo $vc_cod  ?></p>
                  <p><b> Aplicador : </b><?php 
                    $sth = $pdo->prepare('select *from tbl_enfermeiro where en_login = :en_login ' );  
                    $sth->bindValue(':en_login', $lo_codigo);
                    $sth->execute();
                    $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                    extract($resultado);
                  echo $en_nome ?> 
                  <b> | Data : </b><?php 
                   $ano2 = substr($vc_data,0,4);
                   $mes2 =substr($vc_data,4,4);
                   $dia2 =substr($vc_data,8,2);

                   echo $dia2; echo $mes2; echo $ano2; ?> </p>
                </div>
              </div>
            </div>
            <?php
              endforeach;
              else : echo ' <center> <p> <h5> Nenhuma vacina no momento </h5> </p> </center> ';
              endif;
            ?>
        
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
            <?php
              $sth = $pdo->prepare('select *from tbl_vacina v 
                INNER JOIN tbl_login l on v.vc_enfermeiro = l.lo_codigo
                INNER JOIN tbl_qual_vacina q on v.vc_nome = q.qv_codigo
                where vc_tipo = :vc_tipo and vc_paciente = :vc_paciente');
              
              $sth->bindValue(':vc_paciente', $_SESSION["health"]["id"]);
              $sth->bindValue(':vc_tipo', 3);
              $sth->execute();
              
              if ($sth->rowCount() > 0) :
              foreach ($sth as $res) :
              extract($res);
            ?>

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
                  <p><b> Vacina: </b> <?php echo $qv_tipo ?></p>
                  <p><b> Data de validade:</b> <?php 
                    $ano = substr($vc_datav,0,4);
                    $mes=substr($vc_datav,4,4);
                    $dia=substr($vc_datav,8,2);
                   
                  echo $dia; echo $mes; echo $ano; ?></p>
                  <p><b> Lote :</b> <?php echo $vc_lote ?>
                  <b> | Cod : </b> <?php echo $vc_cod  ?></p>
                  <p><b> Aplicador : </b><?php 
                    $sth = $pdo->prepare('select *from tbl_enfermeiro where en_login = :en_login ' );  
                    $sth->bindValue(':en_login', $lo_codigo);
                    $sth->execute();
                    $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                    extract($resultado);
                  echo $en_nome ?>
                  <b> | Data : </b> <?php 
                   $ano2 = substr($vc_data,0,4);
                   $mes2 =substr($vc_data,4,4);
                   $dia2 =substr($vc_data,8,2);

                   echo $dia2; echo $mes2; echo $ano2; ?></p>
                </div>
              </div>
            </div>

            <?php
              endforeach;
              else : echo ' <center> <p> <h5> Nenhuma vacina no momento </h5> </p> </center> ';
              endif;
            ?>

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
            <?php
              $sth = $pdo->prepare('select *from tbl_vacina v 
                INNER JOIN tbl_login l on v.vc_enfermeiro = l.lo_codigo
                INNER JOIN tbl_qual_vacina q on v.vc_nome = q.qv_codigo
                where vc_tipo = :vc_tipo and vc_paciente = :vc_paciente');
              
              $sth->bindValue(':vc_paciente', $_SESSION["health"]["id"]);
              $sth->bindValue(':vc_tipo', 4);
              $sth->execute();
              
              if ($sth->rowCount() > 0) :
              foreach ($sth as $res) :
              extract($res);
            ?>
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
                  <p><b> Vacina :</b> <?php echo $qv_tipo ?></p>
                  <p><b> Data de validade :</b> <?php 
                    $ano = substr($vc_datav,0,4);
                    $mes=substr($vc_datav,4,4);
                    $dia=substr($vc_datav,8,2);
                   
                  echo $dia; echo $mes; echo $ano; ?></p>
                  <p><b> Lote :</b> <?php echo $vc_lote ?>
                  <b> | Cod : </b> <?php echo $vc_cod  ?></p>
                  <p><b> Aplicador : </b><?php 
                    $sth = $pdo->prepare('select *from tbl_enfermeiro where en_login = :en_login ' );  
                    $sth->bindValue(':en_login', $lo_codigo);
                    $sth->execute();
                    $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                    extract($resultado);
                  echo $en_nome ?>
                  <b> | Data : </b> <?php 
                   $ano2 = substr($vc_data,0,4);
                   $mes2 =substr($vc_data,4,4);
                   $dia2 =substr($vc_data,8,2);

                   echo $dia2; echo $mes2; echo $ano2; ?></p>
                </div>
              </div>
            </div>

            <?php
              endforeach;
              else : echo ' <center> <p> <h5> Nenhuma vacina no momento </h5> </p> </center> ';
              endif;
            ?>

          </div>  
        </section>
      </div> 
      <?php 
        $sth = $pdo->prepare('select *from tbl_paciente_ubs where p_loginn = :p_loginn ' );  
        $sth->bindValue(':p_loginn',  $_SESSION["health"]["id"]);
        $sth->execute();
        $resultado = $sth->fetch(PDO::FETCH_ASSOC);
        extract($resultado);
        if($p_genero == 2){
      ?>
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

            <?php
              $sth = $pdo->prepare('select *from tbl_vacina v 
                INNER JOIN tbl_login l on v.vc_enfermeiro = l.lo_codigo
                INNER JOIN tbl_qual_vacina q on v.vc_nome = q.qv_codigo
                where vc_tipo = :vc_tipo and vc_paciente = :vc_paciente');
              
              $sth->bindValue(':vc_paciente', $_SESSION["health"]["id"]);
              $sth->bindValue(':vc_tipo', 5);
              $sth->execute();
              
              if ($sth->rowCount() > 0) :
              foreach ($sth as $res) :
              extract($res);
            ?>
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
                  <p><b> Vacina :</b> <?php echo $qv_tipo ?></p>
                  <p><b> Data de validade :</b> <?php 
                    $ano = substr($vc_datav,0,4);
                    $mes=substr($vc_datav,4,4);
                    $dia=substr($vc_datav,8,2);
                   
                  echo $dia; echo $mes; echo $ano; ?></p>
                  <p><b> Lote :</b> <?php echo $vc_lote ?>
                  <b> | Cod : </b> <?php echo $vc_cod  ?></p>
                  <p><b> Aplicador : </b><?php 
                    $sth = $pdo->prepare('select *from tbl_enfermeiro where en_login = :en_login ' );  
                    $sth->bindValue(':en_login', $lo_codigo);
                    $sth->execute();
                    $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                    extract($resultado);
                  echo $en_nome ?> 
                  <b> | Data : </b> <?php 
                   $ano2 = substr($vc_data,0,4);
                   $mes2 =substr($vc_data,4,4);
                   $dia2 =substr($vc_data,8,2);

                   echo $dia2; echo $mes2; echo $ano2; ?></p>

                </div>
              </div>
            </div>
            <?php
              
              endforeach;
              else : echo ' <center> <p> <h5> Nenhuma vacina no momento </h5> </p> </center> ';
              endif;
            }else{};
            ?>

          </div>  
        </section>
      </div>
    </div>
    <br><br><br>
    <center>
      <div class="square">
        <span></span>
        <span></span>
        <span></span>
        <div class="content">
          <h2><i> Quer saber mais para que serve cada vacina ? </i></h2>
          <br>
          <a href="vacinas.php"><p><b>Clique aqui </b></p></a>
        </div>
      </div>
    </center>
    <br>
    <?php
      include '../../footer.php';
    ?>   
   </body>
</html>