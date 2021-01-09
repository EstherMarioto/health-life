<?php

include '../../conexao/conexao.php';
   
// comprovante de escolaridade frente 
$idd3 = 3;       
$me_codigo = $_GET['me_codigo'];
$me_comp_esc = $_GET['me_comp_esc'];
$me_comp_esc2 = $_GET['me_comp_esc2'];

$sth = $pdo -> prepare("INSERT INTO tbl_img_dado (im_dado,im_medico,im_detalhe) VALUES (:me_comp_esc, :me_codigo, :idd3)");
     
    $sth->bindValue(':me_comp_esc', $me_comp_esc);
    $sth->bindValue(':me_codigo', $me_codigo);
    $sth->bindValue(':idd3', $idd3);
    $sth->execute();

    header("Location:insert13.php?me_codigo=$me_codigo&&me_comp_esc2=$me_comp_esc2");

    echo $pdo->lastInsertId();
