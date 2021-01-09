<!doctype html>
<?php
session_start();
    include '../../conexao/conexao.php';
    $end= $_GET['medico'];
    
    

    $sth = $pdo->prepare('
        select *from tbl_medico where me_login = :me_login');

    $sth->bindValue(':me_login',$end );
    $sth->execute();
    $resultado = $sth->fetch(PDO::FETCH_ASSOC);
    extract($resultado);
?>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <!-- calendario -->
        <link href='css/core/main.min.css' rel='stylesheet' />
        <link href='css/daygrid/main.min.css' rel='stylesheet' />
        <link href='css/personalizado.css' rel='stylesheet' />
        <script src='js/core/main.min.js'></script>
        <script src='js/interaction/main.min.js'></script>
        <script src='js/daygrid/main.min.js'></script>
        <script src='js/core/locales/pt-br.js'></script>
        <script src='js/personalizado.js'></script>
        <title>Health & Life</title>
    </head>
    <body>
        <?php
            include 'header.php';
        ?>
        <br/><br/>
       
        <center>
            <div class="col-lg-7">
                <!-- Card -->
                <div class="card" >
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="container">
                                <!-- Avatar -->
                                <br/>
                                <?php  
                                    $sth = $pdo->prepare('select * from tbl_img_dado where im_medico = :im_medico and im_detalhe = :im_detalhe');
                                    $sth->bindValue(':im_medico', $me_codigo);
                                    $sth->bindValue(':im_detalhe', 9);

                                    $sth->execute();
                                    $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                                    extract($resultado);
                                
                                echo "<img src='../../secretario/cadastro_medico/img/" . $im_dado. "' alt='Fotos' width='170' height='170' class='rounded-circle' />";
                                ?>                
                            </div>
                            <br/>
                        </div>
                        <div class="col-lg-9  text-left">
                            <?php
                                $sth = $pdo->prepare('select * from tbl_medico where me_codigo = :me_codigo');
                                $sth->bindValue(':me_codigo', $im_medico);
                                $sth->execute();
                                $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                                extract($resultado);
                            ?>
                            <div class="card-body ">
                                <h5 class="card-title "><b><?php echo $me_nome?></b></h5>
                                <hr>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <h5><b>Unidade:</b> </h5>
                                    </div>
                                    <div class="col-lg-6 ">
                                        <h5> 
                                            <?php
                                                $sth = $pdo->prepare('select * from tbl_login l 
                                                    INNER JOIN tbl_unidade u on l.lo_unidade = u.un_codigo
                                                where l.lo_codigo = :lo_codigo');
                                                $sth->bindValue(':lo_codigo', $me_login);
                                                $sth->execute();
                                                $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                                                extract($resultado);
                                     
                                                echo $un_tipo
                                            ?> 
                                        </h5>
                                    </div>
                                </div>
                                <br/>
                                <div class="row ">
                                    <div class="col-lg-6">
                                        <h5><b>Especialidade:</b> </h5>
                                    </div>
                                    <div class="col-lg-6 ">
                                        <h5> <?php
                                                $sth = $pdo->prepare('select * from tbl_medico m 
                                                INNER JOIN tbl_especialidade e on m.me_especialidade = e.es_codigo
                                                where m.me_login = :me_login');
                                                $sth->bindValue(':me_login', $lo_codigo);
                                                $sth->execute();
                                                $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                                                extract($resultado);
                                                echo $es_tipo
                                            ?> 
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </center>
        <!-- Card -->
        <br/><br/><br/>
        
        <div id='calendar'></div>

        <div class="modal fade" id="cadastrar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"> Cadastrar Consulta </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body"> 
                        <form name="form1" action="insert_marca.php" method="post">
                        <?php   
                            $sth = $pdo->prepare('select *from tbl_login where lo_codigo = :lo_codigo');
                            $sth->bindValue(':lo_codigo', $_SESSION["health"]["id"]);
                            $sth->execute();
                            $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                            extract($resultado);
                            $sth = $pdo->prepare('select *from tbl_unidade where un_codigo = :lo_unidade');
                            $sth->bindValue(':lo_unidade', $lo_unidade);
                            $sth->execute();
                            $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                            extract($resultado);
                            if($un_dtl_unidade == 2){
                                $sth = $pdo->prepare(' select *from tbl_paciente where p_login = :p_login');
                                $sth->bindValue(':p_login',$_SESSION["health"]["id"] );
                                $sth->execute();
                                $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                                extract($resultado);
                            }else{ 
                                $sth = $pdo->prepare(' select *from tbl_paciente_ubs where p_loginn = :p_loginn');
                                $sth->bindValue(':p_loginn',$_SESSION["health"]["id"] );
                                $sth->execute();
                                $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                                extract($resultado);
                            };
                            if($un_dtl_unidade == 2){
                            ?>
                            <input name="title" type="hidden" value="<?= $p_login; ?>">
                            <?php 
                             }else{ 
                            ?>
                             <input name="title" type="hidden" value="<?= $p_loginn; ?>">
                             <?php 
                            };
                            ?>
                            <input name="medico" type="hidden" value="<?= $end; ?>">
                            
                            <dl class="row text-center">
                                <dt class="col-sm-6">Paciente: </dt>
                                <dd class=" col-sm-4" ><?php echo $p_nome ?></dd>
                            </dl>
                            <div class="form-group row ">
                                <label class="col-sm-1 col-form-label"> </label>
                                <label class="col-sm-4 col-form-label"><b>Dia da Consulta: </b></label>
                                <div class="col-sm-5">
                                    <input type="text" name="start" class="form-control" id="start" onkeypress="DataHora( event, this)">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button-submit" class="btn btn-primary">Cadastrar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br/><br/><br/>
        
        <?php
            include '../../footer.php';
        ?> 
   
    </body>
</html>