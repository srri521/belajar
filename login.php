<?php
session_start();
require 'function/function.php';

if(isset($_SESSION["masuk"])){
    header("Location: index.php");
    exit;
}

if(isset($_POST["login"])){
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result=mysqli_query($conn, "SELECT * FROM user WHERE username='$username'");

    $user=query("SELECT * FROM user WHERE username='$username'")[0];
    //cek username
    if(mysqli_num_rows($result)===1){
        //cek password
        $row=mysqli_fetch_assoc($result);
        if(password_verify($password,$row["password"]) ){
            //set session
            $_SESSION["id_user"] = $user["id_user"];
            $_SESSION["username"]       = $user["username"];
            $_SESSION["password"]       = $user["password"];
            $_SESSION["role"]           = $user["role"];
            $_SESSION["nama"]           = $user["nama"];
            $_SESSION["photo"]          = $user["photo"];

            $_SESSION["masuk"]=true;

            if($user["role"]=="Admin"){
                $_SESSION["login"] =1;
                header("Location: index.php");
            }else{
                $_SESSION["login"] =0;
            }
            header("Location: index.php");
            exit;
        }
    }
    $error=true;
}
?>

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from kvthemes.com/bangodash/color-version/authentication-signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 06 Jul 2019 23:56:23 GMT -->
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="description" content=""/>
  <meta name="author" content=""/>
  <title>Sistem Informasi Lembaga Bimbingan Belajar</title>
  <!--favicon-->
  <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
  <!-- Bootstrap core CSS-->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet"/>
  <!-- animate CSS-->
  <link href="assets/css/animate.css" rel="stylesheet" type="text/css"/>
  <!-- Icons CSS-->
  <link href="assets/css/icons.css" rel="stylesheet" type="text/css"/>
  <!-- Custom Style-->
  <link href="assets/css/app-style.css" rel="stylesheet"/>
  
</head>

<body>
 <!-- Start wrapper-->

 <div id="wrapper">
	<div class="card card-primary card-authentication1 mx-auto my-5 animated bounceInDown">
		<div class="card-body">
			<div class="card-header">
			<h4 class="card-title text-uppercase text-center pb-2">Fawwaaz Kiddy Club</h4>
			</div>
		 <div class="card-content p-2">
		  <div class="card-title text-uppercase text-center pb-2">Sign In</div>
		    <form action="" method="post">
			  <div class="form-group">
			   <div class="position-relative has-icon-right">
				  <label for="username" class="sr-only">Username</label>
				  <input type="text" id="username" class="form-control form-control-rounded" placeholder="xxxx@gmail.com" name="username">
				  <div class="form-control-position">
					  <i class="icon-user"></i>
				  </div>
			   </div>
			  </div>
			  <div class="form-group">
			   <div class="position-relative has-icon-right">
				  <label for="password" class="sr-only">Password</label>
				  <input type="password" id="password" class="form-control form-control-rounded" placeholder="Password" name="password">
				  <div class="form-control-position">
					  <i class="icon-lock"></i>
				  </div>
			   </div>
			  </div>
			<div class="form-row mr-0 ml-0">
			 <div class="form-group col-6">
			   <div class="demo-checkbox">
                <input type="checkbox" id="user-checkbox" class="filled-in chk-col-primary" checked="" />
                <label for="user-checkbox">Remember me</label>
			  </div>
			 </div>
			</div>
				<!-- <a href="index.php?page=formDashboard"> -->
			 <button type="submit" class="btn btn-primary btn-round btn-block waves-effect waves-light" name="login">Sign In</button>
			  <div class="text-center pt-3">
				<hr>
				<p class="text-muted">Do not have an account? <a href="registrasi.php"> Registration here</a></p>
			  </div>
			 </form>
		   </div>
		  </div>
	     </div>
    
     <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
	</div><!--wrapper-->
	
  <!-- Bootstrap core JavaScript-->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  
</body>

<!-- Mirrored from kvthemes.com/bangodash/color-version/authentication-signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 06 Jul 2019 23:56:23 GMT -->
</html>
