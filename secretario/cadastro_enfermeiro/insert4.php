<?php

include '../../conexao/conexao.php';
 // comprovante de escolaridade verso 
$idd13 = 13;
$en_codigo = $_GET['en_codigo'];
$en_comp_escolaridade2 = $_GET['en_comp_escolaridade2'];
$en_comp_rg = $_GET['en_comp_rg'];
$en_comp_rg2 = $_GET['en_comp_rg2'];
  
$sth = $pdo -> prepare("INSERT INTO tbl_img_dado (im_dado,im_enfermeiro,im_detalhe) VALUES (:en_comp_escolaridade2, :en_codigo,:idd13)");
     
   
    $sth->bindValue(':en_comp_escolaridade2', $en_comp_escolaridade2);
    $sth->bindValue(':en_codigo', $en_codigo);
    $sth->bindValue(':idd13', $idd13);
    $sth->execute();

   header("Location:insert5.php?en_codigo=$en_codigo&&en_comp_rg=$en_comp_rg&&en_comp_rg2=$en_comp_rg2");

    echo $pdo->lastInsertId();







?>