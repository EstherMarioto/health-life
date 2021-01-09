<?php

include '../../conexao/conexao.php';
// Titulo de eleitor frente
$idd4 = 4;      
$me_codigo = $_GET['me_codigo'];
$me_titulo_eleitor = $_GET['me_titulo_eleitor'];
$me_titulo_eleitor2 = $_GET['me_titulo_eleitor2'];
$me_certidao_cas = $_GET['me_certidao_cas'];
$me_doc_pis = $_GET['me_doc_pis'];
$me_car_trab  = $_GET['me_car_trab'];
$me_car_trab2  = $_GET['me_car_trab2'];
$me_declaracao_bens  = $_GET['me_declaracao_bens'];
$me_comp_esc = $_GET['me_comp_esc'];
$me_comp_esc2 = $_GET['me_comp_esc2'];

$sth = $pdo -> prepare("INSERT INTO tbl_img_dado (im_dado,im_medico,im_detalhe) VALUES(:me_titulo_eleitor, :me_codigo, :idd4)");
     
    $sth->bindValue(':me_titulo_eleitor', $me_titulo_eleitor);
    $sth->bindValue(':me_codigo', $me_codigo);
    $sth->bindValue(':idd4', $idd4);
    $sth->execute();

    header("Location:insert6.php?me_codigo=$me_codigo&&me_titulo_eleitor2=$me_titulo_eleitor2&&me_certidao_cas=$me_certidao_cas&&me_doc_pis=$me_doc_pis&&me_car_trab=$me_car_trab&&me_car_trab2=$me_car_trab2&&me_declaracao_bens=$me_declaracao_bens&&me_comp_esc=$me_comp_esc&&me_comp_esc2=$me_comp_esc2");  
  
    echo $pdo->lastInsertId();
