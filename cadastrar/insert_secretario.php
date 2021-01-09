<?php

include '../conexao/conexao.php';

$se_login = filter_input(INPUT_POST, 'se_login', FILTER_DEFAULT);
$se_nome = filter_input(INPUT_POST, 'se_nome', FILTER_DEFAULT);
$se_RG = filter_input(INPUT_POST, 'se_RG', FILTER_DEFAULT);
$se_CPF = filter_input(INPUT_POST, 'se_CPF', FILTER_DEFAULT);
$se_dt_nasc = filter_input(INPUT_POST, 'se_dt_nasc', FILTER_DEFAULT);
$se_genero = filter_input(INPUT_POST, 'se_genero', FILTER_DEFAULT);
$se_telefone = filter_input(INPUT_POST, 'se_telefone', FILTER_DEFAULT);
$se_senha = filter_input(INPUT_POST, 'se_senha', FILTER_DEFAULT);
$se_confirmar = filter_input(INPUT_POST, 'se_confirmar', FILTER_DEFAULT);
$se_unidade = filter_input(INPUT_POST, 'se_unidade', FILTER_DEFAULT);

if ($se_senha == $se_confirmar) {

    $sth=$pdo->prepare("INSERT INTO tbl_secretario (se_nome, se_RG, se_CPF, se_dt_nasc, se_genero, se_telefone) VALUES (:se_nome, :se_RG, :se_CPF, :se_dt_nasc, :se_genero, :se_telefone )");
    
    $sth->bindValue(':se_nome', $se_nome);
    $sth->bindValue(':se_RG', $se_RG);
    $sth->bindValue(':se_CPF', $se_CPF);
    $sth->bindValue(':se_dt_nasc', $se_dt_nasc);
    $sth->bindValue(':se_genero', $se_genero);
    $sth->bindValue(':se_telefone', $se_telefone);

    $sth->execute();
    echo $secretario = $pdo->lastInsertId();

   header("Location:insert/insert_login_sec.php?se_senha=$se_senha&&se_login=$se_login&&se_unidade=$se_unidade&&secretario=$secretario");

   
}else {
    echo 'Erro, senhas não identicas';
};

    ?>
   