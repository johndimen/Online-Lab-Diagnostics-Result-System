<?php


// insert covid questions
    if(isset($_POST['submit'])){
        $patientid = $_SESSION['patient'];
        $randcovid = mt_rand(0,999999999);
        $deceases = $_POST['deceases'];
        $travel = $_POST['travel'];
        $contact = $_POST['contact'];
        $preggy = $_POST['preggy'];
        $tested = $_POST['tested'];
        $difficulties = $_POST['difficulties'];
/*
        $query1 = "";


        $insert_result1 = mysqli_query($conn,$insert_query1);
        if (!$insert_result1) {
            printf("Error: %s\n", mysqli_error($conn));
            exit();
        }

        mysqli_affected_rows($conn);*/

        

//second
        $insert_query = "INSERT INTO `covid_questions`(`Question_ID`,`Patient_ID`, `Deceases`, `Travel_History`, `Contact_People`, `Pregnant_Weeks`, `Tested_at`, `Other_Difficulties`) 
                            VALUES ('$randcovid','$patientid','$deceases',' $travel','$contact','$preggy','$tested','$difficulties')";

        $insert_result = mysqli_query($conn, $insert_query);
        if (!$insert_result) {
            printf("Error: %s\n", mysqli_error($conn));
            exit();
        }

        mysqli_affected_rows($conn);

/*third 
        // off(0) or on(1) equivalent to No(0) and Yes(1)

        $qry = "SELECT * FROM `patient_info` WHERE Patient_ID = $randpatient";
        $qryresult =  mysqli_query($conn,$qry);
        $qryrows = mysqli_num_rows($qryresult);
        if($qryrows > 0){
            $insert_query2 = "INSERT INTO `request`(`Request_ID`, `Patient_ID`, `Request_Type`, `Is_Accepted`) 
                                VALUES ('$requ est_id,'$randpatient','Covid Test',0)";
            mysqli_query($conn,$insert_query2);

            mysqli_affected_rows($conn);
        }else{
            printf("error: %s\n",mysqli_error($conn));
        }
*/

        

        if(mysqli_affected_rows($conn) > 0){
            echo "<script>alert('Successfully Sent!')</script>";
			echo "<script>location.href='index.html'</script>";
		}else 
		    {
                echo "<script>alert('Unsuccessfully Send!')</script>";
                //printf("Error: %s\n", mysqli_error($conn));
			}
    }

?>