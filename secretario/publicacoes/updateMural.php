<?php

include '../../conexao/conexao.php';

$mu_codigo = filter_input(INPUT_POST, 'mu_codigo', FILTER_DEFAULT);
$tipo = filter_input(INPUT_POST, 'mu_tipo', FILTER_DEFAULT);
$titulo = filter_input(INPUT_POST, 'mu_titulo', FILTER_DEFAULT);
$assunto = filter_input(INPUT_POST, 'mu_assunto', FILTER_DEFAULT);
$data = filter_input(INPUT_POST, 'mu_data', FILTER_DEFAULT);

$sth = $pdo->prepare("UPDATE tbl_mural SET  mu_tipo = :mu_tipo, mu_titulo = :mu_titulo, mu_assunto = :mu_assunto, mu_data = :mu_data  where mu_codigo = :mu_codigo");


$sth->bindValue(":mu_tipo",  mb_convert_case($tipo, MB_CASE_TITLE, "UTF-8"));
$sth->bindValue(":mu_titulo",  mb_convert_case($titulo, MB_CASE_TITLE, "UTF-8"));
$sth->bindValue(":mu_assunto",  mb_convert_case($assunto, MB_CASE_TITLE, "UTF-8"));
$sth->bindValue(":mu_data",  mb_convert_case($data, MB_CASE_TITLE, "UTF-8"));




$sth->bindValue(":mu_codigo", $mu_codigo);

$sth->execute();

header("LOCATION:publicacoes.php");


?>