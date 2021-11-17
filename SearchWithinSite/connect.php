<?php
try{
	$DatabaseConnection = new PDO("mysql:host=localhost;dbname=test;charset=UTF8", "root", "");
}catch(PDOException $exception){
	echo "Connection Error <br>" . $exception->getMessage();
	die();
}

function Security($Value){
	$First  = trim($Value);
	$Second = strip_tags($First);
	$Third  = htmlspecialchars($Second, ENT_QUOTES);
	$Result = $Third;
	return $Result;
}
?>