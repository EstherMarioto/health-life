<?php
include '../conexao/conexao.php';

$pr_moradia= filter_input(INPUT_POST, 'pr_moradia', FILTER_DEFAULT);
$pr_endereco= filter_input(INPUT_POST, 'pr_endereco', FILTER_DEFAULT);
$doencas = filter_input(INPUT_POST, 'oi_doencas', FILTER_DEFAULT);
$comunicacao = filter_input(INPUT_POST, 'oi_comunicacao', FILTER_DEFAULT);
$grupcom = filter_input(INPUT_POST, 'oi_grupos_comunitarios', FILTER_DEFAULT);
$transporte = filter_input(INPUT_POST, 'oi_transporte', FILTER_DEFAULT);
$doenout = filter_input(INPUT_POST, 'oi_do_outro', FILTER_DEFAULT);
$comout = filter_input(INPUT_POST, 'oi_co_outro', FILTER_DEFAULT);
$gruout = filter_input(INPUT_POST, 'oi_gc_outro', FILTER_DEFAULT);

// Prepara a query de inserção
$sth = $pdo->prepare("INSERT INTO tbl_outras_informacoes (oi_doencas,oi_comunicacao,oi_grupos_comunitarios,oi_transporte,oi_do_outro,oi_co_outro,oi_gc_outro) 
VALUE (:oi_doencas, :oi_comunicacao, :oi_grupos_comunitarios, :oi_transporte, :oi_do_outro, :oi_co_outro, :oi_gc_outro)");
// Define os dados
$sth->bindValue(":oi_doencas", ($doencas));
$sth->bindValue(":oi_comunicacao", ($comunicacao));
$sth->bindValue(":oi_grupos_comunitarios", ($grupcom));
$sth->bindValue(":oi_transporte", ($transporte));
$sth->bindValue(":oi_co_outro", ($doenout));
$sth->bindValue(":oi_do_outro", ($comout));
$sth->bindValue(":oi_gc_outro", ($gruout));
// Executa
$sth->execute();
// Retorna o ID do contato inserido
echo $pr_outras = $pdo->lastInsertId();
header("Location:formulario_final.php?pr_moradia=$pr_moradia&&pr_endereco=$pr_endereco&&pr_outras=$pr_outras");
