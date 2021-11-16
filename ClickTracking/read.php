<?php
require_once("connect.php");
$ID		=	$_GET["id"];

$HitUpdate		=	$DatabaseConnection->prepare("UPDATE testclick SET HitNumbers=HitNumbers+1 WHERE Id = ?");
$HitUpdate->execute([$ID]);
?>
<!doctype html>
<html lang="en-EN">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Content-Language" content="en">
<meta charset="utf-8">
<title>Click Tracking</title>
	<style>
	body{
		background-color: beige;
	}	
</style>
</head>

<body>
	<table width="1000" border="0" cellpadding="0" cellspacing="0" align="center">
		<tr height="30">
			<td align="left"><b>Hit Tracking</b></td>
			<td align="right"><a href="index.php" style="text-decoration: none; color: black;">Home</a></td>
		</tr>
	<?php
	$Query			=	$DatabaseConnection->prepare("SELECT * FROM testclick WHERE Id = ?");
	$Query->execute([$ID]);
	$RecordsRow	    =	$Query->rowCount();
	$Records		=	$Query->fetch(PDO::FETCH_ASSOC);

	if($RecordsRow>0){
	?>
		<tr height="30">
			<td colspan="2" align="left"><h3><?php echo $Records["Title"]; ?><h3></td>
		</tr>
		<tr height="30">
			<td colspan="2" align="left"><?php echo $Records["Content"]; ?></td>
		</tr>
		<tr height="30">
			<td colspan="2" align="center">This article has been viewed <?php echo $Records["HitNumbers"]; ?> times.</td>
		</tr>
	<?php
	}else{
		header("Location:index.php");
		exit();
	}
	?>
	</table>
</body>
</html>
<?php
$DatabaseConnection	=	null;
?>