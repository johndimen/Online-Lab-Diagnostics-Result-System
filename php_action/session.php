<?php

include('db_config.php');

session_start();
   
$user_check = $_SESSION['login_user'];
$personel_check = $_SESSION['personel_id'];
   
$ses_sql = mysqli_query($conn,"SELECT Personel_Name from personel_detail where Personel_ID = '$personel_check' ");

$row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

$login_session = $row['Personel_Name'];


if(isset($_SESSION['id']))
{
    header("location: admin-page.php");
}

/*
"SELECT `personel_detail`.`Personel_Name`
FROM `login` 
    LEFT JOIN `personel_detail` ON `login`.`Personel_ID` = `personel_detail`.`Personel_ID` 
    WHERE `login`.`Login_ID` = '$user_check' ")
*/
?>