<?php
    include '../../conexao/conexao.php';

    $vc_paciente = filter_input(INPUT_POST, 'vc_paciente', FILTER_DEFAULT);
    $vc_nome = filter_input(INPUT_POST, 'vc_nome', FILTER_DEFAULT);
    $vc_tipo = filter_input(INPUT_POST, 'vc_tipo', FILTER_DEFAULT);
    $vc_cod = filter_input(INPUT_POST, 'vc_cod', FILTER_DEFAULT);
    $vc_lote = filter_input(INPUT_POST, 'vc_lote', FILTER_DEFAULT);
    $vc_datav = filter_input(INPUT_POST, 'vc_datav', FILTER_DEFAULT);
    $vc_aplicador = filter_input(INPUT_POST, 'vc_aplicador', FILTER_DEFAULT);
    $vc_data = filter_input(INPUT_POST, 'vc_data', FILTER_DEFAULT);


    // Prepara a query de inserção
    $sth = $pdo->prepare("INSERT INTO tbl_vacina (vc_paciente,vc_nome,vc_tipo,vc_cod,vc_lote,vc_datav,vc_enfermeiro,vc_data) VALUE (:vc_paciente,:vc_nome,:vc_tipo,:vc_cod,:vc_lote,:vc_datav,:vc_aplicador,:vc_data)");
    // Define os dados
    $sth->bindValue(":vc_paciente", ($vc_paciente));
    $sth->bindValue(":vc_nome", ($vc_nome));
    $sth->bindValue(":vc_tipo", ($vc_tipo));
    $sth->bindValue(":vc_cod", ($vc_cod));
    $sth->bindValue(":vc_lote", ($vc_lote));
    $sth->bindValue(":vc_datav", ($vc_datav));
    $sth->bindValue(":vc_aplicador", ($vc_aplicador));
    $sth->bindValue(":vc_data", ($vc_data));

    // Executa
    $sth->execute();
    // Retorna o ID do contato inserido
    echo $pdo->lastInsertId();
    header ("LOCATION:vacina_ubs.php?vacina=$vc_paciente");
?>    