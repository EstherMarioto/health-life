<?php
include '../../conexao/conexao.php';

$id = filter_input(INPUT_GET, 'paciente', FILTER_DEFAULT);

$sth = $pdo->prepare('select * from tbl_paciente_ubs where p_codigo = :p_codigo');
$sth->bindValue(':p_codigo', $id);
$sth->execute();
$resultado = $sth->fetch(PDO::FETCH_ASSOC);
extract($resultado);

$sth = $pdo->prepare(" DELETE from tbl_endereco WHERE en_codigo =:id");

$sth->bindValue (":id",$p_endereco,PDO::PARAM_INT);


$sth->execute();

if($sth->execute())
{
 
    echo "Endereço excluido com sucesso.";

$sth = $pdo->prepare(" DELETE from tbl_login WHERE lo_codigo =:id");

$sth->bindValue (":id",$p_loginn,PDO::PARAM_INT);


$sth->execute();

    if($sth->execute())
    {
        echo "Login excluido com sucesso.";
    
        $sth = $pdo->prepare(" DELETE from tbl_paciente_ubs WHERE p_codigo =:id");

        $sth->bindValue (":id",$p_codigo,PDO::PARAM_INT);


        $sth->execute();

         if($sth->execute())
        {
        echo "Paciente excluido com sucesso.";
         header ("LOCATION:pesquisa_pacientes.php");
        }
        else
        {
        echo "Por algum motivo Não foi possivel excluir o Paciente.";
        };
    }
    else
    {
        echo "Por algum motivo Não foi possivel excluir o Login.";
    };
   
}
else
{
    echo "Por algum motivo Não foi possivel excluir o Endereço.";
};
?>