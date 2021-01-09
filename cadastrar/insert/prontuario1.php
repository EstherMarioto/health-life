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

$sth=$pdo->prepare("UPDATE tbl_moradia_saneamento SET ms_login = :lo_codigo where ms_codigo = :pr_moradia");
 
$sth->bindValue(':lo_codigo', $lo_codigo);
$sth->bindValue(':pr_moradia', $pr_moradia);
  
$sth->execute();
echo $pdo->lastInsertId();

header ("LOCATION:prontuario2.php?lo_codigo=$lo_codigo");


