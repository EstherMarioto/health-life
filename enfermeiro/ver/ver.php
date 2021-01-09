<!doctype html>
<?php
    session_start();
    include '../../conexao/conexao.php';
    $paciente= $_GET['paciente'];
    $sth = $pdo->prepare('
        select *from tbl_paciente p 
        INNER JOIN tbl_genero g on p.p_genero = g.tipo_genero_codigo
        INNER JOIN tbl_siglas s on p.p_siglas = s.sig_codigo
        where p.p_login = :p_login
    ');

    $sth->bindValue(':p_login', $paciente );
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
        
        <br/><br/><br/>   <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../home.php">Home</a></li>
                <li class="breadcrumb-item"><a href="../pesquisar/opcao.php?paciente=<?= $paciente;?>">Opções</a></li>
                <li class="breadcrumb-item active" aria-current="page">Consulta</li>
            </ol>
        </nav>
        <div class="form-row">
            <div class="form-group col-md-0"> 
             <img src="https://img.icons8.com/material-rounded/26/000000/user-male-circle.png"/>
            </div>
            <div class="form-group col-md-0"> 
                <?php
                    $sth = $pdo->prepare('select * from tbl_tipo_login where tipo_logi_codigo = :tipo');
                    $sth->bindValue(':tipo', 1);
                    $sth->execute();
                    $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                    extract($resultado);
                ?>

                <h5><?php echo $tipo_logi_tipo ?></h5>

            </div>
        </div>
        
        <div class="row">
            <div class="card" style="width: 20rem;">
                <div class="card-body" style="background-color: #a7ffeb">
                    <center>
                    <?php
                        $sth = $pdo->prepare('select *from tbl_img_dado where im_detalhe = :im_detalhe and im_paciente = :im_paciente');
                        $sth->bindValue(':im_paciente',$paciente);
                        $sth->bindValue(':im_detalhe', 9 );
                        $sth->execute();
                        $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                        extract($resultado);

                        echo "<img src='../../cadastrar/img/" . $im_dado. "' alt='Fotos' width='190' height='190' class='rounded-circle'  />";
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
                        <div class="col-lg-6">
                            <h5 class="card-text"><b>Alguma Doença?</b></h5>
                        </div>
                        <div class="col-lg-6">
                            <h5 class="card-text"><?php echo $sig_tipo;?></h5>
                        </div>
                    </div>
                    <br/><br/> <br/>
                    <center><h5 class="card-text "><b>Email:</b></h5></center>
                    <br/>
                    <center> <h5 class="card-text "><?php echo $p_email;?></h5></center>
                    <br/><br/><br/><br/>
                          
                    <div class="row">
                        <div class="col-lg-7">
                        <a href="../../paciente/pressao.php?paciente=<?=$paciente;?>">
                            <img src="https://img.icons8.com/ios-glyphs/30/000000/hypertension.png"/>
                            </a>
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
                        </li>                    </ul>
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
                                       
                                       $sth->bindValue(':ms_login', $paciente);
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
                                                    $sth->bindValue(':oi_login', $paciente);
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
                                        <div class="form-row">
                                            <div class="form-group col-md-12 text-left">
                                                <button type="button" class="btn" data-toggle="modal" data-target=".bd-example-modal-lg2">     
                                                    <img src="https://img.icons8.com/material-rounded/24/000000/available-updates.png"/>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-7 text-right"> 
                                                <h2><span class="text-black"><b>Diagnóstico</b></span></h2>
                                            </div>
                                            <div class="form-group col-md-5 text-right"> 
                                                <button type="button" class="btn" data-toggle="modal" data-target=".bd-example-modal-lg">                                            
                                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"width="64" height="64"viewBox="0 0 172 172"style=" fill:#000000;">
                                                        <defs>
                                                            <linearGradient x1="86" y1="64.61288" x2="86" y2="69.875" gradientUnits="userSpaceOnUse" id="color-1_59930_gr1">
                                                                <stop offset="0" stop-color="#383838"></stop><stop offset="1" stop-color="#383838"></stop>
                                                            </linearGradient>
                                                            <linearGradient x1="86" y1="77.88106" x2="86" y2="83.42538" gradientUnits="userSpaceOnUse" id="color-2_59930_gr2">
                                                                <stop offset="0" stop-color="#383838"></stop>
                                                                <stop offset="1" stop-color="#383838"></stop>
                                                            </linearGradient>
                                                            <linearGradient x1="86" y1="91.31856" x2="86" y2="96.86288" gradientUnits="userSpaceOnUse" id="color-3_59930_gr3">
                                                                <stop offset="0" stop-color="#383838"></stop>
                                                                <stop offset="1" stop-color="#383838"></stop>
                                                            </linearGradient>
                                                            <linearGradient x1="77.9375" y1="104.64587" x2="77.9375" y2="110.4885" gradientUnits="userSpaceOnUse" id="color-4_59930_gr4">
                                                                <stop offset="0" stop-color="#383838"></stop>
                                                                <stop offset="1" stop-color="#383838"></stop>
                                                            </linearGradient>
                                                            <linearGradient x1="137.0625" y1="16.125" x2="137.0625" y2="166.96363" gradientUnits="userSpaceOnUse" id="color-5_59930_gr5">
                                                                <stop offset="0" stop-color="#000000"></stop>
                                                                <stop offset="1" stop-color="#000000"></stop>
                                                            </linearGradient>
                                                            <linearGradient x1="86" y1="13.4375" x2="86" y2="161.28225" gradientUnits="userSpaceOnUse" id="color-6_59930_gr6">
                                                                <stop offset="0" stop-color="#000000"></stop>
                                                                <stop offset="1" stop-color="#000000"></stop>
                                                            </linearGradient>
                                                            <linearGradient x1="137.0625" y1="16.125" x2="137.0625" y2="171.3335" gradientUnits="userSpaceOnUse" id="color-7_59930_gr7">
                                                                <stop offset="0" stop-color="#000000"></stop>
                                                                <stop offset="1" stop-color="#000000"></stop>
                                                            </linearGradient>
                                                        </defs>
                                                        <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                                                            <path d="M0,172v-172h172v172z" fill="none"></path>
                                                            <g>
                                                                <path d="M53.75,64.5h64.5v5.375h-64.5z" fill="url(#color-1_59930_gr1)"></path>
                                                                <path d="M53.75,77.9375h64.5v5.375h-64.5z" fill="url(#color-2_59930_gr2)"></path>
                                                                <path d="M53.75,91.375h64.5v5.375h-64.5z" fill="url(#color-3_59930_gr3)"></path>
                                                                <path d="M53.75,104.8125h48.375v5.375h-48.375z" fill="url(#color-4_59930_gr4)"></path>
                                                                <path d="M150.5,134.375h-10.75v-10.75c0,-1.4835 -1.204,-2.6875 -2.6875,-2.6875c-1.4835,0 -2.6875,1.204 -2.6875,2.6875v10.75h-10.75c-1.4835,0 -2.6875,1.204 -2.6875,2.6875c0,1.4835 1.204,2.6875 2.6875,2.6875h10.75v10.75c0,1.4835 1.204,2.6875 2.6875,2.6875c1.4835,0 2.6875,-1.204 2.6875,-2.6875v-10.75h10.75c1.4835,0 2.6875,-1.204 2.6875,-2.6875c0,-1.4835 -1.204,-2.6875 -2.6875,-2.6875z" fill="url(#color-5_59930_gr5)"></path>
                                                                <path d="M137.385,42.22063l-23.73062,-23.73063c-1.505,-1.53188 -3.5475,-2.365 -5.6975,-2.365h-67.64438c-4.43438,0 -8.0625,3.62813 -8.0625,8.0625v123.625c0,4.43437 3.62812,8.0625 8.0625,8.0625h61.11375c-0.91375,-1.72 -1.72,-3.52062 -2.365,-5.375h-58.74875c-1.47812,0 -2.6875,-1.20937 -2.6875,-2.6875v-3.19813c0.83313,0.3225 1.74688,0.51063 2.6875,0.51063h57.24375c-0.34938,-1.74687 -0.59125,-3.5475 -0.69875,-5.375h-56.545c-1.47812,0 -2.6875,-1.20937 -2.6875,-2.6875v-112.875c0,-1.47813 1.20938,-2.6875 2.6875,-2.6875h67.1875v18.8125c0,4.43437 3.62812,8.0625 8.0625,8.0625h18.8125v48.4825c0.88688,-0.08063 1.77375,-0.1075 2.6875,-0.1075c0.91375,0 1.80062,0.02687 2.6875,0.1075v-48.93938c0,-2.15 -0.83312,-4.1925 -2.365,-5.6975zM115.5625,43c-1.47812,0 -2.6875,-1.20938 -2.6875,-2.6875v-15.02312l17.71063,17.71063z" fill="url(#color-6_59930_gr6)"></path>
                                                                <path d="M137.0625,172c-19.264,0 -34.9375,-15.6735 -34.9375,-34.9375c0,-19.264 15.6735,-34.9375 34.9375,-34.9375c19.264,0 34.9375,15.6735 34.9375,34.9375c0,19.264 -15.6735,34.9375 -34.9375,34.9375zM137.0625,107.5c-16.29969,0 -29.5625,13.26281 -29.5625,29.5625c0,16.29969 13.26281,29.5625 29.5625,29.5625c16.29969,0 29.5625,-13.26281 29.5625,-29.5625c0,-16.29969 -13.26281,-29.5625 -29.5625,-29.5625z" fill="url(#color-7_59930_gr7)"></path>
                                                            </g>
                                                        </g>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                        
                                        <?php
                                 
                                            $sth = $pdo->prepare('
                                                select *from tbl_dados a
                                                INNER JOIN tbl_login l on a.da_paciente = l.lo_codigo
                                                where a.da_paciente = :da_paciente '
                                            );

                                            $sth->bindValue(':da_paciente', $paciente);
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
                                                         $sth->bindValue(':p_login', $paciente);
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
                                                    <div class="form-group col-lg-12 text-left "> 
                                                        <h5>
                                                            <span class="text-black">
                                                                <div class="form-group col-md-6"> 
                                                                    <b>Motivo da Consulta: </b>
                                                                </div> 
                                                                <div class="form-group col-md-6">
                                                                    <?php echo $da_motivo ?>
                                                                </div> 
                                                            </span>
                                                        </h5>
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
                                                        <h5><span class="text-black"><b>Medico: </b><?php
                                                         $sth = $pdo->prepare('select *from tbl_medico where me_codigo = :me_codigo ' );
                                                         $sth->bindValue(':me_codigo', $di_medico);
                                                         $sth->execute();
                                                         $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                                                         extract($resultado);
                                                        echo $me_nome ?></span></h5> 
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
                            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">                
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Dados do Paciente</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form name="form1" action="insert_ver.php" method="post">
                                            <input name="paciente" type="hidden" value="<?= $paciente; ?>">
                                            <input name="enfermeiro" type="hidden" value="<?=  $_SESSION["health"]["id"]; ?>">
      
                                            <div class="modal-body">
                                                <div class="container">
                                                    <div class="form-group row">
                                                        <label  class="col-sm-1 col-form-label text-center">Altura: </label>
                                                        <div class="col-sm-2">
                                                            <input class="form-control" name="altura">
                                                        </div>
                                                        <div class="col-sm-1">
                                                        </div>
                                                        <label  class="col-sm-1 col-form-label text-center">Peso: </label>
                                                        <div class="col-sm-2">
                                                            <input class="form-control" name="peso">
                                                        </div>
                                                        <div class="col-sm-1">
                                                        </div>
                                                        <label  class="col-sm-1 col-form-label text-center">Pressão: </label> 
                                                        <div class="col-sm-2">
                                                            <input class="form-control" name="pressao">
                                                        </div>     
                                                    </div>
                                                    <div class="form-group">
                                                        <center>
                                                            <div class="col-sm-11 text-left" >
                                                                <label for="message-text" class="col-form-label">Motivo da Consulta:</label>
                                                                <textarea class="form-control"  name="motivo"id="message-text"></textarea>
                                                            </div>
                                                        </center>
                                                    </div>
                                                </div> 
                                            </div>
                                            <div class="modal-footer">     
                                                <button type="button-submit" class="btn btn-primary">Enviar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade bd-example-modal-lg2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">                
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title"><b> Atualizar os Dados do Paciente</b></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form name="form2" action="update_ver.php" method="post">
                                            <input name="paciente" type="hidden" value="<?= $paciente; ?>">
                                            <input name="enfermeiro" type="hidden" value="<?=  $_SESSION["health"]["id"]; ?>">
                                                
                                            <div class="modal-body">
                                                <div class="container">
                                                    <div class="form-group row">   
                                                        <label  class="col-sm-1 col-form-label text-center">Altura: </label>
                                                        <div class="col-sm-2">
                                                            <input class="form-control" name="altura">
                                                        </div>
                                                        <div class="col-sm-1">
                                                        </div>
                                                        <label  class="col-sm-1 col-form-label text-center">Peso: </label>
                                                        <div class="col-sm-2">
                                                            <input class="form-control" name="peso">
                                                        </div>
                                                        <div class="col-sm-1">
                                                        </div>
                                                        <label  class="col-sm-1 col-form-label text-center">Pressão: </label> 
                                                        <div class="col-sm-2">
                                                            <input class="form-control" name="pressao">
                                                        </div>     
                                                    </div>
                                                    <div class="form-group">
                                                        <center>
                                                            <div class="col-sm-11 text-left">
                                                                <label for="message-text" class="col-form-label">Motivo da Consulta:</label>
                                                                <textarea class="form-control"  name="motivo"id="message-text"></textarea>
                                                            </div>
                                                        </center>
                                                    </div>
                                                </div>   
                                            </div>    
                                            <div class="modal-footer">
                                                <button type="button-submit" class="btn btn-primary">Atualizar</button>
                                            </div>
                                        </form>
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
                            $sth->bindValue(':pr_login', $paciente);
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
                            $sth->bindValue(':pr_login', $paciente);
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
                            $sth->bindValue(':pr_login', $paciente);
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