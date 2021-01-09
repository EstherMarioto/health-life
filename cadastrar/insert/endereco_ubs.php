<?php
include '../../conexao/conexao.php';
$p_cod = filter_input(INPUT_GET, 'p_cod', FILTER_DEFAULT);
$sth = $pdo->prepare('select * from tbl_paciente_ubs where p_codigo = :p_codigo');
$sth->bindValue(':p_codigo', $p_cod);
$sth->execute();
$resultado = $sth->fetch(PDO::FETCH_ASSOC);
extract($resultado);
?>
<?php

$lo_codigo = filter_input(INPUT_GET, 'lo_codigo', FILTER_DEFAULT);

$sth=$pdo->prepare("UPDATE tbl_endereco SET en_login = :lo_codigo where en_codigo = :p_endereco");
     
   
$sth->bindValue(':lo_codigo', $lo_codigo);
$sth->bindValue(':p_endereco', $p_endereco);
  
    $sth->execute();
    echo $pdo->lastInsertId();


header ("LOCATION:../mensagem.php");
