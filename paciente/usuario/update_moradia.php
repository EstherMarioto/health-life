<?php

include '../../conexao/conexao.php';

$ms_codigo= filter_input(INPUT_POST, 'ms_codigo', FILTER_DEFAULT);
$tipocasa = filter_input(INPUT_POST, 'ms_tipocasa', FILTER_DEFAULT);
$destlixo = filter_input(INPUT_POST, 'ms_destlixo', FILTER_DEFAULT);
$tratagua = filter_input(INPUT_POST, 'ms_tratamentoagua', FILTER_DEFAULT);
$abagua = filter_input(INPUT_POST, 'ms_abastecimentoagua', FILTER_DEFAULT);
$dfezes = filter_input(INPUT_POST, 'ms_destinofezes', FILTER_DEFAULT);
$numcom = filter_input(INPUT_POST, 'ms_numerocomodos', FILTER_DEFAULT);
$energia = filter_input(INPUT_POST, 'ms_energia', FILTER_DEFAULT);



$sth = $pdo->prepare("UPDATE tbl_moradia_saneamento SET ms_tipocasa = :ms_tipocasa, ms_destlixo = :ms_destlixo, ms_tratamentoagua = :ms_tratamentoagua, ms_abastecimentoagua = :ms_abastecimentoagua, ms_destinofezes = :ms_destinofezes, ms_numerocomodos = :ms_numerocomodos, ms_energia = :ms_energia  where ms_codigo = :id");

$sth->bindValue(":ms_tipocasa",  mb_convert_case($tipocasa, MB_CASE_TITLE, "UTF-8"));
$sth->bindValue(":ms_destlixo",  mb_convert_case($destlixo, MB_CASE_TITLE, "UTF-8"));
$sth->bindValue(":ms_tratamentoagua",  mb_convert_case($tratagua, MB_CASE_TITLE, "UTF-8"));
$sth->bindValue(":ms_abastecimentoagua",  mb_convert_case($abagua, MB_CASE_TITLE, "UTF-8"));
$sth->bindValue(":ms_destinofezes",  mb_convert_case($dfezes, MB_CASE_TITLE, "UTF-8"));
$sth->bindValue(":ms_numerocomodos",  mb_convert_case($numcom, MB_CASE_TITLE, "UTF-8"));
$sth->bindValue(":ms_energia",  mb_convert_case($energia, MB_CASE_TITLE, "UTF-8"));
$sth->bindValue(":id", $ms_codigo);

$sth->execute();

header("LOCATION:usuario.php");


?>