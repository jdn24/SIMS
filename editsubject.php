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
    header('Location: editsubject.php?cid='."$cid1");
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
    $query = "SELECT * FROM subject WHERE cid= $id";
    $result = $db->query($query);
    if($result== true){ 
     if ($result->num_rows > 0) {
        $row= mysqli_fetch_all($result, MYSQLI_ASSOC);
        $msg= $row;
     } else {
        $msg= "No Data Found";
        phpAlert(   "No Data Found! Please Enter Valid CID From View Subjects Table"   ); 

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
        $subj1 = $_POST['subject1'];
        $subj2 = $_POST['subject2'];
        $subj3 = $_POST['subject3'];
        $subj4 = $_POST['subject4'];
        $subj5 = $_POST['subject5'];
        $subj6 = $_POST['subject6'];
        $subj7 = $_POST['subject7'];
        $update = $_POST['udate'];
              
               $sql = "UPDATE subject ". "SET sub1 ='$subj1', sub2='$subj2', sub3='$subj3', sub4='$subj4', sub5='$subj5', sub6='$subj6', sub7='$subj7', sdate='$update' ". 
               "WHERE cid ='$id'" ;
               $result = $db->query($sql);
               if($result== true){ 
                header('Location: viewsubject.php');

               }else{
                header('Location: editsubject.php');
                $msg= mysqli_error($db);
        
               }}
        
   
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
    <title>SIMS | Edit Subject</title>
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
                <h2 class="section-title"><b>Edit Subject</b></h2>    
            </div>
            
            <div class="panel-body">
            <?php
      if(is_array($fetchData))      
      $sn=1;
      foreach($fetchData as $data)
    ?>

<div class="col-md-8 offset-md-2 contact-form-holder mt-4" data-aos="fade-up">
    <!--=========================FORM1 FOR CID==============================-->
<form method="post" name="course-cid" class="text-center" action="">
                        <div class="row">
                        <div class="col-md-12">
					 <label>Enter CID<span id="" style="font-size:11px;color:red">*</span>	</label>
											</div>
                            <div class="col-md-12 form-group">
                                <input type="text" name="cid" style="text-align:center"id="cid" value="<?php echo $data['cid']??''; ?>" placeholder="Enter Course ID" required="required" >
                            </div>
                            <div class="col-md-12 text-center">
                                <button class="btn btn-primary btn-shadow btn-lg" type="submit" name="search_ce">Search Course</button>
            </div>
            </div>
            
            </form><br><br><br>
   <!--=========================FORM1 FOR CID==============================-->
      <!--=========================FORM2 FOR UPDATE==============================-->
                    <form method="post" name="subject-edit" action="">
                        <div class="row">
                        
                            <div class="col-md-12 ">
		<label>Course Full Name<span id=""  style="font-size:11px;color:red">*</span></label>
		</div>
                            <div class="col-md-6 form-group">
                                <input type="text" name="cfull"style="text-align:center" id="cfull" size="50" value="<?php echo $data['cfull']??''; ?>" readonly="readonly" required="required" >
 </div>

 <div class="col-md-12 ">
		<label>Subject 1</label>
		</div>
                            <div class="col-md-6 form-group">
                                <input type="text" name="subject1"style="text-align:center" id="subject1" size="50" value="<?php echo $data['sub1']??''; ?>" >
 </div>

 <div class="col-md-12 ">
		<label>Subject 2</label>
		</div>
                            <div class="col-md-6 form-group">
                                <input type="text" name="subject2" style="text-align:center"id="subject2" size="50" value="<?php echo $data['sub2']??''; ?>" >
 </div>
 
 <div class="col-md-12 ">
		<label>Subject 3</label>
		</div>
                            <div class="col-md-6 form-group">
                                <input type="text" name="subject3" style="text-align:center"id="subject3" size="50" value="<?php echo $data['sub3']??''; ?>" >
 </div>

 <div class="col-md-12 ">
		<label>Subject 4</label>
		</div>
                            <div class="col-md-6 form-group">
                                <input type="text" name="subject4" style="text-align:center"id="subject4" size="50" value="<?php echo $data['sub4']??''; ?>" >
 </div>

 <div class="col-md-12 ">
		<label>Subject 5</label>
		</div>
                            <div class="col-md-6 form-group">
                                <input type="text" name="subject5" style="text-align:center"id="subject5" size="50" value="<?php echo $data['sub5']??''; ?>" >
 </div>

 <div class="col-md-12 ">
		<label>Subject 6</label>
		</div>
                            <div class="col-md-6 form-group">
                                <input type="text" name="subject6" style="text-align:center"id="subject6" size="50" value="<?php echo $data['sub6']??''; ?>" >
 </div>

 <div class="col-md-12 ">
		<label>Subject 7</label>
		</div>
                            <div class="col-md-6 form-group">
                                <input type="text" name="subject7"style="text-align:center" id="subject7" size="50" value="<?php echo $data['sub7']??''; ?>" >
 </div>

                            
                            <div class="col-md-12">
	 <label>Date</label>
	</div>
                            <div class="col-md-6 form-group">
                                <input type="text" style="text-align:center"value="<?php echo date('d-m-Y');?>" readonly="readonly" name="udate">
                            </div>
                            
                            <div class="col-md-12 text-center">
                                <button class="btn btn-primary btn-shadow btn-lg" type="submit" name="submit">Update Subjects</button>
                                <a href="viewsubject.php">
   <input type="button"class="btn btn-outline-primary btn-shadow btn-lg" value="Cancel" />
                            </div>
            </div>
                        
                    </form>
                     <!--=========================FORM2 FOR UPDATE==============================-->
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
