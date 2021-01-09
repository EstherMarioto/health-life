<?php

include '../conexao/conexao.php';
$id = $_GET['id'];
$post = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    $Dados = array(
        'p_nome' => $post['p_nome'],
        'p_email' => $post['p_email'],
        'p_dtnasc' => $post['p_dtnasc'],
        'p_nome_mae' => $post['p_nome_mae'],
        'p_nome_pai' => $post['p_nome_pai'],
        'p_cartao_sus' => $post ['p_cartao_sus'],
        'p_RG' => $post['p_RG'],
        'p_CPF' => $post['p_CPF'],
        'p_telefone' => $post['p_telefone'],
        'p_genero' => $post['p_genero'],
        'p_status' => $post['p_status'],
        'p_endereco' => $post['p_endereco']      
        
    );
    $Fields = implode(', ', array_keys($Dados));
    $Places = ':' . implode(', :', array_keys($Dados));
    $Tabela = 'tbl_paciente_ubs';
    $Create = "INSERT INTO {$Tabela} ({$Fields}) VALUES ({$Places})";

    $sth = $pdo->prepare($Create);
    $sth->execute($Dados);
    echo $p_cod = $pdo ->lastInsertId();

    date_default_timezone_set("Brazil/East");
    $ext = strtolower(substr($_FILES['pa_foto']['name'], -4)); 
    $name = strtolower(substr($_FILES['pa_foto']['name'], 0, -4)); 
    $pa_foto = $name . '' . date("YmdHis") . $ext; 
    $dir = 'img/';
    
    move_uploaded_file($_FILES['pa_foto']['tmp_name'], $dir . $pa_foto);
    
    header("Location:insert_img_ubs.php?p_cod=$p_cod&&pa_foto=$pa_foto");
    
    
?>