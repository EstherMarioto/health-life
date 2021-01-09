<?php

include '../../conexao/conexao.php';
   
// Imposto de renda 
$idd8 = 8;       
$me_codigo = $_GET['me_codigo'];
$me_declaracao_bens  = $_GET['me_declaracao_bens'];
$me_comp_esc = $_GET['me_comp_esc'];
$me_comp_esc2 = $_GET['me_comp_esc2'];

$sth = $pdo -> prepare("INSERT INTO tbl_img_dado (im_dado,im_medico,im_detalhe) VALUES (:me_declaracao_bens, :me_codigo, :idd8)");
     

    $sth->bindValue(':me_declaracao_bens', $me_declaracao_bens);
    $sth->bindValue(':me_codigo', $me_codigo);
    $sth->bindValue(':idd8', $idd8);
    $sth->execute();

    header("Location:insert12.php?me_codigo=$me_codigo&&me_comp_esc=$me_comp_esc&&me_comp_esc2=$me_comp_esc2");  
  
    echo $pdo->lastInsertId();
