<?php

    include '../conexao/conexao.php';
   
    $post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
          
    $Dados = array(
        'p_prontuario' => $post['p_prontuario'],
        'p_nome' => $post['p_nome'],
        'p_email' => $post['p_email'],
        'p_ocupacao' => $post['p_ocupacao'],
        'p_dtnasc' => $post['p_dtnasc'],
        'p_telefone' => $post['p_telefone'],
        'p_nome_mae' => $post['p_nome_mae'],
        'p_nome_pai' => $post['p_nome_pai'],
        'p_siglas' => $post['p_siglas'],
        'p_genero' => $post['p_genero'],
        'p_outro' => $post['p_outro'],
        'p_tipo' => $post['p_tipo'],
        'p_status' => $post['p_status'],
        'p_freq_escolar' => $post['p_freq_escolar']
     
        
    );
    $Fields = implode(', ', array_keys($Dados));
    $Places = ':' . implode(', :', array_keys($Dados));
    $Tabela = 'tbl_paciente';
    $Create = "INSERT INTO {$Tabela} ({$Fields}) VALUES ({$Places})";

    $sth = $pdo->prepare($Create);
    $sth->execute($Dados);
    echo $p_codigo = $pdo ->lastInsertId();

    date_default_timezone_set("Brazil/East");
    $ext = strtolower(substr($_FILES['pac_foto']['name'], -4)); 
    $name = strtolower(substr($_FILES['pac_foto']['name'], 0, -4)); 
    $pac_foto = $name . '' . date("YmdHis") . $ext; 
    $dir = 'img/';
    
    move_uploaded_file($_FILES['pac_foto']['tmp_name'], $dir . $pac_foto);


    header("Location:insert_img_pac.php?p_codigo=$p_codigo&&pac_foto=$pac_foto&&p_prontuario=$p_prontuario");
    
