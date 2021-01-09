<?php
session_start();
include '../../../conexao/conexao.php';

$id = filter_input(INPUT_GET, 'id', FILTER_DEFAULT);
$sth = $pdo->prepare('select * from tbl_login where lo_codigo = :lo_codigo');
$sth->bindValue(':lo_codigo',  $_SESSION["health"]["id"]);
$sth->execute();
$resultado = $sth->fetch(PDO::FETCH_ASSOC);
extract($resultado);

$sth = $pdo->prepare('select * from tbl_unidade where un_codigo = :un_codigo');
$sth->bindValue(':un_codigo', $lo_unidade);
$sth->execute();
$resultado = $sth->fetch(PDO::FETCH_ASSOC);
extract($resultado);

            if($un_dtl_unidade == 2 ){

                $sth = $pdo->prepare('select * from tbl_paciente where p_codigo = :p_codigo');
                $sth->bindValue(':p_codigo', $id);
                $sth->execute();
                $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                extract($resultado);
                $login = $p_login;

            }else{
 
                $sth = $pdo->prepare('select * from tbl_paciente_ubs where p_codigo = :p_codigo');
                $sth->bindValue(':p_codigo', $id);
                $sth->execute();
                $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                extract($resultado);
                $login = $p_loginn;
            };

            $sth=$pdo->prepare("UPDATE tbl_login SET lo_numero = :id where lo_codigo = :lo_codigo");
           

            $sth->bindValue(":lo_codigo", $login);
        
            $sth->bindValue(":id", $id);

$sth->execute();
echo $pdo->lastInsertId();

header("Location:../pesquisa_pacientes.php");

?>
