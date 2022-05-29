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

if(isset($_POST['search_se'])){
    $sid1 = $_POST['sid'];
    header('Location: addmarks.php?sid='."$sid1");
    $DisplayForm = False;
    
}
$id=$_GET['sid'];

/*--=========================DB==============================*/ 
$db= $con;
$tableName="subject";
$columns= ['*'];
$fetchData = fetch_data($db, $tableName, $columns, $id, $cid);
function fetch_data($db, $tableName, $columns, $id, $cid){
 if(empty($db)){
  $msg= "Database connection error";
 }elseif (empty($columns) || !is_array($columns)) {
  $msg="columns Name must be defined in an indexed array";
 }elseif(empty($tableName)){
   $msg= "Table Name is empty";
}else{
$columnName = implode(", ", $columns);
$query = "SELECT * FROM registration WHERE id= $id";

$result = $db->query($query);
if($result== true){ 
 if ($result->num_rows > 0) {
    $row= mysqli_fetch_all($result, MYSQLI_ASSOC);
    $msg= $row;
 } else {
    $msg= "No Data Found";
    phpAlert(   "No Student Found!",   ); 
    
 }
}else{
  $msg= mysqli_error($db);
}
}
return $msg;
}
 /*--=========================DB==============================*/ 
 
      if(is_array($fetchData))      
      $sn=1;
      foreach($fetchData as $data)
    
/*--=========================ADD DB==============================*/
     if(isset($_POST['addmarks'])){
        
        $db= $con;
        $update=$_SESSION['logged'];
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $cid=$_POST['cid'];
        $cname=$_POST['cfull'];
        $sub1=$data['sub1'];
        $sub2=$data['sub2'];
        $sub3=$data['sub3'];
        $sub4=$data['sub4'];
        $sub5=$data['sub5'];
        $sub6=$data['sub6'];
        $sub7=$data['sub7'];
        $mark1=$_POST['mark1'];
        $mark2=$_POST['mark2'];
        $mark3=$_POST['mark3'];
        $mark4=$_POST['mark4'];
        $mark5=$_POST['mark5'];
        $mark6=$_POST['mark6'];
        $mark7=$_POST['mark7'];


  


            //$sql = "insert into tbl_course values '$id','$cshort','$cfull','$cdate';";
            $sql="INSERT INTO `marks`(`std_id`, `std_fname`, `std_lname`, `cid`, `cname`, `sub1`, `mark1`, `sub2`, `mark2`, `sub3`, `mark3`, `sub4`, `mark4`, `sub5`, `mark5`, `sub6`, `mark6`, `sub7`, `mark7`, `updated_by`) VALUES ('$id','$fname','$lname','$cid','$cname','$sub1','$mark1','$sub2','$mark2','$sub3','$mark3','$sub4','$mark4','$sub5','$mark5','$sub6','$mark6','$sub7','$mark7','$update')" ;
            $result = $db->query($sql);
            
               if($result== true){ 
                header('Location: viewmarks.php?sid='."$id");
               }else{
                header('Location: addmarks.php');
               }
               }
        
   
   /*--=========================ADD DB==============================*/
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
    <title>SIMS | Add Marks | MS</title>
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
                <h2 class="section-title"><b>Add Marks</b></h2>    
            </div>
            
            <div class="panel-body">
            
<!--=========================SECTION 1==============================-->
<div class=" col-md-8 offset-md-2 contact-form-holder mt-4 text-center" data-aos="fade-up">
    
    <!--=========================FORM1 FOR SID==============================-->
<form method="post" name="course-cid" class="text-center" action="">
                        <div class="row">
                        <div class="col-md-12">
					 <label>Enter Student ID<span id="" style="font-size:11px;color:red">*</span>	</label>
											</div>
                            <div class="col-md-12 form-group">
                                <input type="text"size="8" name="sid" style="text-align:center" id="sid" value="<?php echo $data['id']??''; ?>" placeholder="Student ID" required="required" >
                            </div>
                            <div class="col-md-12 text-center">
                                <button class="btn btn-primary btn-shadow btn-lg" type="submit" name="search_se">Search Student</button>
            </div>
            </div>
            
            </form><br><br><br></div>
   <!--=========================FORM1 FOR SID==============================-->
   <form method="post" name="std-per" action="">
   <div class=" col-md-8 offset-md-2 contact-form-holder mt-4 text-center" data-aos="fade-up">
