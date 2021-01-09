<?php

include '../conexao/conexao.php';
//foto
$idd9 = 9;
$p_cod = $_GET['p_cod'];
$pa_foto = $_GET['pa_foto'];
$id = $_GET['id'];
$sth = $pdo -> prepare("INSERT INTO tbl_img_dado (im_dado,im_pac_ubs,im_detalhe) VALUES (:pa_foto, :p_cod,:idd9)");
        
    $sth->bindValue(':pa_foto', $pa_foto);
    $sth->bindValue(':p_cod', $p_cod);
    $sth->bindValue(':idd9', $idd9);
    $sth->execute();
    echo $pdo->lastInsertId();

header("Location:formulario_senha_ubs.php?p_cod=$p_cod"); 

?>