<?php
$randpatient = rand(0,999999999);

$day = date('D');
$day1 = date('d');

$covidpatient =  "CP-$randpatient-$day-$day1"; 


/*
if(isset($_POST['next']))
{
    $area = $_POST['location'];
    $function = $_POST['category'];
    $sql3 = "SELECT * FROM concession where area = '$area' AND function = '$function'";
    $query3 = mysqli_query($conn, $sql3);
    
}
*/


?>