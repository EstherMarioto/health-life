<?php

include '../../../conexao/conexao.php';

$p_codigo = filter_input(INPUT_POST, 'p_codigo', FILTER_DEFAULT);
$p_sus = filter_input(INPUT_POST, 'p_sus', FILTER_DEFAULT);
$p_RG = filter_input(INPUT_POST, 'p_RG', FILTER_DEFAULT);
$p_CPF = filter_input(INPUT_POST, 'p_CPF', FILTER_DEFAULT);

$sth = $pdo->prepare("UPDATE tbl_paciente_ubs SET p_cartao_sus = :p_sus, p_RG = :p_RG, p_CPF = :p_CPF where p_codigo = :id");

$sth->bindValue(":p_sus", $p_sus);
$sth->bindValue(":p_RG", $p_RG);
$sth->bindValue(":p_CPF", $p_CPF);
$sth->bindValue(":id", $p_codigo);

$sth->execute();

header("LOCATION:../usuario_ubs.php");


?>