<?php

include '../../conexao/conexao.php';

$me_codigo = filter_input(INPUT_POST, 'me_codigo', FILTER_DEFAULT);
$RG = filter_input(INPUT_POST, 'me_RG', FILTER_DEFAULT);
$CPF = filter_input(INPUT_POST, 'me_CPF', FILTER_DEFAULT);
$especialidade= filter_input(INPUT_POST, 'me_especialidade', FILTER_DEFAULT);
$aprov_exame= filter_input(INPUT_POST, 'me_aprov_exame', FILTER_DEFAULT);





$sth = $pdo->prepare("UPDATE tbl_medico SET me_RG = :me_RG, me_CPF = :me_CPF, me_especialidade = :me_especialidade, me_aprov_exame = :me_aprov_exame  where me_codigo = :id");

$sth->bindValue(":me_RG",  mb_convert_case($RG, MB_CASE_TITLE, "UTF-8"));
$sth->bindValue(":me_CPF",  mb_convert_case($CPF, MB_CASE_TITLE, "UTF-8"));
$sth->bindValue(":me_especialidade",  mb_convert_case($especialidade, MB_CASE_TITLE, "UTF-8"));
$sth->bindValue(":me_aprov_exame",  mb_convert_case($aprov_exame, MB_CASE_TITLE, "UTF-8"));




$sth->bindValue(":id", $me_codigo);

$sth->execute();

header("LOCATION:usuario.php");


?>