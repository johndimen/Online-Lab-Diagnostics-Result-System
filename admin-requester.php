<?php 

include("php_action/db_config.php");
include("php_action/session.php");
include("php_action/retrieve/request.php");
//include("php_action/retrieve/sample_info.php");
include("php_action/add/requester.php");

if(!isset($_SESSION['login_user'])){
  header("location: admin-login.html");
  die();
}


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Quatro Labs</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pg0KPCEtLSBHZW5lcmF0b3I6IEFkb2JlIElsbHVzdHJhdG9yIDE5LjAuMCwgU1ZHIEV4cG9ydCBQbHVnLUluIC4gU1ZHIFZlcnNpb246IDYuMDAgQnVpbGQgMCkgIC0tPg0KPHN2ZyB2ZXJzaW9uPSIxLjEiIGlkPSJDYXBhXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB2aWV3Qm94PSIwIDAgNDIwLjggNDIwLjgiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDQyMC44IDQyMC44OyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSI+DQo8Zz4NCgk8Zz4NCgkJPHBhdGggZD0iTTQxMy42LDIwNEgzNzhjMTQuOC0zMy42LDEzLjItNjAuOCw3LjYtNzkuMmMtOS42LTMyLjgtNDItNjguNC05MC02OC40Yy0xMi44LDAtMjUuNiwyLjQtMzguOCw3LjINCgkJCUMyMzQsNzIsMjE4LjgsODEuMiwyMTIsODZjLTYuOC00LjgtMjEuNi0xNC00NC44LTIyLjRjLTEzLjItNC44LTI2LjQtNy4yLTM4LjgtNy4yYy00OCwwLTgwLjQsMzUuNi05MCw2OC40DQoJCQljLTUuNiwxOS42LTcuNiw0OS4yLDExLjIsODYuNEg2LjRjLTMuNiwwLTYuNCwyLjgtNi40LDYuNGMwLDMuNiwyLjgsNi40LDYuNCw2LjRoNTAuOGMyLDMuNiw0LjQsNy4yLDcuMiwxMC44DQoJCQljNDEuNiw2MCwxMzIsMTI1LjIsMTQ4LjQsMTI5LjJ2MC40YzAsMCwwLjQsMCwwLjgtMC40YzAuNCwwLDAuOCwwLDEuMiwwdi0wLjRjMTQtNi44LDEwMC44LTYyLjgsMTQ2LjQtMTI5LjJjNC40LTYsOC0xMiwxMS4yLTE4DQoJCQloNDJjMy42LDAsNi40LTIuOCw2LjQtNi40QzQyMC44LDIwNi40LDQxNy4yLDIwNCw0MTMuNiwyMDR6IE0zNDkuNiwyMjcuNmMtNDIuNCw2Mi0xMjAuNCwxMTItMTM3LjIsMTIyLjgNCgkJCWMtMTcuMi0xMC44LTk0LjgtNjEuMi0xMzcuNi0xMjIuOGMtMC44LTEuMi0xLjYtMi40LTIuNC0zLjZoNTguOGMyLjQsMCw0LjgtMS4yLDYtMy42bDI2LjgtNTIuOGw0MiwxMDcuNmMwLjgsMi40LDMuNiw0LDYsNA0KCQkJYzAsMCwwLDAsMC40LDBjMi44LDAsNS4yLTIsNi00LjhsMzYuOC0xMjZsMTkuNiw2My42YzAuOCwyLjQsMi44LDQsNS4yLDQuNGMyLjQsMC40LDQuOC0wLjgsNi40LTIuOGwxNS42LTIyLjhsMTMuMiwyMi40DQoJCQljMS4yLDIsMy4yLDMuMiw1LjYsMy4yaDM2QzM1NC40LDIyMC40LDM1MiwyMjQsMzQ5LjYsMjI3LjZ6IE0zNjQsMjA0aC0zOS4ybC0xNi40LTI4Yy0xLjItMi0zLjItMy4yLTUuNi0zLjINCgkJCWMtMi40LDAtNC40LDAuOC01LjYsMi44bC0xMy42LDIwbC0yMi03MS42Yy0wLjgtMi44LTMuNi00LjQtNi40LTQuOGMtMi44LDAtNS42LDItNi40LDQuOGwtMzcuMiwxMjguNGwtNDAuNC0xMDMuMg0KCQkJYy0wLjgtMi40LTMuMi00LTUuNi00Yy0yLjgsMC00LjgsMS4yLTYsMy42bC0zMS42LDYySDY0LjRjLTE2LTI5LjItMjAuNC01Ny4yLTEzLjItODIuNGM4LjQtMjguNCwzNi01OC44LDc3LjYtNTguOA0KCQkJYzExLjIsMCwyMi44LDIuNCwzNC40LDYuNGMyOS4yLDEwLjgsNDQuOCwyMy4yLDQ1LjIsMjMuMmMyLjQsMiw1LjYsMiw4LDBjMCwwLDE1LjYtMTIuNCw0NS4yLTIzLjJjMTEuNi00LjQsMjMuMi02LjQsMzQuNC02LjQNCgkJCWM0MS4yLDAsNjkuMiwzMC40LDc3LjYsNTguOEMzODAuNCwxNTEuNiwzNzYuOCwxNzcuMiwzNjQsMjA0eiIvPg0KCTwvZz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjwvc3ZnPg0K">

    <meta name="author" content="Quatro Labs">
    <meta name="description" content="">
  
    <meta name="keywords" content="Quatro Labs,Quatro Laboratory">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
  
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
  
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">
    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark ftco-navbar-light" id="ftco-navbar">
 <div class="container d-flex align-items-center">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
   <span class="fa fa-bars"></span> Menu
 </button>
 <div class="collapse navbar-collapse" id="ftco-nav">
  <ul class="navbar-nav  m-lg-auto">
    <li class="nav-item "><a href="admin-page.php" class="nav-link">Home</a></li>
    <li class="nav-item active"><a href="admin-request.php" class="nav-link">Lab Request</a></li>
    <li class="nav-item"><a href="admin-results.php" class="nav-link">Lab Results</a></li>
    <li class="nav-item"> <a href="php_action/logout.php" class="nav-link">Log out</a></li>
  </ul>
