<?php
include '../../conexao/conexao.php';

$post = filter_input_array(INPUT_POST, FILTER_DEFAULT);

date_default_timezone_set("Brazil/East");
$ext = strtolower(substr($_FILES['fileUpload']['name'], -4));
$name = strtolower(substr($_FILES['fileUpload']['name'], 0, -4)); 
$new_name = $name . '' . date("YmdHis") . $ext; 
$dir = 'img/';

move_uploaded_file($_FILES['fileUpload']['tmp_name'], $dir . $new_name);

$Dados = array(
    'mu_titulo' => $post['mu_titulo'],
    'mu_assunto' => $post['mu_assunto'],
    'mu_data' => $post['mu_data'],
    'mu_tipo' => $post['mu_tipo'],
    'mu_img' => $new_name
);


$Fields = implode(', ', array_keys($Dados));
$Places = ':' . implode(', :', array_keys($Dados));
$Tabela = 'tbl_mural';
$Create = "INSERT INTO {$Tabela} ({$Fields}) VALUES ({$Places})";

$sth = $pdo->prepare($Create);
$sth->execute($Dados);
echo $pdo->lastInsertId();
header ("LOCATION: ../home.php");