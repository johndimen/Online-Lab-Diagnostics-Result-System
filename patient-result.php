<?php
include("php_action/db_config.php");
include("php_action/search/search.php");


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
    <li class="nav-item "><a href="index.html" class="nav-link">Home</a></li>
    <li class="nav-item active" style="padding-left: 30px;"><a href="patient-result.php" class="nav-link">Lab Results</a></li>
  </ul>
</div>
</div>
</nav>
<!-- END nav -->

<section class="hero-wrap hero-wrap-2" style="background-image: url('images/Banner.jpg');" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
</section>

<section class="ftco-section ftco-no-pt ftco-no-pb ftco-services-2 bg-light" >
    <div class="container" style="padding-bottom: 50px;">
        <div class=" heading-section ftco-animate" >
            <center><h2 class="mb-3"style="padding-top: 50px;">Search your <span>Result Here</span></h2></center>
        </div>
    <form action="" method="GET" class="ftco-animate">
        <fieldset>
            <center><legend>Patient Result</legend></center>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="patientid">Result ID</label>
                            <input type="text" class="form-control" name="resultid" id="resultid" placeholder="Search your result here!">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group py-4" style="margin-top: 20px;" >
                        <button type="submit" value="Search" class="btn btn-secondary btn-lg">Search</button>
                        <button type="reset" value="Reset" class="btn btn-outline-primary btn-lg">Reset</button>
                    </div>
                </div>
            </div> 
        </fieldset>
    </form>
  </div>
</section>

<section class="ftco-section ftco-animate py-3 bg-light">
    <div class="container">
        <div class="col-md-12 heading-section p-4 p-lg-5">
            <?php 
                while($searchresult = mysqli_fetch_assoc($searchqry)){
            ?>
            <table class="table table-striped table-bordered ftco-animate">
                <h3 align="center">Medical Result</h3>
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Result ID#</th>
                            <th scope="col">Exam ID#</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <tr>
                            <th scope="row"><?php echo $searchresult['Result_ID']?></th>
                            <td><?php echo $searchresult['Exam_ID']?></td>
                        </tr>
                    </tbody>
            </table>
            <div class="">
                <center><Legend >Evaluation Result</Legend></center>
                <p align="center"><?php echo $searchresult['Result']?></p>
            </div>
            <div class="">
                <center><legend>Medical Summary</legend></center>
                <p align="center"><?php echo $searchresult['Summary']?></p>
            </div>
            <?php } ?>
        </div>
    </div>
</section>

<section class="ftco-section img" style="background-image: url(images/aaa.jpg); width: 50%; margin-left: auto; margin-right: auto ; background-size: contain; padding: 13em 0;">
</section>

<footer class="ftco-footer" style="background-color: #e25446;">
</footer>

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