<?php
include '../conexao/conexao.php';

$me_codigo = filter_input(INPUT_GET, 'me_codigo', FILTER_DEFAULT);

$sth = $pdo->prepare(" DELETE from tbl_mensagem WHERE me_codigo=:id");

$sth->bindValue (":id",$me_codigo,PDO::PARAM_INT);


$sth->execute();

if($sth->execute())
{
 
    header("Location:home.php");
}
else
{
    echo "Por algum motivo Não foi possivel excluir esse contato.";
}
?>