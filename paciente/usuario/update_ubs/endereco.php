<?php
include '../../../conexao/conexao.php';
$en_login= filter_input(INPUT_POST, 'en_login', FILTER_DEFAULT);
$cep = filter_input(INPUT_POST, 'en_cep', FILTER_DEFAULT);
$rua = filter_input(INPUT_POST, 'en_rua', FILTER_DEFAULT);
$numero = filter_input(INPUT_POST, 'en_numero', FILTER_DEFAULT);
$bairro = filter_input(INPUT_POST, 'en_bairro', FILTER_DEFAULT);
$cidade = filter_input(INPUT_POST, 'en_cidade', FILTER_DEFAULT);
$uf = filter_input(INPUT_POST, 'en_uf', FILTER_DEFAULT);

// Prepara a query de inserção

$sth = $pdo->prepare("UPDATE tbl_endereco SET en_cep = :en_cep, en_rua = :en_rua, en_numero = :en_numero, en_bairro = :en_bairro, en_cidade = :en_cidade, en_uf = :en_uf where en_login = :loginn");

// Define os dados
$sth->bindValue(":loginn", $en_login);
$sth->bindValue(":en_cep", $cep);
$sth->bindValue(":en_rua", $rua);
$sth->bindValue(":en_numero", $numero);
$sth->bindValue(":en_bairro", $bairro);
$sth->bindValue(":en_cidade", $cidade);
$sth->bindValue(":en_uf", $uf);


// Executa
$sth->execute();
echo $pdo->lastInsertId();
header ("LOCATION:../usuario_ubs.php");
