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

    $SurveyId= trim(random_int(1,2));
    $_SESSION["SurveyId"] = $SurveyId;
    
	$SurveyQuery	=	$DatabaseConnection->prepare("SELECT * FROM testsurvey WHERE Id = ? Limit 1");
	$SurveyQuery->execute([$SurveyId]);
	$RecordNumber	=	$SurveyQuery->rowCount();
	$Record			=	$SurveyQuery->fetch(PDO::FETCH_ASSOC);
	
	if($RecordNumber>0){
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
        <form action="vote.php" method="post">
            <div class="row">
                <input type="radio" name="answer" value="1" class="col-md-3" >
                <span class="col-md-6"><?php echo $Record["AnswerOne"]; ?></span>
            </div>
            <div class="row">
                <input type="radio" name="answer" value="2" class="col-md-3">
                <span class="col-md-6"><?php echo $Record["AnswerTwo"]; ?></span>
            </div>
            <div class="row">
                <input type="radio" name="answer" value="3" class="col-md-3">
                <span class="col-md-6"><?php echo $Record["AnswerThree"]; ?></span>
            </div>
            <div class="row">
                <button type="submit" class="btn btn-primary" name="submitBtn">Vote</button>
            </div>
        </form>
        <?php
	}else{
	?>
	Unknown Error.
	<?php
	}
	?>
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