<?php

include '../../conexao/conexao.php';

$pr_codigo = filter_input(INPUT_POST, 'pr_codigo', FILTER_DEFAULT);
$plano = filter_input(INPUT_POST, 'pr_possui_plano', FILTER_DEFAULT);
$beneficio = filter_input(INPUT_POST, 'pr_benef_bolsa_familia', FILTER_DEFAULT);
$unico = filter_input(INPUT_POST, 'pr_cadast_unico', FILTER_DEFAULT);
$observacoes = filter_input(INPUT_POST, 'pr_observacoes', FILTER_DEFAULT);


$sth = $pdo->prepare("UPDATE tbl_prontuario SET pr_possui_plano = :pr_possui_plano, pr_benef_bolsa_familia = :pr_benef_bolsa_familia, pr_cadast_unico = :pr_cadast_unico, pr_observacoes = :pr_observacoes where pr_codigo = :id");

$sth->bindValue(":pr_possui_plano",  mb_convert_case($plano, MB_CASE_TITLE, "UTF-8"));
$sth->bindValue(":pr_benef_bolsa_familia",  mb_convert_case($beneficio, MB_CASE_TITLE, "UTF-8"));
$sth->bindValue(":pr_cadast_unico",  mb_convert_case($unico, MB_CASE_TITLE, "UTF-8"));
$sth->bindValue(":pr_observacoes",  mb_convert_case($observacoes, MB_CASE_TITLE, "UTF-8"));


$sth->bindValue(":id", $pr_codigo);

$sth->execute();

header("LOCATION:usuario.php");


?>