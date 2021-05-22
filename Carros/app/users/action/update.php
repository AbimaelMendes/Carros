 <?php

$dirProjeto = $_SERVER['DOCUMENT_ROOT']. '/Carros/';

require $dirProjeto . 'classes/db/MySQL.php';


$MySQL = new MySQL();

$DB = $MySQL->connectDB();

$id = addslashes($_GET['id']);

$result = $MySQL->getForId($DB, 'user', $id);

foreach ($result as $cli) {
	$email = $cli['email'];
	$senha = $cli['senha'];
	
}