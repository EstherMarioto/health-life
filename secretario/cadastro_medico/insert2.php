﻿<?php

include '../../conexao/conexao.php';
// comprovante de rg frente
$idd2 = 2;   
$me_codigo = $_GET['me_codigo'];
$me_comp = $_GET['me_comp'];
$me_comp_rg2 = $_GET['me_comp_rg2'];
$me_comp_residencia = $_GET['me_comp_residencia'];
$me_titulo_eleitor = $_GET['me_titulo_eleitor'];
$me_titulo_eleitor2 = $_GET['me_titulo_eleitor2'];
$me_certidao_cas = $_GET['me_certidao_cas'];
$me_doc_pis = $_GET['me_doc_pis'];
$me_car_trab  = $_GET['me_car_trab'];
$me_car_trab2  = $_GET['me_car_trab2'];
$me_declaracao_bens  = $_GET['me_declaracao_bens'];
$me_comp_esc = $_GET['me_comp_esc'];
$me_comp_esc2 = $_GET['me_comp_esc2'];

$sth = $pdo -> prepare("INSERT INTO tbl_img_dado (im_dado,im_medico,im_detalhe) VALUES (:me_comp, :me_codigo,:idd2)");
     
    $sth->bindValue(':me_comp', $me_comp);
    $sth->bindValue(':me_codigo', $me_codigo);
    $sth->bindValue(':idd2', $idd2);
    $sth->execute();

    header("Location:insert3.php?me_codigo=$me_codigo&&me_comp_rg2=$me_comp_rg2&&me_comp_residencia=$me_comp_residencia&&me_titulo_eleitor=$me_titulo_eleitor&&me_titulo_eleitor2=$me_titulo_eleitor2&&me_certidao_cas=$me_certidao_cas&&me_doc_pis=$me_doc_pis&&me_car_trab=$me_car_trab&&me_car_trab2=$me_car_trab2&&me_declaracao_bens=$me_declaracao_bens&&me_comp_esc=$me_comp_esc&&me_comp_esc2=$me_comp_esc2");  
    
    echo $pdo->lastInsertId();



     
    
    
    
