<?php
require_once("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Multi Deleting</title>
  <link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body>
	<form action="result.php" method="post">
	<table class="table table-bordered table-hover table-primary text-center mx-auto" style="width: 250px; margin-top: 200px;" >
	<?php
	$Query = $DatabaseConnection->prepare("SELECT * FROM testrecords");
	$Query->execute();
	
	$QueryRow = $Query->rowCount();
	$Records = $Query->fetchAll(PDO::FETCH_ASSOC);
	
	foreach($Records as $Record){
	?>
		<tbody>
			<tr>
				<td class="col-1 text-center" ><input type="checkbox" name="select[]" value=" <?= $Record["Id"]; ?>"></td>
				<td class="col-11"><?= $Record["Name"] . " " . $Record["Surname"]; ?></td>
			</tr>
		</tbody>
	<?php
	}
	?>
		<tfoot>
			<td colspan="2" class="text-end"><input type="submit" value="Delete selected" class="btn btn-primary"></td>
		</tfoot>
	</table>
	</form>
</body>
</html>