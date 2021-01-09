<?php
include '../conexao/conexao.php';

$pr_moradia= filter_input(INPUT_POST, 'pr_moradia', FILTER_DEFAULT);
$cep = filter_input(INPUT_POST, 'en_cep', FILTER_DEFAULT);
$rua = filter_input(INPUT_POST, 'en_rua', FILTER_DEFAULT);
$numero = filter_input(INPUT_POST, 'en_numero', FILTER_DEFAULT);
$bairro = filter_input(INPUT_POST, 'en_bairro', FILTER_DEFAULT);
$cidade = filter_input(INPUT_POST, 'en_cidade', FILTER_DEFAULT);
$uf = filter_input(INPUT_POST, 'en_uf', FILTER_DEFAULT);

// Prepara a query de inserção
$sth = $pdo->prepare("INSERT INTO tbl_endereco (en_cep,en_rua,en_numero,en_bairro,en_cidade,en_uf)
VALUE (:en_cep,:en_rua,:en_numero,:en_bairro,:en_cidade,:en_uf)");
// Define os dados
$sth->bindValue(":en_cep", $cep);
$sth->bindValue(":en_rua", $rua);
$sth->bindValue(":en_numero", $numero);
$sth->bindValue(":en_bairro", $bairro);
$sth->bindValue(":en_cidade", $cidade);
$sth->bindValue(":en_uf", $uf);

// Executa
$sth->execute();
echo $pr_endereco = $pdo->lastInsertId();
header ("LOCATION: formulario_outras.php?pr_moradia=$pr_moradia&&pr_endereco=$pr_endereco");
