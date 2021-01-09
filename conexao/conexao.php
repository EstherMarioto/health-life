<?php
try{
    $pdo = new PDO('mysql:host=br612.hostgator.com.br;dbname=hubsap45_bdhealthlife;charset=utf8', 'hubsap45_usrhelt', '@helthlife1234567');
}catch (PDOException $e){
    echo $e->getMessage() . "</p>";
    die("Não foi possivel estabelecer a conexão com o banco de dados");
};
?>