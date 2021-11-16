<?php
session_start();
require_once("connect.php");
?>
<!doctype html>
<html lang="en-EN">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="Content-Language" content="en">
    <meta charset="utf-8">
    <link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Survey Example</title>
</head>

<body>
    <?php
    $SurveyQuery    =    $DatabaseConnection->prepare("SELECT * FROM testsurvey WHERE Id = ? LIMIT 1");
    $SurveyQuery->execute([$_SESSION["SurveyId"]]);
    $RecordNumber    =    $SurveyQuery->rowCount();
    $Record          =    $SurveyQuery->fetch(PDO::FETCH_ASSOC);

    $VoteNumberAnswerOne        =    $Record["VoteNumberAnswerOne"];
    $VoteNumberAnswerTwo        =    $Record["VoteNumberAnswerTwo"];
    $VoteNumberAnswerThree      =    $Record["VoteNumberAnswerThree"];
    $TotalVoters                =    $Record["TotalVoters"];

    if($VoteNumberAnswerOne == 0 ? $PercentageAnswerOne = 0 : $PercentageAnswerOne = number_format((($VoteNumberAnswerOne / $TotalVoters) * 100), 2, ",", ""));
    // $PercentageAnswerOne        =    number_format((($VoteNumberAnswerOne / $TotalVoters) * 100), 2, ",", "");
    if($VoteNumberAnswerTwo == 0 ? $PercentageAnswerTwo = 0 : $PercentageAnswerTwo = number_format((($VoteNumberAnswerTwo / $TotalVoters) * 100), 2, ",", ""));
    // $PercentageAnswerTwo        =    number_format((($VoteNumberAnswerTwo / $TotalVoters) * 100), 2, ",", "");
    if($VoteNumberAnswerThree == 0 ? $PercentageAnswerThree = 0 : $PercentageAnswerThree = number_format((($VoteNumberAnswerThree / $TotalVoters) * 100), 2, ",", ""));
    // $PercentageAnswerThree      =    number_format((($VoteNumberAnswerThree / $TotalVoters) * 100), 2, ",", "");

    if ($RecordNumber > 0) {
    ?>
        <div class="row">
            <a href="randomSurvey.php">
                <h1>Random Survey</h1>
            </a>
        </div>
        <div class="content">
            <div class="row">
                <h3><?php echo $Record["Question"]; ?></h3>
            </div>
            <div class="row">
                <div class="col-md-3 text-center"><em><?php echo $PercentageAnswerOne; ?></em></div>
                <span class="col-md-6"><?php echo $Record["AnswerOne"]; ?></span>
            </div>
            <div class="row">
                <div class="col-md-3 text-center"><em><?php echo $PercentageAnswerTwo ; ?></em></div>
                <span class="col-md-6"><?php echo $Record["AnswerTwo"]; ?></span>
            </div>
            <div class="row">
                <div class="col-md-3 text-center"><em><?php echo  $PercentageAnswerThree ; ?></em></div>
                <span class="col-md-6"><?php echo $Record["AnswerThree"]; ?></span>
            </div>
            <div class="row">
                <p><b>Total Votes :</b> <?php echo  $TotalVoters;  ?></p>
            </div>
        <?php
    } else {
        ?>
            Unknown Error.
        <?php
    }
        ?>
        </div>
        <div class="row">
            <a href="index.php">
                <h3>Home</h3>
            </a>
        </div>

        <script src="main.js"></script>
</body>

</html>
<?php
$DatabaseConnection    =    null;
?>