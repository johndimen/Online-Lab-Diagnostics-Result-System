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

    $random = rand(0,999999999);
    $day = date('z');
    $yr = date('M');

    $requestid = "RQ-$random-$yr-$day";

    $patientid = $_POST['patientid'];
    $additonaltest = $_POST['additonaltest'];
    

   
//first 
        $insert_query1 = "INSERT INTO `patient_info`(`Patient_ID`, `Patient_Fname`, `Patient_Lname`, `DateofBirth`, `Address`, `Email`, `Contact_Number`, `Gender`, `City`, `Zipcode`, `State`) 
                        VALUES ('$patientid','$Fname','$Lname','$covidDOB','$Address1','$Email','$Contact','$gender','$City','$Zipcode','$State')";
       
        $insert = "INSERT INTO `request`(`Request_ID`, `Patient_ID`, `Request_Type`, `Is_Accepted`)
                        VALUES ('$requestid','$patientid','lab','No')";
        $insert_result1 = mysqli_query($conn,$insert_query1);       
        


    
 mysqli_affected_rows($conn);
    if (!$insert_result1) {
        printf("Error: %s\n", mysqli_error($conn));
        exit();
    }elseif(mysqli_affected_rows($conn) > 0){

        $insert_query10 = "INSERT INTO `additional_test`(`Patient_ID`, `Specify`)
        VALUES ('$patientid','$additonaltest')";

        $insert_result10 = mysqli_query($conn,$insert_query10);

        $insert_result = mysqli_query($conn, $insert);

        echo "<script>alert('Patient Info Successfully Sent!')</script>";
        echo "<script>location.href='index.html'</script>";
    }else 
        {
            echo "<script>alert('Unsuccessfully Send!')</script>";
        }

    }

    