<hr style="height:2px;border-width:0;color:black;background-color:white">
<h4 class="section-title"><u>Student Information</u></h4> 

                        <div class="row">
                        
                        <div class="col-md-6">
					 <label>Student First Name</label>
											</div>
                            <div class="col-md-6 form-group">
                                <input type="text"size="50" style="text-align:center"value="<?php echo $data['fname']??''; ?>" name="fname" id="fname" readonly="readonly"  required="required" >
                            </div>
                            <div class="col-md-6">
					 <label>Student Last Name</label>
											</div>
                            <div class="col-md-6 form-group">
                                <input type="text"size="50" style="text-align:center"value="<?php echo $data['lname']??''; ?>" name="lname" id="lname" readonly="readonly"  required="required" >
                            </div>
                            <div class="col-md-6">
					 <label>Course ID</label>
											</div>
                            <div class="col-md-6 form-group">
                                <input type="text"size="50" style="text-align:center"value="<?php echo $data['cid']??''; ?>" name="cid" id="cid" readonly="readonly"  required="required" >
                            </div>
                            <div class="col-md-6">
					 <label>Course Name</label>
											</div>
                            <div class="col-md-6 form-group">
                                <input type="text"size="50" style="text-align:center"value="<?php echo $data['course']??''; ?>" name="cfull" id="cfull" readonly="readonly"  required="required" >
                            </div>
                              
                            
                            
                            
            </div>
            
            


</div>	
<!--=========================SECTION 1==============================-->
<!--=========================SECTION 2==============================-->	

<div class=" col-md-8 offset-md-2 contact-form-holder mt-4 text-center" data-aos="fade-up">
<hr style="height:2px;border-width:0;color:black;background-color:white">
<h4 class="section-title"><u>Marking Section</u></h4> 

                        <div class="row">
                        <div class="col-md-6">
					 <label><?php echo $data['sub1']??''; ?></label>
                     
											</div>
                            <div class="col-md-6 form-group">
                            <input type="number"style="text-align:center"name="mark1" value="" id="mark1" placeholder="Subject 1"  min="0" value="0" step="0.01">
                            </div>
                            <div class="col-md-6">
					 <label><?php echo $data['sub2']??''; ?></label>
                     
											</div>
                            <div class="col-md-6 form-group">
                            <input type="number"style="text-align:center"name="mark2" value="" id="mark2" placeholder="Subject 2"  min="0" value="0" step="0.01">
                            </div>
                            <div class="col-md-6">
					 <label><?php echo $data['sub3']??''; ?></label>
                     
											</div>
                            <div class="col-md-6 form-group">
                            <input type="number"style="text-align:center"name="mark3" value="" id="mark3" placeholder="Subject 3"  min="0" value="0" step="0.01">
                            </div>
                            <div class="col-md-6">
					 <label><?php echo $data['sub4']??''; ?></label>
                     
											</div>
                            <div class="col-md-6 form-group">
                            <input type="number"style="text-align:center"name="mark4" value="" id="mark4" placeholder="Subject 4" min="0" value="0" step="0.01">
                            </div>
                            <div class="col-md-6">
					 <label><?php echo $data['sub5']??''; ?></label>
                     
											</div>
                            <div class="col-md-6 form-group">
                            <input type="number"style="text-align:center"name="mark5" value="" id="mark5" placeholder="Subject 5"  min="0" value="0" step="0.01">
                            </div>
                            <div class="col-md-6">
					 <label><?php echo $data['sub6']??''; ?></label>
                     
											</div>
                            <div class="col-md-6 form-group">
                            <input type="number"style="text-align:center"name="mark6" value="" id="mark6" placeholder="Subject 6" min="0" value="0" step="0.01">
                            </div>
                            <div class="col-md-6">
					 <label><?php echo $data['sub7']??''; ?></label>
                     
											</div>
                            <div class="col-md-6 form-group">
                            <input type="number"style="text-align:center"name="mark7" value="" id="mark7" placeholder="Subject 7" min="0" value="0" step="0.01">
                            </div>
                            <div class=" col-md-8 offset-md-2 contact-form-holder mt-4 text-center" data-aos="fade-up">
<hr style="height:2px;border-width:0;color:black;background-color:white">
                                <div class="col-md-12 text-center">
                                <button class="btn btn-primary btn-shadow btn-lg" type="submit" name="addmarks">Add Marks</button>
                                 
            </div>

            </div>
            </div>
            
            
</div></form>	
<!--=========================SECTION 2==============================-->
</div>		
													
				</div>

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