</div>
</div>
</nav>
<!-- END nav -->

<section class="hero-wrap hero-wrap-2" style="background-image: url('images/Banner.jpg');" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
</section>

<section class="ftco-section ftco-services-2 bg-light"  style="margin-bottom: 30px;">
    <div class="container">
        <center class="ftco-animate"><h3>Laboratory Request</h3></center>
        <div class="col-12 ftco-animate">
            <div class="row">
                <div class="col-6">
                    <legend>Patient Info</legend>
                    <label for="">Patient ID:</label><label for=""><?php echo $receive['Patient_ID'] ?></label><br>
                    <label for="">Name:</label><label for=""><?php echo $receive['Patient_Fname']." ".$receive['Patient_Lname'] ?></label><br>
                    <label for="">Address:</label><label for=""><?php echo $receive['Address'] ?></label><br>
                    <label for="">Gender:</label><label for=""><?php echo $receive['Gender'] ?></label><br>
                    <label for="">Contact #:</label><label for=""><?php echo $receive['Contact_Number'] ?></label><br>
                    <label for="">Date of Birth:</label><label for=""><?php echo $receive['DateofBirth'] ?></label>
                </div>
                <form action="" method="post">
                    <div class="row">
                        <legend>Requester Info</legend>
                        <input type="text" hidden name="id" id="id" value="<?php echo $personel_check ?>">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="" style="padding-top: 8px;" >Name:</label>
                            </div>
                            <div class="form-group">
                                <label for=""  style="padding-top: 14px;">Organization Name:</label>
                            </div>
                            <div class="form-group">
                                <label for="" style="padding-top: 15px;">Address:</label>
                            </div>
                            <div class="form-group">
                                <label for="" style="padding-top: 12px;">Contact #:</label>
                            </div>
                        </div>
                        <div class="">
                            <div class="form-group">
                              <label for="" style="padding-left: 9px; padding-top:10px;"><?php echo $login_session?></label>
                              <input type="text" class="form-control" name="name" id="name" hidden value=" <?php echo $login_session?>">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="org" id="org">
                            </div>
                            <div class="">
                                <div class="form-group">
                                    <div class="form-field">
                                        <div class="select-wrap">
                                            <select name="add" id="add" class="form-control">
                                                <option value="">Select Address</option>
                                                <option value="manila">Manila Branch</option>
                                                <option value="makati">Makati Branch</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group"> 
                                    <input type="tel" name="contact" id="contact" class="form-control" placeholder="Cell # or Telephone #" > <!--pattern="[0-9]{4}-[0-9]{3}-[0-9]{4}"-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="form-group">
                            <button type="submit" name="accept" class="btn btn-secondary">Accept Request</button>
                            <button type="button" name="decline" class="btn btn-danger">Deline Request</button>
                            <button type="reset" class="btn btn-outline-secondary">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
            <center><legend style="padding-top: 10px;">Tests Information</legend></center>
          <div class="">
            <table class="table table-striped table-bordered ftco-animate">
              <h5>Sample details</h5>
              <thead class="thead-light">
                <tr>
                  <th scope="col">Urgency</th>
                  <th scope="col">Fasting</th>
                  <th scope="col">Sample Date</th>
                  <th scope="col">Sample Time</th>
                </tr>
              </thead>
              <tbody>
              <?php 
              $id1 = $_GET['id'];

              $retsql = "SELECT `Urgency`, `Fasting`, `Sample_Date`, `Sample_Time` 
                      FROM `sample_detail` WHERE `Patient_ID` = '$id1'";
              
              $retqry = mysqli_query($conn,$retsql);
              $retrslt = mysqli_fetch_array($retqry);
              ?>
                <tr>
                  <td><?php echo $retrslt[0]?></td>
                  <td><?php echo $retrslt[1]?></td>
                  <td><?php echo $retrslt[2]?></td>
                  <td><?php echo $retrslt[3]?></td>
                </tr> 
              </tbody>
            </table>
            <table class="table table-striped table-bordered ftco-animate">
              <thead class="thead-light">
                <tr>
                  <th scope="col">Blood</th>
                  <th scope="col">Urine</th>
                  <th scope="col">Sputum</th>
                  <th scope="col">Swab</th>
                  <th scope="col">Fluids</th>
                  <th scope="col">Tissue</th>
                  <th scope="col">Cytology</th>
                  <th scope="col">Other</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><?php echo $retrslt1['Blood']?></td>
                  <td><?php echo $retrslt1['Urine']?></td>
                  <td><?php echo $retrslt1['Sputum']?></td>
                  <td><?php echo $retrslt1['Swab']?></td>
                  <td><?php echo $retrslt1['Fluids']?></td>
                  <td><?php echo $retrslt1['Tissue']?></td>
                  <td><?php echo $retrslt1['Cytology']?></td>
                  <td><?php echo $retrslt1['other']?></td>
                </tr> 
              </tbody>
            </table>
          </div>
          <div class="">
            <table class="table table-striped table-bordered ftco-animate">
              <h5>Related Clinical Information</h5>
              <thead class="thead-light">
                <tr>
                  <th scope="col">Drug Theraphy</th>
                  <th scope="col">Last Dose</th>
                  <th scope="col">Dose taken(date/time)</th>
                  <th scope="col">Other relevant clinical information</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                </tr>
              </tbody>
            </table>
          </div>
          
          <div class="">
            <table class="table table-striped table-bordered ftco-animate">
              <h5>Profile Test</h5>
              <thead class="thead-light">
                <tr>
                  <th scope="col">G2000</th>
                  <th scope="col">G2000X</th>
                  <th scope="col">GT9</th>
                  <th scope="col">GTI</th>
                  <th scope="col">NEO</th>
                  <th scope="col">ES</th>
                  <th scope="col">HB3</th>
                  <th scope="col">DFS</th>
                  <th scope="col">LFT</th>
                  <th scope="col">TFT</th>
                  <th scope="col">MAC</th>
                  <th scope="col">LGL</th>
                  <th scope="col">LIP</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                </tr>
              </tbody>
            </table>
          </div>

          <div class="">
            <table class="table table-striped table-bordered ftco-animate">
              <h5>Biochemistry</h5>
              <thead class="thead-light">
                <tr>
                  <th scope="col">CEA</th>
                  <th scope="col">CA1</th>
                  <th scope="col">CA5</th>
                  <th scope="col">CA9</th>
                  <th scope="col">PSA</th>
                  <th scope="col">AFP</th>
                  <th scope="col">Glucose</th>
                  <th scope="col">HIV 1&2 </th>
                  <th scope="col">HBsAg</th>
                  <th scope="col">HbA1c</th>
                  <th scope="col">H. pylori</th>
                  <th scope="col">Uric Acid</th>
                  <th scope="col">Free T4</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                </tr>
              </tbody>
            </table>
          </div>

          <div class="">
            <table class="table table-striped table-bordered ftco-animate">
              <h5>Hematology</h5>
              <thead class="thead-light">
                <tr>
                  <th scope="col">FBE (incl. ESR)</th>
                  <th scope="col">FBC</th>
                  <th scope="col">Hb</th>
                  <th scope="col">TWDC</th>
                  <th scope="col">Platelets</th>
                  <th scope="col">ABO & RH (D)</th>
                  <th scope="col">Malaria Parasites</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                </tr>
              </tbody>
            </table>
          </div>
          
          <div class="">
            <table class="table table-striped table-bordered ftco-animate">
              <h5>Microbiology</h5>
              <thead class="thead-light">
                <tr>
                  <th scope="col">Urine-FEME</th>
                  <th scope="col">RPR (VDRL)</th>
                  <th scope="col">Culture/Sensitivity/Microscopy</th>
                  <th scope="col">AFB (ZN) Smear Only</th>
                  <th scope="col">AFB Smear & Culture</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                </tr>
              </tbody>
            </table>
          </div>
                    
          <div class="">
            <table class="table table-striped table-bordered ftco-animate">
              <h5>Anatomical Pathology</h5>
              <thead class="thead-light">
                <tr>
                  <th scope="col">Histology</th>
                  <th scope="col">Non-Gynae/FNA</th>
                  <th scope="col">Site</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th>1</th>
                  <td>1</td>
                  <td>1</td>
                </tr>
              </tbody>
            </table>
          </div>
                    
          <div class="">
            <table class="table table-striped table-bordered ftco-animate">
              <h5>Cervical Cytology</h5>
              <thead class="thead-light">
                <tr>
                  <th scope="col">Pap smear</th>
                  <th scope="col">Normal</th>
                  <th scope="col">Post-Mono Blood</th>
                  <th scope="col">Sups Lesion</th>
                  <th scope="col">Other</th>
                  <th scope="col">Site: Cervix</th>
                  <th scope="col">Site: Vault</th>
                  <th scope="col">Site: Endocx</th>
                  <th scope="col">Site: Post Fornix</th>
                  <th scope="col">Site: Lat. Vag. Wall</th>
                  <th scope="col">Site: Other</th>
                  <th scope="col">LMP</th>
                  <th scope="col">Post-Menopausal</th>
                  <th scope="col">HRT</th>
                  <th scope="col">Others</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                </tr>
              </tbody>
            </table>
          </div>
          
                    
          <div class="">
            <table class="table table-striped table-bordered ftco-animate">
              <h5>Additional Tests</h5>
              <thead class="thead-light">
                <tr>
                  <th scope="col">Additional Tests</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
    </div>
  </section>
  