if(isset($_POST['submit'])){

    $patientid = $_POST['patientid'];
    $urgency = $_POST['urgency'];
    $fasting = $_POST['fasting'];
    $sampledate = $_POST['sampledate'];
    $sampletime = $_POST['sampletime'];
    $blood = $_POST['blood'];
    $urine = $_POST['urine'];
    $swab = $_POST['swab'];
    $tissue = $_POST['tissue'];
    $faeces = $_POST['faeces'];
    $sputum = $_POST['sputum'];
    $fluid = $_POST['fluids'];
    $cytology = $_POST['cytology'];
    $otherxtxt = $_POST['otherxtxt'];

    if(!isset($blood)){
        $blood = "No";
    }
    if(!isset($urine)){
        $urine = "No";
    }
    if(!isset($swab)){
        $swab = "No";
    }
    if(!isset($tissue)){
        $tissue = "No";
    }
    if(!isset($faeces)){
        $faeces = "No";
    }
    if(!isset($sputum)){
        $sputum = "No";
    }
    if(!isset($fluid)){
        $fluid = "No";
    }
    if(!isset($cytology)){
        $cytology = "No";
    }

    $insert_query2 = "INSERT INTO `sample_detail`(`Patient_ID` , `Urgency`, `Fasting`, `Sample_Date`, `Sample_Time`, `Blood`, `Faeces`, `Urine`, `Sputum`, `Swab`, `Fluids`, `Tissue`, `Cytology`, `other`)
                 VALUES ('$patientid' ,'$urgency','$fasting','$sampledate',TIME_FORMAT('$sampletime', '%r'),'$blood','$faeces','$urine','$sputum','$swab','$fluid','$tissue','$cytology','$otherxtxt')";


    $insert_result2 = mysqli_query($conn,$insert_query2);
    if (!$insert_result2) {
        printf("Error: %s\n", mysqli_error($conn));
        exit();
    }

    mysqli_affected_rows($conn);


    }

    
    if(isset($_POST['submit'])){

        $patientid = $_POST['patientid'];
        $drugtherapy = $_POST['drugtherapy'];
        $lastdose = $_POST['lastdose'];
        $drugdate = $_POST['drugdate'];
        $drugtime = $_POST['drugtime'];
        $orci = $_POST['orci'];

        $insert_query3 = "INSERT INTO `relevant_info`(`Patient_ID`, `Drug_Therapy`, `last_Dose`, `Dose_Date`, `Dose_Time`, `Other_Info`) 
                            VALUES ('$patientid', '$drugtherapy','$lastdose','$drugdate',TIME_FORMAT('$drugtime', '%r'),'$orci')";

        $insert_result3 = mysqli_query($conn,$insert_query3);
        if(!$insert_result3){
            printf("Error: %s\n",mysqli_error($conn));
            exit();
        }
        
        mysqli_affected_rows($conn);
    }

    
    if(isset($_POST['submit'])){
        $patientid = $_POST['patientid'];
        $g2000 = $_POST['g2000'];
        $g2000x = $_POST['g2000x'];
        $gt9 = $_POST['gt9'];
        $gti = $_POST['gti'];
        $neo = $_POST['neo'];
        $es = $_POST['es'];
        $hb3 = $_POST['hb3'];
        $dfs = $_POST['dfs'];
        $lft = $_POST['lft'];
        $tft = $_POST['tft'];
        $mac = $_POST['mac'];
        $lgl = $_POST['lgl'];
        $lip = $_POST['lip'];

        
    if(!isset($g2000)){
        $g2000 = "No";
    }
    if(!isset($g2000x)){
        $g2000x = "No";
    }
    if(!isset($gt9)){
        $gt9 = "No";
    }
    if(!isset($gti)){
        $gti = "No";
    }
    if(!isset($neo)){
        $neo = "No";
    }
    if(!isset($es)){
        $es = "No";
    }
    if(!isset($hb3)){
        $hb3 = "No";
    }
    if(!isset($dfs)){
        $dfs = "No";
    }
    if(!isset($lft)){
        $lft = "No";
    }
    if(!isset($tft)){
        $tft = "No";
    }
    if(!isset($mac)){
        $mac = "No";
    }
    if(!isset($lgl)){
        $lgl = "No";
    }
    if(!isset($lip)){
        $lip = "No";
    }

        $insert_query4 = "INSERT INTO `profile_test`(`Patient_ID`, `G2000`, `G2000X`, `GT9`, `GTI`, `NEO`, `ES`, `HB3`, `DFS`, `LFT`, `TFT`, `MAC`, `LGL`, `LIP`) 
                        VALUES ('$patientid','$g2000','$g2000x','$gt9','$gti','$neo','$es','$hb3','$dfs','$lft','$tft','$mac','$lgl','$lip')";

        $insert_result4 = mysqli_query($conn,$insert_query4);
        if(!$insert_result4){
            printf("Error: %s\n",mysqli_error($conn));
            exit();
        }
        
        mysqli_affected_rows($conn);
    }

    
    if(isset($_POST['submit'])){
        
        $patientid = $_POST['patientid'];
        $cea = $_POST['cea'];
        $ca1 = $_POST['ca1'];
        $ca5 = $_POST['ca5'];
        $ca9 = $_POST['ca9'];
        $psa = $_POST['psa'];
        $afp = $_POST['afp'];
        $glucose = $_POST['glucose'];
        $hiv12 = $_POST['hiv12'];
        $hba1c = $_POST['hba1c'];
        $hbsag = $_POST['hbsag'];
        $hpylori = $_POST['hpylori'];
        $uricacid = $_POST['uricacid'];
        $freet4 = $_POST['freet4'];

        
    if(!isset($cea)){
        $cea = "No";
    }
    if(!isset($ca1)){
        $ca1 = "No";
    }
    if(!isset($ca5)){
        $ca5 = "No";
    }
    if(!isset($ca9)){
        $ca9 = "No";
    }
    if(!isset($psa)){
        $psa = "No";
    }
    if(!isset($afp)){
        $afp = "No";
    }
    if(!isset($glucose)){
        $glucose = "No";
    }
    if(!isset($hiv12)){
        $hiv12 = "No";
    }
    if(!isset($hba1c)){
        $hba1c = "No";
    }
    if(!isset($hbsag)){
        $hbsag = "No";
    }
    if(!isset($hpylori)){
        $hpylori = "No";
    }
    if(!isset($uricacid)){
        $uricacid = "No";
    }
    if(!isset($freet4)){
        $freet4 = "No";
    }

        $insert_query5 = "INSERT INTO `biochem`( `Patient_ID`, `CEA`, `CA1`, `CA5`, `CA9`, `PSA`, `AFP`, `Glucose`, `HIV1_2`, `HbA1c`, `HBsAg`, `Hpylori`, `UricAcid`, `FreeT4`) 
                    VALUES ('$patientid','$cea','$ca1','$ca5','$ca9','$psa','$afp','$glucose','$hiv12','$hba1c','$hbsag','$hpylori','$uricacid','$freet4')";

        $insert_result5 = mysqli_query($conn,$insert_query5);
        if(!$insert_result5){
            printf("Error: %s\n",mysqli_error($conn));
            exit();
        }
        
        mysqli_affected_rows($conn);
    }

    if(isset($_POST['submit'])){
        
        $patientid = $_POST['patientid'];
        $fbe = $_POST['fbe'];
        $fbc = $_POST['fbc'];
        $hb = $_POST['hb'];
        $twdc = $_POST['twdc'];
        $platelets = $_POST['platelets'];
        $aborh = $_POST['aborh'];
        $malaria = $_POST['malaria'];

        
    if(!isset($fbe)){
        $fbe = "No";
    }    
    if(!isset($fbc)){
        $fbc = "No";
    }
    if(!isset($hb)){
        $hb = "No";
    }
    if(!isset($twdc)){
        $twdc = "No";
    }
    if(!isset($platelets)){
        $platelets = "No";
    }
    if(!isset($aborh)){
        $aborh = "No";
    }
    if(!isset($malaria)){
        $malaria = "No";
    }

        $insert_query6 = "INSERT INTO `hematology`( `Patient_ID`, `FBE`, `FBC`, `Hb`, `TWDC`, `Platelets`, `ABO_Rh`, `Malaria`) 
                    VALUES ('$patientid','$fbe','$fbc','$hb','$twdc','$platelets','$aborh', '$malaria')";

        $insert_result6 = mysqli_query($conn,$insert_query6);
        if(!$insert_result6){
            printf("Error: %s\n",mysqli_error($conn));
            exit();
        }
        
        mysqli_affected_rows($conn);
    }

    
    if(isset($_POST['submit'])){
        
        $patientid = $_POST['patientid'];
        $urinefeme = $_POST['urine-feme'];
        $rpr = $_POST['rpr'];
        $microscopy = $_POST['microscopy'];
        $afbso = $_POST['afbso'];
        $afbsc = $_POST['afbsc'];

        
    if(!isset($urinefeme)){
        $urinefeme = "No";
    }
    if(!isset($rpr)){
        $rpr = "No";
    }
    if(!isset($microscopy)){
        $microscopy = "No";
    }
    if(!isset($afbso)){
        $afbso = "No";
    }
    if(!isset($afbsc)){
        $afbsc = "No";
    }

        $insert_query7 = "INSERT INTO `microbiology`( `Patient_ID`, `Urine_FEME`, `FPR`, `Microscopy`, `AFB_s`, `AFB_s_c`)
                    VALUES ('$patientid','$urinefeme','$rpr','$microscopy','$afbso','$afbsc')";

        $insert_result7 = mysqli_query($conn,$insert_query7);
        if(!$insert_result7){
            printf("Error: %s\n",mysqli_error($conn));
            exit();
        }
        
        mysqli_affected_rows($conn);
    }

            
    if(isset($_POST['submit'])){
        
        $patientid = $_POST['patientid'];
        $histology = $_POST['histology'];
        $nongynae = $_POST['nongynae'];
        $site = $_POST['site'];

        
    if(!isset($histology)){
        $histology = "No";
    }
    if(!isset($nongynae)){
        $nongynae = "No";
    }

        $insert_query8 = "INSERT INTO `anatomical_pathology`( `Patient_ID`, `Histology`, `Non_Gynae_FNA`, `Site`) 
                    VALUES ('$patientid','$histology','$nongynae','$site')";

        $insert_result8 = mysqli_query($conn,$insert_query8);
        if(!$insert_result8){
            printf("Error: %s\n",mysqli_error($conn));
            exit();
        }
        
        mysqli_affected_rows($conn);
    }

            
    if(isset($_POST['submit'])){
        
        $patientid = $_POST['patientid'];
        $papsmear = $_POST['papsmear'];
        $normal1 = $_POST['normal1'];
        $postmono = $_POST['post-mono'];
        $susplesion = $_POST['susplesion'];
        $others1 = $_POST['others1txt'];
        $cervix = $_POST['cervix'];
        $vault = $_POST['vault'];
        $endocx = $_POST['endocx'];
        $postfornix = $_POST['postfornix'];
        $latvagwall = $_POST['latvagwall'];
        $other1txt = $_POST['other1txt'];
        $lmp = $_POST['lmp'];
        $postmeno = $_POST['post-meno'];
        $hrt = $_POST['hrt'];
        $othersstxt = $_POST['othersstxt'];

        
    if(!isset($papsmear)){
        $papsmear = "No";
    }
    if(!isset($normal1)){
        $normal1 = "No";
    }
    if(!isset($postmono)){
        $postmono = "No";
    }
    if(!isset($susplesion)){
        $susplesion = "No";
    }
    if(!isset($cervix)){
        $cervix = "No";
    }
    if(!isset($vault)){
        $vault = "No";
    }
    if(!isset($endocx)){
        $endocx = "No";
    }
    if(!isset($postfornix)){
        $postfornix = "No";
    }
    if(!isset($latvagwall)){
        $latvagwall = "No";
    }
    if(!isset($postmeno)){
        $postmeno = "No";
    }
    if(!isset($latvagwall)){
        $hrt = "No";
    }

        $insert_query9 = "INSERT INTO `cervical_cytology`(`Patient_ID`, `Pap_Smear`, `Normal`, `Post_Mono_Blood`, `Susp_Lesion`, `Other`, `Cervix`, `Vault`, `Endocx`, `Post_Fornix`, `Lat_Vag_Wall`, `Site_Other`, `LMP`, `Post_Menopausal`, `HRT`, `Others`) 
                    VALUES ('$patientid','$papsmear','$normal1','$postmono','$susplesion','$others1','$cervix','$vault','$endocx','$postfornix','$latvagwall','$other1txt',TIME_FORMAT('$lmp', '%r'),'$postmeno','$hrt','$othersstxt')";

        $insert_result9 = mysqli_query($conn,$insert_query9);
        if(!$insert_result9){
            printf("Error: %s\n",mysqli_error($conn));
            exit();
        }
        
        mysqli_affected_rows($conn);
    }
           /*
        if(isset($_POST['submit'])){
            
            $patientid = $_POST['patientid'];
            $additonaltest = $_POST['additonaltest'];

            $insert_query10 = "INSERT INTO `additional_test`(`Patient_ID`, `Specify`)
                             VALUES ('$patientid','$additonaltest')";

            $insert_result10 = mysqli_query($conn,$insert_query10);
            if(!$insert_result10){
                printf("Error: %s\n",mysqli_error($conn));
                exit();
            }
            
            mysqli_affected_rows($conn);
        }
*/
        if(isset($_POST['submit'])){

            
            $random = rand(0,999999999);
            $day = date('z');
            $yr = date('M');
        
            $requestid = "RQ-$random-$yr-$day";
            
        // insert to request table
            $insert = "INSERT INTO `request`(`Request_ID`, `Patient_ID`, `Request_Type`, `Is_Accepted`)
                     VALUES ('$requestid','$patientid','lab','No')";
            
            $insert_result = mysqli_query($conn, $insert);
            if (!$insert_result) {
            printf("Error: %s\n", mysqli_error($conn));
            exit();
            }
        
            mysqli_affected_rows($conn);
        
        }
?>