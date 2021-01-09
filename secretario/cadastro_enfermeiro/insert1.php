<?php

include '../../conexao/conexao.php';
//foto
$idd9 = 9;
$en_codigo = $_GET['en_codigo'];
$en_foto = $_GET['en_foto'];
$en_comp_residencia = $_GET['en_comp_residencia'];
$en_comp_escolaridade = $_GET['en_comp_escolaridade'];
$en_comp_escolaridade2 = $_GET['en_comp_escolaridade2'];
$en_comp_rg = $_GET['en_comp_rg'];
$en_comp_rg2 = $_GET['en_comp_rg2'];

  
$sth = $pdo -> prepare("INSERT INTO tbl_img_dado (im_dado,im_enfermeiro,im_detalhe) VALUES (:en_foto, :en_codigo,:idd9)");
     
   
    $sth->bindValue(':en_foto', $en_foto);
    $sth->bindValue(':en_codigo', $en_codigo);
    $sth->bindValue(':idd9', $idd9);
    $sth->execute();

header("Location:insert2.php?en_codigo=$en_codigo&&en_comp_residencia=$en_comp_residencia&&en_comp_escolaridade=$en_comp_escolaridade&&en_comp_escolaridade2=$en_comp_escolaridade2&&en_comp_rg=$en_comp_rg&&en_comp_rg2=$en_comp_rg2");

    echo $pdo->lastInsertId();







?>