<?php
include '../../conexao/conexao.php';

$lo_codigo = filter_input(INPUT_GET, 'lo_codigo', FILTER_DEFAULT);
$secretario = filter_input(INPUT_GET, 'secretario', FILTER_DEFAULT);

$sth=$pdo->prepare("UPDATE tbl_secretario SET se_login = :lo_codigo where se_codigo = :secretario");
     
   
    $sth->bindValue(':lo_codigo', $lo_codigo);
    $sth->bindValue(':secretario', $secretario);
  
    $sth->execute();
    echo $pdo->lastInsertId();

header ("LOCATION:../../index.php");
