<?php 


if(isset($_POST['next']))
{
    $patientno = $_POST['patientid'];

    $search = "SELECT `Patient_ID` FROM `patient_info` WHERE `Patient_ID` = $patientno";
    $srchresult = mysqli_query($conn,$search);
    $result = mysqli_fetch_assoc($srchresult);
    

}
?>