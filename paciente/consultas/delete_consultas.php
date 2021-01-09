<?php
include '../../conexao/conexao.php';

$id= $_GET['id'];

$sth = $pdo->prepare(" DELETE from tbl_consulta where con_codigo = :id");

$sth->bindValue (":id",$id,PDO::PARAM_INT);


$sth->execute();

if($sth->execute())
{
 
    header("Location:consultas.php");

    echo $pdo->lastInsertId();
}
else
{
    echo "Por algum motivo Não foi possivel excluir essa consulta.";
}

?>