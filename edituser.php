<?php session_start();

include "config/config.php";

if(!isset($_SESSION['admin'])){
    echo "Login With Admin Credentials";
    header('Location: dashboard.php');}



// logout
if(isset($_POST['but_logout'])){
    session_destroy();
    header('Location: index.php');
}
if(isset($_POST['search_ce'])){
    $id1 = $_POST['id'];
    header('Location: edituser.php?id='."$id1");
    $DisplayForm = False;
}
$id=$_GET['id'];
/*--=========================DB==============================*/ 
    $db= $con;
    $tableName="users";
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
    $query = "SELECT * FROM users WHERE id= $id";
    $result = $db->query($query);
    if($result== true){ 
     if ($result->num_rows > 0) {
        $row= mysqli_fetch_all($result, MYSQLI_ASSOC);
        $msg= $row;
     } else {
        $msg= "No Data Found"; 
        phpAlert(   "Invalid ID! Please Enter a Valid ID or Add a New User"   );
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
        $uname = $_POST['uname'];
            $name = $_POST['name'];
            $pwd = $_POST['pwd'];


            $sql = "UPDATE users ". "SET username ='$uname', name='$name', password='$pwd' ". 
               "WHERE id ='$id'" ;
               $result = $db->query($sql);
            
               if($result== true){ 
                header('Location: viewuser.php');
               }else{
                header('Location: edituser.php');
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
    <title>SIMS | Edit User</title>
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
                <h2 class="section-title"><b>Edit User</b></h2>    
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
					 <label>Enter ID<span id="" style="font-size:11px;color:red">*</span>	</label>
											</div>
                            <div class="col-md-12 form-group">
                                <input type="text" name="id" id="id" value="<?php echo $data['id']??''; ?>" placeholder="Enter User ID" required="required" >
                            </div>
                            <div class="col-md-12 text-center">
                                <button class="btn btn-primary btn-shadow btn-lg" type="submit" name="search_ce">Search User</button>
            </div>
            </div>
            
            </form>

                    <form method="post" name="user-edit" action="">
                        <div class="row">
                        <div class="col-md-12">
					 <label>Name<span id="" style="font-size:11px;color:red">*</span>	</label>
											</div>
                            <div class="col-md-12 form-group">
                                <input type="text" name="name" id="name"  value="<?php echo $data['name']??''; ?>" required="required" >
                            </div>
                            <div class="col-md-12 ">
		<label>Username<span id="" style="font-size:11px;color:red">*</span></label>
		</div>
                            <div class="col-md-6 form-group">
                                <input type="text" name="uname" id="uname" value="<?php echo $data['username']??''; ?>" required="required" >
                            </div>
                            <div class="col-md-12">
	 <label>Password</label>
	</div>
                            <div class="col-md-6 form-group">
                            <input type="password" style="text-align:center"class="textbox" id="pwd" name="pwd" value="<?php echo $data['password']??''; ?>" placeholder="Password"/>
                            </div>
                            
                            <div class="col-md-12 text-center">
                                <button class="btn btn-primary btn-shadow btn-lg" type="submit" name="submit">Update User</button>
                                <a href="viewuser.php">
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
