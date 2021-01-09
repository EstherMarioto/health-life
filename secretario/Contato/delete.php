<?php
include '../../conexao/conexao.php';

$con_codigo = filter_input(INPUT_GET, 'con_codigo', FILTER_DEFAULT);

$sth = $pdo->prepare(" DELETE from tbl_contato WHERE con_codigo=:id");

$sth->bindValue (":id",$con_codigo,PDO::PARAM_INT);


$sth->execute();

if($sth->execute())
{
 
    header("Location:selectcontato.php");
}
else
{
    echo "Por algum motivo Não foi possivel excluir esse contato.";
}
?>