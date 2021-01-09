<?php
include '../../conexao/conexao.php';


$id = filter_input(INPUT_POST, 'p_codigo', FILTER_DEFAULT);
$p_status = filter_input(INPUT_POST, 'p_status', FILTER_DEFAULT);


$sth=$pdo->prepare("UPDATE tbl_paciente SET p_status = :p_status where p_codigo = :id");


$sth->bindValue(":p_status", $p_status);
$sth->bindValue(":id", $id);

$sth->execute();
echo $pdo->lastInsertId();

header("Location:email/email.php?id=$id");

?>
