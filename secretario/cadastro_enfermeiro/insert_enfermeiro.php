<?php

    include '../../conexao/conexao.php';

    $post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
                                                  
    $Dados = array(
        'en_nome' => $post['en_nome'],
        'en_dt_nasc' => $post['en_dt_nasc'],
        'en_RG' => $post['en_RG'],
        'en_CPF' => $post['en_CPF'],
        'en_telefone' => $post['en_telefone'],
        'en_email' => $post['en_email'],
        'en_genero' => $post['en_genero'],
        'en_login' => $post['en_login'],
        'en_aprov_exame' => $post['en_aprov_exame']
        
    );
    $Fields = implode(', ', array_keys($Dados));
    $Places = ':' . implode(', :', array_keys($Dados));
    $Tabela = 'tbl_enfermeiro';
    $Create = "INSERT INTO {$Tabela} ({$Fields}) VALUES ({$Places})";

    $sth = $pdo->prepare($Create);
    $sth->execute($Dados);
    echo $en_codigo = $pdo ->lastInsertId();
    
    date_default_timezone_set("Brazil/East");
    $ext = strtolower(substr($_FILES['en_foto']['name'], -4)); 
    $name = strtolower(substr($_FILES['en_foto']['name'], 0, -4)); 
    $en_foto = $name . '' . date("YmdHis") . $ext; 
    $dir = 'img/';

    move_uploaded_file($_FILES['en_foto']['tmp_name'], $dir . $en_foto);

   
    date_default_timezone_set("Brazil/East");
    $ext = strtolower(substr($_FILES['en_comp_residencia']['name'], -4)); 
    $name = strtolower(substr($_FILES['en_comp_residencia']['name'], 0, -4)); 
    $en_comp_residencia = $name . '' . date("YmdHis") . $ext; 

    $dir = 'img/';

    move_uploaded_file($_FILES['en_comp_residencia']['tmp_name'], $dir . $en_comp_residencia);
   
    date_default_timezone_set("Brazil/East");
    $ext = strtolower(substr($_FILES['en_comp_escolaridade']['name'], -4)); 
    $name = strtolower(substr($_FILES['en_comp_escolaridade']['name'], 0, -4)); 
    $en_comp_escolaridade = $name . '' . date("YmdHis") . $ext; 

    $dir = 'img/';

    move_uploaded_file($_FILES['en_comp_escolaridade']['tmp_name'], $dir . $en_comp_escolaridade);

    date_default_timezone_set("Brazil/East");
    $ext = strtolower(substr($_FILES['en_comp_escolaridade2']['name'], -4)); 
    $name = strtolower(substr($_FILES['en_comp_escolaridade2']['name'], 0, -4)); 
    $en_comp_escolaridade2 = $name . '' . date("YmdHis") . $ext; 

    $dir = 'img/';

    move_uploaded_file($_FILES['en_comp_escolaridade2']['tmp_name'], $dir . $en_comp_escolaridade2);

    date_default_timezone_set("Brazil/East");
    $ext = strtolower(substr($_FILES['en_comp_rg']['name'], -4)); 
    $name = strtolower(substr($_FILES['en_comp_rg']['name'], 0, -4)); 
    $en_comp_rg = $name . '' . date("YmdHis") . $ext; 

    $dir = 'img/';

    move_uploaded_file($_FILES['en_comp_rg']['tmp_name'], $dir . $en_comp_rg);

    date_default_timezone_set("Brazil/East");
    $ext = strtolower(substr($_FILES['en_comp_rg2']['name'], -4)); 
    $name = strtolower(substr($_FILES['en_comp_rg2']['name'], 0, -4)); 
    $en_comp_rg2 = $name . '' . date("YmdHis") . $ext; 

    $dir = 'img/';

    move_uploaded_file($_FILES['en_comp_rg2']['tmp_name'], $dir . $en_comp_rg2);
   
    
 //header("Location:insert1.php?en_codigo=$en_codigo&&en_foto=$en_foto&&en_comp_residencia=$en_comp_residencia&&en_comp_escolaridade=$en_comp_escolaridade&&en_comp_escolaridade2=$en_comp_escolaridade2&&en_comp_rg=$en_comp_rg&&en_comp_rg2=$en_comp_rg2");
 
?>