<?php
include '../../conexao/conexao.php';
$lo_codigo = filter_input(INPUT_GET, 'lo_codigo', FILTER_DEFAULT);
$sth = $pdo->prepare('select * from tbl_prontuario where pr_login = :pr_login');
$sth->bindValue(':pr_login', $lo_codigo);
$sth->execute();
$resultado = $sth->fetch(PDO::FETCH_ASSOC);
extract($resultado);
?>

<?php

$lo_codigo = filter_input(INPUT_GET, 'lo_codigo', FILTER_DEFAULT);

$sth=$pdo->prepare("UPDATE tbl_endereco SET en_login = :lo_codigo where en_codigo = :pr_endereco");
 
$sth->bindValue(':lo_codigo', $lo_codigo);
$sth->bindValue(':pr_endereco', $pr_endereco);
  
$sth->execute();
echo $pdo->lastInsertId();

header ("LOCATION:../mensagem.php");


