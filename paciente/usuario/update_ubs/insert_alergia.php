<?php

include '../../../conexao/conexao.php';

$al_codigo = filter_input(INPUT_POST, 'al_codigo', FILTER_DEFAULT);
$al_tipo = filter_input(INPUT_POST, 'al_tipo', FILTER_DEFAULT);
$al_paciente = filter_input(INPUT_POST, 'al_paciente', FILTER_DEFAULT);

    $sth=$pdo->prepare("INSERT INTO tbl_alergia (al_codigo, al_tipo, al_paciente) VALUES (:al_codigo, :al_tipo, :al_paciente)");

    $sth->bindValue(':al_codigo', $al_codigo);
    $sth->bindValue(':al_tipo', $al_tipo);
    $sth->bindValue(':al_paciente', $al_paciente);

    $sth->execute();
    
    header("Location:../usuario_ubs.php");

    echo $pdo->lastInsertId();

    ?>