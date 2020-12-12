<?php 

include("php_action/db_config.php");
include("php_action/session.php");
include("php_action/retrieve/release.php");

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
    <li class="nav-item"><a href="admin-request.php" class="nav-link">Lab Request</a></li>
    <li class="nav-item active"><a href="admin-results.php" class="nav-link">Lab Results</a></li>
    <li class="nav-item"> <a href="php_action/logout.php" class="nav-link">Log out</a></li>
  </ul>
</div>
</div>
</nav>
<!-- END nav -->

<section class="hero-wrap hero-wrap-2" style="background-image: url('images/Banner.jpg');" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
</section>

<section class="ftco-section ftco-no-pt  ftco-services-2 bg-light" style="margin-bottom: 30px;">
    <div class="container">
        <div class=" heading-section ftco-animate" >
            <h5 class="modal-title" id="exampleModalLabel">Publish Result</h5>
        </div>
        <div class="">
            <form action="" method="post">
                <div class="">
                    <legend>Patient Details</legend>
                    <table class="table table-striped table-bordered ftco-animate">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Patient #</th>
                                <th scope="col">Patient Name</th>
                                <th scope="col">Evaluation Result </th>
                                <th scope="col">Date Finished</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr>
                        </tbody>
                    </table>
                </div> 
                <div class=" ftco-animate">
                    <fieldset>
                        <label for="eval">Evaluation Result</label>
                        <select class="form-control" name="eval" id="eval">
                            <option value="positive">Positive</option>
                            <option value="nagative">Negative</option>
                        </select>
                    </fieldset>
                </div>
                <div class=" ftco-animate">
                    <fieldset>
                        <legend>Medical Summary</legend>
                        <textarea name="medsummary" id="medsummary" class="form-control" disabled="disabled" style="width: 100%;" cols="" rows="3"></textarea>
                    </fieldset>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" name="editModal" id="editModal">Edit</button>
                    <button type="submit" class="btn btn-secondary">Save changes & Publish</button>
                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</section>

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
  <div class="modal fade" id="exampleModal" data-backdrop="static"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
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
          <button type="button" class="btn btn-primary">Publish</button>
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