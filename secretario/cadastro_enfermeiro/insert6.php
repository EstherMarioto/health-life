<?php

include '../../conexao/conexao.php';
// comprovante de rg verso
$idd12 = 12;
$en_codigo = $_GET['en_codigo'];
$en_comp_rg2 = $_GET['en_comp_rg2'];
  
$sth = $pdo -> prepare("INSERT INTO tbl_img_dado (im_dado,im_enfermeiro,im_detalhe) VALUES (:en_comp_rg2, :en_codigo,:idd12)");
     
   
    $sth->bindValue(':en_comp_rg2', $en_comp_rg2);
    $sth->bindValue(':en_codigo', $en_codigo);
    $sth->bindValue(':idd12', $idd12);
    $sth->execute();

    header("Location:../pesquisar/pesquisas.php");

    echo $pdo->lastInsertId();







?>