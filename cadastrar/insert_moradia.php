<?php
include '../conexao/conexao.php';

$tipocasa = filter_input(INPUT_POST, 'ms_tipocasa', FILTER_DEFAULT);
$destlixo = filter_input(INPUT_POST, 'ms_destlixo', FILTER_DEFAULT);
$tratagua = filter_input(INPUT_POST, 'ms_tratamentoagua', FILTER_DEFAULT);
$abagua = filter_input(INPUT_POST, 'ms_abastecimentoagua', FILTER_DEFAULT);
$dfezes = filter_input(INPUT_POST, 'ms_destinofezes', FILTER_DEFAULT);
$numcom = filter_input(INPUT_POST, 'ms_numerocomodos', FILTER_DEFAULT);
$energia = filter_input(INPUT_POST, 'ms_energia', FILTER_DEFAULT);
$caoutro = filter_input(INPUT_POST, 'ms_ca_outro', FILTER_DEFAULT);
$aboutro = filter_input(INPUT_POST, 'ms_ab_outro', FILTER_DEFAULT);


// Prepara a query de inserção
$sth = $pdo->prepare("INSERT INTO tbl_moradia_saneamento (ms_tipocasa,ms_destlixo,ms_tratamentoagua,ms_abastecimentoagua,ms_destinofezes,ms_numerocomodos,ms_energia,ms_ca_outro,ms_ab_outro) VALUE (:ms_tipocasa, :ms_destlixo, :ms_tratamentoagua, :ms_abastecimentoagua, :ms_destinofezes, :ms_numerocomodos, :ms_energia, :ms_ca_outro, :ms_ab_outro)");
// Define os dados
$sth->bindValue(":ms_tipocasa", ($tipocasa));
$sth->bindValue(":ms_destlixo", ($destlixo));
$sth->bindValue(":ms_tratamentoagua", ($tratagua));
$sth->bindValue(":ms_abastecimentoagua", ($abagua));
$sth->bindValue(":ms_destinofezes", ($dfezes));
$sth->bindValue(":ms_numerocomodos", ($numcom));
$sth->bindValue(":ms_energia", ($energia));
$sth->bindValue(":ms_ca_outro", ($caoutro));
$sth->bindValue(":ms_ab_outro", ($aboutro));
// Executa
$sth->execute();
// Retorna o ID do contato inserido
echo $pr_moradia = $pdo->lastInsertId();
header("Location:formulario_endereco.php?pr_moradia=$pr_moradia");
