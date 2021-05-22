<?php

$dirProjeto = $_SERVER['DOCUMENT_ROOT']. '/Carros/';

require $dirProjeto . 'classes/db/MySQL.php';

$MySQL = new MySQL();

$DB = $MySQL->connectDB();

$marca = addslashes($_POST['marca']);
$modelo = addslashes($_POST['modelo']);
$ano = addslashes($_POST['ano']);
$valor = addslashes($_POST['valor']);
$obs = addslashes($_POST['obs']);


$DB->query("INSERT INTO `cars`(`marca`, `modelo`, `ano`, `valor`, `obs`) VALUES ('$marca','$modelo','$ano','$valor','$obs')");

if ($DB->affected_rows > 0) {
	header('Location: ../list.php');
}else{
	header('Location: ../new.php');
}