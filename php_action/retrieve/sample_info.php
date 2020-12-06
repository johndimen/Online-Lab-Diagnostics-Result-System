<?php 

$id = $_GET['id'];

$retsql = "SELECT `Urgency`, `Fasting`, `Sample_Date`, `Sample_Time` 
        FROM `sample_detail` WHERE `Patient_ID` = 'CP-412402192-Sun-06' ";

$retqry = mysqli_query($conn,$retsql);
$retrslt = mysqli_fetch_assoc($retqry);

?>