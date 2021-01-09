<?php
include '../../conexao/conexao.php';

$post = filter_input_array(INPUT_POST,FILTER_DEFAULT);

$Dados = array(

  'me_nome' => $post['me_nome'],
  'me_dt_nasc'=> $post['me_dt_nasc'],
  'me_RG' => $post['me_RG'],
  'me_CPF'=> $post['me_CPF'],
  'me_telefone'=> $post['me_telefone'],
  'me_email' => $post['me_email'],
  'me_genero' => $post['me_genero'],
  'me_aprov_exame'=> $post['me_aprov_exame'],
  'me_login' => $post['me_login'],
  'me_especialidade'=> $post['me_especialidade']
  

);
$Fields = implode(', ', array_keys($Dados));
$Places = ':' . implode(', :', array_keys($Dados));
$Tabela = 'tbl_medico';
$Create = "INSERT INTO {$Tabela} ({$Fields}) VALUES ({$Places})";

$sth = $pdo->prepare($Create);
$sth->execute($Dados);
echo $me_codigo = $pdo ->lastInsertId();



date_default_timezone_set("Brazil/East");
$ext = strtolower(substr($_FILES['me_foto']['name'], -4));
$name = strtolower(substr($_FILES['me_foto']['name'], 0, -4));
$me_foto = $name . '' . date("YmdHis") . $ext;

$dir = 'img/';

move_uploaded_file($_FILES['me_foto']['tmp_name'], $dir . $me_foto);

date_default_timezone_set("Brazil/East");
$ext = strtolower(substr($_FILES['me_comp']['name'], -4));
$name = strtolower(substr($_FILES['me_comp']['name'], 0, -4));
$me_comp = $name . '' . date("YmdHis") . $ext;

$dir = 'img/';

move_uploaded_file($_FILES['me_comp']['tmp_name'], $dir . $me_comp);


date_default_timezone_set("Brazil/East");
$ext = strtolower(substr($_FILES['me_comp_rg2']['name'], -4));
$name = strtolower(substr($_FILES['me_comp_rg2']['name'], 0, -4));
$me_comp_rg2 = $name . '' . date("YmdHis") . $ext;

$dir = 'img/';

move_uploaded_file($_FILES['me_comp_rg2']['tmp_name'], $dir . $me_comp_rg2);

date_default_timezone_set("Brazil/East");
$ext = strtolower(substr($_FILES['me_comp_residencia']['name'], -4));
$name = strtolower(substr($_FILES['me_comp_residencia']['name'], 0, -4));
$me_comp_residencia = $name . '' . date("YmdHis") . $ext;

$dir = 'img/';

move_uploaded_file($_FILES['me_comp_residencia']['tmp_name'], $dir . $me_comp_residencia);

date_default_timezone_set("Brazil/East");
$ext = strtolower(substr($_FILES['me_titulo_eleitor']['name'], -4));
$name = strtolower(substr($_FILES['me_titulo_eleitor']['name'], 0, -4));
$me_titulo_eleitor = $name . '' . date("YmdHis") . $ext;

$dir = 'img/';

move_uploaded_file($_FILES['me_titulo_eleitor']['tmp_name'], $dir . $me_titulo_eleitor);

date_default_timezone_set("Brazil/East");
$ext = strtolower(substr($_FILES['me_titulo_eleitor2']['name'], -4));
$name = strtolower(substr($_FILES['me_titulo_eleitor2']['name'], 0, -4));
$me_titulo_eleitor2 = $name . '' . date("YmdHis") . $ext;

$dir = 'img/';

move_uploaded_file($_FILES['me_titulo_eleitor2']['tmp_name'], $dir . $me_titulo_eleitor2);

date_default_timezone_set("Brazil/East");
$ext = strtolower(substr($_FILES['me_certidao_cas']['name'], -4));
$name = strtolower(substr($_FILES['me_certidao_cas']['name'], 0, -4));
$me_certidao_cas = $name . '' . date("YmdHis") . $ext;

$dir = 'img/';

move_uploaded_file($_FILES['me_certidao_cas']['tmp_name'], $dir . $me_certidao_cas);

date_default_timezone_set("Brazil/East");
$ext = strtolower(substr($_FILES['me_doc_pis']['name'], -4));
$name = strtolower(substr($_FILES['me_doc_pis']['name'], 0, -4));
$me_doc_pis = $name . '' . date("YmdHis") . $ext;

$dir = 'img/';

move_uploaded_file($_FILES['me_doc_pis']['tmp_name'], $dir . $me_doc_pis);

date_default_timezone_set("Brazil/East");
$ext = strtolower(substr($_FILES['me_car_trab']['name'], -4));
$name = strtolower(substr($_FILES['me_car_trab']['name'], 0, -4));
$me_car_trab = $name . '' . date("YmdHis") . $ext;

$dir = 'img/';

move_uploaded_file($_FILES['me_car_trab']['tmp_name'], $dir . $me_car_trab);

date_default_timezone_set("Brazil/East");
$ext = strtolower(substr($_FILES['me_car_trab2']['name'], -4));
$name = strtolower(substr($_FILES['me_car_trab2']['name'], 0, -4));
$me_car_trab2 = $name . '' . date("YmdHis") . $ext;

$dir = 'img/';

move_uploaded_file($_FILES['me_car_trab2']['tmp_name'], $dir . $me_car_trab2);

date_default_timezone_set("Brazil/East");
$ext = strtolower(substr($_FILES['me_declaracao_bens']['name'], -4));
$name = strtolower(substr($_FILES['me_declaracao_bens']['name'], 0, -4));
$me_declaracao_bens = $name . '' . date("YmdHis") . $ext;

$dir = 'img/';

move_uploaded_file($_FILES['me_declaracao_bens']['tmp_name'], $dir . $me_declaracao_bens);

date_default_timezone_set("Brazil/East");
$ext = strtolower(substr($_FILES['me_comp_esc']['name'], -4));
$name = strtolower(substr($_FILES['me_comp_esc']['name'], 0, -4));
$me_comp_esc = $name . '' . date("YmdHis") . $ext;

$dir = 'img/';

move_uploaded_file($_FILES['me_comp_esc']['tmp_name'], $dir . $me_comp_esc);

date_default_timezone_set("Brazil/East");
$ext = strtolower(substr($_FILES['me_comp_esc2']['name'], -4));
$name = strtolower(substr($_FILES['me_comp_esc2']['name'], 0, -4));
$me_comp_esc2 = $name . '' . date("YmdHis") . $ext;

$dir = 'img/';

move_uploaded_file($_FILES['me_comp_esc2']['tmp_name'], $dir . $me_comp_esc2);

header("Location:insert1.php?me_codigo=$me_codigo&&me_foto=$me_foto&&me_comp=$me_comp&&me_comp_rg2=$me_comp_rg2&&me_comp_residencia=$me_comp_residencia&&me_titulo_eleitor=$me_titulo_eleitor&&me_titulo_eleitor2=$me_titulo_eleitor2&&me_certidao_cas=$me_certidao_cas&&me_doc_pis=$me_doc_pis&&me_car_trab=$me_car_trab&&me_car_trab2=$me_car_trab2&&me_declaracao_bens=$me_declaracao_bens&&me_comp_esc=$me_comp_esc&&me_comp_esc2=$me_comp_esc2");  
   
?>
 