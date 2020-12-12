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
$receive1 = mysqli_fetch_assoc($dashquery1);


$retsql1 = "SELECT * FROM `sample_detail` WHERE `Patient_ID` = '$id'";

$retqry1 = mysqli_query($conn,$retsql1);
$retrslt1 = mysqli_fetch_assoc($retqry1);


$dashsql2 = "SELECT * FROM `relevant_info` WHERE `Patient_ID` = '$id'"; 
$dashquery2 = mysqli_query($conn, $dashsql2);
$receive2 = mysqli_fetch_assoc($dashquery2);


$retsql2 = "SELECT * FROM `profile_test` WHERE `Patient_ID` = '$id'";

$retqry2 = mysqli_query($conn,$retsql2);
$retrslt2 = mysqli_fetch_assoc($retqry2);


/*

SELECT `pt`.*, `r`.*, `a`.*, `ap`.*, `b`.*, `c`.*, `h`.*, `m`.*, `p`.*, `ri`.*, `s`.*
FROM `patient_info` AS `pt` 
	 LEFT JOIN `request` AS `r` ON `r`.`Patient_ID` = `pt`.`Patient_ID` 
	 LEFT JOIN `additional_test` AS `a` ON `a`.`Patient_ID` = `pt`.`Patient_ID` 
	 LEFT JOIN `anatomical_pathology` AS `ap` ON `ap`.`Patient_ID` = `pt`.`Patient_ID` 
	 LEFT JOIN `biochem` AS `b` ON `b`.`Patient_ID` = `pt`.`Patient_ID` 
	 LEFT JOIN `cervical_cytology` AS `c` ON `c`.`Patient_ID` = `pt`.`Patient_ID` 
	 LEFT JOIN `hematology` AS `h` ON `h`.`Patient_ID` = `pt`.`Patient_ID` 
	 LEFT JOIN `microbiology` AS `m` ON `m`.`Patient_ID` = `pt`.`Patient_ID` 
	 LEFT JOIN `profile_test` AS `p` ON `p`.`Patient_ID` = `pt`.`Patient_ID` 
	 LEFT JOIN `relevant_info` AS `ri` ON `r`.`Patient_ID` = `pt`.`Patient_ID` 
	 LEFT JOIN `sample_detail` AS `s` ON `s`.`Patient_ID` = `pt`.`Patient_ID` WHERE `r`.`Patient_ID` = 'CP-412402192-Sun-06'


$retsql = "SELECT `sample_detail_ID`, `Patient_ID`, `Urgency`, `Fasting`, `Sample_Date`, `Sample_Time`
			 FROM `sample_detail` WHERE `Patient_ID` = '$id'";

$retqry = mysqli_query($conn,$retsql);
$retrslt = mysqli_fetch_assoc($retqry);



$retsql1 = "SELECT `Blood`, `Urine`, `Sputum`, `Swab`, `Fluids`, `Tissue`, `Cytology`, `other`
			 FROM `sample_detail` WHERE `Patient_ID` = '$id'";

$retqry1 = mysqli_query($conn,$retsql1);
$retrslt1 = mysqli_fetch_assoc($retqry1);

*/
?>