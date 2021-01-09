<?php

include '../../../conexao/conexao.php';

$en_codigo = filter_input(INPUT_POST, 'en_codigo', FILTER_DEFAULT);
$RG = filter_input(INPUT_POST, 'en_RG', FILTER_DEFAULT);
$CPF = filter_input(INPUT_POST, 'en_CPF', FILTER_DEFAULT);
$telefone = filter_input(INPUT_POST, 'en_telefone', FILTER_DEFAULT);
$aprov_exame = filter_input(INPUT_POST, 'en_aprov_exame', FILTER_DEFAULT);



$sth = $pdo->prepare("UPDATE tbl_enfermeiro SET en_RG = :en_RG, en_CPF = :en_CPF, en_telefone = :en_telefone, en_aprov_exame = :en_aprov_exame where en_codigo = :id");

$sth->bindValue(":en_RG", $RG);
$sth->bindValue(":en_CPF", $CPF);
$sth->bindValue(":en_telefone", $telefone);
$sth->bindValue(":en_aprov_exame",$aprov_exame);



$sth->bindValue(":id", $en_codigo);

$sth->execute();

header("LOCATION:../usuario.php");


?>