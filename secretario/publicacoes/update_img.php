<?php

include '../../conexao/conexao.php';
$mu_codigo = filter_input(INPUT_POST, 'mu_codigo', FILTER_DEFAULT);
//UPLOAD DA IMAGEM
date_default_timezone_set("Brazil/East") ;//Definindo timezone padráo
$ext = strtolower(substr($_FILES['fileUpload']['name'],-4));//Pegando extensão do arquivo
$name = strtolower(substr($_FILES['fileUpload']['name'],0,-4));//Pegando extensão do arquivo
$new_name = $name.''.date("YmdHis"). $ext; //Definindo um novo nome para o arquivo
$dir = 'img/'; // Diretório para uploads

move_uploaded_file($_FILES['fileUpload']['tmp_name'],$dir . $new_name); // Fazer uplad do arquivo
// END UPLOAD

$sth=$pdo->prepare("UPDATE tbl_mural SET mu_img = :img where mu_codigo = :id");

$sth->bindValue(':img', $new_name);
$sth->bindValue(":id", $mu_codigo);

$sth->execute();
header ("LOCATION:publicacoes.php");

?>