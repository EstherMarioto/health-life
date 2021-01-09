<?php
include '../../conexao/conexao.php';

$id = filter_input(INPUT_GET, 'id', FILTER_DEFAULT);

$sth = $pdo->prepare(" DELETE from events WHERE id =:id");

$sth->bindValue (":id",$id,PDO::PARAM_INT);


$sth->execute();

if($sth->execute())
{
 
    echo "Contato excluido com sucesso.";
}
else
{
    echo "Por algum motivo Não foi possivel excluir esse contato.";
}
?>