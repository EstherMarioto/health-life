<?php

include '../../conexao/conexao.php';
//Comprovante de residencia   
$idd1 = 1;
$en_codigo = $_GET['en_codigo'];
$en_comp_residencia = $_GET['en_comp_residencia'];
$en_comp_escolaridade = $_GET['en_comp_escolaridade'];
$en_comp_escolaridade2 = $_GET['en_comp_escolaridade2'];
$en_comp_rg = $_GET['en_comp_rg'];
$en_comp_rg2 = $_GET['en_comp_rg2'];
  
$sth = $pdo -> prepare("INSERT INTO tbl_img_dado (im_dado,im_enfermeiro,im_detalhe) VALUES (:en_comp_residencia, :en_codigo,:idd1)");
     
   
    $sth->bindValue(':en_comp_residencia', $en_comp_residencia);
    $sth->bindValue(':en_codigo', $en_codigo);
    $sth->bindValue(':idd1', $idd1);
    $sth->execute();

   header("Location:insert3.php?en_codigo=$en_codigo&&en_comp_escolaridade=$en_comp_escolaridade&&en_comp_escolaridade2=$en_comp_escolaridade2&&en_comp_rg=$en_comp_rg&&en_comp_rg2=$en_comp_rg2");

    echo $pdo->lastInsertId();







?>