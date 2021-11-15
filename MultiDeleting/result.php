<?php 
require_once("connection.php");

$selected = $_POST["select"];
$IDs = implode(", ", $selected);

$Delete = $DatabaseConnection->prepare("DELETE FROM testrecords WHERE Id IN ($IDs)");
$Delete->execute();

header("Location:index.php");
exit();

?>