<?php

include '../../conexao/conexao.php';


$lo_codigo = filter_input(INPUT_GET, 'lo_codigo', FILTER_DEFAULT);
$p_cod = filter_input(INPUT_GET, 'p_cod', FILTER_DEFAULT);

$sth=$pdo->prepare("UPDATE tbl_paciente_ubs SET p_loginn = :lo_codigo where p_codigo = :p_cod");
     
   
    $sth->bindValue(':lo_codigo', $lo_codigo);
    $sth->bindValue(':p_cod', $p_cod);
  
    $sth->execute();
    echo $pdo->lastInsertId();

header ("LOCATION:endereco_ubs.php?p_cod=$p_cod&&lo_codigo=$lo_codigo");
