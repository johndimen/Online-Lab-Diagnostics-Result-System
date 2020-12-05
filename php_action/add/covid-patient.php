<?php

// insert covid patient info
    if(isset($_POST['next'])){ 
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
			echo "<script>location.href='covid-form.php'</script>";
		}else 
		    {
                echo "<script>alert('Unsuccessfully Send!')</script>";
			}
    }

    
// insert covid questions
if(isset($_POST['submit1'])){
    $randcovid = mt_rand(0,999999999);
    $deceases = $_POST['deceases'];
    $travel = $_POST['travel'];
    $contact = $_POST['contact'];
    $preggy = $_POST['preggy'];
    $tested = $_POST['tested'];
    $difficulties = $_POST['difficulties'];
    
//second
    $insert_query = "INSERT INTO `covid_questions`(`fkpatientid`,`Patient_ID`, `Deceases`, `Travel_History`, `Contact_People`, `Pregnant_Weeks`, `Tested_at`, `Other_Difficulties`) 
                        VALUES ('$randcovid','','$deceases',' $travel','$contact','$preggy','$tested','$difficulties')";

    $insert_result = mysqli_query($conn, $insert_query);
    if (!$insert_result) {
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