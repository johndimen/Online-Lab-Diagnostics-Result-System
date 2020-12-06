<?php

$dashsql = "SELECT `r`.*, `p`.* FROM `request` AS `r` 
JOIN `patient_info` AS `p` ON `r`.`Patient_ID` = `p`.`Patient_ID`"; 
$dashquery = mysqli_query($conn, $dashsql);



?>