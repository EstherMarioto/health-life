<?php

include '../../conexao/conexao.php';

$oi_cod= filter_input(INPUT_POST, 'oi_cod', FILTER_DEFAULT);
$doencas = filter_input(INPUT_POST, 'oi_doencas', FILTER_DEFAULT);
$comunitario = filter_input(INPUT_POST, 'oi_grupos_comunitarios', FILTER_DEFAULT);
$transporte = filter_input(INPUT_POST, 'oi_transporte', FILTER_DEFAULT);
$comunicacao = filter_input(INPUT_POST, 'oi_comunicacao', FILTER_DEFAULT);


$sth = $pdo->prepare("UPDATE tbl_outras_informacoes SET oi_doencas = :oi_doencas, oi_grupos_comunitarios = :oi_grupos_comunitarios, oi_transporte = :oi_transporte, oi_comunicacao = :oi_comunicacao  where oi_cod = :id");

$sth->bindValue(":oi_doencas",$doencas);
$sth->bindValue(":oi_grupos_comunitarios", $comunitario);
$sth->bindValue(":oi_transporte",$transporte);
$sth->bindValue(":oi_comunicacao", $comunicacao);
$sth->bindValue(":id", $oi_cod);

$sth->execute();

header("LOCATION:usuario.php");


?>