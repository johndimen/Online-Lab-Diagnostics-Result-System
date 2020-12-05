<?php 


// insert lab patient info
if(isset($_POST['submit'])){ 

    $patientid = $_POST['patientid'];
    $covidDOB = $_POST['covidDOB'];
    $gender = $_POST['gender'];
    $Fname = $_POST['Fname'];
    $Lname = $_POST['Lname'];
    $Address1 = $_POST['Address1'];
    $City = $_POST['City'];
    $State = $_POST['State'];
    $Zipcode = $_POST['Zipcode'];
    $Email = $_POST['Email'];
    $Contact = $_POST['Contact'];

   
//first

    $insert_query1 = "INSERT INTO `patient_info`(`Patient_ID`, `Patient_Fname`, `Patient_Lname`, `DateofBirth`, `Address`, `Email`, `Contact_Number`, `Gender`, `City`, `Zipcode`, `State`) 
                        VALUES ('$patientid','$Fname','$Lname','$covidDOB','$Address1','$Email','$Contact','$gender','$City','$Zipcode','$State')";


    $insert_result1 = mysqli_query($conn,$insert_query1);
    if (!$insert_result1) {
        printf("Error: %s\n", mysqli_error($conn));
        exit();
    }

    mysqli_affected_rows($conn);


    if(mysqli_affected_rows($conn) > 0){
        echo "<script>alert('Patient Info Successfully Sent!')</script>";
        echo "<script>location.href='index.html'</script>";
    }else 
        {
            echo "<script>alert('Unsuccessfully Send!')</script>";
        }

    }

    if(isset[$_POST['submit']]){
        
    }
?>