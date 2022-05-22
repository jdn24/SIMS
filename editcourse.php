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
if(isset($_POST['search_ce'])){
    $cid1 = $_POST['cid'];
    header('Location: editcourse.php?cid='."$cid1");
    $DisplayForm = False;
}
$id=$_GET['cid'];
/*--=========================DB==============================*/ 
    $db= $con;
    $tableName="tbl_course";
    $columns= ['*'];
    $fetchData = fetch_data($db, $tableName, $columns, $id);
    function fetch_data($db, $tableName, $columns, $id){
     if(empty($db)){
      $msg= "Database connection error";
     }elseif (empty($columns) || !is_array($columns)) {
      $msg="columns Name must be defined in an indexed array";
     }elseif(empty($tableName)){
       $msg= "Table Name is empty";
    }else{
    $columnName = implode(", ", $columns);
    $query = "SELECT * FROM tbl_course WHERE cid= $id";
    $result = $db->query($query);
    if($result== true){ 
     if ($result->num_rows > 0) {
        $row= mysqli_fetch_all($result, MYSQLI_ASSOC);
        $msg= $row;
     } else {
        $msg= "No Data Found"; 
        phpAlert(   "Invalid CID! Please Enter a Valid CID or Create a New Course"   );
     }
    }else{
      $msg= mysqli_error($db);
    }
    }
    return $msg;
    }
     /*--=========================DB==============================*/ 
/*--=========================UPDATE DB==============================*/
     if(isset($_POST['submit'])){
        
        $db= $con;
        $cshort = $_POST['course-short'];
            $cfull = $_POST['course-full'];
            $cdate = $_POST['udate'];


            $sql = "UPDATE tbl_course ". "SET cshort ='$cshort', cfull='$cfull', cdate='$cdate' ". 
               "WHERE cid ='$id'" ;
               $result = $db->query($sql);
            
               if($result== true){ 
                header('Location: viewcourse.php');
               }else{
                header('Location: editcourse.php');
               }
               }
        
   
   /*--=========================UPDATE DB==============================*/
?>
<!--=========================ALERT BOX FUNCTION==============================-->
<?php
function phpAlert($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
}
?>
<!--=========================ALERT BOX FUNCTION==============================-->
<!DOCTYPE html>
<html lang="en">

<head>

    <!--
     - Roxy: Bootstrap template by GettTemplates.com
     - https://gettemplates.co/roxy
    -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SIMS | Edit Course</title>
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
                <h2 class="section-title"><b>Edit Course</b></h2>    
            </div>
            
            <div class="panel-body">
            <?php
      if(is_array($fetchData))      
      $sn=1;
      foreach($fetchData as $data)
    ?>

<div class="col-md-8 offset-md-2 contact-form-holder mt-8" data-aos="fade-up">
<form method="post" name="course-cid" action="">
                        <div class="row">
                        <div class="col-md-12">
					 <label>Enter CID<span id="" style="font-size:11px;color:red">*</span>	</label>
											</div>
                            <div class="col-md-12 form-group">
                                <input type="text" name="cid" id="cid" value="<?php echo $data['cid']??''; ?>" placeholder="Enter Course ID" required="required" >
                            </div>
                            <div class="col-md-12 text-center">
                                <button class="btn btn-primary btn-shadow btn-lg" type="submit" name="search_ce">Search Course</button>
            </div>
            </div>
            
            </form>

                    <form method="post" name="course-edit" action="">
                        <div class="row">
                        <div class="col-md-12">
					 <label>Course Short Name<span id="" style="font-size:11px;color:red">*</span>	</label>
											</div>
                            <div class="col-md-12 form-group">
                                <input type="text" name="course-short" id="cshort"  value="<?php echo $data['cshort']??''; ?>" required="required" >
                            </div>
                            <div class="col-md-12 ">
		<label>Course Full Name<span id="" style="font-size:11px;color:red">*</span></label>
		</div>
                            <div class="col-md-6 form-group">
                                <input type="text" name="course-full" id="cfull" value="<?php echo $data['cfull']??''; ?>" required="required" >
                            </div>
                            <div class="col-md-12">
	 <label>Date</label>
	</div>
                            <div class="col-md-6 form-group">
                                <input type="text" value="<?php echo date('d-m-Y');?>" readonly="readonly" name="udate">
                            </div>
                            
                            <div class="col-md-12 text-center">
                                <button class="btn btn-primary btn-shadow btn-lg" type="submit" name="submit">Update Course</button>
                                <a href="viewcourse.php">
   <input type="button"class="btn btn-outline-primary btn-shadow btn-lg" value="Cancel" />
                            </div>
            </div>
                        
                    </form>
</div>		
													
				</div>

					</div>
            <!-- /.row -->
        </div>
    
</section>		
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
