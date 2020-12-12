<?php



$dashsql = "SELECT `r`.*, `p`.* FROM `request` AS `r` 
JOIN `patient_info` AS `p` ON `r`.`Patient_ID` = `p`.`Patient_ID` where Is_Accepted = 'No'"; 
$dashquery = mysqli_query($conn, $dashsql);



$retsql1 = "SELECT `Blood`, `Urine`, `Sputum`, `Swab`, `Fluids`, `Tissue`, `Cytology`, `other`
			 FROM `sample_detail` WHERE `Patient_ID` = ''";

$retqry1 = mysqli_query($conn,$retsql1);
$retrslt1 = mysqli_fetch_assoc($retqry1);



?>