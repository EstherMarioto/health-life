<?php

include '../../conexao/conexao.php';

$id = filter_input(INPUT_POST, 'id', FILTER_DEFAULT);
$start = filter_input(INPUT_POST, 'start', FILTER_DEFAULT);


$sth = $pdo->prepare("UPDATE events SET start = :start  where id = :id");

$sth->bindValue(":start",  mb_convert_case($start, MB_CASE_TITLE, "UTF-8"));
$sth->bindValue(":id", $id);

$sth->execute();

header("LOCATION:../home.php");


?>