<?php


include '../../classes/session/session.php';

$dirProjeto = $_SERVER['DOCUMENT_ROOT']. '/Carros/';

require $dirProjeto . 'classes/db/MySQL.php';

$MySQL = new MySQL();

$DB = $MySQL->connectDB();

session_start();

$email = addslashes($_POST['email']);
$senha = sha1(addslashes($_POST['senha']));
$confirmaSenha = sha1(addslashes($_POST['confirmaSenha']));
$emailSessao = $_SESSION['email'];


$validaEmail= $DB-> query("SELECT id FROM user WHERE email = '$email' AND email != '$emailSessao'");


if ($validaEmail->num_rows > 0){

	header('Location: ../new.php?jaexiste=true');
	exit;
}

if ($senha == $confirmaSenha) {
	$DB->query("INSERT INTO `user`(`email`, `senha`) VALUES ('$email','$senha')");
	if ($DB->affected_rows > 0) {
		header('Location: ../list.php');
	}else{
		header('Location: ../new.php');
	}
}else{
	$senha =1;
	header('Location: ../new.php?senha='.$senha);
}
