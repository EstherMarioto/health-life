<?php

include '../../../conexao/conexao.php';
$im_enfermeiro = filter_input(INPUT_POST, 'im_enfermeiro', FILTER_DEFAULT);
$detalhe = filter_input(INPUT_POST, 'detalhe', FILTER_DEFAULT);

//UPLOAD DA IMAGEM
date_default_timezone_set("Brazil/East") ;//Definindo timezone padráo
$ext = strtolower(substr($_FILES['fileUpload']['name'],-4));//Pegando extensão do arquivo
$name = strtolower(substr($_FILES['fileUpload']['name'],0,-4));//Pegando extensão do arquivo
$new_name = $name.''.date("YmdHis"). $ext; //Definindo um novo nome para o arquivo
$dir = '../../../secretario/cadastro_enfermeiro/img/'; // Diretório para uploads

move_uploaded_file($_FILES['fileUpload']['tmp_name'],$dir . $new_name); // Fazer uplad do arquivo
// END UPLOAD

$sth=$pdo->prepare("UPDATE tbl_img_dado SET im_dado = :img where im_enfermeiro = :id and im_detalhe = :detalhe");

$sth->bindValue(':img', $new_name);
$sth->bindValue(":id", $im_enfermeiro);
$sth->bindValue(":detalhe", $detalhe);

$sth->execute();
header ("LOCATION:../usuario.php");



?>