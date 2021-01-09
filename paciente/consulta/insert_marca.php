<?php
session_start();
include '../../conexao/conexao.php';

 date_default_timezone_set("Brazil/East") ;
 $title = filter_input(INPUT_POST, 'title', FILTER_DEFAULT);
 $medico = filter_input(INPUT_POST, 'medico', FILTER_DEFAULT);
 $start = filter_input(INPUT_POST, 'start', FILTER_DEFAULT);
 $novadata = date('Y-d-m h:i:s', strtotime($start));
 $color = "#00b0ff ";
 echo $novadata;
 
 $sth = $pdo->prepare('select *from tbl_login where lo_codigo = :lo_codigo');
    $sth->bindValue(':lo_codigo', $_SESSION["health"]["id"]);
    $sth->execute();
    $resultado = $sth->fetch(PDO::FETCH_ASSOC);
    extract($resultado);
    $sth = $pdo->prepare('select *from tbl_unidade where un_codigo = :lo_unidade');
    $sth->bindValue(':lo_unidade', $lo_unidade);
    $sth->execute();
    $resultado = $sth->fetch(PDO::FETCH_ASSOC);
    extract($resultado);
    if($un_dtl_unidade == 2){

        $sth = $pdo->prepare('select * from tbl_paciente where p_login = :p_login');
        $sth->bindValue(':p_login', $title);
        $sth->execute();
        $resultado = $sth->fetch(PDO::FETCH_ASSOC);
        extract($resultado);

    }else{    
        $sth = $pdo->prepare('select * from tbl_paciente_ubs where p_loginn = :p_loginn');
        $sth->bindValue(':p_loginn', $title);
        $sth->execute();
        $resultado = $sth->fetch(PDO::FETCH_ASSOC);
        extract($resultado);
    };
 $end = $p_nome;
// Prepara a query de inserção
$sth = $pdo->prepare("INSERT INTO events (title,color,start,end,medico) VALUES (:title,:color,:startt,:endd,:medico)");
// Define os dados
$sth->bindValue(":title",$end );
$sth->bindValue(":color", $color);
$sth->bindValue(":startt",$novadata);
$sth->bindValue(":endd", $title);
$sth->bindValue(":medico", $medico);

// Executa

$sth->execute();
// Retorna o ID do contato inserido
echo $pdo->lastInsertId();
header("Location:insert_consulta.php?medico=$medico&&paciente=$title&&start=$start");
