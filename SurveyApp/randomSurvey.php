<?php 
$SurveyId= trim(random_int(1,2));
$_SESSION["SurveyId"] = $SurveyId;
header("Location:index.php");
exit();
?>