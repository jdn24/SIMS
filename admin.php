


<?php session_start();

include "config/config.php";

// Check user login or not
if(!isset($_SESSION['admin'])){
    echo "Login With Admin Credentials";
    header('Location: dashboard.php');}





// logout
if(isset($_POST['but_logout'])){
    session_destroy();
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html>

<head>
<link rel="icon" type="image/x-icon" href="/img/icons/favicon.ico">
    <!--
     - Roxy: Bootstrap template by GettTemplates.com
     - https://gettemplates.co/roxy
    -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SIMS | Admin Portal</title>
    <meta name="description" content="Roxy">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- External CSS -->
    <link rel="stylesheet" href="vendor/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="vendor/select2/select2.min.css">
    <link rel="stylesheet" href="vendor/owlcarousel/owl.carousel.min.css">
    <link rel="stylesheet" href="vendor/lightcase/lightcase.css">
     <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400|Work+Sans:300,400,700" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="css/style.min.css">
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!-- Modernizr JS for IE8 support of HTML5 elements and media queries -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>

</head>
<body data-spy="scroll" data-target="#navbar" class="static-layout">
	<!--=========================HEADER==============================-->
<?php include 'header.php';?>
<!--=========================HEADER==============================-->



<div class="jumbotron d-flex align-items-center">
  <div class="container text-center">
    <h1 class="display-1 mb-4">Admin<br>Portal</h1>
  </div>
  <div class="rectangle-1"></div>
  <div class="rectangle-2"></div>
  <div class="rectangle-transparent-1"></div>
  <div class="rectangle-transparent-2"></div>
  <div class="circle-1"></div>
  <div class="circle-2"></div>
  <div class="circle-3"></div>
  <div class="triangle triangle-1">
  	<img src="img/obj_triangle.png" alt="">
  </div>
  <div class="triangle triangle-2">
  	<img src="img/obj_triangle.png" alt="">
  </div>
  <div class="triangle triangle-3">
  	<img src="img/obj_triangle.png" alt="">
  </div>
  <div class="triangle triangle-4">
  	<img src="img/obj_triangle.png" alt="">
  </div>
</div>	<!-- Features Section-->
<section id="features" class="bg-white">
    <div class="container">
        <div class="section-content">
            <!-- Section Title -->
            <div class="title-wrap mb-5" data-aos="fade-up">
                <h2 class="section-title">
                   <b> Admin Options</b></a>
                </h2>
                
            </div>
            <!-- End of Section Title -->
            <div class="row">
                <!-- Features Holder-->
                <div class="col-md-10 offset-md-1 features-holder">
                    <div class="row">
                        <!-- Features Item -->
                        <div class="col-md-4 col-sm-12 text-center mt-4">
                            <div class="shadow rounded feature-item p-4 mb-4" data-aos="fade-up">
                                <div class="my-4">
                                <img class="" src="img/adduser.png"  width="" height="">
                                </div>
                                <h4>Add New User</h4>
                                <p>Add New Users and Grant them Access to SIMS.</p><br>
                                <p><a class="btn btn-primary" href="adduser.php" role="button">Add User</a></p>
                            </div>
                            
                        </div>
                        <!-- End of Feature Item -->
                        <!-- Features Item -->
                        <div class="col-md-4 col-sm-12 text-center">
                            
                            
                        </div>
                        <!-- End of Feature Item -->
                        <!-- Features Item -->
                        <div class="col-md-4 col-sm-12 text-center mt-4">
                            <div class="shadow rounded feature-item p-4 mb-4" data-aos="fade-up">
                                <div class="my-4">
                                <img class="" src="img/viewuser.png"  width="" height="">
                                </div>
                                <h4>View Users</h4>
                                <p>View Users who currently have Access to SIMS and Update or Delete their credentials.</p>
                                <p><a class="btn btn-primary" href="viewuser.php" role="button">View Usesrs</a></p>
                            </div>
                            
                        </div>
                        <!-- End of Feature Item -->
                    </div>
                </div>
                <!-- End of Features Holder-->
            </div>
        </div>
    </div>
</section>
<!-- End of Features Section-->	
<!--=========================FOOTER==============================-->
<?php include 'footer.php';?>
<!--=========================FOOTER==============================-->
	<!-- External JS -->
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script>
	<script src="vendor/bootstrap/popper.min.js"></script>
	<script src="vendor/bootstrap/bootstrap.min.js"></script>
	<script src="vendor/select2/select2.min.js "></script>
	<script src="vendor/owlcarousel/owl.carousel.min.js"></script>
	<script src="vendor/stellar/jquery.stellar.js" type="text/javascript" charset="utf-8"></script>
	<script src="vendor/isotope/isotope.min.js"></script>
	<script src="vendor/lightcase/lightcase.js"></script>
	<script src="vendor/waypoints/waypoint.min.js"></script>
	 <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
	 
	<!-- Main JS -->
	<script src="js/app.min.js "></script>
	<script src="//localhost:35729/livereload.js"></script>


</body>
</html>
