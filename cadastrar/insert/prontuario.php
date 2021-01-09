<?php
include '../../conexao/conexao.php';
$p_codigo = filter_input(INPUT_GET, 'p_codigo', FILTER_DEFAULT);
$sth = $pdo->prepare('select * from tbl_paciente where p_codigo = :p_codigo');
$sth->bindValue(':p_codigo', $p_codigo);
$sth->execute();
$resultado = $sth->fetch(PDO::FETCH_ASSOC);
extract($resultado);
?>

<?php

$lo_codigo = filter_input(INPUT_GET, 'lo_codigo', FILTER_DEFAULT);

$sth=$pdo->prepare("UPDATE tbl_prontuario SET pr_login = :lo_codigo where pr_codigo = :p_prontuario");
    
$sth->bindValue(':lo_codigo', $lo_codigo);
$sth->bindValue(':p_prontuario', $p_prontuario);
  
$sth->execute();
echo $pdo->lastInsertId();

header ("LOCATION:prontuario1.php?lo_codigo=$lo_codigo");


