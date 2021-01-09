<?php

include '../../conexao/conexao.php';

$p_codigo = filter_input(INPUT_POST, 'p_codigo', FILTER_DEFAULT);
$nome = filter_input(INPUT_POST, 'p_nome', FILTER_DEFAULT);
$ocupacao = filter_input(INPUT_POST, 'p_ocupacao', FILTER_DEFAULT);
$genero = filter_input(INPUT_POST, 'p_genero', FILTER_DEFAULT);
$dtnasc = filter_input(INPUT_POST, 'p_dtnasc', FILTER_DEFAULT);
$email = filter_input(INPUT_POST, 'p_email', FILTER_DEFAULT);
$siglas = filter_input(INPUT_POST, 'p_siglas', FILTER_DEFAULT);

$sth = $pdo->prepare("UPDATE tbl_paciente SET p_nome = :p_nome, p_ocupacao = :p_ocupacao, p_genero = :p_genero, p_dtnasc = :p_dtnasc, p_email = :p_email, p_siglas = :p_siglas where p_codigo = :id");

$sth->bindValue(":p_nome",  mb_convert_case($nome, MB_CASE_TITLE, "UTF-8"));
$sth->bindValue(":p_ocupacao",  mb_convert_case($ocupacao, MB_CASE_TITLE, "UTF-8"));
$sth->bindValue(":p_genero",  mb_convert_case($genero, MB_CASE_TITLE, "UTF-8"));
$sth->bindValue(":p_dtnasc",  mb_convert_case($dtnasc, MB_CASE_TITLE, "UTF-8"));
$sth->bindValue(":p_email",  mb_convert_case($email, MB_CASE_TITLE, "UTF-8"));
$sth->bindValue(":p_siglas",  mb_convert_case($siglas, MB_CASE_TITLE, "UTF-8"));

$sth->bindValue(":id", $p_codigo);

$sth->execute();

header("LOCATION:usuario.php");


?>