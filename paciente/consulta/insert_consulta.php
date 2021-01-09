<?php
include '../../conexao/conexao.php';
$medico= $_GET['medico'];
$paciente= $_GET['paciente'];
$start = $_GET['start'];
$novadata = date('Y-d-m h:i:s', strtotime($start));
$status = 1;

$sth = $pdo->prepare(' select *from tbl_paciente where p_login = :p_login');
$sth->bindValue(':p_login',$paciente );
$sth->execute();
$resultado = $sth->fetch(PDO::FETCH_ASSOC);
extract($resultado);

$pacientee = $p_codigo;
$sth = $pdo->prepare("INSERT INTO tbl_consulta (conn_paciente,con_data,con_medico,con_status) VALUE (:conn_paciente,:con_data,:con_medico,:con_status)");
// Define os dados
$sth->bindValue(":conn_paciente",$pacientee);
$sth->bindValue(":con_data", $novadata);
$sth->bindValue(":con_medico", $medico);
$sth->bindValue(":con_status",$status);
// Executa
$sth->execute();


// Retorna o ID do contato inserido
echo $pdo->lastInsertId();
header("Location:marcar_consulta.php?medico=$medico");
?>