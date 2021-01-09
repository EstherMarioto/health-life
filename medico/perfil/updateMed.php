<?php

include '../../conexao/conexao.php';

$me_codigo = filter_input(INPUT_POST, 'me_codigo', FILTER_DEFAULT);
$nome = filter_input(INPUT_POST, 'me_nome', FILTER_DEFAULT);
$dtnasc = filter_input(INPUT_POST, 'me_dt_nasc', FILTER_DEFAULT);
$genero = filter_input(INPUT_POST, 'me_genero', FILTER_DEFAULT);
$email = filter_input(INPUT_POST, 'me_email', FILTER_DEFAULT);



$sth = $pdo->prepare("UPDATE tbl_medico SET me_nome = :me_nome, me_dt_nasc = :me_dt_nasc, me_genero = :me_genero, me_email = :me_email where me_codigo = :id");

$sth->bindValue(":me_nome",  mb_convert_case($nome, MB_CASE_TITLE, "UTF-8"));
$sth->bindValue(":me_dt_nasc",  mb_convert_case($dtnasc, MB_CASE_TITLE, "UTF-8"));
$sth->bindValue(":me_genero",  mb_convert_case($genero, MB_CASE_TITLE, "UTF-8"));
$sth->bindValue(":me_email",  mb_convert_case($email, MB_CASE_TITLE, "UTF-8"));



$sth->bindValue(":id", $me_codigo);

$sth->execute();

header("LOCATION:usuario.php");


?>