<?php
session_start();
include '../conexao/conexao.php';

$numail = filter_input(INPUT_POST, 'numail', FILTER_DEFAULT);
$senhaa = filter_input(INPUT_POST, 'senha', FILTER_DEFAULT);
$senha = MD5($senhaa);

$sth = $pdo->prepare('SELECT * FROM tbl_login where lo_numero = :numail  and lo_senha = :senha');
$sth->bindValue(':numail', $numail);
$sth->bindValue(':senha', $senha);
$sth->execute();
$resultado = $sth->fetch(PDO::FETCH_ASSOC);
extract($resultado);

if($sth->rowCount() > 0){
    if ( $lo_tipo==4){

        $_SESSION["health"]["numail"] = $numail;
        $_SESSION["health"]["senha"] = $senha;
        $_SESSION["health"]["id"] = $lo_codigo;
    
        header("Location:../paciente/home.php");
    
    } else if ($lo_tipo == 1)  {

        $_SESSION["health"]["numail"] = $numail;
        $_SESSION["health"]["senha"] = $senha;
        $_SESSION["health"]["id"] = $lo_codigo;
    
        header("Location:../enfermeiro/home.php");
    
    } else if  ($lo_tipo == 2)  {

        $_SESSION["health"]["numail"] = $numail;
        $_SESSION["health"]["senha"] = $senha;
        $_SESSION["health"]["id"] = $lo_codigo;
    
        header("Location:../medico/home.php");
    }else{
    
        $_SESSION["health"]["numail"] = $numail;
        $_SESSION["health"]["senha"] = $senha;
        $_SESSION["health"]["id"] = $lo_codigo;
    
        header("Location:../secretario/home.php");
}; 
} else {
    header("Location: ../index.php");
};
   
?>