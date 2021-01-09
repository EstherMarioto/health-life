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

$sth=$pdo->prepare("UPDATE tbl_outras_informacoes SET oi_login = :lo_codigo where oi_cod = :pr_outras");
 
$sth->bindValue(':lo_codigo', $lo_codigo);
$sth->bindValue(':pr_outras', $pr_outras);
  
$sth->execute();
echo $pdo->lastInsertId();

header ("LOCATION:prontuario3.php?lo_codigo=$lo_codigo");


