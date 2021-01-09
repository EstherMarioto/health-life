<!doctype html>
<?php  
    include '../../conexao/conexao.php';
    $id = $_GET['paciente'];
    $sth = $pdo->prepare('select * from tbl_paciente_ubs where p_codigo = :p_codigo');
    $sth->bindValue(':p_codigo', $id);
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
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <title>Health & Life</title>
    </head>
    <body>
        <?php
            include 'header.php';
        ?>
        <br/>

        <div class="form-row">
            <div class="form-group col-md-0"> 
                <img src="https://img.icons8.com/material-rounded/26/000000/user-male-circle.png"/>
            </div>
            <?php

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
                        $sth = $pdo->prepare('select *from tbl_img_dado where im_detalhe = :im_detalhe and im_pac_ubs = :im_paciente_ubs');
                        $sth->bindValue(':im_paciente_ubs',$id);
                        $sth->bindValue(':im_detalhe', 9 );
                        $sth->execute();
                        $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                        extract($resultado);

                        echo "<img src='../../cadastrar/img/" . $im_dado. "' alt='Fotos' width='190' height='190' class='rounded-circle' />";
                            
                    ?>
                    </center>
                    <br>
                    <center> <h5 class="card-text"><b><?php echo $p_nome;?></b></h5> </center>
                   
                    <div class="row text-center">
                        <div class="col-lg-3">
                            <br/>
                            <h5 class="card-text"><b>Mãe:</b></h5>
                        </div>
                        <div class="col-lg-9">
                        <br/>
                            <h5 class="card-text"><?php echo $p_nome_mae;?></h5>
                        </div>
                        <div class="col-lg-3">
                            <br/>
                            <h5 class="card-text"><b>Pai:</b></h5>
                        </div>
                        <div class="col-lg-9">
                        <br/>
                            <h5 class="card-text"><?php echo $p_nome_pai;?></h5>
                        </div>
                        <div class="col-lg-12">
                            <br/><br/>
                            <h5 class="card-text"><b>Data de Nascimento:</b></h5>
                        </div>
                        <div class="col-lg-12">
                            <br/>
                            <h5 class="card-text"><?php echo $p_dtnasc;?></h5>
                        </div>
                    </div>
                    <br/>
                    <center><h5 class="card-text "><b>Email:</b></h5></center>
                    <br/>
                    <center> <h5 class="card-text "><?php echo $p_email;?></h5></center>        
                </div>
            </div>
            
            <div class="col-lg-9 right">     
            <div class="card" style="width: 61rem;">
                    <div class="card-body" style="background-color: #a7ffeb">
                        <center> <h2 class="card-title"><b>Informações </b></h2> </center>
                            <br/><br/>
                            <div class="row ">
                                <div class="col-lg-3">
                                    <h5 class="card-text"><b>CPF :</b><?php  echo $p_CPF; ?></h5>
                                        
                                </div>
                                <div class="col-lg-1"></div>
                                <div class="col-lg-3">
                                    <h5 class="card-text"><b>RG : </b><?php echo $p_RG;?></h5>
                                </div>
                                <div class="col-lg-1"></div>
                                <div class="col-lg-3">
                                    <h5 class="card-text"><b>Cartão do SUS : </b><?php echo $p_cartao_sus;?></h5>
                                       
                                </div> 
                            </div>
                            <br><br>
                               
                    </div>
                </div>
                <br/>
              
                <div class="card" style="width: 61rem;">
                    <div class="card-body" style="background-color: #a7ffeb">
                        <center> <h2 class="card-title"><b>Endereço </b></h2> </center>
                            <br/><br/>
                            <div class="row ">
                                <div class="col-lg-3">
                                    <?php 
                                        $sth = $pdo->prepare('select *from tbl_paciente_ubs p 
                                            INNER JOIN tbl_endereco e on p.p_endereco = e.en_codigo
                                            where p.p_codigo = :p_codigo
                                        ');
                                               
                                        $sth->bindValue(':p_codigo', $id);
                                        $sth->execute();
                                        $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                                        extract($resultado);
                                    ?>
                                    <h5 class="card-text"><b>CEP : </b><?php  echo $en_cep; ?></h5>
                                        
                                </div>
                                <div class="col-lg-1"></div>
                                <div class="col-lg-5">
                                    <h5 class="card-text"><b>Rua : </b><?php echo $en_rua;?></h5>
                                </div>
                                <div class="col-lg-1"></div>
                                <div class="col-lg-2">
                                    <h5 class="card-text"><b>Número : </b><?php echo $en_numero;?></h5>
                                       
                                </div> 
                            </div>
                            <br><br>
                            <div class ="row">
                            <div class="col-lg-3">
                                <?php
                                $sth = $pdo->prepare('select *from tbl_endereco e 
                                INNER JOIN tbl_bairro b on e.en_bairro = b.ba_codigo
                                where e.en_login = :en_login
                            ');
                                   
                             $sth->bindValue(':en_login', $p_login);
                             $sth->execute();
                             $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                             extract($resultado);
                        ?>
                                <h5 class="card-text"><b>Bairro : </b><?php echo $ba_tipo;?></h5>          
                            </div>
                            <div class="col-lg-1"></div>
                            <div class="col-lg-5">
                                <h5 class="card-text"><b>Cidade : </b><?php echo $en_cidade;?></h5>           
                            </div>
                            <div class="col-lg-1"></div>
                            <div class="col-lg-2">
                                <h5 class="card-text"><b>Estado : </b><?php echo $en_uf;?></h5>           
                            </div>
                        </div>
                        <br/>         
                    </div>
                    </div>
                    <br><br>
                    <span>&nbsp;&nbsp;&nbsp;</span><span>&nbsp;&nbsp;&nbsp;</span>
                <div class="row">
                    <div class="form-group col-md-1">
                        <form name="form1" method="post" action="update_status_ubs.php">
                            <input name="p_status" type="hidden" value="<?= $p_status = 2; ?>">   
                            <input name="p_codigo" type="hidden" value="<?= $id; ?>">
                            <a href="update_status_ubs.php"> <button class="btn aqua-gradient btn-rounded btn-sm my-0"> Confirmar </button></a>
                        </form>
                        <br>
                    </div> 
                    <br>
                    <span>&nbsp;&nbsp;&nbsp;</span><span>&nbsp;&nbsp;&nbsp;</span>
                    <div class="form-group col-md-2">

                            <a href="delete_ubs.php?paciente=<?= $id; ?>"><button class="btn aqua-gradient btn-rounded btn-sm my-0"> Recusar </button></a>
                    </div>   
                </div>  
            </div>
        </div>
    </div>   
    
    <br/><br/>
    <?php
        include '../../footer.php';
    ?>

<style>
.btn.aqua-gradient {
  color: #fff;
  -webkit-transition: .5s ease;
  transition: .5s ease;
}
.btn.btn-sm {
  padding: .5rem 1.6rem;
  font-size: .64rem;
}
.btn-rounded {
  border-radius: 10em;
}
.btn {
  margin: .375rem;
      margin-top: 0.375rem;
      margin-bottom: 0.375rem;
  color: inherit;
  text-transform: uppercase;
  word-wrap: break-word;
  white-space: normal;
  cursor: pointer;
  border: 0;
  border-radius: .125rem;
  -webkit-box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12);
  box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12);
  -webkit-transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,-webkit-box-shadow .15s ease-in-out;
  transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,-webkit-box-shadow .15s ease-in-out;
  transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
  transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out,-webkit-box-shadow .15s ease-in-out;
  padding: .84rem 2.14rem;
  font-size: .81rem;
}
.aqua-gradient {
  background: linear-gradient(40deg,#2096ff,#05ffa3) !important;
}
.mb-0, .my-0 {
  margin-bottom: 0 !important;
}
.mt-0, .my-0 {
  margin-top: 0 !important;
}
.btn {
  padding: .25rem .5rem;
  font-size: .875rem;
  line-height: 1.5;
  border-radius: .2rem;
  display: inline-block;
  font-weight: 400;
  color: #212529;
  text-align: center;
}
</style>
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
              