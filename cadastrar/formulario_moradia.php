<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <!-- Última versão CSS compilada e minificada -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css"  href="form.css" >
        <title>Cadastro do formulário</title>

    </head>
    <body>
    
    <div class="box" >
    </br> </br> </br>
        <h2 class="text-center"> <i> Olá, faça seu cadastro!</i></h2>
        </br>
        <div class="row">
            <div class="col s2 m12 offset-m1 center" >
                    <?php
                        include '../conexao/conexao.php';     
                        $sth = $pdo->prepare('SELECT *FROM tbl_moradia ');
                        $sth->execute();
                    ?>
                     <div class="container">
                        <h3 class="col-md-12">Formulário Moradia</h3>
                        <form name="form1" action="insert_moradia.php" method="post">
                  
                            <div class="form-row"> 
                                <div class="form-group col-md-4">
                                    <label> <b class="text-white"> Tipo de Casa </b> </label>
                                    <select name="ms_tipocasa" class="form-control">
                                        <?php
                                            $sth = $pdo->prepare('select* from tbl_tipo_casa ');
                                            $sth->execute();
                                            foreach ($sth as $res){
                                                extract($res);
                                                echo '<option value ="' . $ca_codigo . '">' . $ca_tipo . '</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label> <b class="text-white"> Destino do Lixo </b> </label>
                                    <select name="ms_destlixo" class="form-control">
                                        <?php
                                            $sth = $pdo->prepare('select* from tbl_lixo ');
                                            $sth->execute();
                                            foreach ($sth as $res){
                                                extract($res);
                                                echo '<option value ="' . $dl_codigo . '">' . $dl_tipo . '</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label> <b class="text-white"> Tratamento de Água </b> </label>
                                    <select name="ms_tratamentoagua" class="form-control">
                                        <?php
                                            $sth = $pdo->prepare('select* from tbl_tratamento_agua ');
                                            $sth->execute();
                                            foreach ($sth as $res){
                                                extract($res);
                                                echo '<option value ="' . $ta_codigo . '">' . $ta_tipo . '</option>';
                                            }
                                        ?>
                                    </select>
                                </div> 
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label> <b class="text-white"> Abastecimento de Água </b></label>
                                    <select name="ms_abastecimentoagua" class="form-control">
                                        <?php
                                            $sth = $pdo->prepare('select* from tbl_abastecimento ');
                                            $sth->execute();
                                            foreach ($sth as $res){
                                                extract($res);
                                                echo '<option value ="' . $ab_codigo . '">' . $ab_tipo . '</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label> <b class="text-white"> Destino de fezes </b> </label>
                                    <select name="ms_destinofezes" class="form-control">
                                        <?php
                                            $sth = $pdo->prepare('select* from tbl_fezes_urina ');
                                            $sth->execute();
                                            foreach ($sth as $res){
                                                extract($res);
                                                echo '<option value ="' . $fu_codigo . '">' . $fu_tipo . '</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label> <b class="text-white"> Número de Cômodos </b> </label>
                                    <input type="text" class="form-control" name="ms_numerocomodos" />
                                </div>
                                <div class="form-group col-md-3">
                                    <label> <b class="text-white"> Outro tipo de casa </b> </label>
                                    <input type="text" class="form-control" name="ms_ca_outro" />
                                </div>
                            </div>   

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label> <b class="text-white"> Outro tipo de abastecimento </b> </label>
                                    <input type="text" class="form-control" name="ms_ab_outro" />
                                </div>

                                <div class="form-group col-md-2">
                                    <label> <b class="text-white"> Possui energia ? </b> </label>
                                    <select name="ms_energia" class="form-control">
                                        <?php
                                            $sth = $pdo->prepare('select* from tbl_opcao ');
                                            $sth->execute();
                                            foreach ($sth as $res){
                                                extract($res);
                                                echo '<option value ="' . $op_codigo . '">' . $op_tipo . '</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                                
                                <div class="form-group col-md-12">
                                    <br/>
                                    <button type="button-submit" class="btn btn-outline-light"> <b> Próximo </b> </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div> <!-- card-panel -->
        </div> <!-- row -->
        </div>
        </div> <!-- container -->

    </body>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</html>