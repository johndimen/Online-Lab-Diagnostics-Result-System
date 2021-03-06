<?php


// insert admin laboratory request
// off(0) or on(1) equivalent to No(0) and Yes(1)

if(isset($_POST['accept'])){

    $adminid = (int)$_POST['id'];
    $name = $_POST['name'];
    $org = $_POST['org'];
    $add = $_POST['add'];
    $contact = $_POST['contact'];

//first
    $insertqry = "INSERT INTO `requester_info`(`Login_ID`, `Requester_Name`, `Organization_Name`, `Address`, `Contact_Number`)
                 VALUES ($adminid,'$name','$org','$add','$contact')";

    $insertresult = mysqli_query($conn,$insertqry);
    
    if(!$insertresult){
        printf("Error: %s\n", mysqli_error($conn));
        exit();
    }

    mysqli_affected_rows($conn);

    if(mysqli_affected_rows($conn) > 0){
        echo "<script>alert('Successfully Updated!')</script>";
        echo "<script>location.href='admin-request.php'</script>";
    }else 
        {
            echo "<script>alert('Unsuccessfully Updated!')</script>";
        }

}

if(isset($_POST['accept'])){

    $random = mt_rand(0,999999999);
    $day = date('z');
    $month = date('m');
    $examid = "Ex-$random-$month-$day";
    
    $pid = $_POST['pid'];
    $rid = $_POST['rid'];

    $id = $_GET['id'];

    $updateqry = "UPDATE `request` SET `Is_Accepted` = 'Yes' WHERE `request`.`Patient_ID` = '$id'";

    $addexam = "INSERT INTO `exam`(`Exam_ID`, `Request_ID`, `Exam_Taken`)
                 VALUES ('$examid','$rid','0000-00-00')";

    $updateresult = mysqli_query($conn,$updateqry);
    mysqli_affected_rows($conn);
    if(!$updateresult){
        printf("Error: %s\n", mysqli_error($conn));
        exit();
    }elseif(mysqli_affected_rows($conn) > 0){
        $examqry = mysqli_query($conn,$addexam);

        echo "<script>alert('Successfully Updated!')</script>";
        echo "<script>location.href='admin-request.php'</script>";
    }else 
        {
            echo "<script>alert('Unsuccessfully Updated!')</script>";
        }
}

if(isset($_POST['decline'])){

    $id = $_GET['id'];

    $updateqry1 = "UPDATE `request` SET `Is_Accepted`= 'Nope' WHERE `request`.`Patient_ID` = '$id'";
    $updateresult1 = mysqli_query($conn,$updateqry1);
    if(!$updateresult1){
        printf("Error: %s\n", mysqli_error($conn));
        exit();
    }

    mysqli_affected_rows($conn);
    
    if(mysqli_affected_rows($conn) > 0){
        echo "<script>alert('Successfully Updated!')</script>";
        echo "<script>location.href='admin-request.php'</script>";
    }else 
        {
            echo "<script>alert('Unsuccessfully Updated!')</script>";
        }
}

?>