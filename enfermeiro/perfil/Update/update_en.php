<?php

include '../../../conexao/conexao.php';

$en_codigo = filter_input(INPUT_POST, 'en_codigo', FILTER_DEFAULT);
$nome = filter_input(INPUT_POST, 'en_nome', FILTER_DEFAULT);
$genero = filter_input(INPUT_POST, 'en_genero', FILTER_DEFAULT);
$dt_nasc = filter_input(INPUT_POST, 'en_dt_nasc', FILTER_DEFAULT);
$email = filter_input(INPUT_POST, 'en_email', FILTER_DEFAULT);


$sth = $pdo->prepare("UPDATE tbl_enfermeiro SET en_nome = :en_nome, en_genero = :en_genero, en_dt_nasc = :en_dt_nasc, en_email = :en_email where en_codigo = :id");

$sth->bindValue(":en_nome",  mb_convert_case($nome, MB_CASE_TITLE, "UTF-8"));
$sth->bindValue(":en_genero",$genero);
$sth->bindValue(":en_dt_nasc", $dt_nasc);
$sth->bindValue(":en_email",$email);


$sth->bindValue(":id", $en_codigo);

$sth->execute();

header("LOCATION:../usuario.php");


?>