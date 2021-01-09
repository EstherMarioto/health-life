<?php
include '../conexao/conexao.php';


 $pr_moradia = filter_input(INPUT_POST, 'pr_moradia', FILTER_DEFAULT);
 $pr_outras = filter_input(INPUT_POST, 'pr_outras', FILTER_DEFAULT);
$observacoes = filter_input(INPUT_POST, 'pr_observacoes', FILTER_DEFAULT);
$pessoas = filter_input(INPUT_POST, 'pr_num_de_pessoas', FILTER_DEFAULT);
$plano = filter_input(INPUT_POST, 'pr_nome_plano', FILTER_DEFAULT);
$pplano = filter_input(INPUT_POST, 'pr_possui_plano', FILTER_DEFAULT);
$pr_cartao_sus = filter_input(INPUT_POST, 'pr_cartao_sus', FILTER_DEFAULT);
$bolsa = filter_input(INPUT_POST, 'pr_benef_bolsa_familia', FILTER_DEFAULT);
$cadastro = filter_input(INPUT_POST, 'pr_cadast_unico', FILTER_DEFAULT);
$data = filter_input(INPUT_POST, 'pr_data', FILTER_DEFAULT);
echo $pr_endereco = filter_input(INPUT_POST, 'pr_endereco', FILTER_DEFAULT);

// Prepara a query de inserção
$sth = $pdo->prepare("INSERT INTO tbl_prontuario (pr_moradia,pr_outras,pr_observacoes,pr_num_de_pessoas,pr_nome_plano,pr_possui_plano,pr_cartao_sus,pr_benef_bolsa_familia,pr_cadast_unico,pr_data,pr_endereco)  VALUE (:pr_moradia,:pr_outras,:pr_observacoes, :pr_num_de_pessoas, :pr_nome_plano, :pr_possui_plano,:pr_cartao_sus, :pr_benef_bolsa_familia, :pr_cadast_unico, :pr_data,:pr_endereco)");
// Define os dados
$sth->bindValue(":pr_moradia", ($pr_moradia));
$sth->bindValue(":pr_outras", ($pr_outras));
$sth->bindValue(":pr_observacoes", ($observacoes));
$sth->bindValue(":pr_num_de_pessoas", ($pessoas));
$sth->bindValue(":pr_nome_plano", ($plano));
$sth->bindValue(":pr_possui_plano", ($pplano));
$sth->bindValue(":pr_cartao_sus", ($pr_cartao_sus));
$sth->bindValue(":pr_benef_bolsa_familia", ($bolsa));
$sth->bindValue(":pr_cadast_unico", ($cadastro));
$sth->bindValue(":pr_data", ($data));
$sth->bindValue(":pr_endereco", ($pr_endereco));
// Executa
$sth->execute();
// Retorna o ID do contato inserido

echo $p_prontuario = $pdo->lastInsertId();
header ("LOCATION: formulario_paciente.php?p_prontuario=$p_prontuario");
