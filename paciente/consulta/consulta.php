<?php
include '../../conexao/conexao.php';


$calendarios="SELECT id,title,color,start from events";
$resultado_calendario =  $pdo -> prepare($calendarios);
$resultado_calendario->execute();

$calendario = [];

while($row_calendario = $resultado_calendario->fetch(PDO::FETCH_ASSOC)){

    $id = $row_calendario['id'];
    $title = $row_calendario['title'];
    $color = $row_calendario['color'];
    $start = $row_calendario['start'];


    $calendario[] = [

        'id' => $id,
        'title' => $title,
        'color' => $color,
        'start' => $start,
      

    ];
}

echo json_encode($calendario);
?>
