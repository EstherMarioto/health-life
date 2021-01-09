<?php

    include '../../conexao/conexao.php';

 $paciente= $_GET['paciente'];
 $dados= $_GET['dados']; 
 $diagnosticoo= $_GET['diagnosticoo'];

    $sth = $pdo->prepare("UPDATE tbl_dados SET da_diagnostico = :da_diagnostico where da_codigo= :da_codigo");

 $sth->bindValue(':da_diagnostico', $diagnosticoo);

 $sth->bindValue(":da_codigo", $dados);


    $sth->execute();
    header("LOCATION:ver_ubs.php?id=$paciente&&diagnosticoo=$diagnosticoo");


?>