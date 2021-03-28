<?php 
error_reporting(0);
if(isset($_GET['resultid'])){

    $resultid = $_GET['resultid'];
    $searchsql = " SELECT * FROM `result` WHERE `Result_ID` = '$resultid' AND `Is_Published` = 'Yes'";

    $searchqry = mysqli_query($conn,$searchsql);



}

?>