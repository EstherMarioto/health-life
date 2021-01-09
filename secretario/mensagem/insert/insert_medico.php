<?php
include '../../../conexao/conexao.php';

$post = filter_input_array(INPUT_POST, FILTER_DEFAULT);


$Dados = array(
 
    'me_medico' => $post['me_medico'],
    'me_data' => $post['me_data'],
    'me_titulo' => $post['me_titulo'],
    'me_assunto' => $post['me_assunto']
    
);


$Fields = implode(', ', array_keys($Dados));
$Places = ':' . implode(', :', array_keys($Dados));
$Tabela = 'tbl_mensagem';
$Create = "INSERT INTO {$Tabela} ({$Fields}) VALUES ({$Places})";

$sth = $pdo->prepare($Create);
$sth->execute($Dados);
echo $pdo->lastInsertId();
header ("LOCATION: ../../home.php");