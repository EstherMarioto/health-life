<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <!-- Última versão CSS compilada e minificada -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="form.css">
        <title>Cadastro do formulário</title>

    </head>
    <body >
        <br/><br/>
        <div class="box" >
            <h2 class="text-center"><i> Olá, faça seu cadastro!</i></h2>
            </br>
            <div class="col s2 m12 offset-m1 center">
                <?php
                    $pr_moradia= $_GET['pr_moradia'];
                    $pr_endereco= $_GET['pr_endereco']; 
                    $pr_outras= $_GET['pr_outras'];
                    include '../conexao/conexao.php';
                    
                    $sth = $pdo->prepare('SELECT *FROM tbl_prontuario ');
                    $sth->execute();
                ?>

                <form name="form1" action="insert_final.php" method="post">
                    <div class="container">
                        <input name="pr_moradia" type="hidden" value="<?= $pr_moradia; ?>">
                        <input name="pr_endereco" type="hidden" value="<?= $pr_endereco; ?>">
                        <input name="pr_outras" type="hidden" value="<?= $pr_outras; ?>">

                        <div class="form-row">
                        <br><br>
                        <h3 class="col-md-12">Formulário referente às outras informações</h3>
                            <div class="form-group col-md-3">
                                <label> <b class="text-white"> Número de pessoas </b> </label>
                                <input type="text" class="form-control" name="pr_num_de_pessoas" />
                            </div>
                            <div class="form-group col-md-3">
                                <label> <b class="text-white"> Nome do plano </b> </label>
                                <input type="text" class="form-control" name="pr_nome_plano" />
                            </div>
                            <div class="form-group col-md-3">
                                <label> <b class="text-white"> Data </b> </label>
                                <input type="date" class="form-control" name="pr_data" />
                            </div>
                            <div class="form-group col-md-3">
                            <label> <b class="text-white"> Cadastro Único ? </b> </label>
                            <select name="pr_cadast_unico" class="form-control">
                                <?php
                                    $sth = $pdo->prepare('select* from tbl_opcao ');
                                    $sth->execute();
                                    foreach ($sth as $res){
                                        extract($res);
                                        echo '<option value ="' . $op_codigo . '">' . $op_tipo . '</option>';
                                    }
                                ?>
                            </select>
                            </br>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label> <b class="text-white"> Benefício bolsa familia ? </b> </label>
                            <select name="pr_benef_bolsa_familia" class="form-control">
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
                        <div class="form-group col-md-3">
                            <label> <b class="text-white"> Possui plano ? </b> </label>
                            <select name="pr_possui_plano" class="form-control">
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
                        <div class="form-group col-md-3">
                            <label><b class="text-white">Cartão do SUS</b></label>  
                            <input name="pr_cartao_sus" placeholder="Número" class="form-control input-  Zmd" required="" type="text">  
                           <a href ="https://cartaosus.com.br/consulta-cartao-sus"><h6> Verficar cartão SUS</h6></a>
                        </div>
                       
                    </div>
                    <div class="form-group col-md-12">
                        <label for="exampleFormControlTextarea1"> <b class="text-white"> Observações </b> </label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="pr_observacoes"></textarea>
                    </div>       
                    <div class="form-group col-md-4">
                        <button type="button-submit" class="btn btn-outline-light">Proximo</button>
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