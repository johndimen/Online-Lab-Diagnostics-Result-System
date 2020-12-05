<?php


// insert admin laboratory request
// off(0) or on(1) equivalent to No(0) and Yes(1)

if(isset($_POST['submit'])){
    
    $randrequest = mt_rand(0,999999999);
    $Fname = $_POST['Fname'];
    $Lname = $_POST['Lname'];
    $DOB = $_POST['dob'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $City = $_POST['City'];
    $State = $_POST['State'];
    $Zipcode = $_POST['Zipcode'];
    $Email = $_POST['Email'];
    $Contact = $_POST['Contact'];

//first
    $requestqry = "";

    $requestresult = mysqli_query($conn,$requestqry);
    if(!$requestqry){
        printf("Error: %s\n", mysqli_error($conn));
        exit();
    }
    mysqli_affected_rows($conn);

//second
    $requestqry = "";

    $requestresult = mysqli_query($conn,$requestqry);
    if(!$requestqry){
        printf("Error: %s\n", mysqli_error($conn));
        exit();
    }
    mysqli_affected_rows($conn);

    if(mysqli_affected_rows($conn) > 0){
        echo "<script>alert('Successfully Sent!')</script>";
        echo "<script>location.href='index.html'</script>";
    }else 
        {
            echo "<script>alert('Unsuccessfully Send!')</script>";
        }

}


?>