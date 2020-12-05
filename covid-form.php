<?php

include("php_action/db_config.php");
include("php_action/add/covid-patient.php");
include("php_action/retrieve/covid-patient.php");


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
    <li class="nav-item " style="padding-left: 30px;"><a href="patient-result.html" class="nav-link">Lab Results</a></li>
  </ul>
</div>
</div>
</nav>
<!-- END nav -->

<section class="hero-wrap hero-wrap-2" style="background-image: url('images/Banner.jpg');" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
</section>

<section class="ftco-section ftco-no-pt ftco-no-pb ftco-services-2 bg-light" >
    <div class="container">
        <div class=" heading-section ftco-animate" >
            <center><h2 class="mb-3"style="padding-top: 50px;">Covid-19 Request <span>Form</span></h2></center>
        </div>
        <form method="POST" id="covid_insert">  
            <div class="ftco-animate" style="padding-bottom: 30px;">
                <fieldset>
                    <h3 align="center">Covid-19 Information Sheet</h3>
                    <label for="">Patient No.: <?php echo $result['Patient_ID']?></label>
                    <div class="row" style="margin-top: 20px;">
                        <div class="col-6">
                            <div class="" style="margin-top: 20px;">
                                <label for="deceases">Do you suffer from any deceases? if yes, please enumerate</label>
                                <div class="">
                                    <input placeholder="Cardiovascular, Diabetes, Asthma, etc." type="text" class="form-control" name="deceases" id="deceases">
                                </div>
                            </div>
                            <div class=""style="margin-top: 20px;">
                                <label for="travel">Do you have a travel history to any countries? if yes, please enumerate</label>
                                <div class="">
                                    <input placeholder="China, US, UK, etc." type="text" class="form-control" name="travel" id="travel">
                                </div>
                            </div>
                            <div class=""style="margin-top: 20px;">
                                <label for="contact">Approximately, how many people have you come in contact with in past 15 days?</label>
                                <div class="">
                                    <input placeholder="# of contacted people" type="text" class="form-control" name="contact" id="contact">
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class=""style="margin-top: 20px;">
                                <label for="preggy">Are you pregnant? If yes, select the number of weeks.</label>
                                <div class="">
                                    <input placeholder="# of weeks" type="text" class="form-control" name="preggy" id="preggy">
                                </div>
                            </div>
                            <div class=""style="margin-top: 20px;">
                                <label for="tested">Have you been tested at airport or hospital?</label>
                                <div class="">
                                    <select class="form-control" name="tested" id="tested">
                                        <option value="">Select yes/no</option>
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="" style="margin-top: 20px;">
                        <label for="">Do you experience any other difficulties?</label>
                        <div class="">
                            <textarea class="form-control" name="difficulties" id="difficulties" width="100%" rows="3"></textarea>
                        </div>
                    </div>
                </fieldset>
                <div class="appointment-form" style="margin-top: 20px;">
                    <center>
                        <button type="submit" name="submit1" class="btn btn-secondary">Submit Request</button>
                        <button type="reset" class="btn btn-outline-info">Reset Fields</button>
                    </center>
                </div>
            </div>
        </form>
    </div>
