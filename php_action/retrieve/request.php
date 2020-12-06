<?php

/*dashboard table: Receive
$dashsql1 = "SELECT `r`.*, `p`.* FROM `request` AS `r` 
	        JOIN `patient_info` AS `p` ON `r`.`Patient_ID` = `p`.`Patient_ID`;"; 
$dashquery1 = mysqli_query($conn, $dashsql1);
$receivetable = mysqli_fetch_array($dashquery1);
*/

$id = $_GET['id'];

$dashsql1 = "SELECT `p`.*, `r`.*
	FROM `patient_info` AS `p` 
	JOIN `request` AS `r` ON `r`.`Patient_ID` = `p`.`Patient_ID` WHERE `r`.`Patient_ID` = '$id'"; 
$dashquery1 = mysqli_query($conn, $dashsql1);
$receive = mysqli_fetch_assoc($dashquery1);


/*
$retsql = "SELECT `sample_detail_ID`, `Patient_ID`, `Urgency`, `Fasting`, `Sample_Date`, `Sample_Time`
			 FROM `sample_detail` WHERE `Patient_ID` = '$id'";

$retqry = mysqli_query($conn,$retsql);
$retrslt = mysqli_fetch_assoc($retqry);
*/


$retsql1 = "SELECT `Blood`, `Urine`, `Sputum`, `Swab`, `Fluids`, `Tissue`, `Cytology`, `other`
			 FROM `sample_detail` WHERE `Patient_ID` = '$id'";

$retqry1 = mysqli_query($conn,$retsql1);
$retrslt1 = mysqli_fetch_assoc($retqry1);


?>