<?php 

if(isset($_POST['add'])){

    $random = mt_rand(0,999999999);
    $day = date('z');
    $month = date('m');
    $resid = "Rst-$random-$month-$day";


    $eid = $_POST['examid'];
    $resultdate = $_POST['resultdate'];
    $datetaken = $_POST['datetaken'];
    $result = "N/A";
    $summary = "N/A";
    $publish = "No";


    $addrsltsql = "INSERT INTO `result`(`Result_ID`, `Exam_ID`, `Date_Result`, `Result`, `Summary`, `Is_Published`) 
                VALUES ('$resid','$eid','$resultdate','$result','$summary','$publish')";
    $updateexamsql = "UPDATE `exam` SET 
        `Exam_Taken`='$datetaken',`Is_Done`='Yes' WHERE `Exam_ID` = '$eid'";

    $addrsltqry = mysqli_query($conn,$addrsltsql);
    mysqli_affected_rows($conn);
    if(!$addrsltqry){
        printf("Error: %s\n", mysqli_error($conn));
        exit();
    }elseif(mysqli_affected_rows($conn) > 0){
        $addexamqry = mysqli_query($conn,$updateexamsql);

        echo "<script>alert('Successfully Updated!')</script>";
        echo "<script>location.href='admin-results.php'</script>";
    }else 
        {
            echo "<script>alert('Unsuccessfully Updated!')</script>";
        }

    }

if(isset($_POST['save'])){

    $resultid = $_POST['resultid'];
    $eval = $_POST['eval'];
    $medsummary = $_POST['medsummary'];
    $pub = "Yes";

    $updatersltsql = "UPDATE `result` SET `Result`='$eval',`Summary`='$medsummary',`Is_Published`='$pub' 
                                    WHERE `Result_ID` = '$resultid'";

    $updatersltqry = mysqli_query($conn,$updatersltsql);
    mysqli_affected_rows($conn);
    if(!$updatersltqry){
        printf("Error: %s\n", mysqli_error($conn));
        exit();
    }elseif(mysqli_affected_rows($conn) > 0){

        echo "<script>alert('Successfully Updated!')</script>";
        echo "<script>location.href='admin-results.php'</script>";
    }else 
        {
            echo "<script>alert('Unsuccessfully Updated!')</script>";
        }

}
    
?>