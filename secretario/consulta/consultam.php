<!doctype html>
<?php
    include '../../conexao/conexao.php';
    $end= $_GET['end'];

    $sth = $pdo->prepare('
        select *from tbl_medico m 
        INNER JOIN tbl_especialidade e on m.me_especialidade = e.es_codigo
        INNER JOIN tbl_unidade u on m.me_unidade = u.un_codigo
        where m.me_login = :me_login
    ');

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
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

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
            include '../header.php';
        ?>
        <br/><br/><br/>
        <center>
            <div class="col-lg-7">
                <!-- Card -->
                <div class="card" >
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="container">
                                <!-- Avatar -->
                                <br/>
                                <?php echo "<img src='../../medico/img/" . $me_foto . "' alt='Fotos' width='250' height='250' class='circle responsive-img' />";?>                
                            </div>
                            <br/>
                        </div>
                        <div class="col-lg-9  text-left">
                            <div class="card-body ">
                                <h5 class="card-title "><b><?php $me_nome?></b></h5>
                                <hr>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <h5><b>Unidade:</b> </h5>
                                    </div>
                                    <div class="col-lg-6 ">
                                        <h5> <?php $me_unidade?> </h5>
                                    </div>
                                </div>
                                <br/>
                                <div class="row ">
                                    <div class="col-lg-6">
                                        <h5><b>Especialidade:</b> </h5>
                                    </div>
                                    <div class="col-lg-6 ">
                                        <h5> <?php $me_especialidade?> </h5>
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
                        <form name="form1" action="../../paciente/consulta/insert_marca.php" method="post">
                            <div class="form-group row ">
                            <label class="col-sm-1 col-form-label"> </label>
                             <label class="col-sm-4 col-form-label"><b>Paciente: </b></label>
                                <div class="col-sm-5"> 
                                    <select name="title" class="form-control">
                                        <?php
                                            $sth = $pdo->prepare('select* from tbl_paciente ');
                                            $sth->execute();
                                            foreach ($sth as $res){
                                                extract($res);
                                                echo '<option value ="' . $p_codigo . '">' . $p_nome . '</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <br/>
                            <input name="end" type="hidden" value="<?= $end; ?>">
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
        
        <div class="modal fade" id="visual" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"> Consulta </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <dl class="row text-center">
                            <dt class="col-sm-6">Paciente: </dt>
                            <a href="ver.php"><dd class=" col-sm-4" id="title"></dd></a>
                        </dl>
                        <dl class="row text-center">
                            <dt class="col-sm-6"> Data e Hora: </dt>
                            <dd class=" col-sm-4" id="start"></dd>
                        </dl>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" > Remarcar </button>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalConfirmDelete">Cancelar consulta</button>
                    </div>
                </div>
            </div>
        </div>
   
        <!--Modal: modalConfirmDelete-->
        <div class="modal fade" id="modalConfirmDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
            <div class="modal-dialog modal-sm modal-notify modal-danger" role="document">
                <!--Content-->
                <div class="modal-content text-center">
                    <!--Header-->
                    <div class="modal-header d-flex justify-content-center">
                        <p class="heading">Você tem certeza que deseja cancelar essa consulta?</p>
                    </div>
                    <!--Body-->
                    <div class="modal-body">
                        <svg xmlns="http://www.w3.org/2000/svg " x="0px" y="0px"width="100" height="100"viewBox="0 0 172 172"style=" fill:#000000;" class="#">
                        <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#e74c3c"><path d="M141.04,13.76h-110.08c-9.4944,0 -17.2,7.7056 -17.2,17.2v110.08c0,9.4944 7.7056,17.2 17.2,17.2h110.08c9.4944,0 17.2,-7.7056 17.2,-17.2v-110.08c0,-9.4944 -7.7056,-17.2 -17.2,-17.2zM119.4024,114.5176l-4.8848,4.8848l-28.5176,-28.5176l-28.5176,28.5176l-4.8848,-4.8848l28.5176,-28.5176l-28.5176,-28.5176l4.8848,-4.8848l28.5176,28.5176l28.5176,-28.5176l4.8848,4.8848l-28.5176,28.5176z"></path></g></g></svg>
                    </div>
                    <!--Footer-->
                    <div class="modal-footer flex-center">
                        <a href="" class="btn  btn-outline-danger">Sim</a>
                        <a type="button" class="btn  btn-danger waves-effect text-white" data-dismiss="modal">Não</a>
                    </div>
                </div>
                <!--/.Content-->
            </div>
        </div>
        <?php
            include '../../footer.php';
        ?> 
     
        <!-- Optional JavaScript -->
    
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script>
      $('#myModal').modal(options)
    </script>
   
    </body>
</html>