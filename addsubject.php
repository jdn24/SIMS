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
    header('Location: addsubject.php?cid='."$cid1");
    $DisplayForm = False;
}
$id=$_GET['cid'];

/*--=========================DB==============================*/ 
$db= $con;
$tableName="subject";
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
    phpAlert(   "No Course Found! Please Enter Valid CID From View Courses Table",   ); 
    
 }
}else{
  $msg= mysqli_error($db);
}
}
return $msg;
}
 /*--=========================DB==============================*/ 
/*--=========================ADD DB==============================*/
     if(isset($_POST['addsubject'])){
        
        $db= $con;
        
        $cshort=$_POST['cshort'];
        $cfull=$_POST['cfull'];
        $sub1=$_POST['subj1'];
        $sub2=$_POST['subj2'];
        $sub3=$_POST['subj3'];
        $sub4=$_POST['subj4'];
        $sub5=$_POST['subj5'];
        $sub6=$_POST['subj6'];
        $sub7=$_POST['subj7'];
        $sdate=$_POST['udate'];


            //$sql = "insert into tbl_course values '$id','$cshort','$cfull','$cdate';";
            $sql="INSERT INTO `subject`(`cid`, `cshort`, `cfull`, `sub1`, `sub2`, `sub3`, `sub4`, `sub5`, `sub6`, `sub7`, `sdate`) VALUES ('$id','$cshort','$cfull','$sub1','$sub2','$sub3','$sub4','$sub5','$sub6','$sub7','$sdate')" ;
            $result = $db->query($sql);
            
               if($result== true){ 
                header('Location: viewsubject.php');
               }else{
                header('Location: addsubject.php');
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
    <title>SIMS | Add Subject</title>
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
                <h2 class="section-title"><b>Add Subject</b></h2>    
            </div>
            
            <div class="panel-body">
            <?php
      if(is_array($fetchData))      
      $sn=1;
      foreach($fetchData as $data)
    ?>

<div class="section-content col-md-8 offset-md-2 contact-form-holder mt-4 text-center" data-aos="fade-up">
    <!--=========================FORM1 FOR CID==============================-->
<form method="post" name="course-cid" class="text-center" action="">
                        <div class="row">
                        <div class="col-md-12">
					 <label>Enter CID<span id="" style="font-size:11px;color:red">*</span>	</label>
											</div>
                            <div class="col-md-12 form-group">
                                <input type="text"size="6" name="cid" id="cid" value="<?php echo $data['cid']??''; ?>" placeholder="Enter Course ID" required="required" >
                            </div>
                            <div class="col-md-12 text-center">
                                <button class="btn btn-primary btn-shadow btn-lg" type="submit" name="search_ce">Search Course</button>
            </div>
            </div>
            
            </form><br><br><br>
   <!--=========================FORM1 FOR CID==============================-->


<form method="post" name="subject-add" action="">
                        <div class="row">
                        
                            <div class="col-md-6">
					 <label>Course Short Name	</label>
											</div>
                            <div class="col-md-6 form-group">
                                <input type="text"size="50" value="<?php echo $data['cshort']??''; ?>" name="cshort" id="cshort" readonly="readonly" required="required" >
                            </div>
                            <div class="col-md-6">
					 <label>Course Full Name	</label>
											</div>
                            <div class="col-md-6 form-group">
                                <input type="text"size="50" value="<?php echo $data['cfull']??''; ?>" name="cfull" id="cfull" readonly="readonly"  required="required" >
                            </div>

                            <div class="col-md-6">
					 <label>Enter Subject 1	</label>
											</div>
                            <div class="col-md-6 form-group">
                                <input type="text"size="50" name="subj1" id="subj1" value="" placeholder="Subject 1" >
                            </div>       
                            <div class="col-md-6">
					 <label>Enter Subject 2	</label>
											</div>
                            <div class="col-md-6 form-group">
                                <input type="text"size="50" name="subj2" id="subj2" value=""placeholder="Subject 2" >
                            </div>   
                            <div class="col-md-6">
					 <label>Enter Subject 3	</label>
											</div>
                            <div class="col-md-6 form-group">
                                <input type="text"size="50" name="subj3" id="subj3" value=""placeholder="Subject 3" >
                            </div>   
                            <div class="col-md-6">
					 <label>Enter Subject 4	</label>
											</div>
                            <div class="col-md-6 form-group">
                                <input type="text"size="50" name="subj4" id="subj4" value=""placeholder="Subject 4" >
                            </div>   
                            <div class="col-md-6">
					 <label>Enter Subject 5	</label>
											</div>
                            <div class="col-md-6 form-group">
                                <input type="text"size="50" name="subj5" id="subj5" value=""placeholder="Subject 5" >
                            </div>   
                            <div class="col-md-6">
					 <label>Enter Subject 6	</label>
											</div>
                            <div class="col-md-6 form-group">
                                <input type="text"size="50" name="subj6" id="subj6" value=""placeholder="Subject 6" >
                            </div>   
                            <div class="col-md-6">
					 <label>Enter Subject 7	</label>
											</div>
                            <div class="col-md-6 form-group">
                                <input type="text"size="50" name="subj7" id="subj7" value=""placeholder="Subject 7" >
                            </div>   
                            <div class="col-md-6">
	 <label>Date</label>
	</div>
                            <div class="col-md-6 form-group">
                                <input type="text"size="50" value="<?php echo date('d-m-Y');?>" readonly="readonly" name="udate">
                            </div>
                            
                            <div class="col-md-12 text-center">
                                <button class="btn btn-primary btn-shadow btn-lg" type="submit" name="addsubject">Add Subjects</button>
                                 
            </div>
            </div>
            
            </form>
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
