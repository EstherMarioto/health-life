<?php
include '../../conexao/conexao.php';

$se_senha = filter_input(INPUT_GET, 'se_senha', FILTER_DEFAULT);
$se_login = filter_input(INPUT_GET, 'se_login', FILTER_DEFAULT);
$se_unidade = filter_input(INPUT_GET, 'se_unidade', FILTER_DEFAULT);
$secretario = filter_input(INPUT_GET, 'secretario', FILTER_DEFAULT);
$tipo = 3;

$sth = $pdo -> prepare("INSERT INTO tbl_login (lo_numero,lo_senha,lo_tipo,lo_unidade) VALUES (:lo_numero,:lo_senha,:lo_tipo,:lo_unidade)");
     
    $sth->bindValue(':lo_numero',$se_login);
    $sth->bindValue(':lo_senha',MD5($se_senha));
    $sth->bindValue(':lo_tipo', $tipo);
    $sth->bindValue(':lo_unidade', $se_unidade);
    $sth->execute();

    echo $lo_codigo = $pdo ->lastInsertId();

   header("Location:update_login.php?lo_codigo=$lo_codigo&&secretario=$secretario");

