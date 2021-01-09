<?php

include '../../conexao/conexao.php';
   
// comprovante de escolaridade verso
$idd13 = 13;       
$me_codigo = $_GET['me_codigo'];
$me_comp_esc = $_GET['me_comp_esc'];
$me_comp_esc2 = $_GET['me_comp_esc2'];

$sth = $pdo -> prepare("INSERT INTO tbl_img_dado (im_dado,im_medico,im_detalhe) VALUES (:me_comp_esc2, :me_codigo, :idd13)");
     
    $sth->bindValue(':me_comp_esc2', $me_comp_esc2);
    $sth->bindValue(':me_codigo', $me_codigo);
    $sth->bindValue(':idd13', $idd13);
    $sth->execute();


    header("Location:../pesquisar/pesquisas.php");

   
    echo $pdo->lastInsertId();