<form action="" method="POST">
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" data-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Laboratory Request</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-6">
              <legend>Patient Info</legend>
              <label for="">Name:</label><br>
              <label for="">Address:</label><br>
              <label for="">Gender:</label><br>
              <label for="">Contact #:</label><br>
              <label for="">Date of Birth:</label>
            </div>
            <div class="col-6">
            <div class="row">
              <legend>Requester Info</legend>
              <div class="col-4 ">
                <div class="form-group">
                  <label for="name" style="padding-top: 8px;" >Name:</label>
                </div>
                <div class="form-group">
                  <label for="org"  style="padding-top: 14px;">Organization Name:</label>
                </div>
                <div class="form-group">
                  <label for="add" style="padding-top: 15px;">Address:</label>
                </div>
                <div class="form-group">
                  <label for="contact" style="padding-top: 12px;">Contact #:</label>
                </div>
              </div>
              <div class="">
                <div class="form-group">
                  <select class="form-control" name="name" id="name">
                    <option value="">Select Requester</option>
                    <?php 
                    while($receive = mysqli_fetch_array($reqquery)){?>
                      <option value="<?php echo $receive['Personel_Name'] ?>"><?php echo $receive['Personel_Name'] ?> </option>
                    <?php }?>
                  </select>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="org" id="org">
                </div>
                <div class="">
                  <div class="form-group">
                    <div class="form-field">
                      <div class="select-wrap">
                        <select name="add" id="add" class="form-control">
                          <option value="">Select Address</option>
                          <option value="manila">Manila</option>
                          <option value="makati">Makati</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="form-group"> 
                    <input type="tel" name="contact" id="contact" class="form-control" placeholder="Cell # or Telephone #" pattern="[0-9]{4}-[0-9]{3}-[0-9]{4}">
                  </div>
                </div>
              </div>
            </div>
            </div>
          </div>
          <center><legend style="padding-top: 10px;">Tests Information</legend></center>
          <div class="">
            <table class="table table-striped table-bordered ftco-animate">
              <h5>Sample details</h5>
              <thead class="thead-light">
                <tr>
                  <th scope="col">Urgency</th>
                  <th scope="col">Fasting</th>
                  <th scope="col">Sample Type</th>
                  <th scope="col">Sample taken(date/time)</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Mark</td>
                  <td>Otto</td>
                  <td></td>
                </tr> 
              </tbody>
            </table>
          </div>
          <div class="">
            <table class="table table-striped table-bordered ftco-animate">
              <h5>Related Clinical Information</h5>
              <thead class="thead-light">
                <tr>
                  <th scope="col">Drug Theraphy</th>
                  <th scope="col">Last Dose</th>
                  <th scope="col">Dose taken(date/time)</th>
                  <th scope="col">Other relevant clinical information</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                </tr>
              </tbody>
            </table>
          </div>
          
          <div class="">
            <table class="table table-striped table-bordered ftco-animate">
              <h5>Profile Test</h5>
              <thead class="thead-light">
                <tr>
                  <th scope="col">G2000</th>
                  <th scope="col">G2000X</th>
                  <th scope="col">GT9</th>
                  <th scope="col">GTI</th>
                  <th scope="col">NEO</th>
                  <th scope="col">ES</th>
                  <th scope="col">HB3</th>
                  <th scope="col">DFS</th>
                  <th scope="col">LFT</th>
                  <th scope="col">TFT</th>
                  <th scope="col">MAC</th>
                  <th scope="col">LGL</th>
                  <th scope="col">LIP</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                </tr>
              </tbody>
            </table>
          </div>

          <div class="">
            <table class="table table-striped table-bordered ftco-animate">
              <h5>Biochemistry</h5>
              <thead class="thead-light">
                <tr>
                  <th scope="col">CEA</th>
                  <th scope="col">CA1</th>
                  <th scope="col">CA5</th>
                  <th scope="col">CA9</th>
                  <th scope="col">PSA</th>
                  <th scope="col">AFP</th>
                  <th scope="col">Glucose</th>
                  <th scope="col">HIV 1&2 </th>
                  <th scope="col">HBsAg</th>
                  <th scope="col">HbA1c</th>
                  <th scope="col">H. pylori</th>
                  <th scope="col">Uric Acid</th>
                  <th scope="col">Free T4</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                </tr>
              </tbody>
            </table>
          </div>

          <div class="">
            <table class="table table-striped table-bordered ftco-animate">
              <h5>Hematology</h5>
              <thead class="thead-light">
                <tr>
                  <th scope="col">FBE (incl. ESR)</th>
                  <th scope="col">FBC</th>
                  <th scope="col">Hb</th>
                  <th scope="col">TWDC</th>
                  <th scope="col">Platelets</th>
                  <th scope="col">ABO & RH (D)</th>
                  <th scope="col">Malaria Parasites</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                </tr>
              </tbody>
            </table>
          </div>
          
          <div class="">
            <table class="table table-striped table-bordered ftco-animate">
              <h5>Microbiology</h5>
              <thead class="thead-light">
                <tr>
                  <th scope="col">Urine-FEME</th>
                  <th scope="col">RPR (VDRL)</th>
                  <th scope="col">Culture/Sensitivity/Microscopy</th>
                  <th scope="col">AFB (ZN) Smear Only</th>
                  <th scope="col">AFB Smear & Culture</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                </tr>
              </tbody>
            </table>
          </div>
                    
          <div class="">
            <table class="table table-striped table-bordered ftco-animate">
              <h5>Anatomical Pathology</h5>
              <thead class="thead-light">
                <tr>
                  <th scope="col">Histology</th>
                  <th scope="col">Non-Gynae/FNA</th>
                  <th scope="col">Site</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th>1</th>
                  <td>1</td>
                  <td>1</td>
                </tr>
              </tbody>
            </table>
          </div>
                    
          <div class="">
            <table class="table table-striped table-bordered ftco-animate">
              <h5>Cervical Cytology</h5>
              <thead class="thead-light">
                <tr>
                  <th scope="col">Pap smear</th>
                  <th scope="col">Normal</th>
                  <th scope="col">Post-Mono Blood</th>
                  <th scope="col">Sups Lesion</th>
                  <th scope="col">Other</th>
                  <th scope="col">Site: Cervix</th>
                  <th scope="col">Site: Vault</th>
                  <th scope="col">Site: Endocx</th>
                  <th scope="col">Site: Post Fornix</th>
                  <th scope="col">Site: Lat. Vag. Wall</th>
                  <th scope="col">Site: Other</th>
                  <th scope="col">LMP</th>
                  <th scope="col">Post-Menopausal</th>
                  <th scope="col">HRT</th>
                  <th scope="col">Others</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                </tr>
              </tbody>
            </table>
          </div>
          
                    
          <div class="">
            <table class="table table-striped table-bordered ftco-animate">
              <h5>Additional Tests</h5>
              <thead class="thead-light">
                <tr>
                  <th scope="col">Additional Tests</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                </tr>
              </tbody>
            </table>
          </div>
          
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Accept Request</button>
          <button type="button" class="btn btn-danger">Deline Request</button>
          <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</form>

<section class="ftco-section img" style="background-image: url(images/aaa.jpg); width: 50%; margin-left: auto; margin-right: auto ; background-size: contain; padding: 13em 0;">
    <div class="overlay"></div>
    <div class="container">
        <div class="row justify-content-end">
            <!--<div class="col-md-7">
                <h2>Your Health is Our Priority</h2>
                <p>We can manage your dream building A small river named Duden flows by their place</p>
                <div class="col-sm-4">
                    <a href="contact.html" class="btn form-control py-3 px-4 " style="text-align: center;font-size: medium;"> <strong>Contact Us</strong> </a> 
                </div>				
            </div>-->
        </div>
    </div>
</section>

<footer class="ftco-footer" style="background-color: #e25446;">
</footer>


  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>


<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

<script src="js/jquery.min.js"></script>
<script src="js/jquery-migrate-3.0.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/jquery.waypoints.min.js"></script>
<script src="js/jquery.stellar.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/jquery.animateNumber.min.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script src="js/jquery.timepicker.min.js"></script>
<script src="js/scrollax.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="js/google-map.js"></script>

<script src="js/main.js"></script>

</body>
</html>