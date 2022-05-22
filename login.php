<?php
include "config/config.php";

if(isset($_SESSION['logged'])){
    header('Location: dashboard.php');}

if(isset($_POST['but_submit'])){

    $uname = mysqli_real_escape_string($con,$_POST['txt_uname']);
    $password = mysqli_real_escape_string($con,$_POST['txt_pwd']);


    if ($uname != "" && $password != ""){

        $sql_query = "select count(*) as cntUser from users where username='".$uname."' and password='".$password."'";
        $result = mysqli_query($con,$sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['cntUser'];

        if($count > 0){
            $_SESSION['logged'] = $uname;
            header('Location: dashboard.php');
        }else{
            echo "Invalid username and password";
        }

    }

}
?>
<html>
    <head>
        <title>SIMS | Login</title>
        <head>
        <link rel="icon" type="image/x-icon" href="/img/icons/favicon.ico">
    <!--
     - Roxy: Bootstrap template by GettTemplates.com
     - https://gettemplates.co/roxy
    -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
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
    </head>
    <body>
      
           
        <div class="jumbotron d-flex align-items-center">
  <div class="container text-center" >
                    <h1>SIMS</h1>
                    <h2>Login</h2>
                    
  
                    <form method="post" name="contact-us" action="">
                    <div id="div_login" >
                        <div class="row">
                            <div class="col-md-12 form-group">
                            <input type="text" style="text-align:center"class="textbox" id="txt_uname" name="txt_uname" placeholder="Username" />
                            </div>
                            <div class="col-md-12 form-group">
                            <input type="password" style="text-align:center"class="textbox" id="txt_uname" name="txt_pwd" placeholder="Password"/>
                            </div>
                            <div class="col-md-12 text-center">
                                <button class="btn btn-primary btn-shadow btn-lg" type="submit"  name="but_submit" id="but_submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div></div>
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
</div>
        </div>
        
    </body>
</html>

