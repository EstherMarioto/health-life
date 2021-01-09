<!doctype html>
<?php
    $id= $_GET['id'];
    include '../../../conexao/conexao.php';
    $sth = $pdo->prepare('select *from tbl_paciente where p_login= :p_login');
    $sth->bindValue(':p_login', $id);
    $sth->execute();
    $resultado = $sth->fetch(PDO::FETCH_ASSOC);
    extract($resultado);

    $sth = $pdo->prepare('
    select *from tbl_paciente p 
    INNER JOIN tbl_genero g on p.p_genero = g.tipo_genero_codigo
    where p.p_login = :p_login
');

$sth->bindValue(':p_login', $id );
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
                        $sth = $pdo->prepare('select *from tbl_img_dado where im_detalhe = :im_detalhe and im_paciente = :im_paciente');
                        $sth->bindValue(':im_paciente', $p_codigo);
                        $sth->bindValue(':im_detalhe', 9 );
                        $sth->execute();
                        $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                        extract($resultado);

                        echo "<img src='../../../cadastrar/img/" . $im_dado. "' alt='Fotos' width='190' height='190' class='rounded-circle' />";
                   
                   ?>
                    </center>
                    <center> <h5 class="card-text"><b><?php echo $p_nome;?></b></h5> </center>
                    <br/>
                  
                    <div class="row text-center ">
                        <div class="col-lg-7">
                            <h5 class="card-text"><?php echo $p_dtnasc;?></h5>
                        </div>
                        <div class="col-lg-5">
                            <h5 class="card-text"><?php echo $tipo_genero_tipo;?></h5>
                        </div>
                    </div>
                    <br/> <br/>
                    <div class="row text-center ">
                        <div class="col-lg-7">
                            <h5 class="card-text"><b>Ocupação:</b></h5>
                        </div>
                        <div class="col-lg-5">
                            <h5 class="card-text"><?php echo $p_ocupacao;?></h5>
                        </div>
                    </div>
                    <br/> <br/>
                    <div class="row text-center">
                        <div class="col-lg-8">
                            <h5 class="card-text"><b>Alguma Doença?</b></h5>
                        </div>
                        <div class="col-lg-4">
                            <h5 class="card-text"><?php echo $p_siglas;?></h5>
                        </div>
                    </div>
                    <br/><br/> <br/>
                    <center><h5 class="card-text "><b>Email:</b></h5></center>
                    <br/>
                    <center> <h5 class="card-text "><?php echo $p_email;?></h5></center>
                    <br/><br/><br/><br/>
                          
                    
                </div>
            </div>
            
            <div class="col-lg-9 right">
                <!-- Nav tabs -->
                <section class="container">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><b>Prontuário</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><b>Atendimento</b></a>
                        </li>
                    </ul>
                </section>

                <!-- Primeiro -->
                <div class="tab-content">
                    <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">  
                        <br/>
                        <div class="card" style="width: 63rem;">
                            <div class="card-body" style="background-color: #a7ffeb">
                                <center> <h2 class="card-title"><b>Prontuário</b></h2> </center>
                                <br/><br/><br/>
                                
                                <div class="row">               
                                    <div class="col-lg-3">
                                        <h5 class="card-text"><b>Integrantes:</b></h5>
                                    </div>
                                    <?php
                                        $sth = $pdo->prepare('select * from tbl_paciente where p_prontuario = :p_prontuario  ');
                                        $sth->bindValue(':p_prontuario', $p_prontuario);
                                        $sth->execute();
                                        foreach ($sth as $res) :
                                        extract($res);
                                    ?>
                                    <div class="col-lg-3">
                                        <h5 class="card-text text-center "> <?php echo $p_nome;?></h5>
                                    </div>
                                    <?php
                                        endforeach;
                                    ?>
                                </div>
                                <br/><br/>
                                <center> <h2 class="card-title"><b>Moradia </b></h2> </center>
                                <br/><br/><br/>
                                <div class="row ">
                                    <?php
                                        $sth = $pdo->prepare('select *from tbl_moradia_saneamento  m 
                                            INNER JOIN tbl_tipo_casa t on m.ms_tipocasa = t.ca_codigo
                                            INNER JOIN tbl_lixo l on m.ms_destlixo = l.dl_codigo
                                            INNER JOIN tbl_tratamento_agua a on m.ms_tratamentoagua = a.ta_codigo
                                            INNER JOIN tbl_abastecimento b on m.ms_abastecimentoagua = b.ab_codigo
                                            INNER JOIN tbl_fezes_urina f on m.ms_destinofezes = f.fu_codigo
                                            INNER JOIN tbl_opcao o on m.ms_energia = o.op_codigo
                                            where m.ms_login = :ms_login
                                        ');
                                       
                                       $sth->bindValue(':ms_login', $id);
                                       $sth->execute();
                                       $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                                       extract($resultado);
                                    ?>
                                    <div class="col-lg-3">
                                        <h5 class="card-text"><b>Tipo de Casa:</b></h5>
                                        <div class="col-lg-8 text-center">
                                            <h5 class="card-text"><?php echo $ca_tipo;?></h5>
                                        </div> 
                                    </div>
                                    <div class="col-lg-3">
                                        <h5 class="card-text"><b>Destino do Lixo:</b></h5>
                                    <div class="col-lg-8 text-center">
                                        <h5 class="card-text"><?php echo $dl_tipo;?></h5>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <h5 class="card-text"><b>Tratamento de água:</b></h5>
                                    <div class="col-lg-8 text-center">
                                        <h5 class="card-tex"><?php echo $ta_tipo;?></h5>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <h5 class="card-text"><b>Abastecimento de água:</b></h5>
                                    <div class="col-lg-8 text-center">
                                        <h5 class="card-text"><?php echo $ab_tipo;?></h5>
                                    </div>
                                </div>
                            </div>
                            <br/><br/><br/>
                            <div class="row ">
                                <div class="col-lg-4">
                                    <h5 class="card-text"><b>Destino de fezes:</b></h5>
                                    <div class="col-lg-8 text-center">
                                        <h5 class="card-text"><?php echo $fu_tipo;?></h5>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <h5 class="card-text"><b>Número de Cômodos:</b></h5>
                                    <div class="col-lg-8 text-center">
                                        <h5 class="card-text"><?php echo $ms_numerocomodos;?></h5>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <h5 class="card-text text-center"><b> Tem Energia Elétrica:</b></h5>
                                    <div class="col-lg-8 text-center">
                                        <h5 class="card-text text-center"><?php echo $op_tipo;?></h5>
                                    </div>
                                </div>
                            </div>
                            <br/><br/>
                        </div>
                        <br/><br/>
                        <div class="card" style="width: 63rem;">
                            <div class="card-body" style="background-color: #a7ffeb">
                                <center> <h2 class="card-title"><b>Endereço </b></h2> </center>
                                <br/><br/>
                                <div class="row ">
                                    <div class="col-lg-4">
                                       <?php 

                                                $sth = $pdo->prepare('select *from tbl_endereco  e 
                                                    INNER JOIN tbl_bairro b on e.en_bairro = b.ba_codigo
                                                    where e.en_login = :en_login
                                                ');
                                               
                                               $sth->bindValue(':en_login', $id);
                                               $sth->execute();
                                               $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                                               extract($resultado);
                                            

                                               ?>
                                                 <h5 class="card-text"><b>Bairro :</b><?php  echo $ba_tipo; ?></h5>
                                        
                                        </div>
                                        <div class="col-lg-1">
                                    
                                    </div>
                                    <div class="col-lg-3">
                                        <h5 class="card-text"><b>Numero : </b><?php echo $en_numero;?></h5>
                                      
                                    </div>
                                    <div class="col-lg-1">
                                    
                                    </div>
                                    <div class="col-lg-3">
                                        <h5 class="card-text"><b>CEP : </b><?php echo $en_cep;?></h5>
                                       
                                    </div> 
                                </div>
                                <br><br>
                                <div class ="row">
                                <div class="col-lg-12">
                                        <h5 class="card-text"><b>Rua : </b><?php echo $en_rua;?></h5>
                                        
                                    </div>
                                    </div>
                                <br/>
                                 
                              
                    </div>
                </div>
                <br/><br/>
                        <div class="card" style="width: 63rem;">
                            <div class="card-body" style="background-color: #a7ffeb">
                                <center> <h2 class="card-title"><b>Outras Informações </b></h2> </center>
                                <br/><br/>
                                <div class="row ">
                                    <div class="col-lg-3">
                                        <h5 class="card-text"><b>Em casos de doenças procura:</b></h5>
                                        <div class="col-lg-8 text-center">
                                            <h5 class="card-text"><?php 
                                                $sth = $pdo->prepare('select *from tbl_outras_informacoes  o 
                                                    INNER JOIN tbl_doenca d on o.oi_doencas = d.cdp_codigo
                                                    INNER JOIN tbl_comunicacao c on o.oi_comunicacao = c.mc_codigo
                                                    INNER JOIN tbl_grupo_comunitario g on o.oi_grupos_comunitarios = g.gc_codigo
                                                    INNER JOIN tbl_transporte t on o.oi_transporte = t.mt_codigo
                                                    where o.oi_login = :oi_login
                                                ');
                                               
                                               $sth->bindValue(':oi_login', $id);
                                               $sth->execute();
                                               $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                                               extract($resultado);

                                                echo $cdp_tipo;?>
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <h5 class="card-text"><b>Meio de comunicação que mais utiliza:</b></h5>
                                        <div class="col-lg-8 text-center">
                                            <h5 class="card-text"><?php echo $mc_tipo;?></h5>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <h5 class="card-text"><b>Participa de grupos comunitário:</b></h5>
                                        <div class="col-lg-8 text-center">
                                            <h5 class="card-text"><?php echo $gc_tipo;?></h5>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <h5 class="card-text"><b>Meio de transporte que mais utilize:</b></h5>
                                        <div class="col-lg-8 text-center">
                                            <h5 class="card-text text-center"><?php echo $mt_tipo;?></h5>
                                        </div>
                                    </div> 
                                </div>
                                <br/>
                            </div>
                        </div>    
                    </div>
                </div>

                 <!-- Segundo -->
                 <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab"> 
                    <br/>
                    <section class="container">
                        <div class="row">
                            <div class="container">
                                <div class="col s2 m12 offset-m1 center" style="background-color:  #a7ffeb"> 
                                    <br/>
                                    <div class="row">
                                        <div class="col-lg-7">
                                            <div class="text-right">
                                                <h2><span class="text-black"><b>Diagnóstico</b></span></h2>
                                            </div>
                                        </div>
                                        <div class="col-lg-5">
                                            <div class="text-right">
                                                <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#exampleModal">Alergia</button>
                                            </div>
                                        </div>
                                    </div>
                                   
                                   <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="box">
                                                    <form method="POST" action="insert_alergia.php">
                                                    <input name="al_paciente" type="hidden" value="<?= $_SESSION["health"]["id"]; ?>">      
                                                        <div class="modal-header">                                                       
                                                            <h2 class="modal-title"><b>Alergias</b></h2>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            </br>
                                                            <div class="inputBox">
                                                                <input type="text" name="al_tipo" required="">
                                                                <label>Digite suas alergias:</label>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                                            <input type="submit" class="btn btn-primary" name="" values="submit"> 
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br/>
                                    <?php
                                 
                                        $sth = $pdo->prepare('
                                            select *from tbl_dados a
                                            INNER JOIN tbl_paciente p on a.da_paciente = p.p_codigo
                                            INNER JOIN tbl_diagnostico d on a.da_diagnostico = d.di_codigo
                                            INNER JOIN tbl_medico m on a.da_medico = m.me_codigo
                                            where a.da_paciente = :da_paciente '
                                        );

                                        $sth->bindValue(':da_paciente', $id);
                                        $sth->execute();
                                        foreach ($sth as $res) :
                                        extract($res);
                                    ?>
                                    <div class="container">
                                        <center>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <h5><span class="text-black"><b>Nome: </b><?php echo $p_nome ?></span></h5>
                                                </div>
                                            </div> 
                                            <br/>
                                            <div class="form-row">                 
                                                <div class="form-group col-md-4">
                                                    <h5><span class="text-black"><b>Altura:</b> <?php echo $da_altura ?></span></h5>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <h5><span class="text-black"><b>Peso: </b><?php echo $da_peso ?></span></h5>        
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <h5><span class="text-black"><b>Pressão: </b><?php echo $da_pressao ?></span></h5> 
                                                </div>
                                            </div>
                                            <br/><br/>

                                            <div class="row">
                                                <div class="form-group col-lg-12 text-left "> 
                                                    <h5><span class="text-black"><div class="form-group col-md-6"> <b>Motivo da Consulta: </b></div> <div class="form-group col-md-6"><?php echo $da_motivo ?></div> </span></h5>
                                                </div> 
                                            </div>
                                            <br/>
                                            <div class="form-row">
                                                <?php
                                                    if($da_diagnostico == $diagnostico){ 
                                                ?>

                                                <div class="form-group col-md-12 text-left">
                                                    <div class="form-group col-md-6">
                                                        <h5><span class="text-black"><b>Diagnóstico: </b></span></h5>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <h5><span class="text-black"><?php echo $di_diagnostico ?></span></h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <br/>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <h5><span class="text-black"><b>Medico: </b><?php echo $me_nome ?></span></h5> 
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <h5><span class="text-black"><b>Data:</b> <?php echo $di_data ?></span></h5> 
                                                </div>
                                            </div>
                                        </center>
                                    </div>
                                    <hr>
                                    <?php
                                        }else{
                                            echo '<h5> Sem Diagnóstico por enquanto. </h5>';
                                        }
                                        endforeach;
                                    ?>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            </div>    
        </div>
        <br/>
        
        <div class="row center">
            <div class="card " style="width: 84rem;">
                <div class="card-body text-center" style="background-color: #a7ffeb">
                    <br/>              
                    <div class="row center">
                    <?php             
                        $sth = $pdo->prepare('select *from tbl_prontuario p 
                            INNER JOIN tbl_opcao o on p.pr_possui_plano = o.op_codigo
                            where p.pr_login = :pr_login
                        ');
                        $sth->bindValue(':pr_login', $id);
                        $sth->execute();
                        $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                        extract($resultado);
                    ?>
                    <div class="col-lg-4">
                        <h5 class="card-text"><b>Possui plano mutuo:</b></h5>
                        <div class="col-lg-12">
                            <h5 class="card-text">
                                <?php  echo $op_tipo;?>
                            </h5>
                        </div>
                    </div>
                    <?php
                        $sth = $pdo->prepare('select *from tbl_prontuario p 
                            INNER JOIN tbl_opcao o on p.pr_benef_bolsa_familia = o.op_codigo
                            where p.pr_login = :pr_login
                        ');    
                        $sth->bindValue(':pr_login', $id);
                        $sth->execute();
                        $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                        extract($resultado);
                    ?>
                    <div class="col-lg-4 ">
                        <h5 class="card-text"><b>Possui beneficio bolsa familia:</b></h5>
                        <div class="col-lg-12">
                            <h5 class="card-text "><?php echo $op_tipo;?></h5>
                        </div>
                    </div>
                    <?php
                        $sth = $pdo->prepare('select *from tbl_prontuario p 
                            INNER JOIN tbl_opcao o on p.pr_cadast_unico = o.op_codigo
                            where p.pr_login = :pr_login
                        ');   
                        $sth->bindValue(':pr_login', $id);
                        $sth->execute();
                        $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                        extract($resultado);
                    ?>
                    <div class="col-lg-4">
                        <h5 class="card-text"><b>Possui cadastro único:</b></h5>
                        <div class="col-lg-12">
                            <h5 class="card-text"><?php echo $op_tipo;?></h5>
                        </div>
                    </div>
                </div>
                <br/><br/>
                <div class="row text-center">
                    <div class="col-lg-12">
                        <h5 class="card-text "><b>Observações:</b></h5>
                    </div>
                </div>
                <br/>
                <div class="row ">
                    <div class="col-lg-12">
                        <h5 class="card-text "><?php echo $pr_observacoes;?> </h5>
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
              