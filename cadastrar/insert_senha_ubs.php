<?php
$captcha = $_POST['g-recaptcha-response'];

if($captcha != ''){

    $secreto = "6LcxsdkZAAAAAAzgKxPMqHYpmGN04J7tDoeDA2pG";
    $ip = $_SERVER['REMOTE_ADDR'];
    $var = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secreto&response=$captcha&remoteip=$ip");
    $resposta = json_decode($var, true);

?>
<?php

include '../conexao/conexao.php';
//foto
$p_cod = filter_input(INPUT_POST,'p_cod', FILTER_DEFAULT);
$lo_senha= filter_input(INPUT_POST, 'lo_senha', FILTER_DEFAULT);
$lo_tipo= filter_input(INPUT_POST, 'lo_tipo', FILTER_DEFAULT);
$lo_unidade= filter_input(INPUT_POST, 'lo_unidade', FILTER_DEFAULT);
$password= filter_input(INPUT_POST, 'password', FILTER_DEFAULT);

if ($lo_senha == $password) {

$sth = $pdo -> prepare("INSERT INTO tbl_login (lo_senha,lo_tipo,lo_unidade) VALUES (:lo_senha,:lo_tipo,:lo_unidade)");
     
    $sth->bindValue(':lo_senha',MD5($lo_senha));
    $sth->bindValue(':lo_tipo', $lo_tipo);
    $sth->bindValue(':lo_unidade', $lo_unidade);
    $sth->execute();

    echo $lo_codigo = $pdo ->lastInsertId();

   header("Location:insert/login_ubs.php?lo_codigo=$lo_codigo&&p_cod=$p_cod");

}else {
    echo 'Erro, senhas não identicas';
}

  if($resposta['success']){

}else{
    echo "ERRO";

}
}