<?php

include '../../../conexao/conexao.php';
$p_codigo = filter_input(INPUT_POST, 'p_codigo', FILTER_DEFAULT);
$detalhe = filter_input(INPUT_POST, 'detalhe', FILTER_DEFAULT);
//UPLOAD DA IMAGEM
date_default_timezone_set("Brazil/East") ;//Definindo timezone padráo
$ext = strtolower(substr($_FILES['fileUpload']['name'],-4));//Pegando extensão do arquivo
$name = strtolower(substr($_FILES['fileUpload']['name'],0,-4));//Pegando extensão do arquivo
$new_name = $name.''.date("YmdHis"). $ext; //Definindo um novo nome para o arquivo
$dir = '../../../cadastrar/img/'; // Diretório para uploads

move_uploaded_file($_FILES['fileUpload']['tmp_name'],$dir . $new_name); // Fazer uplad do arquivo
// END UPLOAD

$sth=$pdo->prepare("UPDATE tbl_img_dado SET im_dado = :img, im_detalhe = :detalhe where im_pac_ubs = :id ");

$sth->bindValue(':img', $new_name);
$sth->bindValue(":id", $p_codigo);
$sth->bindValue(":detalhe", $detalhe);

$sth->execute();
header ("LOCATION:../usuario_ubs.php");


?>