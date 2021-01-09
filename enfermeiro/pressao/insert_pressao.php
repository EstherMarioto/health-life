<?php
    include '../../conexao/conexao.php';

    $data = filter_input(INPUT_POST, 'pre_data', FILTER_DEFAULT);
    $pressao = filter_input(INPUT_POST, 'pre_pressao', FILTER_DEFAULT);
    $preenf = filter_input(INPUT_POST, 'pre_enfermeiro', FILTER_DEFAULT);
    $pre_paciente = filter_input(INPUT_POST, 'pre_paciente', FILTER_DEFAULT);


    // Prepara a query de inserção
    $sth = $pdo->prepare("INSERT INTO tbl_pressao (pre_data,pre_pressao,pre_enfermeiro,pre_paciente) VALUE (:pre_data, :pre_pressao,:pre_enfermeiro,:pre_paciente)");
    // Define os dados
    $sth->bindValue(":pre_data", $data);
    $sth->bindValue(":pre_pressao", $pressao);
    $sth->bindValue(":pre_enfermeiro", $preenf);
    $sth->bindValue(":pre_paciente", $pre_paciente);

    $sth->execute();
    // Retorna o ID do contato inserido
    echo $pdo->lastInsertId();
    header ("LOCATION: formulario_pressao.php?pressao=$pre_paciente");
?>