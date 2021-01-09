<?php

include '../../../conexao/conexao.php';

$p_codigo = filter_input(INPUT_POST, 'p_codigo', FILTER_DEFAULT);
$nome = filter_input(INPUT_POST, 'p_nome', FILTER_DEFAULT);
$p_dtnasc = filter_input(INPUT_POST, 'p_dtnasc', FILTER_DEFAULT);
$p_genero = filter_input(INPUT_POST, 'p_genero', FILTER_DEFAULT);
$p_nome_mae = filter_input(INPUT_POST, 'p_nome_mae', FILTER_DEFAULT);
$p_nome_pai = filter_input(INPUT_POST, 'p_nome_pai', FILTER_DEFAULT);
$p_sus = filter_input(INPUT_POST, 'p_sus', FILTER_DEFAULT);
$p_RG = filter_input(INPUT_POST, 'p_RG', FILTER_DEFAULT);
$p_CPF = filter_input(INPUT_POST, 'p_CPF', FILTER_DEFAULT);
$email = filter_input(INPUT_POST, 'p_email', FILTER_DEFAULT);


$sth = $pdo->prepare("UPDATE tbl_paciente_ubs SET p_nome = :p_nome, p_dtnasc = :p_dtnasc, p_genero = :p_genero, p_nome_mae = :p_nome_mae, p_nome_pai = :p_nome_pai,p_cartao_sus = :p_sus, p_RG = :p_RG, p_CPF = :p_CPF, p_email = :p_email where p_codigo = :id");

$sth->bindValue(":p_nome", $nome);
$sth->bindValue(":p_dtnasc", $p_dtnasc);
$sth->bindValue(":p_genero", $p_genero);
$sth->bindValue(":p_nome_mae", $p_nome_mae);
$sth->bindValue(":p_nome_pai", $p_nome_pai);
$sth->bindValue(":p_sus", $p_sus);
$sth->bindValue(":p_RG", $p_RG);
$sth->bindValue(":p_CPF", $p_CPF);
$sth->bindValue(":p_email", $email);
$sth->bindValue(":id", $p_codigo);

$sth->execute();

header("LOCATION:../usuario_ubs.php");


?>