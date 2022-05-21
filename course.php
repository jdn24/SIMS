<?php session_start();

include "config/config.php";

// Check user login or not
if(!isset($_SESSION['logged'])){
    header('Location: index.php');
}

// logout
if(isset($_POST['but_logout'])){
    session_destroy();
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!--
     - Roxy: Bootstrap template by GettTemplates.com
     - https://gettemplates.co/roxy
    -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SIMS | Course</title>
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

	<section id="who-we-are" class="overlay text-white">
    <div class="container">
        <div class="section-content">
            <div class="col text-center" data-aos="fade-up">
                <br>
                <br>
                <br>
                <h2 class="section-title"><b>Course</b></h2>    
            </div>
            
            <div class="row text-center section-content">
            
                <div class="col-md-4 col-sm-6" data-aos="fade-up">
                    <img class="" src="img/viewcourse.png"  width="" height="">
                    <h5 class="mb-4">View Courses</h5>
                    <p>See an Overview of Different Courses available.</p><br>
                    <p><a class="btn btn-primary" href="viewcourse.php" role="button">View Courses</a></p>
                </div>
                <!-- /.col-md-4 col-sm-6  -->
                <div class="col-md-4 col-sm-6" data-aos="fade-up">
</div>
                <!-- /.col-md-4 col-sm-6  -->
                <div class="col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="200">
                    <img class="" src="img/editcourse.png"  width="" height="">
                    <h5 class="mb-4">Add or Delete Courses</h5>
                    <p>Add New Courses or Delete Existing ones to the List of Current Courses</p>
                    <p><a class="btn btn-primary" href="addcourse.php" role="button">Add or Delete Courses</a></p>
                </div>
                
                <!-- /.col-md-4 col-sm-6  -->
            </div>
            <!-- /.row -->
        </div>
    </div>
</section>		</div>
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
