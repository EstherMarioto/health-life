<?php
include '../../conexao/conexao.php';

$con_status = filter_input(INPUT_GET, 'con_status', FILTER_DEFAULT);
$con_codigo = filter_input(INPUT_GET, 'con_codigo', FILTER_DEFAULT);

$sth=$pdo->prepare("UPDATE tbl_consulta SET con_status = :sta where con_codigo = :con_codigo");

$sth->bindValue(":sta", $con_status);
$sth->bindValue(":con_codigo", $con_codigo);
$sth->execute();

echo $pdo->lastInsertId();
header ("LOCATION: consultas.php");

?>