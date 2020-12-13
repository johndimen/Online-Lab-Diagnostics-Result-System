<?php

//dashboard table: Receive

/*SELECT `r`.*, `p`.* FROM `request` AS `r` 
			JOIN `patient_info` AS `p` ON `r`.`Patient_ID` = `p`.`Patient_ID`;*/
			

$dashsql1 = "SELECT `r`.*, `p`.* FROM `request` AS `r` 
JOIN `patient_info` AS `p` ON `r`.`Patient_ID` = `p`.`Patient_ID` WHERE `Is_Accepted` = 'No'"; 
$dashquery1 = mysqli_query($conn, $dashsql1);

//dashboard table: Release

/*SELECT `patient_info`.`Patient_ID`, CONCAT(`patient_info`.`Patient_Fname`, ' ' , 
						`patient_info`.`Patient_Lname`) AS Patient_Name ,`result`.`Result`,`result`.`Date_Result` 
						FROM `result` JOIN `patient_info` ON `result`.`Patient_ID` = `patient_info`.`Patient_ID`  */

$dashsql2 = "SELECT * FROM `result` WHERE `Is_Published` = 'Yes' "; 
$dashquery2 = mysqli_query($conn, $dashsql2);



?>