<?php

include '../../conexao/conexao.php';
   
// Carteira de Trabalho Verso 
$idd11 = 11;       
$me_codigo = $_GET['me_codigo'];
$me_car_trab2  = $_GET['me_car_trab2'];
$me_declaracao_bens  = $_GET['me_declaracao_bens'];
$me_comp_esc = $_GET['me_comp_esc'];
$me_comp_esc2 = $_GET['me_comp_esc2'];

$sth = $pdo -> prepare("INSERT INTO tbl_img_dado (im_dado,im_medico,im_detalhe)VALUES (:me_car_trab2, :me_codigo, :idd11)");
     
    $sth->bindValue(':me_car_trab2', $me_car_trab2);
    $sth->bindValue(':me_codigo', $me_codigo);
    $sth->bindValue(':idd11', $idd11);
    $sth->execute();

    header("Location:insert11.php?me_codigo=$me_codigo&&me_declaracao_bens=$me_declaracao_bens&&me_comp_esc=$me_comp_esc&&me_comp_esc2=$me_comp_esc2");  
  
    echo $pdo->lastInsertId();
