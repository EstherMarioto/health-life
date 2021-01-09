<?php

include '../../conexao/conexao.php';

$con_codigo = filter_input(INPUT_POST, 'con_codigo', FILTER_DEFAULT);
$con_assunto = filter_input(INPUT_POST, 'con_assunto', FILTER_DEFAULT);
$con_mensagem = filter_input(INPUT_POST, 'con_mensagem', FILTER_DEFAULT);
$con_data = filter_input(INPUT_POST, 'con_data', FILTER_DEFAULT);
$con_paciente = filter_input(INPUT_POST, 'con_paciente', FILTER_DEFAULT);
$con_unidade = filter_input(INPUT_POST, 'con_unidade', FILTER_DEFAULT);

    $sth=$pdo->prepare("INSERT INTO tbl_contato (con_codigo,con_assunto,con_mensagem,con_data,con_paciente,con_unidade) VALUES (:con_codigo, :con_assunto, :con_mensagem, :con_data, :con_paciente, :con_unidade)");
    
    $sth->bindValue(':con_codigo', $con_codigo);
    $sth->bindValue(':con_assunto', $con_assunto);
    $sth->bindValue(':con_mensagem', $con_mensagem);
    $sth->bindValue(':con_data', $con_data);
    $sth->bindValue(':con_paciente', $con_paciente);
    $sth->bindValue(':con_unidade', $con_unidade);
    
    $sth->execute();

    header("Location:addContato.php");

    echo $pdo->lastInsertId();

    ?>
   