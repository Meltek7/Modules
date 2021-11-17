<?php
try {
    $DatabaseConnection = new PDO("mysql:host=localhost;dbname=test;charset=UTF8", "root", "");
} catch (PDOException $exception) {
    echo "Connection Error <br>" . $exception->getMessage();
    die();
}
?>
<!doctype html>
<html lang="en-EN">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="Content-Language" content="en">
    <meta charset="utf-8">
    <link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.min.css">
    <title>Banner System</title>
    <style>
        body {
            background-color: beige;
        }
    </style>
</head>

<body>
    <?php
    $Query            =    $DatabaseConnection->prepare("SELECT * FROM testbanner ORDER BY NumberofHit ASC LIMIT 1");
    $Query->execute();
    $Record            =    $Query->fetch(PDO::FETCH_ASSOC);
    ?>
    <header style="text-align:center; margin-top:2%">
        <img src="<?php echo $Record["FileName"]; ?>" alt="">
    </header>

</body>

</html>
<?php

$UpdateHitNumber = $DatabaseConnection->prepare("UPDATE testbanner SET NumberofHit=NumberofHit+1 WHERE Id = ? LIMIT 1");
$UpdateHitNumber->execute([$Record["Id"]]);

$DatabaseConnection    =    null;
?>