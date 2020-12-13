<?php

$rid = $_GET['id'];

$releasesql = "SELECT * FROM `result` WHERE `Is_Published` = 'No'";

$relqry = mysqli_query($conn, $releasesql);

$patientsql ="SELECT * FROM `exam`";

$patientqry = mysqli_query($conn,$patientsql);


$resultsql = "SELECT * FROM `result` WHERE `Result_ID` = '$rid'";

$resultqry = mysqli_query($conn,$resultsql);
$result1 = mysqli_fetch_assoc($resultqry);




?>