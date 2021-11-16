<?php
session_start();
require_once("connect.php");

if(isset($_POST["answer"])){
    $Answer        =    Security($_POST["answer"]);
}

$ControlQuery        =    $DatabaseConnection->prepare("SELECT * FROM testsurvey_voters WHERE Ipaddress = ? AND VoteDate <= ? AND SurveyId = ?");
$ControlQuery->execute([$IpAddress, $ElapsedTime, $_SESSION["SurveyId"]]);
$ControlRowNumber    =    $ControlQuery->rowCount();
if (!isset($Answer)) {
    $text = "Please choose one.<br><a ' href='index.php'>Home</a>";
} else {
    if ($ControlRowNumber > 0) {
        $text =  "Warning<br /> For this question you voted before. Please try again at least 24 hour later.<br><a href='index.php'>Home</a>";
    } else {
        if ($Answer == 1) {
            $Update    =    $DatabaseConnection->prepare("UPDATE testsurvey SET VoteNumberAnswerOne=VoteNumberAnswerOne+1, TotalVoters=TotalVoters+1");
            $Update->execute();
        } elseif ($Answer == 2) {
            $Update    =    $DatabaseConnection->prepare("UPDATE testsurvey SET VoteNumberAnswerTwo=VoteNumberAnswerTwo+1, TotalVoters=TotalVoters+1");
            $Update->execute();
        } elseif ($Answer == 3) {
            $Update    =    $DatabaseConnection->prepare("UPDATE testsurvey SET VoteNumberAnswerThree=VoteNumberAnswerThree+1, TotalVoters=TotalVoters+1");
            $Update->execute();
        } else {
            $text = "Error<br /> Unknown Error.Please try again later.";
        }

        $Add            =    $DatabaseConnection->prepare("INSERT INTO testsurvey_voters (Ipaddress, VoteDate) values (?, ?)");
        $Add->execute([$IpAddress, $ElapsedTime]);
        $AddControl    =    $Add->rowCount();

        if ($AddControl > 0) {
            $text = "Thank you for voting.<br /><a ' href='index.php'>Home</a>";
        } else {
            $text = "Error<br /> Unknown Error.Please try again later.<br><a ' href='index.php'>Home</a>";
        }
    }
}

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
    <div class="row">
        <a href="randomSurvey.php">
            <h1>Random Survey</h1>
        </a>
    </div>
    <div class="content">
        <div class="row">
            <h3><?php echo $text; ?></h3>
        </div>
    </div>
    <div class="row">
        <a href="results.php">
            <h3>View Results</h3>
        </a>
    </div>

    <script src="main.js"></script>
</body>
</html>
<?php
$DatabaseConnection    =    null;
?>