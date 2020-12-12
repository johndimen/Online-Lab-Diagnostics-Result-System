<?php 

if(isset($_POST['search1'])){

    $eid = $_POST['eid'];

    $searchsql = "SELECT * FROM `exam` WHERE `Exam_ID` = '$eid'";

    $searchqry = mysqli_query($conn, $searchsql);

    if(empty($searchres = mysqli_fetch_assoc($searchqry))){
        echo "<script>alert('Exam ID not found!')</script>";
        echo "<script>location.href='admin-results.php'</script>";
    }else{
        echo "<script>alert('Successfully Updated!')</script>";
        echo "<script>location.href='admin-addresult.php'</script>";
    }
    
}


?>