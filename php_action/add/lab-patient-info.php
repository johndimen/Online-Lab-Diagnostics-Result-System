<?php
/*
function getPost(){
    $question = array();
    $question[0] = $_POST['deceases'];
    $question[1] = $_POST['travel'];
    $question[2] = $_POST['contact'];
    $question[3] = $_POST['preggy'];
    $question[4] = $_POST['tested'];
    $question[5] = $_POST['difficulties'];

    return $question;
}

function getPost1(){
    $question1 = array();
    
    $question1[0] = $_POST['covidDOB'];
    $question1[1] = $_POST['gender'];
    $question1[2] = $_POST['Fname'];
    $question1[3] = $_POST['Lname'];
    $question1[4] = $_POST['Address1'];
    $question1[5] = $_POST['City'];
    $question1[6] = $_POST['State'];
    $question1[7] = $_POST['Zipcode'];
    $question1[8] = $_POST['Email'];
    $question1[9] = $_POST['Contact'];

    return $question1;
}
*/
// insert covid questions
    if(isset($_POST['submit'])){

        $randpatient = mt_rand(0,999999999);
        
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
        
        $deceases = $_POST['deceases'];
        $travel = $_POST['travel'];
        $contact = $_POST['contact'];
        $preggy = $_POST['preggy'];
        $tested = $_POST['tested'];
        $difficulties = $_POST['difficulties'];

        //$request_id = mt_rand(0,999999999);
        //$request_type = 'Covid';

        //$data = getPost();
        
//first
        //$data1 = getPost1();

        $insert_query1 = "INSERT INTO `patient_info`(`Patient_ID`, `Patient_Fname`, `Patient_Lname`, `DateofBirth`, `Address`, `Email`, `Contact_Number`, `Gender`, `City`, `Zipcode`, `State`) 
                            VALUES ('$randpatient','$Fname','$Lname','$covidDOB','$Address1','$Email','$Contact','$gender','$City','$Zipcode','$State')";


        $insert_result1 = mysqli_query($conn,$insert_query1);
        if (!$insert_result1) {
            printf("Error: %s\n", mysqli_error($conn));
            exit();
        }

        mysqli_affected_rows($conn);

//second
        $insert_query = "INSERT INTO `covid_questions`(`Question_ID`,`Patient_ID`, `Deceases`, `Travel_History`, `Contact_People`, `Pregnant_Weeks`, `Tested_at`, `Other_Difficulties`) 
                            VALUES ('$randcovid','$randpatient','$deceases',' $travel','$contact','$preggy','$tested','$difficulties')";

        $insert_result = mysqli_query($conn, $insert_query);
        if (!$insert_result) {
            printf("Error: %s\n", mysqli_error($conn));
            exit();
        }

        mysqli_affected_rows($conn);

//third 
        // off(0) or on(1) equivalent to No(0) and Yes(1)

        $qry = "SELECT * FROM `patient_info` WHERE Patient_ID = $randpatient";
        $qryresult =  mysqli_query($conn,$qry);
        $qryrows = mysqli_num_rows($qryresult);
        if($qryrows > 0){
            $insert_query2 = "INSERT INTO `covid_questions`(`Question_ID`,`Patient_ID`, `Deceases`, `Travel_History`, `Contact_People`, `Pregnant_Weeks`, `Tested_at`, `Other_Difficulties`) 
                                VALUES ('$randcovid','$randpatient','$deceases',' $travel','$contact','$preggy','$tested','$difficulties')";

            mysqli_query($conn,$insert_query2);

            mysqli_affected_rows($conn);
        }else{
            printf("error: %s\n",mysqli_error($conn));
        }
//

        

        if(mysqli_affected_rows($conn) > 0){
            echo "<script>alert('Patient Info Successfully Sent!')</script>";
			echo "<script>location.href='request-form.php'</script>";
		}else 
		    {
                echo "<script>alert('Unsuccessfully Send!')</script>";
                //printf("Error: %s\n", mysqli_error($conn));
			}
    }

?>