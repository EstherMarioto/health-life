<?php

include '../../conexao/conexao.php';


$lo_codigo = filter_input(INPUT_GET, 'lo_codigo', FILTER_DEFAULT);
$p_codigo = filter_input(INPUT_GET, 'p_codigo', FILTER_DEFAULT);

$sth=$pdo->prepare("UPDATE tbl_paciente SET p_login = :lo_codigo where p_codigo = :p_codigo");
     
    $sth->bindValue(':lo_codigo', $lo_codigo);
    $sth->bindValue(':p_codigo', $p_codigo);

    $sth->execute();
    echo $pdo->lastInsertId();

header ("LOCATION:prontuario.php?p_codigo=$p_codigo&&lo_codigo=$lo_codigo");

