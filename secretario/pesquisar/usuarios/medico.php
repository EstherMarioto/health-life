<!doctype html>
<?php
   include '../../../conexao/conexao.php';
   $id= $_GET['id'];
    $sth = $pdo->prepare('
        select *from tbl_medico m 
        INNER JOIN tbl_genero g on m.me_genero = g.tipo_genero_codigo
        INNER JOIN tbl_opcao o on m.me_aprov_exame = o.op_codigo
        INNER JOIN tbl_especialidade e on m.me_especialidade = e.es_codigo
        where m.me_login = :me_login
    ');

    $sth->bindValue(':me_login', $id);
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
        <link rel="stylesheet" href="style.css">

        <title>Health & Life</title>
    </head>
    <body>
        <?php
            include 'header.php';
        ?>
        
        <br><br>
  <div class="form-row">
    <div class="form-group col-md-0"> 
      <img src="https://img.icons8.com/material-rounded/26/000000/user-male-circle.png"/>
    </div>
      <?php
        include '../../../conexao/conexao.php';
        $sth = $pdo->prepare('select * from tbl_tipo_login where tipo_logi_codigo = :tipo');
        $sth->bindValue(':tipo', 3);
        $sth->execute();
        $resultado = $sth->fetch(PDO::FETCH_ASSOC);
        extract($resultado);
      ?>

      <h5><?php echo $tipo_logi_tipo ?></h5>
  </div>  

        <div class="row">
            <div class="card" style="width: 20rem;">
                <div class="card-body" style="background-color: #a7ffeb">
                   
                    <center>
                    <?php
                        $sth = $pdo->prepare('select *from tbl_img_dado where im_detalhe = :im_detalhe and im_medico = :im_medico');
                        $sth->bindValue(':im_medico',$me_codigo);
                        $sth->bindValue(':im_detalhe', 9 );
                        $sth->execute();
                        $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                        extract($resultado);

                        echo "<img src='../../cadastro_medico/img/" . $im_dado. "' alt='Fotos' width='190' height='190' class='rounded-circle' />";
                   
                   ?>
                    </center>

                    <center> <h5 class="card-text"><b><?php echo $me_nome;?></b></h5> </center>
                    <br/>
                  
                    <div class="row text-center ">
                        <div class="col-lg-7">
                            <h5 class="card-text"><?php echo $me_dt_nasc;?></h5>
                        </div>
                        <div class="col-lg-5">
                            <h5 class="card-text"><?php echo $tipo_genero_tipo;?></h5>
                        </div>
                    </div>
                    <br/> <br/>
                    
                    <center><h5 class="card-text "><b>Email:</b></h5></center>
                    <br/>
                    <center> <h5 class="card-text "><?php echo $me_email;?></h5></center>
                    <br/><br/><br/><br/>
                          
                    
                </div>
            </div>
        
            <div class="col-lg-9 right">
            <br/>
                <div class="card" style="width: 63rem;">
                    <div class="card-body" style="background-color: #a7ffeb">
                    <center> <h2 class="card-title"><b>Informações</b></h2> </center>
                    <br/><br/><br/>
                        <div class = "row">
                            <div class="col-lg-4">
                                <h5 class="card-text"><b>RG :</b><?php echo $me_RG;?></h5>
                            </div>
                                     
                            <div class="col-lg-4">
                                <h5 class="card-text"><b>CPF :</b><?php echo $me_CPF;?></h5>
                            </div>

                            <div class="col-lg-4">
                                <h5 class="card-text"><b>Especialidade :</b><?php echo $es_tipo;?></h5>
                            </div>
                        </div>

                        <br/><br/><br/>

                        <div class="row ">
                            <div class="col-lg-4">
                                <h5 class="card-text"><b>Aprovação do exame :</b><?php echo $op_tipo;?></h5>
                            </div>
                            <?php
                                $sth = $pdo->prepare('
                                select *from tbl_login l 
                                INNER JOIN tbl_unidade u on l.lo_unidade = u.un_codigo
                                where l.lo_codigo = :lo_codigo
                                ');

                                $sth->bindValue(':lo_codigo', $id);
                                $sth->execute();
                                $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                                extract($resultado);
                            ?>
                            <div class="col-lg-4">
                                <h5 class="card-text"><b>Unidade :</b><?php echo $un_tipo;?></h5>
                            </div>
                            
                                
                            <div class="col-lg-4">
                                    <h5 class="card-text"><b>Comprovante Residência :</b>
                                    <br/><br/>
                                    <?php
                                        $sth = $pdo->prepare('select *from tbl_img_dado where im_detalhe = :im_detalhe and im_medico = :im_medico');
                                        $sth->bindValue(':im_medico',$me_codigo);
                                        $sth->bindValue(':im_detalhe', 1 );
                                        $sth->execute();
                                        $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                                        extract($resultado);

                                        echo "<img src='../../cadastro_medico/img/" . $im_dado. "' alt='Fotos' width='190' height='190' class='circle responsive-img' />";
                    
                                    ?>
                        
                                    </h5>
                            </div>
                        </div>
                        <br/><br/>

                    </div>

                    <br/><br/>

                    <div class="card" style="width: 63rem;">
                        <div class="card-body" style="background-color: #a7ffeb">
                            <center> <h2 class="card-title"><b>Comprovantes </b></h2> </center>
                            <br/><br/>
                            <div class="row ">
                 
                                <div class="col-lg-4">
                                    <h5 class="card-text"><b>Titulo de eleitor - Frente:</b>
                                    <br/> <br/>
                                    <?php
                                        $sth = $pdo->prepare('select *from tbl_img_dado where im_detalhe = :im_detalhe and im_medico = :im_medico');
                                        $sth->bindValue(':im_medico',$me_codigo);
                                        $sth->bindValue(':im_detalhe', 4 );
                                        $sth->execute();
                                        $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                                        extract($resultado);

                                        echo "<img src='../../cadastro_medico/img/" . $im_dado. "' alt='Fotos' width='190' height='190' class='circle responsive-img' />";
                                            
                                        ?>
                                    </h5>
                                </div>

                                <div class="col-lg-4">
                                    <h5 class="card-text"><b>Titulo de eleitor - Verso:</b>
                                    <br/> <br/>
                                    <?php
                                        $sth = $pdo->prepare('select *from tbl_img_dado where im_detalhe = :im_detalhe and im_medico = :im_medico');
                                        $sth->bindValue(':im_medico',$me_codigo);
                                        $sth->bindValue(':im_detalhe', 10 );
                                        $sth->execute();
                                        $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                                        extract($resultado);

                                        echo "<img src='../../cadastro_medico/img/" . $im_dado. "' alt='Fotos' width='190' height='190' class='circle responsive-img' />";
                                            
                                        ?>
                                    </h5>
                                </div>

                                <div class="col-lg-4">
                                    <h5 class="card-text"><b>Certidão Nasc. ou Casamento :</b> 
                                    <br/> <br/>
                                    <?php
                                        $sth = $pdo->prepare('select *from tbl_img_dado where im_detalhe = :im_detalhe and im_medico = :im_medico');
                                        $sth->bindValue(':im_medico',$me_codigo);
                                        $sth->bindValue(':im_detalhe', 5 );
                                        $sth->execute();
                                        $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                                        extract($resultado);

                                        echo "<img src='../../cadastro_medico/img/" . $im_dado. "' alt='Fotos' width='190' height='190' class='circle responsive-img' />";
                                            
                                        ?>
                                    </h5>
                                </div>
                            </div>
                            <br/>

                            <div class="row ">
                                <div class="col-lg-4">
                                    <h5 class="card-text"><b>Documento do PIS :</b>
                                    <br/> <br/>
                                    <?php
                                        $sth = $pdo->prepare('select *from tbl_img_dado where im_detalhe = :im_detalhe and im_medico = :im_medico');
                                        $sth->bindValue(':im_medico',$me_codigo);
                                        $sth->bindValue(':im_detalhe', 6 );
                                        $sth->execute();
                                        $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                                        extract($resultado);

                                        echo "<img src='../../cadastro_medico/img/" . $im_dado. "' alt='Fotos' width='190' height='190' class='circle responsive-img' />";
                                            
                                        ?>
                                    </h5>
                                </div>

                                <div class="col-lg-4">
                                    <h5 class="card-text"><b>Carteira de Trabalho - Frente:</b>
                                    <br/> <br/>
                                    <?php
                                        $sth = $pdo->prepare('select *from tbl_img_dado where im_detalhe = :im_detalhe and im_medico = :im_medico');
                                        $sth->bindValue(':im_medico',$me_codigo);
                                        $sth->bindValue(':im_detalhe', 7 );
                                        $sth->execute();
                                        $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                                        extract($resultado);

                                        echo "<img src='../../cadastro_medico/img/" . $im_dado. "' alt='Fotos' width='190' height='190' class='circle responsive-img' />";
                                            
                                        ?>
                                    </h5>
                                </div>

                                <div class="col-lg-4">
                                    <h5 class="card-text"><b>Carteira de Trabalho - Verso:</b>
                                    <br/> <br/>
                                    <?php
                                        $sth = $pdo->prepare('select *from tbl_img_dado where im_detalhe = :im_detalhe and im_medico = :im_medico');
                                        $sth->bindValue(':im_medico',$me_codigo);
                                        $sth->bindValue(':im_detalhe', 11 );
                                        $sth->execute();
                                        $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                                        extract($resultado);

                                        echo "<img src='../../cadastro_medico/img/" . $im_dado. "' alt='Fotos' width='190' height='190' class='circle responsive-img' />";
                                            
                                    ?>
                                    </h5>
                                </div>
                            </div>
                            <br/>
                               
                            <div class="row ">
                                <div class="col-lg-4">
                                    <h5 class="card-text"><b>Declaração de bens:</b>
                                    <br/> <br/>
                                    <?php
                                        $sth = $pdo->prepare('select *from tbl_img_dado where im_detalhe = :im_detalhe and im_medico = :im_medico');
                                        $sth->bindValue(':im_medico',$me_codigo);
                                        $sth->bindValue(':im_detalhe', 8 );
                                        $sth->execute();
                                        $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                                        extract($resultado);

                                        echo "<img src='../../cadastro_medico/img/" . $im_dado. "' alt='Fotos' width='190' height='190' class='circle responsive-img' />";
                                        
                                    ?>
                                    </h5>
                                </div>
                           

                                <div class="col-lg-4">
                                    <h5 class="card-text"><b>Escolaridade - Frente:</b>
                                    <br/> <br/>
                                    <?php
                                        $sth = $pdo->prepare('select *from tbl_img_dado where im_detalhe = :im_detalhe and im_medico = :im_medico');
                                        $sth->bindValue(':im_medico',$me_codigo);
                                        $sth->bindValue(':im_detalhe', 3 );
                                        $sth->execute();
                                        $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                                        extract($resultado);

                                        echo "<img src='../../cadastro_medico/img/" . $im_dado. "' alt='Fotos' width='190' height='190' class='circle responsive-img' />";
                                            
                                    ?>
                                    </h5>
                                </div> 

                                <div class="col-lg-4">
                                    <h5 class="card-text"><b>Escolaridade - Verso :</b>
                                    <br/> <br/>
                                    <?php
                                        $sth = $pdo->prepare('select *from tbl_img_dado where im_detalhe = :im_detalhe and im_medico = :im_medico');
                                        $sth->bindValue(':im_medico',$me_codigo);
                                        $sth->bindValue(':im_detalhe', 13 );
                                        $sth->execute();
                                        $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                                        extract($resultado);

                                        echo "<img src='../../cadastro_medico/img/" . $im_dado. "' alt='Fotos' width='190' height='190' class='circle responsive-img' />";
                                            
                                    ?>
                                    </h5>
                                </div> 
                            </div>
                            <br/>

                            <div class="row">
                                <div class="col-lg-4">
                                    <h5 class="card-text"><b>RG - Frente :</b>
                                    <br/> <br/>
                                    <?php
                                        $sth = $pdo->prepare('select *from tbl_img_dado where im_detalhe = :im_detalhe and im_medico = :im_medico');
                                        $sth->bindValue(':im_medico',$me_codigo);
                                        $sth->bindValue(':im_detalhe', 2 );
                                        $sth->execute();
                                        $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                                        extract($resultado);

                                        echo "<img src='../../cadastro_medico/img/" . $im_dado. "' alt='Fotos' width='190' height='190' class='circle responsive-img' />";
                                            
                                    ?>
                                    </h5>
                                </div> 

                                <div class="col-lg-4">
                                    <h5 class="card-text"><b>RG - Verso :</b>
                                    <br/> <br/>
                                    <?php
                                        $sth = $pdo->prepare('select *from tbl_img_dado where im_detalhe = :im_detalhe and im_medico = :im_medico');
                                        $sth->bindValue(':im_medico',$me_codigo);
                                        $sth->bindValue(':im_detalhe', 12 );
                                        $sth->execute();
                                        $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                                        extract($resultado);

                                        echo "<img src='../../cadastro_medico/img/" . $im_dado. "' alt='Fotos' width='190' height='190' class='circle responsive-img' />";
                                            
                                    ?>
                                    </h5>
                                </div> 
                            </div>
                        </div>
                    </div>    
                </div>
            </div>
        </div>    
    <br/><br/>
    <?php
        include '../../../footer.php';
    ?>   
    <!-- Optional JavaScript -->
    
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        
    <script>
        $('#myTab a').on('click', function (e) {
            e.preventDefault()
            $(this).tab('show')
        })

    </script>
</body>
</html>