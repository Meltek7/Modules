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
    <title>Search Example</title>
    <style>
        body {
            background-color: beige;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div clas="row">
            <form action="index.php" method="post" class="input-group mb-3">
                <input type="text" name="search" id="search" class="form-control" aria-describedby="btnSearch">
                <input type="submit" value="Search" name="btnSearch" id="btnSearch" class="btn btn-outline-secondary">
            </form>
        </div>
        <div class="row">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Product Name</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_POST["search"])) {
                        $SearchWord    =    Security($_POST["search"]);
                    } else {
                        $SearchWord    =    "";
                    }

                    if ($SearchWord != "") {
                        $Pattern          =    "%$SearchWord%";

                        $Query            =    $DatabaseConnection->prepare("SELECT * FROM testsearch WHERE productName LIKE ?");
                        $Query->execute([$Pattern]);
                        $RecordsRow    =    $Query->rowCount();
                        $Records       =    $Query->fetchAll(PDO::FETCH_ASSOC);

                        foreach ($Records as $Record) {
                    ?> <tr>
                                <td>
                                </td>
                                <td><?php echo $Record["productName"]; ?></td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
<?php
$DatabaseConnection    =    null;
?>