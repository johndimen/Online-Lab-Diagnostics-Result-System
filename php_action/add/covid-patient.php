<?php


$Fname_err = $Lname_err = $address_err = $email_err = $contact_err = "";
$city_err = $zipcode_err = $state_err = $dob_err = $gender_err = "";

// insert covid patient info
    if(isset($_POST['submit'])){ 
/*
            // Validate Fname
    $input_name = trim($_POST["Fname"]);
    if(empty($input_name)){
        $Fname_err = "Please enter your first name.";
    } elseif(!filter_var(trim($_POST["name"]), FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z'-.\s ]+$/")))){
        $Fname_err = 'Please enter a valid first name.';
    }
    // Validate Lname
    $input_name = trim($_POST["Lname"]);
    if(empty($input_name)){
        $Lname_err = "Please enter your last name.";
    } elseif(!filter_var(trim($_POST["name"]), FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z'-.\s ]+$/")))){
        $Lname_err = 'Please enter a valid last name.';
    }
        // Validate address
        $input_address = trim($_POST["Address1"]);
        if(empty($input_address)){
            $address_err = 'Please enter an address.';     
        }
    
        // Validate address
        $input_city = trim($_POST["City"]);
        if(empty($input_city)){
            $city_err = 'Please enter a city.';     
        }
        */

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
            echo "<script>alert('Patient Info and Covid information Successfully Sent!')</script>";
			echo "<script>location.href='index.html'</script>";
		}else 
		    {
                echo "<script>alert('Unsuccessfully Send!')</script>";
			}
    }

if(isset($_POST['submit'])){
    $patientid = $_POST['patientid'];
    $deceases = $_POST['deceases'];
    $travel = $_POST['travel'];
    $contact = $_POST['contact'];
    $preggy = $_POST['preggy'];
    $tested = $_POST['tested'];
    $difficulties = $_POST['difficulties'];

    


//second insert to covid question
        $insert_query = "INSERT INTO `covid_questions`(`Patient_ID`, `Deceases`, `Travel_History`, `Contact_People`, `Pregnant_Weeks`, `Tested_at`, `Other_Difficulties`) 
                            VALUES ('$patientid','$deceases',' $travel','$contact','$preggy','$tested','$difficulties')";

        $insert_result = mysqli_query($conn, $insert_query);
            if (!$insert_result) {
            printf("Error: %s\n", mysqli_error($conn));
            exit();
            }

        mysqli_affected_rows($conn);

}

if(isset($_POST['submit'])){

    $random = rand(0,999999999);
    $day = date('z');
    $yr = date('M');

    $requestid = "RQ-$random-$yr-$day";
    
//third insert to request table
    $insert = "INSERT INTO `request`(`Request_ID`, `Patient_ID`, `Request_Type`, `Is_Accepted`)
             VALUES ('$requestid','$patientid','Covid','No')";
    
    $insert_result = mysqli_query($conn, $insert);
    if (!$insert) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
    }

    mysqli_affected_rows($conn);

}
    

?>