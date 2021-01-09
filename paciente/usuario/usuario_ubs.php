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
        select *from tbl_paciente_ubs p 
        INNER JOIN tbl_genero g on p.p_genero = g.tipo_genero_codigo
        where p.p_loginn = :p_loginn
    ');

    $sth->bindValue(':p_loginn', $_SESSION["health"]["id"]);
    $sth->execute();
    $resultado = $sth->fetch(PDO::FETCH_ASSOC);
    extract($resultado);
    $paciente =  $_SESSION["health"]["id"];
    }else{

        $paciente= $_GET['paciente'];

        $sth = $pdo->prepare('
        select *from tbl_paciente_ubs p 
        INNER JOIN tbl_genero g on p.p_genero = g.tipo_genero_codigo
        where p.p_loginn = :p_loginn
    ');

    $sth->bindValue(':p_loginn', $paciente);
    $sth->execute();
    $resultado = $sth->fetch(PDO::FETCH_ASSOC);
    extract($resultado);
    };
?>

<html lang="en">
  <head>
     <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/usuario.css" />
        <title>Health & Life</title>
    </head>
    <body>
        <?php
            include 'header.php';
        ?>
        
        <br/><br/><br/>
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
                                        <form name="form1" action="update_ubs/img.php" method="POST" enctype = "multipart/form-data">
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
                    <br>
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
                        <div class="col-lg-12">
                            <h5 class="card-text"><b>Nome da Mãe:</b></h5>
                        </div>
                        <div class="col-lg-12">
                            <h5 class="card-text"><?php echo $p_nome_mae;?></h5>
                        </div>      
                    </div>  
                    <br/>  
                    <div class="row text-center ">
                        <div class="col-lg-12">
                            <h5 class="card-text"><b>Nome do Pai:</b></h5>
                        </div>
                        <div class="col-lg-12">
                            <h5 class="card-text"><?php echo $p_nome_pai;?></h5>
                        </div>
                    </div>
                    <br/>
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
                    <br>
                    <div class="row">
                        <div class="col-lg-7">
                           <a href = "../pressao.php"><img src="https://img.icons8.com/ios-glyphs/30/000000/hypertension.png"/></a>
                        </div>
                        <div class="text-right">
                            <!-- Button trigger modal -->
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
                                            <form name="form2" action="update_ubs/Usu.php" method="POST">    
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
                                                    <input name="p_codigo" type="hidden"value="<?= $p_codigo; ?>" data-length="200">
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
                                                    <input name="p_codigo" type="hidden"value="<?= $p_codigo; ?>" data-length="200">
                                                        <div class="text-left">
                                                            <label>Nome da Mãe</label>
                                                        </div>
                                                        <input name="p_nome_mae" type="text" class="form-control"placeholder="Nome Completo">     
                                                </div>
                                                </br>
                                                <div class="input-field col s2">
                                                    <input name="p_codigo" type="hidden"value="<?= $p_codigo; ?>" data-length="200">
                                                        <div class="text-left">
                                                            <label>Nome do Pai</label>
                                                        </div>
                                                        <input name="p_nome_pai" type="text" class="form-control"placeholder="Nome Completo">     
                                                </div>
                                                </br>
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
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><b>Endereço</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><b>Atendimento</b></a>
                        </li>
                    </ul>
                </section>

                <div class="tab-content">
                    <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">  
                        <br/>
                        <div class="col-lg-9 right">     
                            <div class="card" style="width: 63rem;">
                                <div class="card-body" style="background-color: #a7ffeb">
                                    <center> <h2 class="card-title"><b>Informações </b></h2> </center>
                                    <br/><br/>
                                    <div class="row ">
                                        <div class="col-lg-3">
                                            <h5 class="card-text"><b>CPF:</b><?php  echo $p_CPF; ?></h5>
                                                
                                        </div>
                                        <div class="col-lg-1"></div>
                                        <div class="col-lg-3">
                                            <h5 class="card-text"><b>RG: </b><?php echo $p_RG;?></h5>
                                        </div>
                                        <div class="col-lg-1"></div>
                                        <div class="col-lg-3">
                                            <h5 class="card-text"><b>Cartão do SUS: </b><?php echo $p_cartao_sus;?></h5>
                                            
                                        </div> 
                                    </div>
                                    <br/>     

                                    <div class="text-right">
                                        <!-- Button trigger modal -->
                                        <div class="text-right">                            
                                            <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#exampleModal8">
                                            Atualizar
                                            </button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal8" tabindex="-1" aria-labelledby="exampleModalLabel8" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel8">Atualizar</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form name="form8" action="update_ubs/info.php" method="POST">
                                                                <div class="input-field col s2">
                                                                
                                                                    <input name="p_codigo" type="hidden"value="<?= $p_codigo; ?>" data-length="200">
                                                                    <div class="text-left">
                                                                        <label>CPF</label>
                                                                    </div>
                                                                    <input type="text" class="form-control" name="p_CPF" placeholder="CPF"/>
                                                                </div> 
                                                                    
                                                                <div class="input-field col s2">
                                                                <input name="p_codigo" type="hidden"value="<?= $p_codigo; ?>" data-length="200">  
                                                                    <div class="text-left">
                                                                        
                                                                        <label>RG</label>
                                                                    </div>
                                                                    <input type="text" class="form-control" name="p_RG" placeholder="Email"/>
                                                                </div> 
                                                            
                                                                <div class="input-field col s2">
                                                                <input name="p_codigo" type="hidden"value="<?= $p_codigo; ?>" data-length="200">
                                                                    <div class="text-left">
                                                                        <label>Cartão SUS</label>
                                                                    </div>
                                                                    <input type="text" class="form-control" name="p_sus" placeholder="Cartão SUS"/>
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
                            <br><br>                                
                                
                            <div class="card" style="width: 63rem;">
                                <div class="card-body" style="background-color: #a7ffeb">
                                    <center> <h2 class="card-title"><b>Endereço </b></h2> </center>
                                    <br/><br/>
                                    <div class="row ">
                                        <div class="col-lg-3">
                                            <?php 

                                                    $sth = $pdo->prepare('select *from tbl_login where lo_codigo = :lo_codigo');
                                                    $sth->bindValue(':lo_codigo', $_SESSION["health"]["id"]);
                                                    $sth->execute();
                                                    $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                                                    extract($resultado);
                                                
                                                    if($lo_tipo == 4){
                                                        $sth = $pdo->prepare('select *from tbl_endereco where en_login = :en_login');
                                                    
                                                    $sth->bindValue(':en_login', $_SESSION["health"]["id"]);
                                                    $sth->execute();
                                                    $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                                                    extract($resultado);
                                                    }else{
                                                        $sth = $pdo->prepare('select *from tbl_endereco where en_login = :en_login');
                                                    
                                                    $sth->bindValue(':en_login', $paciente);
                                                    $sth->execute();
                                                    $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                                                    extract($resultado);
                                                    };

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
                               
                         $sth->bindValue(':en_login', $_SESSION["health"]["id"]);
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
                                    <div class="text-right">
                                        <!-- Button trigger modal -->
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
                                                            <form name="form30" action="update_ubs/endereco.php" method="POST">
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
                            </div>
                        </div>
                    </div>
               
                <br/><br/>
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
                                                    <form method="POST" action="update_ubs/insert_alergia.php">
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

                                        $sth->bindValue(':da_paciente',  $_SESSION["health"]["id"]);
                                        $sth->execute();
                                        foreach ($sth as $res) :
                                        extract($res);
                                    ?>
                                    <div class="container">
                                    
                                        <center>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <h5><span class="text-black"><b>Nome: </b><?php 
                                                        $sth = $pdo->prepare('select * from tbl_paciente_ubs where p_loginn = :p_login');
                                                        $sth->bindValue(':p_login',  $_SESSION["health"]["id"]);
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
                                            <div class ="row">
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
                
        <?php
            include '../../footer.php';
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