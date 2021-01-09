<?php

include '../../../conexao/conexao.php';

$lo_codigo = filter_input(INPUT_POST, 'lo_codigo', FILTER_DEFAULT);
$unidade = filter_input(INPUT_POST, 'lo_unidade', FILTER_DEFAULT);



$sth = $pdo->prepare("UPDATE tbl_login SET lo_unidade = :lo_unidade  where lo_codigo = :id");

$sth->bindValue(":lo_unidade",$unidade);


$sth->bindValue(":id", $lo_codigo);

$sth->execute();

header("LOCATION:../usuario.php");


?>