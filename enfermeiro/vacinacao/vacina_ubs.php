<?php
 session_start();
  include '../../conexao/conexao.php';
 

?>
<?php
  $paciente= $_GET['vacina'];

  $sth = $pdo->prepare('
    select *from tbl_paciente_ubs p 
    INNER JOIN tbl_genero g on p.p_genero = g.tipo_genero_codigo
    where p.p_loginn = :p_loginn
    ');

    $sth->bindValue(':p_loginn',$paciente );
    $sth->execute();
    $resultado = $sth->fetch(PDO::FETCH_ASSOC);
    extract($resultado);
?>

<?php 
    $sth = $pdo->prepare('
        select *from tbl_paciente_ubs p 
        INNER JOIN tbl_endereco e on p.p_endereco = e.en_codigo
        where p.p_loginn = :p_loginn ');
        
    $sth->bindValue(':p_loginn', $paciente);
    $sth->execute();
    $resultado = $sth->fetch(PDO::FETCH_ASSOC);
    extract($resultado);
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
        <br><br><br><nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../home.php">Home</a></li>
                <li class="breadcrumb-item"><a href="../pesquisar/opcao.php?paciente=<?= $paciente;?>">Opções</a></li>
                <li class="breadcrumb-item active" aria-current="page">Vacina</li>
            </ol>
        </nav>
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
        <br/><br/>
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
                                <div class="col-lg-3">
                                    <br>
                                    <h3><b> Vacinas </b> 
                                        <button type="button" class="btn btn-Link" data-toggle="modal" data-target="#basicExampleModal">
                                            <img src="https://img.icons8.com/windows/32/000000/add.png">
                                        </button> 
                                    </h3>
                                    <!-- Modal -->
                                    <div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <div class="text-center">
                                                        <center><span class=" black-text text-"><h2><b>Vacinação</b></h2></span></center>
                                                    </div>
                                                    <br>

                                                    <form name="form1" action="insert_vacina_ubs.php" method="post">
                                                        <input name="vc_paciente" type="hidden" value="<?= $paciente; ?>">
                                                        <input name="vc_aplicador" type="hidden" value="<?= $_SESSION["health"]["id"]; ?>">      
                                                        <div class="form-row">
                                                            <div class="form-group col-md-7">
                                                                <label >Vacina</label>
                                                                <select name="vc_nome" class="form-control">
                                                                    <?php
                                                                     
                                                                        $sth = $pdo ->prepare('select * from tbl_qual_vacina');
                                                                        $sth->execute(); 
                                                                        foreach ($sth as $res){ 
                                                                        extract($res);
                                                                        echo'<option value="'. $qv_codigo .'">' . $qv_tipo . '</option>'; 
                                                                        } 
                                                                    ?>
                                                                </select>
                                                            </div>

                                                            <div class="form-group col-md-5">
                                                                <label for="Form-email4">Periodo</label>
                                                                <select name="vc_tipo" class="form-control">
                                                                    <?php
                                                                       
                                                                        $sth = $pdo ->prepare('select * from tbl_tipo_periodo');
                                                                        $sth->execute(); 
                                                                        foreach ($sth as $res){ 
                                                                        extract($res);
                                                                        echo'<option value="'. $peri_codigo .'">' . $peri_tipo . '</option>'; 
                                                                        } 
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <br><br>

                                                        <div class="form-row">
                                                            <div class="form-group col-md-4">
                                                                <label for="Form-email4">Cod</label>
                                                                <input type="text" class="form-control" name="vc_cod" placeholder="Cod" />   
                                                            </div>

                                                            <div class="form-group col-md-4">
                                                                <label for="Form-email4">Lote</label>
                                                                <input type="text" class="form-control" name="vc_lote" placeholder="Lote" />   
                                                            </div>

                                                            <div class="form-group col-md-4">
                                                                <label for="Form-email4">Data de validade</label>
                                                                <input type="date" class="form-control" name="vc_datav" placeholder="data" />   
                                                            </div>
                                                        </div>
                                                        <br>

                                                        <div class="form-row">
                                                            

                                                            <div class="form-group col-md-12">
                                                                <label for="Form-email4">Data</label>
                                                                <input type="date" class="form-control" name="vc_data" placeholder="data" />   
                                                            </div>
                                                        </div>
                                                        <br>

                                                        <center>
                                                            <button class="btn btn-info" type="submit">Cadastrar</button>
                                                        </center>

                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                </div>
                            </div>
                        </div>
                        <br>
                        <?php
                             
                             $sth = $pdo->prepare('select *from tbl_vacina v 
                               INNER JOIN tbl_qual_vacina q on v.vc_nome = q.qv_codigo
                               where vc_tipo = :vc_tipo and vc_paciente = :vc_paciente');
                             
                             $sth->bindValue(':vc_paciente', $paciente);
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
                                    <p><b> Data de validade :</b> <?php echo $vc_datav ?></p>
                                    <p><b> Lote :</b> <?php echo $vc_lote ?>
                                    <b> | Cod : </b> <?php echo $vc_cod ?></p>
                                    <?php 
                                        $sth = $pdo->prepare('
                                        select *from tbl_enfermeiro e 
                                        INNER JOIN tbl_login l on e.en_login = l.lo_codigo
                                        where e.en_login = :en_login ');
                                                
                                        $sth->bindValue(':en_login', $_SESSION["health"]["id"] );
                                        $sth->execute();
                                        $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                                        extract($resultado);
                                    ?>
                                    <p><b> Aplicador : </b><?php echo $en_nome ?> 
                                    <b> | Data : </b> <?php echo $vc_data ?> </p>

                                </div>
                            </div>
                        </div>

                        <?php
                            endforeach;
                            else : echo ' <center> <p> <h5> Nenhuma vacinação no momento </h5> </p> </center> ';
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
                                <div class="col-lg-3">
                                    <br>
                                    <h3> <b> Vacinas </b> 
                                        <button type="button" class="btn btn-Link" data-toggle="modal" data-target="#basicExampleModal2">
                                            <img src="https://img.icons8.com/windows/32/000000/add.png">
                                        </button> 
                                    </h3>

                                    <!-- Modal -->
                                    <div class="modal fade" id="basicExampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <div class="text-center">
                                                        <center><span class=" black-text text-"><h2><b>Vacinação</b></h2></span></center>
                                                    </div>
                                                    <br>

                                                    <?php
                                              
                                                        $sth = $pdo->prepare('SELECT *FROM tbl_vacina ');
                                                        $sth->execute();
                                                    ?>

                                                    <form name="form1" action="insert_vacina_ubs.php" method="post">
                                                    <input name="vc_paciente" type="hidden" value="<?= $paciente; ?>"> 
                                                    <input name="vc_aplicador" type="hidden" value="<?= $_SESSION["health"]["id"]; ?>">      
                                                        <div class="form-row">
                                                            <div class="form-group col-md-7">
                                                                <label >Vacina</label>
                                                                <select name="vc_nome" class="form-control">
                                                                    <?php
                                                                        include '../conexao/conexao.php';
                                                                        $sth = $pdo ->prepare('select * from tbl_qual_vacina');
                                                                        $sth->execute(); 
                                                                        foreach ($sth as $res){ 
                                                                            extract($res);
                                                                            echo'<option value="'. $qv_codigo .'">' . $qv_tipo . '</option>'; 
                                                                        } 
                                                                    ?>
                                                                </select>
                                                            </div>

                                                            <div class="form-group col-md-5">
                                                                <label for="Form-email4">Periodo</label>
                                                                <select name="vc_tipo" class="form-control">
                                                                    <?php
                                                                        
                                                                        $sth = $pdo ->prepare('select * from tbl_tipo_periodo');
                                                                        $sth->execute(); 
                                                                        foreach ($sth as $res){ 
                                                                            extract($res);
                                                                            echo'<option value="'. $peri_codigo .'">' . $peri_tipo . '</option>'; 
                                                                        }

                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <br><br>

                                                        <div class="form-row">
                                                            <div class="form-group col-md-4">
                                                            <label for="Form-email4">Cod</label>
                                                            <input type="text" class="form-control" name="vc_cod" placeholder="Cod" />   
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="Form-email4">Lote</label>
                                                            <input type="text" class="form-control" name="vc_lote" placeholder="Lote" />   
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="Form-email4">Data de validade</label>
                                                            <input type="date" class="form-control" name="vc_datav" placeholder="data" />   
                                                        </div>
                                                    </div>
                                                    <br>
           
                                                    <div class="form-row">                                                      
                                                        <div class="form-group col-md-12"> 
                                                            <label for="Form-email4">Data</label>
                                                            <input type="date" class="form-control" name="vc_data" placeholder="data" />   
                                                        </div>
                                                    </div>
                                                    <br>

                                                    <center>
                                                        <button class="btn btn-info" type="submit">Cadastrar</button>
                                                    </center>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                            </div>
                        </div>
                    </div>
                    <br>
                    <?php
                        $sth = $pdo->prepare('select *from tbl_vacina v
                            INNER JOIN tbl_qual_vacina q on v.vc_nome = q.qv_codigo
                        where vc_tipo = :vc_tipo and vc_paciente = :vc_paciente');
                
                        $sth->bindValue(':vc_paciente', $paciente);
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
                                <p><b> Data de validade :</b> <?php echo $vc_datav ?></p>
                                <p><b> Lote :</b> <?php echo $vc_lote ?>
                                <b> | Cod : </b> <?php echo $vc_cod ?></p>
                                <?php 
                                    $sth = $pdo->prepare('
                                        select *from tbl_enfermeiro e 
                                        INNER JOIN tbl_login l on e.en_login = l.lo_codigo
                                    where e.en_login = :en_login ');
                                                
                                    $sth->bindValue(':en_login', $_SESSION["health"]["id"] );
                                    $sth->execute();
                                    $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                                    extract($resultado);
                                ?>
                                <p><b> Aplicador : </b><?php echo $en_nome ?> 
                                <b> | Data : </b> <?php echo $vc_data ?> </p>

                            </div>
                        </div>
                    </div>

                    <?php
                        endforeach;
                        else : echo ' <center> <p> <h5> Nenhuma vacinação no momento </h5> </p> </center> ';
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
                            <div class="col-lg-3">
                                <br>
                                <h3><b> Vacinas </b> 
                                    <button type="button" class="btn btn-Link" data-toggle="modal" data-target="#basicExampleModal3">
                                        <img src="https://img.icons8.com/windows/32/000000/add.png">
                                    </button> 
                                </h3>
                                <!-- Modal -->
                                <div class="modal fade" id="basicExampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <div class="text-center">
                                                    <center><span class=" black-text text-"><h2><b>Vacinação</b></h2></span></center>
                                                </div>

                                                <form name="form1" action="insert_vacina_ubs.php" method="post">
                                                <input name="vc_paciente" type="hidden" value="<?= $paciente; ?>"> 
                                                <input name="vc_aplicador" type="hidden" value="<?= $_SESSION["health"]["id"]; ?>">      
                                                    <div class="form-row">
                                                        <div class="form-group col-md-7">
                                                            <label >Vacina</label>
                                                            <select name="vc_nome" class="form-control">
                                                                <?php
                                                               
                                                                    $sth = $pdo ->prepare('select * from tbl_qual_vacina');
                                                                    $sth->execute(); 
                                                                    foreach ($sth as $res){ 
                                                                        extract($res);
                                                                        echo'<option value="'. $qv_codigo .'">' . $qv_tipo . '</option>'; 
                                                                    } 
                                                                ?>
                                                            </select>
                                                        </div>

                                                        <div class="form-group col-md-5">
                                                            <label for="Form-email4">Periodo</label>
                                                            <select name="vc_tipo" class="form-control">
                                                                <?php
                                                                
                                                                    $sth = $pdo ->prepare('select * from tbl_tipo_periodo');
                                                                    $sth->execute(); 
                                                                    foreach ($sth as $res){ 
                                                                        extract($res);
                                                                        echo'<option value="'. $peri_codigo .'">' . $peri_tipo . '</option>'; 
                                                                    } 
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <br><br>

                                                    <div class="form-row">
                                                        <div class="form-group col-md-4">
                                                            <label for="Form-email4">Cod</label>
                                                            <input type="text" class="form-control" name="vc_cod" placeholder="Cod" />   
                                                        </div>

                                                        <div class="form-group col-md-4">
                                                            <label for="Form-email4">Lote</label>
                                                            <input type="text" class="form-control" name="vc_lote" placeholder="Lote" />   
                                                        </div>

                                                        <div class="form-group col-md-4">
                                                            <label for="Form-email4">Data de validade</label>
                                                            <input type="date" class="form-control" name="vc_datav" placeholder="data" />   
                                                        </div>
                                                    </div>
                                                    <br>
           
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label for="Form-email4">Data</label>
                                                            <input type="date" class="form-control" name="vc_data" placeholder="data" />   
                                                        </div>
                                                    </div>
                                                    <br>

                                                    <center>
                                                        <button class="btn btn-info" type="submit">Cadastrar</button>
                                                    </center>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                            </div>
                        </div> 
                

                        <?php
                            $sth = $pdo->prepare('select *from tbl_vacina v
                                INNER JOIN tbl_qual_vacina q on v.vc_nome = q.qv_codigo
                            where vc_tipo = :vc_tipo and vc_paciente = :vc_paciente');
              
                            $sth->bindValue(':vc_paciente', $paciente);
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
                                    <p><b> Data de validade:</b> <?php echo $vc_datav ?></p>
                                    <p><b> Lote :</b> <?php echo $vc_lote ?>
                                    <b> | Cod : </b> <?php echo $vc_cod  ?></p>
                                    <?php 
                                        $sth = $pdo->prepare('
                                            select *from tbl_enfermeiro e 
                                            INNER JOIN tbl_login l on e.en_login = l.lo_codigo
                                        where e.en_login = :en_login ');
                                                
                                        $sth->bindValue(':en_login', $_SESSION["health"]["id"] );
                                        $sth->execute();
                                        $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                                        extract($resultado);
                                    ?>
                                    <p><b> Aplicador : </b><?php echo $en_nome ?> 
                                    <b> | Data : </b> <?php echo $vc_data ?></p>
                                </div>
                            </div>
                        </div>

                        <?php
                            endforeach;
                            else : echo ' <center> <p> <h5> Nenhuma vacinação no momento </h5> </p> </center> ';
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
                                <div class="col-lg-3">
                                    <br>
                                    <h3> <b> Vacinas </b> 
                                        <button type="button" class="btn btn-Link" data-toggle="modal" data-target="#basicExampleModal4">
                                            <img src="https://img.icons8.com/windows/32/000000/add.png">
                                        </button> 
                                    </h3>
                                    <!-- Modal -->
                                    <div class="modal fade" id="basicExampleModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <div class="text-center">
                                                        <center><span class=" black-text text-"><h2><b>Vacinação</b></h2></span></center>
                                                    </div>
                                                    <br>

                                                    <?php
                                                 
                                                        $sth = $pdo->prepare('SELECT *FROM tbl_vacina ');
                                                        $sth->execute();
                                                    ?>

                                                    <form name="form1" action="insert_vacina_ubs.php" method="post">
                                                        <input name="vc_paciente" type="hidden" value="<?= $paciente; ?>"> 
                                                        <input name="vc_aplicador" type="hidden" value="<?= $_SESSION["health"]["id"]; ?>">      
                                                        <div class="form-row">
                                                            <div class="form-group col-md-7">
                                                                <label >Vacina</label>
                                                                <select name="vc_nome" class="form-control">
                                                                    <?php
                                                             
                                                                        $sth = $pdo ->prepare('select * from tbl_qual_vacina');
                                                                        $sth->execute(); 
                                                                        foreach ($sth as $res){ 
                                                                            extract($res);
                                                                            echo'<option value="'. $qv_codigo .'">' . $qv_tipo . '</option>'; 
                                                                        } 
                                                                    ?>
                                                                </select>
                                                            </div>

                                                            <div class="form-group col-md-5">
                                                                <label for="Form-email4">Periodo</label>
                                                                <select name="vc_tipo" class="form-control">
                                                                    <?php
                                                                        include '../conexao/conexao.php';
                                                                        $sth = $pdo ->prepare('select * from tbl_tipo_periodo');
                                                                        $sth->execute(); 
                                                                        foreach ($sth as $res){ 
                                                                            extract($res);
                                                                            echo'<option value="'. $peri_codigo .'">' . $peri_tipo . '</option>'; 
                                                                        } 
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <br><br>

                                                        <div class="form-row">
                                                            <div class="form-group col-md-4">
                                                                <label for="Form-email4">Cod</label>
                                                                <input type="text" class="form-control" name="vc_cod" placeholder="Cod" />   
                                                            </div>

                                                            <div class="form-group col-md-4">
                                                                <label for="Form-email4">Lote</label>
                                                                <input type="text" class="form-control" name="vc_lote" placeholder="Lote" />   
                                                            </div>

                                                            <div class="form-group col-md-4">
                                                                <label for="Form-email4">Data de validade</label>
                                                                <input type="date" class="form-control" name="vc_datav" placeholder="data" />   
                                                            </div>
                                                        </div>
                                                        <br>
           
                                                        <div class="form-row">                                               
                                                            <div class="form-group col-md-12">
                                                                <label for="Form-email4">Data</label>
                                                                <input type="date" class="form-control" name="vc_data" placeholder="data" />   
                                                            </div>
                                                        </div>
                                                        <br>

                                                        <center>
                                                            <button class="btn btn-info" type="submit" >Cadastrar</button>
                                                        </center>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                </div>
                            </div>
                        </div>
                        <br>

                        <?php
                            $sth = $pdo->prepare('select *from tbl_vacina v
                                INNER JOIN tbl_qual_vacina q on v.vc_nome = q.qv_codigo
                            where vc_tipo = :vc_tipo and vc_paciente = :vc_paciente');
                        
                            $sth->bindValue(':vc_paciente', $paciente);
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
                                    <p><b> Data de validade :</b> <?php echo $vc_datav ?></p>
                                    <p><b> Lote :</b> <?php echo $vc_lote ?>
                                    <b> | Cod : </b> <?php echo $vc_cod  ?></p>
                            
                            
                                    <?php
                                        $sth = $pdo->prepare('
                                            select *from tbl_enfermeiro e 
                                            INNER JOIN tbl_login l on e.en_login = l.lo_codigo
                                        where e.en_login = :en_login ');
                                                
                                        $sth->bindValue(':en_login', $_SESSION["health"]["id"] );
                                        $sth->execute();
                                        $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                                        extract($resultado);
                                    ?>
                                    <p><b> Aplicador : </b><?php echo $en_nome ?> 
                                    <b> | Data : </b> <?php echo $vc_data ?></p>

                                </div>
                            </div>
                        </div>

                        <?php
                            endforeach;
                            else : echo ' <center> <p> <h5> Nenhuma vacinação no momento </h5> </p> </center> ';
                            endif;
                        ?>

                    </div>  
                </section>
            </div> 

            <!-- Quinto -->
            <div class="tab-pane" id="settings2" role="tabpanel" aria-labelledby="settings2-tab"> 
                <section class="container">
                    <div class="row">
                        <div class="col-lg-10">
                            <div class="row"> 
                                <div class="col-lg-3">
                                    <br>
                                    <h3> <b> Vacinas </b> 
                                        <button type="button" class="btn btn-Link" data-toggle="modal" data-target="#basicExampleModal5">
                                            <img src="https://img.icons8.com/windows/32/000000/add.png">
                                        </button> 
                                    </h3>
                                    <!-- Modal -->
                                    <div class="modal fade" id="basicExampleModal5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <div class="text-center">
                                                        <center><span class=" black-text text-"><h2><b>Vacinação</b></h2></span></center>
                                                    </div>
                                                    <br>

                                                    <?php

                                                        $sth = $pdo->prepare('SELECT *FROM tbl_vacina ');
                                                        $sth->execute();
                                                    ?>

                                                    <form name="form1" action="insert_vacina_ubs.php" method="post">
                                                        <input name="vc_paciente" type="hidden" value="<?= $paciente; ?>"> 
                                                        <input name="vc_aplicador" type="hidden" value="<?= $_SESSION["health"]["id"]; ?>">      
                                                        <div class="form-row">
                                                            <div class="form-group col-md-7">
                                                                <label >Vacina</label>
                                                                <select name="vc_nome" class="form-control">
                                                                    <?php
                                                             
                                                                        $sth = $pdo ->prepare('select * from tbl_qual_vacina');
                                                                        $sth->execute(); 
                                                                        foreach ($sth as $res){ 
                                                                            extract($res);
                                                                            echo'<option value="'. $qv_codigo .'">' . $qv_tipo . '</option>'; 
                                                                        } 
                                                                    ?>
                                                                </select>
                                                            </div>

                                                            <div class="form-group col-md-5">
                                                                <label for="Form-email4">Periodo</label>
                                                                <select name="vc_tipo" class="form-control">
                                                                    <?php
                                                                        include '../conexao/conexao.php';
                                                                        $sth = $pdo ->prepare('select * from tbl_tipo_periodo');
                                                                        $sth->execute(); 
                                                                        foreach ($sth as $res){ 
                                                                            extract($res);
                                                                            echo'<option value="'. $peri_codigo .'">' . $peri_tipo . '</option>'; 
                                                                        } 
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <br><br>

                                                        <div class="form-row">
                                                            <div class="form-group col-md-4">
                                                                <label for="Form-email4">Cod</label>
                                                                <input type="text" class="form-control" name="vc_cod" placeholder="Cod" />   
                                                            </div>

                                                            <div class="form-group col-md-4">
                                                                <label for="Form-email4">Lote</label>
                                                                <input type="text" class="form-control" name="vc_lote" placeholder="Lote" />   
                                                            </div>

                                                            <div class="form-group col-md-4">
                                                                <label for="Form-email4">Data de validade</label>
                                                                <input type="date" class="form-control" name="vc_datav" placeholder="data" />   
                                                            </div>
                                                        </div>
                                                        <br>
           
                                                        <div class="form-row">                                               
                                                            <div class="form-group col-md-12">
                                                                <label for="Form-email4">Data</label>
                                                                <input type="date" class="form-control" name="vc_data" placeholder="data" />   
                                                            </div>
                                                        </div>
                                                        <br>

                                                        <center>
                                                            <button class="btn btn-info" type="submit" >Cadastrar</button>
                                                        </center>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                </div>
                            </div>
                        </div>
                        <br>

                        <?php
                            $sth = $pdo->prepare('select *from tbl_vacina v
                                INNER JOIN tbl_qual_vacina q on v.vc_nome = q.qv_codigo
                            where vc_tipo = :vc_tipo and vc_paciente = :vc_paciente');
                        
                            $sth->bindValue(':vc_paciente', $paciente);
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
                                <p><b> Data de validade :</b> <?php echo $vc_datav ?></p>
                                <p><b> Lote :</b> <?php echo $vc_lote ?>
                                <b> | Cod : </b> <?php echo $vc_cod  ?></p>
                                <?php 
                                    $sth = $pdo->prepare('
                                        select *from tbl_enfermeiro e 
                                        INNER JOIN tbl_login l on e.en_login = l.lo_codigo
                                    where e.en_login = :en_login ');
                                                
                                    $sth->bindValue(':en_login', $_SESSION["health"]["id"] );
                                    $sth->execute();
                                    $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                                    extract($resultado);
                                ?>
                                <p><b> Aplicador : </b><?php echo $en_nome ?> 
                                <b> | Data : </b> <?php echo $vc_data ?></p>

                            </div>
                        </div>
                    </div>

                    <?php
                        endforeach;
                        else : echo ' <center> <p> <h5> Nenhuma vacinação no momento </h5> </p> </center> ';
                        endif;
                    ?>

                </div>  
            </section>
        </div>
    </div>
    <br>

    <?php
        include '../../footer.php';
    ?> 

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  </body>
</html>