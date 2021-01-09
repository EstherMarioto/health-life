<?php
include '../../conexao/conexao.php';

$lo_numero= filter_input(INPUT_POST, 'lo_numero', FILTER_DEFAULT);
$senha= filter_input(INPUT_POST, 'senha', FILTER_DEFAULT);
$lo_tipo= filter_input(INPUT_POST, 'lo_tipo', FILTER_DEFAULT);
$lo_unidade= filter_input(INPUT_POST, 'lo_unidade', FILTER_DEFAULT);

// Prepara a query de inserção

$sth = $pdo->prepare("INSERT INTO tbl_login (lo_numero,lo_senha,lo_tipo,lo_unidade) VALUE (:lo_numero,:senha,:lo_tipo,:lo_unidade)");

// Define os dados
$sth->bindValue(":lo_numero", ($lo_numero));
$sth->bindValue(":senha", ($senha));
$sth->bindValue(":lo_tipo", ($lo_tipo));
$sth->bindValue(":lo_unidade", ($lo_unidade));

// Executa
$sth->execute();
// Retorna o ID do contato inserido
echo $lo_codigo = $pdo ->lastInsertId();
header("Location:formulario_medico.php?lo_codigo=$lo_codigo");
