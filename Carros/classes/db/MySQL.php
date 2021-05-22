<?php

class MySQL{
	const HOST = 'localhost';
	const USER = 'root';
	const PASS = 'IXCSoft6001';
	const DATABASE = 'carros';

	public function connectDB(){
		return new mysqli(self::HOST, self::USER, self::PASS, self::DATABASE);
	}

	public function getAll($DB, $tabela){
		return $DB->query("SELECT * FROM $tabela");
	}

	public function deleteById($DB, $tabela, $id){
		return $DB->query("DELETE FROM $tabela WHERE id = $id");
	}

	public function getForId($DB, $tabela, $id){
		return $DB->query("SELECT * FROM $tabela WHERE id =$id");
	}

}