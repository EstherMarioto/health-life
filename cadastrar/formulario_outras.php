<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <!-- Última versão CSS compilada e minificada -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="form.css">
        <title>Cadastro do formulário</title>

    </head>
    <body>
    <br/><br/>
    <div class="box" >
        <h2 class="text-center"><i> Olá, faça seu cadastro!</i></h2>
        </br>
        <div class="row">
            <div class="col s2 m12 offset-m1 center" >
                <?php
                    $pr_moradia= $_GET['pr_moradia'];
                    $pr_endereco= $_GET['pr_endereco']; 
                    include '../conexao/conexao.php';
                    
                    $sth = $pdo->prepare('SELECT *FROM tbl_outras_informacoes ');
                    $sth->execute();
                ?>

                <form name="form1" action="insert_outras.php" method="post">
                <div class="container">
                    <input name="pr_moradia" type="hidden" value="<?= $pr_moradia; ?>">
                    <input name="pr_endereco" type="hidden" value="<?= $pr_endereco; ?>">

                    <div class="form-row">
                        <br><br>
                        <h3 class="col-md-12">Formulário referente às outras informações</h3>
                        <div class="form-group col-md-6">
                                <label> <b class="text-white"> Em caso de doenças, procure: </b> </label>
                                <select name="oi_doencas" class="form-control">
                                    <?php
                                        $sth = $pdo->prepare('select* from tbl_doenca ');
                                        $sth->execute();
                                        foreach ($sth as $res){
                                            extract($res);
                                            echo '<option value ="' . $cdp_codigo . '">' . $cdp_tipo . '</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label> <b class="text-white"> Meio de Comunicação </b> </label>
                                <select name="oi_comunicacao" class="form-control">
                                    <?php
                                        $sth = $pdo->prepare('select* from tbl_comunicacao ');
                                        $sth->execute();
                                        foreach ($sth as $res){
                                            extract($res);
                                            echo '<option value ="' . $mc_codigo . '">' . $mc_tipo . '</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label> <b class="text-white"> Grupos Comunitários </b> </label>
                                <select name="oi_grupos_comunitarios" class="form-control">
                                    <?php
                                        $sth = $pdo->prepare('select* from tbl_grupo_comunitario ');
                                        $sth->execute();
                                        foreach ($sth as $res){
                                            extract($res);
                                            echo '<option value ="' . $gc_codigo . '">' . $gc_tipo . '</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label> <b class="text-white"> Transporte </b> </label>
                                <select name="oi_transporte" class="form-control">
                                    <?php
                                        $sth = $pdo->prepare('select* from tbl_transporte ');
                                        $sth->execute();
                                        foreach ($sth as $res){
                                            extract($res);
                                            echo '<option value ="' . $mt_codigo . '">' . $mt_tipo . '</option>';
                                        }   
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label> <b class="text-white"> Outro tipo de doença, cite: </b> </label>
                                <input type="text" class="form-control" name="oi_do_outro" />  
                            </div>
                            <div class="form-group col-md-4">
                                <label> <b class="text-white"> Outro tipo de meio de comunicação, cite: </b> </label>
                                <input type="text" class="form-control" name="oi_co_outro" />      
                            </div>
                            <div class="form-group col-md-4">
                                <label> <b class="text-white"> Outro grupo comunitário, cite: </b> </label>
                                <input type="text" class="form-control" name="oi_gc_outro" />
                                </br></br>
                            </div>

                            <div class="form-group col-md-4">
                                <button type="button-submit" class="btn btn-outline-light">Próximo</button>
                            </div>
                        </div>
                    </form>    
                </div> <!-- card-panel -->
            </div> <!-- row -->
        </div> <!-- container -->
    </body>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</html>