</section>
<!--
<div class="">
    <label for=""></label>
    <input type="text" name="" id="">

    
                    <div class="" style="margin-top: 20px;">
                        <label for="">Do you suffer from any of the below diceases?</label>
                        <div class="">
                            <input type="checkbox" name="cardio" id="cardio">
                                <label for="cardio" style="margin-right: 10px; margin-left: 10px; padding-top: 7px;">Cardiovascular Diceases</label>
                            <input type="checkbox" name="asthma" id="asthma">
                                <label for="asthma" style="margin-right: 10px; margin-left: 10px; padding-top: 7px;">Asthma</label>
                            <input type="checkbox" name="cancer" id="cancer">
                                <label for="cancer" style="margin-right: 10px; margin-left: 10px; padding-top: 7px;">Cancer</label>
                            <input type="checkbox" name="diabetes" id="diabetes">
                                <label for="diabetes" style="margin-right: 10px; margin-left: 10px; padding-top: 7px;">Diabetes</label>
                            <input type="checkbox" name="bronchitis" id="bronchitis">
                                <label for="bronchitis" style="margin-right: 10px; margin-left: 10px; padding-top: 7px;">Bronchitis</label>
                            <input type="checkbox" name="others" id="others">
                                <label for="others" style="margin-right: 10px; margin-left: 10px; padding-top: 7px;">Other</label>
                        </div>
                    </div>
                    <div class="">
                        <label for="">Do you have a travel history to any of this countries?</label>
                        <div class="">
                            <input type="checkbox" name="china" id="china">
                                <label for="china" style="margin-right: 10px; margin-left: 10px; padding-top: 7px;">China</label>
                            <input type="checkbox" name="italy" id="italy">
                                <label for="italy" style="margin-right: 10px; margin-left: 10px; padding-top: 7px;">Italy</label>
                            <input type="checkbox" name="spain" id="spain">
                                <label for="spain" style="margin-right: 10px; margin-left: 10px; padding-top: 7px;">Spain</label>
                            <input type="checkbox" name="france" id="france">
                                <label for="france" style="margin-right: 10px; margin-left: 10px; padding-top: 7px;">France</label>
                            <input type="checkbox" name="us" id="us">
                                <label for="us" style="margin-right: 10px; margin-left: 10px; padding-top: 7px;">United States of America</label>
                            <input type="checkbox" name="saudi" id="saudi">
                                <label for="saudi" style="margin-right: 10px; margin-left: 10px; padding-top: 7px;">Saudi Arabia</label>
                            <input type="checkbox" name="uk" id="uk">
                                <label for="uk" style="margin-right: 10px; margin-left: 10px; padding-top: 7px;">United Kingdom</label>
                            <input type="checkbox" name="other1" id="other1">
                                <label for="other1" style="margin-right: 10px; margin-left: 10px; padding-top: 7px;">Other</label>
                        </div>
                    </div>
                    <div class="" style="margin-top: 20px;">
                        <label for="">Approximately, how many people have you come in contact with in past 15 days?</label>
                        <div class="">
                            <input type="checkbox" class="contact" name="15" id="15">
                                <label for="15" style="margin-right: 10px; margin-left: 10px; padding-top: 7px;">1-5 people</label>
                            <input type="checkbox"  class="contact" name="510" id="510">
                                <label for="510" style="margin-right: 10px; margin-left: 10px; padding-top: 7px;">5-10 people</label>
                            <input type="checkbox"  class="contact" name="1020" id="1020">
                                <label for="1020" style="margin-right: 10px; margin-left: 10px; padding-top: 7px;">10-20 people</label>
                            <input type="checkbox"  class="contact" name="2050" id="2050">
                                <label for="2050" style="margin-right: 10px; margin-left: 10px; padding-top: 7px;">20-50 people</label>
                            <input type="checkbox" class="contact"  name="more1" id="more1">
                                <label for="more1" style="margin-right: 10px; margin-left: 10px; padding-top: 7px;">More than 50 people</label>
                        </div>
                    </div>
                    <div class="" style="margin-top: 20px;">
                        <label for="">Are you pregnant? If yes, select the number of weeks.</label>
                        <div class="">
                            <input type="checkbox" class="preggy" name="412" id="412">
                                <label for="412" style="margin-right: 10px; margin-left: 10px; padding-top: 7px;">4-12 weeks</label>
                            <input type="checkbox" class="preggy" name="1224" id="1224">
                                <label for="1224" style="margin-right: 10px; margin-left: 10px; padding-top: 7px;">12-24 weeks</label>
                            <input type="checkbox" class="preggy" name="more" id="more">
                                <label for="more" style="margin-right: 10px; margin-left: 10px; padding-top: 7px;">More than 24 weeks</label>
                            <input type="checkbox" class="preggy" name="na" id="na">
                                <label for="na" style="margin-right: 10px; margin-left: 10px; padding-top: 7px;">N/A</label>
                        </div>
                    </div>
                    <div class="" style="margin-top: 20px;">
                        <label for="">Have you been tested at airport or hospital?</label>
                        <div class="">
                            <input type="checkbox" class="tested" name="tested" id="tested">
                                <label for="tested" style="margin-right: 10px; margin-left: 10px; padding-top: 7px;">Yes</label>
                            <input type="checkbox" class="tested" name="tested" id="tested">
                                <label for="tested" style="margin-right: 10px; margin-left: 10px; padding-top: 7px;">No</label>
                        </div>
                    </div>
</div>-->

<section class="ftco-section ftco-animate img" style="background-image: url(images/aaa.jpg); width: 50%; margin-left: auto; margin-right: auto ; background-size: contain; padding: 13em 0;">
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