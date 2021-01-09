<!doctype html>
<?php
    session_start();
    include '../../conexao/conexao.php';
    $sth = $pdo->prepare('select *from tbl_login where lo_codigo = :lo_codigo');
    $sth->bindValue(':lo_codigo', $_SESSION["health"]["id"]);
    $sth->execute();
    $resultado = $sth->fetch(PDO::FETCH_ASSOC);
    extract($resultado);

    if($lo_tipo == 4){
    $sth = $pdo->prepare('
        select *from tbl_paciente p 
        INNER JOIN tbl_genero g on p.p_genero = g.tipo_genero_codigo
        INNER JOIN tbl_siglas s on p.p_siglas = s.sig_codigo
        where p.p_login = :p_login
    ');

    $sth->bindValue(':p_login', $_SESSION["health"]["id"]);
    $sth->execute();
    $resultado = $sth->fetch(PDO::FETCH_ASSOC);
    extract($resultado);
    $paciente =  $_SESSION["health"]["id"];
    }else{

        $paciente= $_GET['paciente'];

        $sth = $pdo->prepare('
        select *from tbl_paciente p 
        INNER JOIN tbl_genero g on p.p_genero = g.tipo_genero_codigo
        where p.p_login = :p_login
    ');

    $sth->bindValue(':p_login', $paciente);
    $sth->execute();
    $resultado = $sth->fetch(PDO::FETCH_ASSOC);
    extract($resultado);
    };
?>

<html lang="en">
    <body>
        <?php
            include 'header.php';
        ?>
        
        <link rel="stylesheet" type="text/css" href="css/usuario.css" />

       <br/><br/>
       <div class="row">
            <div class="card" style="width: 20rem;">
                <div class="card-body" style="background-color: #a7ffeb">
                    <center>
                    <?php
                        $sth = $pdo->prepare('select *from tbl_img_dado where im_detalhe = :im_detalhe and im_paciente = :im_paciente');
                        $sth->bindValue(':im_paciente',$p_codigo);
                        $sth->bindValue(':im_detalhe', 9 );
                        $sth->execute();
                        $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                        extract($resultado);

                        echo "<img src='../../cadastrar/img/" . $im_dado. "' alt='Fotos' width='190' height='190' class='rounded-circle' />";
                    ?>
                    </center>
                    <br>
                    <div class="text-right">
                    <!-- Button trigger modal -->
                        <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#exampleModal6">
                            Atualizar
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal6" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Atualizar</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <div class="modal-body">
                                        <form name="form1" action="updateUsu2.php" method="POST" enctype = "multipart/form-data">
                                            <div class="input-field col s2">
                                                <input name="p_codigo" type="hidden" value="<?= $p_codigo; ?>" data-length="200">
                                                <input name="detalhe" type="hidden" value="<?= 9; ?>" data-length="200">
                                                    <div class="file-field input-field">
                                                        <div class="btn">
                                                            <i class="fa fa-user"></i>
                                                            <span>Imagem</span>
                                                            <input type="file" name="fileUpload"  required placeholder=" Selecionar Imagem">
                                                        </div>
                                                    </div>
                                            </div>

                                            <div class="modal-footer">
                                                <input class="modal-close waves-effect waves-green btn-flat" type="submit" value="Confirmar"/>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>   

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
                        <div class="col-lg-7">
                            <h5 class="card-text"><b>Alguma Doença?</b></h5>
                        </div>
                        <div class="col-lg-5">
                            <h5 class="card-text"><?php echo $sig_tipo;?></h5>
                        </div>
                    </div>
                    
                    <br/><br/> <br/>
                    <center><h5 class="card-text "><b>Email:</b></h5></center>
                    <br/>
                    <center> <h5 class="card-text "><?php echo $p_email;?></h5></center>
                    <?php
                    
                     $sth = $pdo->prepare('select *from tbl_alergia where al_paciente = :al_paciente');
                     $sth->bindValue(':al_paciente', $paciente);
                     $sth->execute();
                     $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                     extract($resultado);
                     ?>
                    <br/> <br/>
                    <div class="row text-center">
                        <div class="col-lg-12">
                            <h5 class="card-text"><b>Alergia:</b></h5>
                        </div>
                        <div class="col-lg-12">
                            <h5 class="card-text"><?php echo $al_tipo;?></h5>
                        </div>
                    </div>
                    <br/><br/><br/><br/>
                          
                    <div class="row">
                        <div class="col-lg-7">
                           <a href = "../pressao.php"><img src="https://img.icons8.com/ios-glyphs/30/000000/hypertension.png"/></a>
                        </div>
                        <div class="text-right">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#exampleModal">
                                Atualizar
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Atualizar</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                        </div>

                                        <div class="modal-body">
                                            <form name="form1" action="updateUsu.php" method="POST">    
                                                <div class="input-field col s2">
                                                    <div class="text-left">
                                                        <label>Data de Nascimento</label>
                                                    </div>
                                                    <input type="date" class="form-control" name="p_dtnasc"/>
                                                </div>
                
                                                <div class="input-field col s2">
                                                    <div class="text-left">
                                                        <label>Gênero</label>
                                                    </div>
                                                    <select name="p_genero" class="form-control">
                                                        <?php
                                                            $sth = $pdo ->prepare('select * from tbl_genero');
                                                            $sth->execute(); 
                                                            foreach ($sth as $res){ 
                                                                extract($res);
                                                                echo'<option value="'. $tipo_genero_codigo .'">' . $tipo_genero_tipo . '</option>'; 
                                                            }  
                                                        ?>
                                                    </select>
                                                </div>
                                                </br>
                                            
                                                <div class="input-field col s2">
                                                    <input name="p_codigo" type="hidden"value="<?= $p_codigo; ?>" data-length="200">
                                                        <div class="text-left">
                                                            <label>Nome</label>
                                                        </div>
                                                        <input name="p_nome" type="text" class="form-control"placeholder="Nome Completo">     
                                                </div>
                                                </br>

                                                <div class="input-field col s2">
                                                    <input name="p_codigo" type="hidden" value="<?= $p_codigo; ?>" data-length="200">
                                                        <div class="text-left">
                                                            <label>Profissão</label>
                                                        </div>
                                                        <input name="p_ocupacao" placeholder="Profissão" class="form-control"/>
                                                </div>

                                                <div class="input-field col s2">
                                                    <input name="p_codigo" type="hidden" value="<?= $p_codigo; ?>" data-length="200">
                                                        <div class="text-left">
                                                            <label>Outra doença ?</label>
                                                        </div>
                                                        <select name="p_siglas" class="form-control">
                                                            <?php
                                                                $sth = $pdo ->prepare('select * from tbl_siglas');
                                                                $sth->execute(); 
                                                                foreach ($sth as $res){ 
                                                                    extract($res);
                                                                    echo'<option value="'. $sig_codigo .'">' . $sig_tipo . '</option>'; 
                                                                } 
                                                            ?>
                                                        </select>
                                                </div>

                                                <div class="input-field col s2">
                                                    <div class="text-left">
                                                        <label>Email</label>
                                                    </div>
                                                    <input type="text" class="form-control" name="p_email" placeholder="Email"/>
                                                </div>     

                                                <div class="modal-footer">
                                                    <input class="modal-close waves-effect waves-green btn-flat" type="submit" value="Confirmar"/>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
                <?php
                    $sth = $pdo->prepare('select *from tbl_login where lo_codigo = :lo_codigo');
                    $sth->bindValue(':lo_codigo', $_SESSION["health"]["id"]);
                    $sth->execute();
                    $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                    extract($resultado);

                    if($lo_tipo == 4){
                        $sth = $pdo->prepare('
                            select *from tbl_paciente p 
                            INNER JOIN tbl_genero g on p.p_genero = g.tipo_genero_codigo
                            where p.p_login = :p_login
                        ');

                        $sth->bindValue(':p_login', $_SESSION["health"]["id"]);
                        $sth->execute();
                        $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                        extract($resultado);
    
                    }else{

                        $sth = $pdo->prepare('
                            select *from tbl_paciente p 
                            INNER JOIN tbl_genero g on p.p_genero = g.tipo_genero_codigo
                            where p.p_login = :p_login
                        ');

                        $sth->bindValue(':p_login', $paciente);
                        $sth->execute();
                        $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                        extract($resultado);
                    };
                ?>

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
                                     $sth = $pdo->prepare('select *from tbl_login where lo_codigo = :lo_codigo');
                                     $sth->bindValue(':lo_codigo', $_SESSION["health"]["id"]);
                                     $sth->execute();
                                     $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                                     extract($resultado);
                                 
                                     if($lo_tipo == 4){
                                        $sth = $pdo->prepare('select *from tbl_moradia_saneamento  m 
                                            INNER JOIN tbl_tipo_casa t on m.ms_tipocasa = t.ca_codigo
                                            INNER JOIN tbl_lixo l on m.ms_destlixo = l.dl_codigo
                                            INNER JOIN tbl_tratamento_agua a on m.ms_tratamentoagua = a.ta_codigo
                                            INNER JOIN tbl_abastecimento b on m.ms_abastecimentoagua = b.ab_codigo
                                            INNER JOIN tbl_fezes_urina f on m.ms_destinofezes = f.fu_codigo
                                            INNER JOIN tbl_opcao o on m.ms_energia = o.op_codigo
                                            where m.ms_login = :ms_login
                                        ');
                                       
                                       $sth->bindValue(':ms_login', $_SESSION["health"]["id"]);
                                       $sth->execute();
                                       $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                                       extract($resultado);
                                    }else{

                                        $sth = $pdo->prepare('select *from tbl_moradia_saneamento  m 
                                        INNER JOIN tbl_tipo_casa t on m.ms_tipocasa = t.ca_codigo
                                        INNER JOIN tbl_lixo l on m.ms_destlixo = l.dl_codigo
                                        INNER JOIN tbl_tratamento_agua a on m.ms_tratamentoagua = a.ta_codigo
                                        INNER JOIN tbl_abastecimento b on m.ms_abastecimentoagua = b.ab_codigo
                                        INNER JOIN tbl_fezes_urina f on m.ms_destinofezes = f.fu_codigo
                                        INNER JOIN tbl_opcao o on m.ms_energia = o.op_codigo
                                        where m.ms_login = :ms_login
                                    ');
                                   
                                   $sth->bindValue(':ms_login', $paciente);
                                   $sth->execute();
                                   $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                                   extract($resultado);
                                    }
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
                            <div class="text-right">
                                    <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#exampleModal4">
                                        Atualizar
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Atualizar</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form name="form1" action="update_moradia.php" method="POST">                           
                                                        <div class="input-field col s2">
                                                            <input name="ms_codigo" type="hidden" value="<?= $ms_codigo; ?>" data-length="200">
                                                                <div class="text-left">
                                                                    <label>Tipo de casa</label>
                                                                </div>
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
                                
                                                        <div class="input-field col s2">
                                                            <input name="ms_codigo" type="hidden" value="<?= $ms_codigo; ?>" data-length="200">
                                                                <div class="text-left">
                                                                    <label>Destino lixo</label>
                                                                </div>
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

                                                        <div class="input-field col s2">
                                                            <input name="ms_codigo" type="hidden" value="<?= $ms_codigo; ?>" data-length="200">
                                                                <div class="text-left">
                                                                    <label>Tratamento de Água</label>
                                                                </div>
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
                            
                                                        <div class="input-field col s2">
                                                            <input name="ms_codigo" type="hidden" value="<?= $ms_codigo; ?>" data-length="200">
                                                                <div class="text-left">
                                                                    <label>Abastecimento de Àgua</label>
                                                                </div>
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
                                                        <div class="input-field col s2">
                                                            <input name="ms_codigo" type="hidden" value="<?= $ms_codigo; ?>" data-length="200">
                                                                <div class="text-left">
                                                                    <label>Destino das fezes</label>
                                                                </div>
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

                                                        <div class="input-field col s2">
                                                            <input name="ms_codigo" type="hidden" value="<?= $ms_codigo; ?>" data-length="200">
                                                                <div class="text-left">
                                                                    <label>Numero de comodos</label>
                                                                </div>
                                                                <input type="text" class="form-control" name="ms_numerocomodos" />
                                                        </div>                   
                     
                                                        <div class="input-field col s2">
                                                            <input name="ms_codigo" type="hidden" value="<?= $ms_codigo; ?>" data-length="200">
                                                                <div class="text-left">
                                                                    <label>Possui Energia ?</label>
                                                                </div>
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
                                
                                                        <div class="modal-footer">
                                                            <input class="modal-close waves-effect waves-green btn-flat" type="submit" value="Confirmar"/>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="card" style="width: 63rem;">
                                <div class="card-body" style="background-color: #a7ffeb">
                                    <center> <h2 class="card-title"><b>Endereço </b></h2> </center>
                                    <br/><br/>
                                    <div class="row ">
                                        <div class="col-lg-2">
                                            <?php
                                                $sth = $pdo->prepare('select *from tbl_login where lo_codigo = :lo_codigo');
                                                $sth->bindValue(':lo_codigo', $_SESSION["health"]["id"]);
                                                $sth->execute();
                                                $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                                                extract($resultado);
                                            
                                                if($lo_tipo == 4){
                                                    $sth = $pdo->prepare('select *from tbl_prontuario  p 
                                                        INNER JOIN tbl_endereco e on p.pr_endereco = e.en_codigo
                                                        where e.en_login = :en_login
                                                    ');
                                                
                                                $sth->bindValue(':en_login', $_SESSION["health"]["id"]);
                                                $sth->execute();
                                                $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                                                extract($resultado);
                                                }else{

                                                    $sth = $pdo->prepare('select *from tbl_prontuario  p 
                                                        INNER JOIN tbl_endereco e on p.pr_endereco = e.en_codigo
                                                        where e.en_login = :en_login
                                                    ');
                                                
                                                $sth->bindValue(':en_login', $paciente);
                                                $sth->execute();
                                                $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                                                extract($resultado);
                                                }
                                            ?>
                                            <h5 class="card-text"><b>CEP :</b><?php  echo $en_cep; ?></h5>
                                        
                                        </div>
                                        <div class="col-lg-1"></div>
                                            <div class="col-lg-5">
                                                <h5 class="card-text"><b>Rua : </b><?php echo $en_rua;?></h5>
                                            </div>
                                            <div class="col-lg-1"></div>
                                            <div class="col-lg-3">
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
                               
                         $sth->bindValue(':en_login', $_SESSION["health"]["id"]);
                         $sth->execute();
                         $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                         extract($resultado);
                    ?>
                            <h5 class="card-text"><b>Bairro : </b><?php echo $ba_tipo;?></h5>           
                                            </div>
                                            <div class="col-lg-1"></div>
                                            <div class="col-lg-3">
                                                <h5 class="card-text"><b>Cidade : </b><?php echo $en_cidade;?></h5>           
                                            </div>
                                            <div class="col-lg-2"></div>
                                            <div class="col-lg-3">
                                                <h5 class="card-text"><b>Estado : </b><?php echo $en_uf;?></h5>           
                                            </div>
                                        </div>
                                        <br/>  
                           
                                        <div class="text-right">                            
                                            <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#exampleModal30">
                                                Atualizar
                                            </button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal30" tabindex="-1" aria-labelledby="exampleModalLabel30" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel30">Atualizar</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form name="form30" action="updateEndereco.php" method="POST">
                                                                <div class="input-field col s2">
                                                                
                                                                    <input name="en_login" type="hidden" value="<?= $_SESSION["health"]["id"]; ?>" data-length="200">
                                                                    <div class="text-left">
                                                                        <label>CEP</label>
                                                                    </div>
                                                                    <input class="form-control" name="en_cep" type="text" id="cep" value="" size="10" maxlength="9"
                                                                    onblur="pesquisacep(this.value);" />
                                                                </div>
                                                                <div class="input-field col s2">
                                                                    <input name="en_codigo" type="hidden" value="<?= $en_codigo; ?>" data-length="200">
                                                                    <div class="text-left">
                                                                        <label>Rua</label>
                                                                    </div>
                                                                    <input class="form-control" name="en_rua" type="text" id="rua" size="75" />
                                                                </div>
                                                            
                                                                <div class="input-field col s2">
                                                                    <input name="en_codigo" type="hidden" value="<?= $en_codigo; ?>" data-length="200">
                                                                    <div class="text-left">
                                                                        <label>Numero</label>
                                                                    </div>
                                                                    <input class="form-control" name="en_numero" type="text" size="7" />

                                                                </div>
                                                            
                                                                <div class="input-field col s2">
                                                                    <input name="en_codigo" type="hidden" value="<?= $en_codigo; ?>" data-length="200">
                                                                    <div class="text-left">
                                                                        <label>Bairro</label>
                                                                    </div>
                                                                    <input class="form-control" name="en_bairro" type="text" id="bairro" size="42" />
                                                                </div>
                                                            
                                                                <div class="input-field col s2">
                                                                    <input name="en_codigo" type="hidden" value="<?= $en_codigo; ?>" data-length="200">
                                                                    <div class="text-left">
                                                                        <label>Cidade</label>
                                                                    </div>
                                                                    <input class="form-control" name="en_cidade" type="text" id="cidade" size="42" />
                                                                </div>
                                                            
                                                                <div class="input-field col s2">
                                                                    <input name="en_codigo" type="hidden" value="<?= $en_codigo; ?>" data-length="200">
                                                                    <div class="text-left">
                                                                        <label>Estado</label>
                                                                    </div>
                                                                    <input class="form-control" name="en_uf" type="text" id="uf" size="2" />
                                                                </div>
                                                   
                                                                <div class="modal-footer">
                                                                    <input class="modal-close waves-effect waves-green btn-flat" type="submit" value="Confirmar"/>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>   
                                                </div>
                                            </div>    
                                        </div> 
                                    </div>
                                </div>
                        
                            <br/>
                        
                        <div class="card" style="width: 63rem;">
                            <div class="card-body" style="background-color: #a7ffeb">
                                <center> <h2 class="card-title"><b>Outras Informações </b></h2> </center>
                                <br/><br/>
                                <div class="row ">
                                    <div class="col-lg-3">
                                        <h5 class="card-text"><b>Em casos de doenças procura:</b></h5>
                                        <div class="col-lg-8 text-center">
                                            <h5 class="card-text"><?php 

                                             $sth = $pdo->prepare('select *from tbl_login where lo_codigo = :lo_codigo');
                                             $sth->bindValue(':lo_codigo', $_SESSION["health"]["id"]);
                                             $sth->execute();
                                             $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                                             extract($resultado);
                                         
                                             if($lo_tipo == 4){
                                                $sth = $pdo->prepare('select *from tbl_outras_informacoes  o 
                                                    INNER JOIN tbl_doenca d on o.oi_doencas = d.cdp_codigo
                                                    INNER JOIN tbl_comunicacao c on o.oi_comunicacao = c.mc_codigo
                                                    INNER JOIN tbl_grupo_comunitario g on o.oi_grupos_comunitarios = g.gc_codigo
                                                    INNER JOIN tbl_transporte t on o.oi_transporte = t.mt_codigo
                                                    where o.oi_login = :oi_login
                                                ');
                                               
                                               $sth->bindValue(':oi_login', $_SESSION["health"]["id"]);
                                               $sth->execute();
                                               $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                                               extract($resultado);
                                            }else{
                                                $sth = $pdo->prepare('select *from tbl_outras_informacoes  o 
                                                    INNER JOIN tbl_doenca d on o.oi_doencas = d.cdp_codigo
                                                    INNER JOIN tbl_comunicacao c on o.oi_comunicacao = c.mc_codigo
                                                    INNER JOIN tbl_grupo_comunitario g on o.oi_grupos_comunitarios = g.gc_codigo
                                                    INNER JOIN tbl_transporte t on o.oi_transporte = t.mt_codigo
                                                    where o.oi_login = :oi_login
                                                ');
                                               
                                               $sth->bindValue(':oi_login', $paciente);
                                               $sth->execute();
                                               $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                                               extract($resultado);
                                            };

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
                                <div class="text-right">                            
                                        <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#exampleModal2">
                                            Atualizar
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel2">Atualizar</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form name="form1" action="updateOutrasInfo.php" method="POST">
                                                            <div class="input-field col s2">
                                                                <input name="oi_cod" type="hidden" value="<?= $oi_cod; ?>" data-length="200">
                                                                    <div class="text-left">
                                                                        <label>Em caso de doenças, procure:</label>
                                                                    </div>
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
                                                            
                                                            <div class="input-field col s2">
                                                                <input name="oi_cod" type="hidden" value="<?= $oi_cod; ?>" data-length="200">
                                                                <div class="text-left">
                                                                    <label>Meio de comunicação</label>
                                                                    </div>
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

                                                                <div class="input-field col s2">
                                                                    <input name="oi_cod" type="hidden" value="<?= $oi_cod; ?>" data-length="200">
                                                                    <div class="text-left">
                                                                        <label>Grupos Comuntários</label>
                                                                    </div>
                                                                    <select name="oi_grupos_comunitarios" class="form-control">
                                                                        <?php
                                                                        $sth = $pdo ->prepare('select * from tbl_grupo_comunitario');
                                                                        $sth->execute(); 
                                                                        foreach ($sth as $res){ 
                                                                            extract($res);
                                                                            echo'<option value="'. $gc_codigo .'">' . $gc_tipo . '</option>'; 
                                                                        }  
                                                                        ?>
                                                                    </select>
                                                                </div>
     
                                                                <div class="input-field col s2">
                                                                    <input name="oi_cod" type="hidden" value="<?= $oi_cod; ?>" data-length="200">
                                                                        <div class="text-left">
                                                                            <label>Transporte</label>
                                                                        </div>
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
           
                                                                <div class="modal-footer">
                                                                    <input class="modal-close waves-effect waves-green btn-flat" type="submit" value="Confirmar"/>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>   
                                                </div>
                                            </div>    
                                        </div> 
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
                                                <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#exampleModal50">Alergia</button>
                                            </div>
                                        </div>
                                    </div>
                                   
                                   <div class="modal fade" id="exampleModal50" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                            INNER JOIN tbl_login l on a.da_paciente = l.lo_codigo
                                            where a.da_paciente = :da_paciente '
                                        );

                                        $sth->bindValue(':da_paciente', $_SESSION["health"]["id"]);
                                        $sth->execute();
                                        foreach ($sth as $res) :
                                        extract($res);
                                    ?>
                                    <div class="container">
                                    
                                        <center>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <h5><span class="text-black"><b>Nome: </b><?php 
                                                        $sth = $pdo->prepare('select * from tbl_paciente where p_login = :p_login');
                                                        $sth->bindValue(':p_login', $_SESSION["health"]["id"]);
                                                        $sth->execute();
                                                        $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                                                        extract($resultado);
                                                    echo $p_nome ?></span></h5>
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
                                                <div class="form-group col-lg-12 text-center "> 
                                                    <h5><span class="text-black"><div class="form-group col-md-12"> <b>Motivo da Consulta: </b></div> 
                                                    <div class="form-group col-md-12"><?php echo $da_motivo ?></div> </span></h5>
                                                </div> 
                                            </div>
                                            <br/>

                                            <div class="form-row">
                                                <?php
                                                    if($da_diagnostico != 0){
                                                        $sth = $pdo->prepare('select *from tbl_diagnostico where di_codigo = :di_codigo ' );
                                                        $sth->bindValue(':di_codigo', $da_diagnostico);
                                                        $sth->execute();
                                                        $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                                                        extract($resultado);
                                                ?>
                                                <div class="form-group col-md-12 text-center">
                                                    <div class="form-group col-md-12">
                                                        <h5><span class="text-black"><b>Diagnóstico: </b></span></h5>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                    <h5><span class="text-black"><?php echo $di_diagnostico ?></span></h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <br/><br/><br/>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <h5><span class="text-black"><b>Medico: </b><?php
                                                        $sth = $pdo->prepare('select *from tbl_medico where me_codigo = :me_codigo ' );
                                                        $sth->bindValue(':me_codigo', $di_medico);
                                                        $sth->execute();
                                                        $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                                                        extract($resultado);
                                                    echo $me_nome ?></span></h5> </span></h5> 
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <h5><span class="text-black"><b>Data:</b> <?php 
                                                     $ano = substr($di_data,0,4);
                                                     $mes=substr($di_data,4,4);
                                                     $dia=substr($di_data,8,2);
                                                     echo $dia; echo $mes; echo $ano; ?></span></h5> 
                                                </div>
                                            </div>
                                        </center>
                                    </div>
                                    <hr>
                                    <?php
                                       
                                    }else{
                                        echo '<h5> Sem Diagnóstico por enquanto. </h5>';
                                    };
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
                        $sth = $pdo->prepare('select *from tbl_login where lo_codigo = :lo_codigo');
                        $sth->bindValue(':lo_codigo', $_SESSION["health"]["id"]);
                        $sth->execute();
                        $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                        extract($resultado);
             
                        if($lo_tipo == 4){          
                            $sth = $pdo->prepare('select *from tbl_prontuario p 
                                INNER JOIN tbl_opcao o on p.pr_possui_plano = o.op_codigo
                                where p.pr_login = :pr_login
                            ');
                            $sth->bindValue(':pr_login', $_SESSION["health"]["id"]);
                            $sth->execute();
                            $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                            extract($resultado);
                        }else{
                            $sth = $pdo->prepare('select *from tbl_prontuario p 
                                INNER JOIN tbl_opcao o on p.pr_possui_plano = o.op_codigo
                                where p.pr_login = :pr_login
                            ');
                            $sth->bindValue(':pr_login', $paciente);
                            $sth->execute();
                            $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                            extract($resultado);
                        };
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
                     $sth = $pdo->prepare('select *from tbl_login where lo_codigo = :lo_codigo');
                     $sth->bindValue(':lo_codigo', $_SESSION["health"]["id"]);
                     $sth->execute();
                     $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                     extract($resultado);
                 
                        if($lo_tipo == 4){ 
                            $sth = $pdo->prepare('select *from tbl_prontuario p 
                                INNER JOIN tbl_opcao o on p.pr_benef_bolsa_familia = o.op_codigo
                                where p.pr_login = :pr_login
                            ');    
                            $sth->bindValue(':pr_login', $_SESSION["health"]["id"]);
                            $sth->execute();
                            $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                            extract($resultado);
                        }else{
                            $sth = $pdo->prepare('select *from tbl_prontuario p 
                                INNER JOIN tbl_opcao o on p.pr_benef_bolsa_familia = o.op_codigo
                                where p.pr_login = :pr_login
                            ');    
                            $sth->bindValue(':pr_login', $paciente);
                            $sth->execute();
                            $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                            extract($resultado);
                        };
                    ?>
                    <div class="col-lg-4 ">
                        <h5 class="card-text"><b>Possui beneficio bolsa familia:</b></h5>
                        <div class="col-lg-12">
                            <h5 class="card-text "><?php echo $op_tipo;?></h5>
                        </div>
                    </div>
                    <?php
                        $sth = $pdo->prepare('select *from tbl_login where lo_codigo = :lo_codigo');
                        $sth->bindValue(':lo_codigo', $_SESSION["health"]["id"]);
                        $sth->execute();
                        $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                        extract($resultado);
                                     
                        if($lo_tipo == 4){ 
                            $sth = $pdo->prepare('select *from tbl_prontuario p 
                                INNER JOIN tbl_opcao o on p.pr_cadast_unico = o.op_codigo
                                where p.pr_login = :pr_login
                            ');   
                            $sth->bindValue(':pr_login', $_SESSION["health"]["id"]);
                            $sth->execute();
                            $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                            extract($resultado);
                        }else{
                            $sth = $pdo->prepare('select *from tbl_prontuario p 
                                INNER JOIN tbl_opcao o on p.pr_cadast_unico = o.op_codigo
                                where p.pr_login = :pr_login
                            ');   
                            $sth->bindValue(':pr_login', $paciente);
                            $sth->execute();
                            $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                            extract($resultado);  
                        };
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
                <div class="text-right">
                <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#exampleModal5">
                    Atualizar
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal5" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Atualizar</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form name="form1" action="update_final.php" method="post">
                                    <div class="input-field col s2">
                                        <input name="pr_codigo" type="hidden" value="<?= $pr_codigo; ?>" data-length="200">
                                        <div class="text-left">
                                            <label>Possui Plano</label>
                                        </div>
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
                    
                                    <div class="input-field col s2">
                                        <input name="pr_codigo" type="hidden" value="<?= $pr_codigo; ?>" data-length="200">
                                        <div class="text-left">
                                                <label>Benefício bolsa familia?</label>
                                                </div>
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
                                        <div class="input-field col s2">
                                            <input name="pr_codigo" type="hidden" value="<?= $pr_codigo; ?>" data-length="200">
                                            <div class="text-left">
                                                    <label>Cadastro único</label>
                                                    </div>
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
                                            </div>

                                            <div class="input-field col s2">
                                                <input name="pr_codigo" type="hidden" value="<?= $pr_codigo; ?>" data-length="200">
                                                <div class="text-left">
                                                    <label>Observações</label>
                                                </div>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="pr_observacoes"></textarea>
                                            </div>

                                            <div class="modal-footer">
                                                <input class="modal-close waves-effect waves-green btn-flat" type="submit" value="Confirmar"/>
                                            </div>                             
                                        </form>            
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>            
                </div>
            </div>
        </div>   
        <br/><br/>
        <?php
            include '../../footer.php';
        ?>   
       
   <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        
        <script>
            $('#myTab a').on('click', function (e) {
                e.preventDefault()
                $(this).tab('show')
            })
            // Or with jQuery

            $('#myModal').on('shown.bs.modal', function () {
            $('#myInput').trigger('focus')
            })

        </script>
        <script>
    
    function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('rua').value=("");
            document.getElementById('bairro').value=("");
            document.getElementById('cidade').value=("");
            document.getElementById('uf').value=("");
            document.getElementById('ibge').value=("");
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('rua').value=(conteudo.logradouro);
            document.getElementById('bairro').value=(conteudo.bairro);
            document.getElementById('cidade').value=(conteudo.localidade);
            document.getElementById('uf').value=(conteudo.uf);
            document.getElementById('ibge').value=(conteudo.ibge);
        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }
        
    function pesquisacep(valor) {

        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('rua').value="...";
                document.getElementById('bairro').value="...";
                document.getElementById('cidade').value="...";
                document.getElementById('uf').value="...";
                document.getElementById('ibge').value="...";

                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);

            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    };

    </script>
    </body>
</html>