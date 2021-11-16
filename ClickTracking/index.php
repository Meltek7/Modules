<?php
require_once("connect.php");
?>
<!doctype html>
<html lang="en-EN">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Content-Language" content="en">
<meta charset="utf-8">
<link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.min.css">
<title>Click Tracking</title>
<style>
	body{
		background-color: beige;
	}	
</style>
</head>

<body>
	<h1>Hit Tracking</h1>
	<table class="table table-bordered table-hover table-primary text-center mx-auto" style="width: 700px; margin-top: 200px;">
		<tr>
			<th class="col-md-6">&nbsp;Title</th>
			<th class="col-md-6">Hit Number&nbsp;</th>
		</tr>
		<?php
		$Query			=	$DatabaseConnection->prepare("SELECT * FROM testclick");
		$Query->execute();
		$RecordsRow	    =	$Query->rowCount();
		$Records		=	$Query->fetchAll(PDO::FETCH_ASSOC);
		
		if($RecordsRow>0){
			foreach($Records as $Record){
		?>
		<tr>
			<td><a href="read.php?id=<?php echo $Record["Id"]; ?>" style="color: black; text-decoration: none;">&nbsp;<?php echo $Record["Title"]; ?></a></td>
			<td><?php echo $Record["HitNumbers"]; ?>&nbsp;</td>
		</tr>
		<?php
			}
		}
		?>
	</table>
</body>
</html>
<?php
$DatabaseConnection	=	null;
?>