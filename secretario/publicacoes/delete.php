<?php
include '../../conexao/conexao.php';

$mu_codigo = filter_input(INPUT_GET, 'mu_codigo', FILTER_DEFAULT);

$sth = $pdo->prepare(" DELETE from tbl_mural WHERE mu_codigo =:mu_codigo");

$sth->bindValue (":mu_codigo",$mu_codigo,PDO::PARAM_INT);


$sth->execute();

if($sth->execute())
{
 
    header("LOCATION:publicacoes.php");
}
else
{
    echo "Por algum motivo Não foi possivel excluir esse contato.";
}
?>