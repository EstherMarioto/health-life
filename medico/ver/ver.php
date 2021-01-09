<!doctype html>
<?php
    session_start();
    include '../../conexao/conexao.php';
  
    $paciente = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
  
    $diagnosticoo= $_GET['diagnosticoo'];
    $sth = $pdo->prepare("
        select *from tbl_paciente where p_nome LIKE '%$paciente%'");
    $sth->execute();
    $resultado = $sth->fetch(PDO::FETCH_ASSOC);
    extract($resultado);

    $sth = $pdo->prepare('
    select *from tbl_paciente p 
    INNER JOIN tbl_genero g on p.p_genero = g.tipo_genero_codigo
    where p.p_codigo = :p_codigo
');

$sth->bindValue(':p_codigo', $p_codigo );
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
                          
                    <div class="row">
                        <div class="col-lg-7">
                            <a href="../../paciente/pressao.php?paciente=<?= $p_login;?>"><img src="https://img.icons8.com/ios-glyphs/30/000000/hypertension.png"></a>
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
                                       
                                       $sth->bindValue(':ms_login', $p_login);
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
                                               
                                               $sth->bindValue(':oi_login', $p_login);
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
                                        <div class="form-group col-md-7 text-right"> 
                                            <h2><span class="text-black"><b>Diagnóstico</b></span></h2>
                                        </div>
                                        <div class="form-group col-md-5 text-right"> 
                                            <button type="button" class="btn" data-toggle="modal" data-target=".bd-example-modal-lg">                                            
                                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"width="75" height="75"viewBox="0 0 172 172"style=" fill:#000000;"><g transform="translate(-0.86,-0.86) scale(1.01,1.01)"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g><path d="M139.32,120.4c0,10.449 -8.471,18.92 -18.92,18.92h-68.8c-10.449,0 -18.92,-8.471 -18.92,-18.92v-68.8c0,-10.449 8.471,-18.92 18.92,-18.92h68.8c10.449,0 18.92,8.471 18.92,18.92z" fill="#78ccd3"></path><path d="M120.4,141.04h-68.8c-11.38124,0 -20.64,-9.25876 -20.64,-20.64v-68.8c0,-11.38124 9.25876,-20.64 20.64,-20.64h60.2c0.94944,0 1.72,0.77056 1.72,1.72c0,0.94944 -0.77056,1.72 -1.72,1.72h-60.2c-9.48408,0 -17.2,7.71592 -17.2,17.2v68.8c0,9.48408 7.71592,17.2 17.2,17.2h68.8c9.48408,0 17.2,-7.71592 17.2,-17.2v-60.2c0,-0.94944 0.77056,-1.72 1.72,-1.72c0.94944,0 1.72,0.77056 1.72,1.72v60.2c0,11.38124 -9.25876,20.64 -20.64,20.64z" fill="#1f212b"></path><path d="M114.38,131.58h-56.76c-9.49956,0 -17.2,-7.70044 -17.2,-17.2v-56.76c0,-9.49956 7.70044,-17.2 17.2,-17.2h56.76c9.49956,0 17.2,7.70044 17.2,17.2v56.76c0,9.49956 -7.70044,17.2 -17.2,17.2z" fill="#fdfcee"></path><path d="M114.38,132.44h-56.76c-9.9588,0 -18.06,-8.1012 -18.06,-18.06v-56.76c0,-9.9588 8.1012,-18.06 18.06,-18.06h48.16c0.47472,0 0.86,0.38528 0.86,0.86c0,0.47472 -0.38528,0.86 -0.86,0.86h-48.16c-9.00936,0 -16.34,7.33064 -16.34,16.34v56.76c0,9.00936 7.33064,16.34 16.34,16.34h56.76c9.00936,0 16.34,-7.33064 16.34,-16.34v-29.24c0,-0.47472 0.38528,-0.86 0.86,-0.86c0.47472,0 0.86,0.38528 0.86,0.86v29.24c0,9.9588 -8.1012,18.06 -18.06,18.06z" fill="#1f212b"></path><path d="M131.58,82.56c-0.47472,0 -0.86,-0.38528 -0.86,-0.86v-6.88c0,-0.47472 0.38528,-0.86 0.86,-0.86c0.47472,0 0.86,0.38528 0.86,0.86v6.88c0,0.47472 -0.38528,0.86 -0.86,0.86zM131.58,72.24c-0.47472,0 -0.86,-0.38528 -0.86,-0.86v-5.16c0,-0.47472 0.38528,-0.86 0.86,-0.86c0.47472,0 0.86,0.38528 0.86,0.86v5.16c0,0.47472 -0.38528,0.86 -0.86,0.86z" fill="#1f212b"></path><path d="M155.9868,31.4588l-0.3956,0.43l-54.2144,54.2144c-0.258,0.258 -0.5332,0.4816 -0.8428,0.6708c-0.2752,0.1892 -0.5848,0.3612 -0.9116,0.4816c-4.2484,1.6512 -20.5368,7.998 -20.7088,8.084c-0.6192,0.2408 -1.3588,0.1204 -1.8748,-0.3784c-0.4988,-0.516 -0.6192,-1.2556 -0.3784,-1.8748c0.086,-0.172 6.4328,-16.4604 8.084,-20.7088c0.1204,-0.3268 0.2924,-0.6364 0.4816,-0.9116c0.1892,-0.3096 0.4128,-0.5848 0.6708,-0.8428l54.2144,-54.2144l0.43,-0.3956c1.7716,-1.7544 6.9316,-2.7864 12.5904,2.8552c5.6416,5.6588 4.6096,10.8188 2.8552,12.5904z" fill="#fbb822"></path><path d="M100.534,86.774c-0.2752,0.1892 -0.5848,0.3612 -0.9116,0.4816c-4.2484,1.6512 -20.5368,7.998 -20.7088,8.084c-0.6192,0.2408 -1.3588,0.1204 -1.8748,-0.3784c-0.4988,-0.516 -0.6192,-1.2556 -0.3784,-1.8748c0.086,-0.172 6.4328,-16.4604 8.084,-20.7088c0.1204,-0.3268 0.2924,-0.6364 0.4816,-0.9116z" fill="#fefdef"></path><path d="M79.39348,86.27348c-1.48436,3.7152 -2.69524,6.74068 -2.72792,6.8198c-0.25112,0.62092 -0.12556,1.36052 0.3784,1.86276c0.50396,0.50396 1.24184,0.62952 1.86276,0.3784c0.07912,-0.03268 3.1046,-1.24184 6.8198,-2.72792z" fill="#444445"></path><path d="M130.71918,25.80013l6.88006,-6.8803l15.48036,15.47982l-6.88006,6.8803z" fill="#7a91c9"></path><path d="M153.1316,18.8684c-5.6588,-5.6416 -10.8188,-4.6096 -12.5904,-2.8552l-0.43,0.3956l-2.5112,2.5112l15.48,15.48l2.5112,-2.5112l0.3956,-0.43c1.7544,-1.7716 2.7864,-6.9316 -2.8552,-12.5904z" fill="#f58f8f"></path><path d="M78.26,96.32c-0.6708,0 -1.32784,-0.26144 -1.8232,-0.7568c-0.73444,-0.73444 -0.95804,-1.8318 -0.5676,-2.795c0.07568,-0.19092 3.1046,-7.94984 5.51776,-14.13496l2.56108,-6.56524c0.30272,-0.77744 0.7568,-1.4706 1.34848,-2.06228l54.66504,-54.62548c2.24288,-2.24288 8.02552,-2.85692 13.77032,2.88616c5.7448,5.7448 5.12904,11.52916 2.85864,13.79956l-0.36464,0.40076l-54.23332,54.23676c-0.59168,0.59168 -1.28656,1.04576 -2.06228,1.34848l-6.56524,2.56108c-6.18512,2.41316 -13.94404,5.44208 -14.13668,5.51776c-0.31304,0.12728 -0.64328,0.1892 -0.96836,0.1892zM144.5488,15.47484c-1.60132,0 -2.80016,0.5504 -3.39872,1.14896l-0.45924,0.4214l-54.17828,54.17828c-0.42312,0.42312 -0.74648,0.91848 -0.9632,1.4706l-2.56108,6.56524c-2.42864,6.22124 -5.47648,14.03348 -5.52636,14.15732c-0.13072,0.31992 -0.05676,0.68628 0.1892,0.93224c0.24596,0.24424 0.6106,0.3182 0.93224,0.1892c0.12384,-0.04988 7.93436,-3.09772 14.1556,-5.52636l6.56524,-2.56108c0.55384,-0.215 1.0492,-0.54008 1.4706,-0.9632l54.57044,-54.60828c1.41556,-1.41728 2.54388,-6.02 -2.83112,-11.395c-3.053,-3.05472 -5.85832,-4.00932 -7.96532,-4.00932z" fill="#1f212b"></path><path d="M78.51236,86.6087l1.2162,-1.21624l6.8803,6.88006l-1.2162,1.21624z" fill="#1f212b"></path><path d="M79.15697,87.25329l1.2162,-1.21624l5.58986,5.58967l-1.2162,1.21624z" fill="#1f212b"></path><path d="M146.2,42.14c-0.22016,0 -0.44032,-0.08428 -0.60888,-0.25112l-15.48,-15.48c-0.3354,-0.3354 -0.3354,-0.88064 0,-1.21604c0.3354,-0.3354 0.88064,-0.3354 1.21604,0l15.48,15.48c0.3354,0.3354 0.3354,0.88064 0,1.21604c-0.16684,0.16684 -0.387,0.25112 -0.60716,0.25112zM147.06,29.24c-0.22016,0 -0.44032,-0.08428 -0.60888,-0.25112l-9.46,-9.46c-0.3354,-0.3354 -0.3354,-0.88064 0,-1.21604c0.3354,-0.3354 0.88064,-0.3354 1.21604,0l9.46,9.46c0.3354,0.3354 0.3354,0.88064 0,1.21604c-0.16684,0.16684 -0.387,0.25112 -0.60716,0.25112zM153.08,35.26c-0.22016,0 -0.44032,-0.08428 -0.60888,-0.25112l-2.58,-2.58c-0.3354,-0.3354 -0.3354,-0.88064 0,-1.21604c0.3354,-0.3354 0.88064,-0.3354 1.21604,0l2.58,2.58c0.3354,0.3354 0.3354,0.88064 0,1.21604c-0.16684,0.16684 -0.387,0.25112 -0.60716,0.25112zM149.64,38.7c-0.22016,0 -0.44032,-0.08428 -0.60888,-0.25112l-15.48,-15.48c-0.3354,-0.3354 -0.3354,-0.88064 0,-1.21604c0.3354,-0.3354 0.88064,-0.3354 1.21604,0l15.48,15.48c0.3354,0.3354 0.3354,0.88064 0,1.21604c-0.16684,0.16684 -0.387,0.25112 -0.60716,0.25112z" fill="#1f212b"></path><path d="M100.62,67.08c-0.22016,0 -0.44032,-0.08428 -0.60888,-0.25112c-0.3354,-0.3354 -0.3354,-0.88064 0,-1.21604l35.26,-35.26c0.3354,-0.3354 0.88064,-0.3354 1.21604,0c0.3354,0.3354 0.3354,0.88064 0,1.21604l-35.26,35.26c-0.16684,0.16684 -0.387,0.25112 -0.60716,0.25112zM95.46,82.56c-0.22016,0 -0.44032,-0.08428 -0.60888,-0.25112c-0.3354,-0.3354 -0.3354,-0.88064 0,-1.21604l36.12,-36.12c0.3354,-0.3354 0.88064,-0.3354 1.21604,0c0.3354,0.3354 0.3354,0.88064 0,1.21604l-36.12,36.12c-0.16684,0.16684 -0.387,0.25112 -0.60716,0.25112zM135.02,43c-0.22016,0 -0.44032,-0.08428 -0.60888,-0.25112c-0.3354,-0.3354 -0.3354,-0.88064 0,-1.21604l6.02,-6.02c0.3354,-0.3354 0.88064,-0.3354 1.21604,0c0.3354,0.3354 0.3354,0.88064 0,1.21604l-6.02,6.02c-0.16684,0.16684 -0.387,0.25112 -0.60716,0.25112zM93.74,73.96c-0.22016,0 -0.44032,-0.08428 -0.60888,-0.25112c-0.3354,-0.3354 -0.3354,-0.88064 0,-1.21604l3.44,-3.44c0.3354,-0.3354 0.88064,-0.3354 1.21604,0c0.3354,0.3354 0.3354,0.88064 0,1.21604l-3.44,3.44c-0.16684,0.16684 -0.387,0.25112 -0.60716,0.25112z" fill="#1f212b"></path><path d="M84.53172,71.98821l1.2162,-1.21624l15.48036,15.47982l-1.2162,1.21624z" fill="#1f212b"></path></g></g></g></svg>                                        </button>
                                        </div>
                                    </div>
                            
                                    <?php
                                 
                                        $sth = $pdo->prepare('
                                            select *from tbl_dados a
                                            INNER JOIN tbl_login l on a.da_paciente = l.lo_codigo
                                            where a.da_paciente = :da_paciente '
                                        );

                                        $sth->bindValue(':da_paciente', $p_login);
                                        $sth->execute();
                                        foreach ($sth as $res) :
                                        extract($res);
                                    ?>
                                    <div class="container">
                                    <div class="form-row">
                                        <div class="form-group col-md-12 text-left">
                                            <button type="button" class="btn" data-toggle="modal" data-target=".bd-example-modal-lg2">     
                                                <img src="https://img.icons8.com/material-rounded/24/000000/available-updates.png"/>
                                            </button>
                                        </div>
                                    </div>
                                        <center>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <h5><span class="text-black"><b>Nome: </b><?php 
                                                        $sth = $pdo->prepare('select * from tbl_paciente where p_login = :p_login');
                                                        $sth->bindValue(':p_login', $da_paciente);
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
                                                    <h5><span class="text-black"><div class="form-group col-md-6"> <b>Motivo da Consulta: </b></div> <div class="form-group col-md-6"><?php echo $da_motivo ?></div> </span></h5>
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
                        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">                
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title"><b>Diagnóstico do Paciente</b></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form name="form1" action="insert_ver.php" method="post">
                                        <input name="paciente" type="hidden" value="<?=  $p_login; ?>">
                                        <input name="dados" type="hidden" value="<?=  $da_codigo; ?>">
                                        <?php 
                                            $sth = $pdo->prepare('select *from tbl_medico where me_login = :me_login ');
                                            $sth->bindValue(':me_login', $_SESSION["health"]["id"]);
                                            $sth->execute(); 
                                            $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                                            extract($resultado);
                                        ?>
                                        <input name="medico" type="hidden" value="<?= $me_codigo; ?>">
                                                       
                                        <div class="modal-body">
                                            <div class="container">
                                                <div class="form-group ">
                                                    <center>
                                                        <div class="col-sm-11 text-left" >
                                                            <label for="message-text" class="col-form-label">Diagnóstico:</label>
                                                            <textarea class="form-control"  name="diagnostico"id="message-text"></textarea>
                                                        </div>
                                                    </center>
                                                </div>
                                                <br/>
                                                <div class="form-group row">  
                                                    <label  class="col-sm-1 col-form-label ">Data: </label>
                                                    <div class="col-sm-3  ">
                                                        <input type="date" class="form-control" name="data">
                                                    </div>
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
                                        <h5 class="modal-title"><b>Atualizar Diagnóstico do Paciente</b></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form name="form1" action="update_ver.php" method="post">
                                        <input name="paciente" type="hidden" value="<?=  $id; ?>">
                                        <input name="dados" type="hidden" value="<?=  $da_codigo; ?>">
                                        <?php  
                                            $sth = $pdo->prepare('select *from tbl_medico where me_login = :me_login ');
                                            $sth->bindValue(':me_login', $_SESSION["health"]["id"]);
                                            $sth->execute(); 
                                            $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                                            extract($resultado);
                                        ?>
                                        <input name="medico" type="hidden" value="<?= $me_codigo; ?>"><div class="modal-body">
                                                   
                                        <div class="container">
                                            <div class="form-group ">
                                                <center>
                                                    <div class="col-sm-11 text-left" >
                                                        <label for="message-text" class="col-form-label">Diagnóstico:</label>
                                                        <textarea class="form-control"  name="diagnostico"id="message-text"></textarea>
                                                    </div>
                                                </center>
                                            </div>
                                            <br/>
                                            <div class="form-group row">  
                                                <label  class="col-sm-1 col-form-label ">Data: </label>
                                                <div class="col-sm-3  ">
                                                    <input type="date" class="form-control" name="data">
                                                </div>
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
                        $sth->bindValue(':pr_login', $p_login);
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
                        $sth->bindValue(':pr_login', $p_login);
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
                        $sth->bindValue(':pr_login', $p_login);
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