<?php
include '../../conexao/conexao.php';

$id = filter_input(INPUT_GET, 'paciente', FILTER_DEFAULT);

$sth = $pdo->prepare('select * from tbl_paciente where p_codigo = :p_codigo');
$sth->bindValue(':p_codigo', $id);
$sth->execute();
$resultado = $sth->fetch(PDO::FETCH_ASSOC);
extract($resultado);

$sth = $pdo->prepare('select * from tbl_prontuario where pr_login = :pr_login');
$sth->bindValue(':pr_login', $p_login);
$sth->execute();
$resultado = $sth->fetch(PDO::FETCH_ASSOC);
extract($resultado);

$sth = $pdo->prepare(" DELETE from tbl_moradia_saneamento WHERE ms_codigo =:id");

$sth->bindValue (":id",$pr_moradia,PDO::PARAM_INT);


$sth->execute();

if($sth->execute())
{
 
    echo "Moradia excluido com sucesso.";

$sth = $pdo->prepare(" DELETE from tbl_outras_informacoes WHERE oi_cod =:id");

$sth->bindValue (":id",$pr_outras,PDO::PARAM_INT);


$sth->execute();

    if($sth->execute())
    {
        echo "Outras Informações excluido com sucesso.";
    
        $sth = $pdo->prepare(" DELETE from tbl_endereco WHERE en_codigo =:id");

        $sth->bindValue (":id",$pr_endereco,PDO::PARAM_INT);


        $sth->execute();

        if($sth->execute())
        {
            echo "Endereço excluido com sucesso.";

            $sth = $pdo->prepare(" DELETE from tbl_login WHERE lo_codigo =:id");

            $sth->bindValue (":id",$pr_login,PDO::PARAM_INT);


            $sth->execute();

            if($sth->execute())
            {
                echo "Login excluido com sucesso.";
                $sth = $pdo->prepare(" DELETE from tbl_paciente WHERE p_codigo =:id");

                $sth->bindValue (":id",$id,PDO::PARAM_INT);

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
    }
    else
    {
        echo "Por algum motivo Não foi possivel excluir o Outras Informações.";
    };
   
}
else
{
    echo "Por algum motivo Não foi possivel excluir a Moradia.";
};
?>