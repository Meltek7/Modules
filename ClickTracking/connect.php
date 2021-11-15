<?php
try{
	$DatabaseConnection = new PDO("mysql:host=localhost;dbname=test;charset=UTF8", "root", "");
}catch(PDOException $exception){
	echo "Connection Error <br>" . $exception->getMessage();
	die();
}
?>