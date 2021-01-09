<?php
include '../../conexao/conexao.php';

 $paciente = filter_input(INPUT_POST, 'paciente', FILTER_DEFAULT);
 $enfermeiro = filter_input(INPUT_POST, 'enfermeiro', FILTER_DEFAULT);
 $altura = filter_input(INPUT_POST, 'altura', FILTER_DEFAULT);
 $peso = filter_input(INPUT_POST, 'peso', FILTER_DEFAULT);
 $pressao = filter_input(INPUT_POST, 'pressao', FILTER_DEFAULT);
 $motivo = filter_input(INPUT_POST, 'motivo', FILTER_DEFAULT);

// Prepara a query de inserção
$sth = $pdo->prepare("INSERT INTO tbl_dados (da_altura,da_peso,da_pressao,da_motivo,da_paciente,da_enfermeiro) 
VALUE (:da_altura,:da_peso,:da_pressao,:da_motivo,:da_paciente,:da_enfermeiro)");
// Define os dados
$sth->bindValue(":da_paciente", ($paciente));
$sth->bindValue(":da_enfermeiro", ($enfermeiro));
$sth->bindValue(":da_altura", ($altura));
$sth->bindValue(":da_peso", ($peso));
$sth->bindValue(":da_pressao", ($pressao));
$sth->bindValue(":da_motivo", ($motivo));

// Executa
$sth->execute();
// Retorna o ID do contato inserido
echo $pdo->lastInsertId();
header ("LOCATION: ver.php?paciente=$paciente");