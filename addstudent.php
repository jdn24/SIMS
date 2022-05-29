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
    header('Location: addstudent.php?cid='."$cid1");
    $DisplayForm = False;
}
$id=$_GET['cid'];

/*--=========================COURSE FIND==============================*/ 

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
$query = "SELECT * FROM subject WHERE cid=$id";
$result = $db->query($query);
if($result== true){ 
 if ($result->num_rows > 0) {
    $row= mysqli_fetch_all($result, MYSQLI_ASSOC);
    $msg= $row;
 } else {
    $msg= "No Data Found";
    phpAlert(   "ERROR!  Either this Course has no Subjects or This Course does not exist!",   ); 
    
 }
}else{
  $msg= mysqli_error($db);
}
}
return $msg;
}

 /*--=========================COURSE FIND==============================*/ 
 
 if(is_array($fetchData))      
 $sn=1;
 foreach($fetchData as $data)

/*--=========================ADD DB==============================*/
     if(isset($_POST['addstudent'])){
        
        $db= $con;

      
        $cfull=$_POST['cfull'];
        $fname=$_POST['fname'];
        $mname=$_POST['mname'];
        $lname=$_POST['lname'];
        $gender=$_POST['gender'];
        $gname=$_POST['gname'];
        $nation=$_POST['nation'];
        $mobno=$_POST['mno'];
        $eid=$_POST['eid'];
        $country=$_POST['country'];
        $state=$_POST['state'];
        $board1=$_POST['board1'];
        $roll1=$_POST['roll1'];
        $pyear1=$_POST['pyear1'];
        $marks1=$_POST['marks1'];
        $board2=$_POST['board2'];
        $roll2=$_POST['roll2'];
        $pyear2=$_POST['pyear2'];
        $marks2=$_POST['marks2'];
        $regno=$_POST['regno'];
        $regdate=$_POST['udate'];
        $sub1=$data['sub1'];
        $sub2=$data['sub2'];
        $sub3=$data['sub3'];
        $sub4=$data['sub4'];
        $sub5=$data['sub5'];
        $sub6=$data['sub6'];
        $sub7=$data['sub7'];


       


            
            //$sql="INSERT INTO `tbl_course`(`cid`, `cshort`, `cfull`, `cdate`) VALUES ('$id','$cshort','$cfull','$cdate')  ;" ;
            $sql="INSERT INTO `registration`(`cid`, `course`, `fname`, `mname`, `lname`, `gender`, `gname`, `nationality`, `mobno`, `emailid`, `country`, `state`, `board`, `roll`, `pyear`, `marks`, `board1`, `roll1`, `pyear1`, `marks1`,`regdate`, `regno`, `sub1`, `sub2`, `sub3`, `sub4`, `sub5`, `sub6`, `sub7`) VALUES ('$id','$cfull','$fname','$mname','$lname','$gender','$gname','$nation','$mobno','$eid','$country','$state','$board1','$roll1','$pyear1','$marks1','$board2','$roll2','$pyear2','$marks2','$regdate','$regno','$sub1','$sub2','$sub3','$sub4','$sub5','$sub6','$sub7')";
            $result = $db->query($sql);
            
               if($result== true){ 
                header('Location: viewstudent.php');
               }else{
                header('Location: addstudent.php?cid='."$cid1");
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
    <title>SIMS | Add Student</title>
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
                <h2 class="section-title"><b>Add Student</b></h2> 
            </div>
            <!--=========================LOAD CID==============================-->
            
     <!--=========================LOAD CID==============================-->

            <!--=========================SECTION 1==============================-->
<div class=" col-md-8 offset-md-2 contact-form-holder mt-4 text-center" data-aos="fade-up">
    <!--=========================FORM1 FOR CID==============================-->
<form method="post" name="course-cid" class="text-center" action="">
                        <div class="row">
                        <div class="col-md-12">
					 <label>Enter CID<span id="" style="font-size:11px;color:red">*</span>	</label>
											</div>
                            <div class="col-md-12 form-group">
                                <input type="text"size="8" name="cid" style="text-align:center" id="cid" value="<?php echo $data['cid']??''; ?>" placeholder="Course ID" required="required" >
                            </div>
                            <div class="col-md-12 text-center">
                                <button class="btn btn-primary btn-shadow btn-lg" type="submit" name="search_ce">Search Course</button>
            </div>
            </div>
            
            </form><br><br><br></div>
   <!--=========================FORM1 FOR CID==============================-->
   <form method="post" name="std-per" action="">
   <div class=" col-md-8 offset-md-2 contact-form-holder mt-4 text-center" data-aos="fade-up">
<hr style="height:2px;border-width:0;color:black;background-color:white">
<h4 class="section-title"><u>Register</u></h4> 

                        <div class="row">
                        
                        <div class="col-md-6">
					 <label>Course Full Name	</label>
											</div>
                            <div class="col-md-6 form-group">
                                <input type="text"size="50" style="text-align:center"value="<?php echo $data['cfull']??''; ?>" name="cfull" id="cfull" readonly="readonly"  required="required" >
                            </div>
                            <div class="col-md-6">
					 <label>Registration No. (If Any)	</label>
											</div>
                            <div class="col-md-6 form-group">
                                <input type="text"size="50" style="text-align:center" value="" name="regno" id="regno" >
                            </div>  
                            <div class="col-md-6">
	 <label>Date</label>
	</div>
                            <div class="col-md-6 form-group">
                                <input type="text"size="50" style="text-align:center"value="<?php echo date('d-m-Y');?>" readonly="readonly" name="udate">
                            </div>   
                            
                            
                            
            </div>
            
            


</div>	
<!--=========================SECTION 1==============================-->
<!--=========================SECTION 2==============================-->	

<div class=" col-md-8 offset-md-2 contact-form-holder mt-4 text-center" data-aos="fade-up">
<hr style="height:2px;border-width:0;color:black;background-color:white">
<h4 class="section-title"><u>Personal Information</u></h4> 

                        <div class="row">
                        <div class="col-md-6">
					 <label>First Name<span id="" style="font-size:11px;color:red">*</span>	</label>
                     
											</div>
                            <div class="col-md-6 form-group">
                                <input type="text" style="text-align:center"name="fname" value="" id="fname" placeholder="First Name" required="required" >
                            </div>
                            <div class="col-md-6">
					 <label>Middle Name	</label>
											</div>
                            <div class="col-md-6 form-group">
                                <input type="text" style="text-align:center"name="mname" value="" id="mname" placeholder="Middle Name"  >
                            </div>
                            <div class="col-md-6">
					 <label>Last Name<span id="" style="font-size:11px;color:red">*</span>	</label>
											</div>
                            <div class="col-md-6 form-group">
                                <input type="text" style="text-align:center"name="lname"value="" id="lname" placeholder="Last Name" required="required" >
                            </div>
                            <div class="col-md-6">
					 <label>Gender<span id="" style="font-size:11px;color:red">*</span>	</label>
											</div>
                            <div class="col-md-6 form-group">
                            <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="Male">Male
                            <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="Female">Female
                            <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="Other">Other  
  <span class="error">* <?php echo $genderErr;?></span> <!--
  <input type="text" style="text-align:center"name="gender"value="" id="gender" placeholder="Gender" required="required" > -->
                            </div>
                            <div class="col-md-6">
					 <label>Guardian Name<span id="" style="font-size:11px;color:red">*</span>	</label>
											</div>
                            <div class="col-md-6 form-group">
                                <input type="text" style="text-align:center"name="gname" value="" id="gname" placeholder="Guardian Name" required="required" >
                            </div>

                            <div class="col-md-6">
					 <label>Nationality<span id="" style="font-size:11px;color:red">*</span>	</label>
											</div>
                            <div class="col-md-6 form-group">
                                <input type="text" style="text-align:center"name="nation"value="" id="nation" placeholder="Nationality" required="required" >
                            </div>
                            
            </div>
            
            
</div>	
<!--=========================SECTION 2==============================-->
<!--=========================SECTION 3==============================-->
<div class=" col-md-8 offset-md-2 contact-form-holder mt-4 text-center" data-aos="fade-up">
<hr style="height:2px;border-width:0;color:black;background-color:white">
<h4 class="section-title"><u>Contact Information</u></h4> 

                        <div class="row">
                        <div class="col-md-6">
					 <label>Mobile Number<span id="" style="font-size:11px;color:red">*</span>	</label>
											</div>
                            <div class="col-md-6 form-group">
                                <input type="text" style="text-align:center"name="mno" value=""id="mno"  placeholder="Mobile Number" required="required" >
                            </div>
                            <div class="col-md-6">
					 <label>Email ID	</label>
											</div>
                            <div class="col-md-6 form-group">
                                <input type="text" style="text-align:center"name="eid" value=""id="eid" placeholder="Email ID" >
                            </div>
                            <div class="col-md-6">
					 <label>Country<span id="" style="font-size:11px;color:red">*</span>	</label>
											</div>
                            <div class="col-md-6 form-group">
                                <input type="text" style="text-align:center"name="country" value=""id="country" placeholder="Country" required="required" >
                            </div>
                            <div class="col-md-6">
					 <label>State<span id="" style="font-size:11px;color:red">*</span>	</label>
											</div>
                            <div class="col-md-6 form-group">
                                <input type="text" style="text-align:center"name="state" value=""id="state" placeholder="State" required="required" >
                            </div>
                            
            </div>
            
           
</div>
<!--=========================SECTION 3==============================-->
<!--=========================SECTION 4==============================-->
<div class="col-lg-12 text-center" data-aos="fade-up">
<hr style="height:2px;border-width:0;color:black;background-color:white">
<h4 class="section-title"><u>Academic Information</u></h4> 

                        <div class="row">
                            <!--=========================Table==============================-->
                             <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                         <div class="col-lg-6 text">
			<th>&nbsp;&nbsp;&nbsp;&nbsp;Board	</label></th>
			</div>   
            <div class="col-lg-6">
			<th>&nbsp;&nbsp;&nbsp;&nbsp;Roll No</th>
			</div>   
              <div class="col-lg-6">
			 <th>&nbsp;&nbsp;&nbsp;&nbsp;Year Of Passing</th>
			</div>    
            <div class="col-lg-6">
			 <th>&nbsp;&nbsp;&nbsp;&nbsp;CGPA/%</th>
			</div>                               
            </tr>
                                    </thead>
                                    <tbody>
                                        <tr> 
                  <td><div class="col-md-8 offset-md-2">
				  <input class="form-control" type="text"value="" name="board1">
				  </div></td>
                  <td><div class="col-md-8 offset-md-2">
			<input class="form-control" type="text" value=""name="roll1" >
			</div></td>
            <td><div class="col-md-8 offset-md-2">
			<input class="form-control"  type="text"value="" name="pyear1" >
			</div></td>
            <td><div class="col-md-8 offset-md-2">
				  <input class="form-control" type="text"value="" name="marks1">
				  </div></td>
                  </tr>

              <tr> 
                  <td><div class="col-md-8 offset-md-2">
				  <input class="form-control" type="text" value=""name="board2" >
				  </div></td>
                  <td><div class="col-md-8 offset-md-2">
			<input class="form-control" type="text"value="" name="roll2" >
			</div></td>
            <td><div class="col-md-8 offset-md-2">
			<input class="form-control"  type="text"value="" name="pyear2" >
			</div></td>
            <td><div class="col-md-8 offset-md-2">
				  <input class="form-control" type="text"value="" name="marks2">
				  </div></td>
                  </tr>      
                                        
                                    </tbody>
                                </table>
                            </div>
                                <!--=========================Table==============================-->
                                <div class=" col-md-8 offset-md-2 contact-form-holder mt-4 text-center" data-aos="fade-up">
<hr style="height:2px;border-width:0;color:black;background-color:white">
                                <div class="col-md-12 text-center">
                                <button class="btn btn-primary btn-shadow btn-lg" type="submit" name="addstudent">Add Student</button>
                                 
            </div>

            </div>
            
           
</div>
<!--=========================SECTION 4==============================-->

				</div>
</form>
					</div>
            <!-- /.row -->
        </div>
    </div>
</section>	</div>
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
