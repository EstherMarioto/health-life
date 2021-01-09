<?php
    include '../../conexao/conexao.php';

    $paciente = filter_input(INPUT_POST, 'paciente', FILTER_DEFAULT);
    $dados = filter_input(INPUT_POST, 'dados', FILTER_DEFAULT);
    $medico = filter_input(INPUT_POST, 'medico', FILTER_DEFAULT);
    $diagnostico = filter_input(INPUT_POST, 'diagnostico', FILTER_DEFAULT);
    $data = filter_input(INPUT_POST, 'data', FILTER_DEFAULT);
 
    // Prepara a query de inserção
    $sth = $pdo->prepare("INSERT INTO tbl_diagnostico (di_diagnostico,di_data, di_medico) VALUE (:di_diagnostico,:di_data,:di_medico)");
    // Define os dados

    $sth->bindValue(":di_diagnostico", ($diagnostico));
    $sth->bindValue(":di_data", ($data));
    $sth->bindValue(":di_medico", ($medico));

    // Executa
    $sth->execute();
    // Retorna o ID do contato inserido
    echo $diagnosticoo = $pdo->lastInsertId();
    header ("LOCATION: update_di_ver_ubs.php?diagnosticoo=$diagnosticoo&&paciente=$paciente&&dados=$dados");