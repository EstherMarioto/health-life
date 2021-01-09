<?php

include '../conexao/conexao.php';
//foto
$idd9 = 9;
$p_codigo = $_GET['p_codigo'];
$pac_foto = $_GET['pac_foto'];
$p_prontuario = $_GET['p_prontuario'];

  
$sth = $pdo -> prepare("INSERT INTO tbl_img_dado (im_dado,im_paciente,im_detalhe) VALUES (:pac_foto, :p_codigo,:idd9)");
     
   
    $sth->bindValue(':pac_foto', $pac_foto);
    $sth->bindValue(':p_codigo', $p_codigo);
    $sth->bindValue(':idd9', $idd9);
    $sth->execute();
    echo $pdo->lastInsertId();
header ("LOCATION: pergunta.php?p_prontuario=$p_prontuario&&p_codigo=$p_codigo");