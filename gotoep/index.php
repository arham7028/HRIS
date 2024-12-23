<?php 

include "../include/config.php";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $username = $_POST['email'];
  $password = $_POST['password'];
  $sql = "SELECT * from admin where admin_mail='$username'";
  $result = mysqli_query($connection, $sql);
  $num = mysqli_num_rows($result);
  echo $num;
  if ($num == 1) {
    while ($row = mysqli_fetch_assoc($result)) {
        if (password_verify($password, $row['password'])) {
          session_destroy();
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        header("location: home.php");
      } else {
        // $pass = true;
      }
    }
  }
  else{
    // $user = true;
  }
}
 ?>






<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="SemiColonWeb" />
	<link rel="icon" type="image/png" href="images/l4.png" sizes="16x16">
	<link rel="icon" type="image/png" href="images/l4.png" sizes="32x32">
	<!-- <link rel="icon" type="image/png" href="images/tab.png" sizes="16x16">
	<link rel="icon" type="image/png" href="images/tab1.png" sizes="32x32"> -->

	<!-- Stylesheets
	============================================= -->
	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="../css/bootstrapmanuel.css" type="text/css" />
	<link rel="stylesheet" href="../style1.css" type="text/css" />
	<link rel="stylesheet" href="../css/dark.css" type="text/css" />
	<link rel="stylesheet" href="../css/font-icons.css" type="text/css" />
	<link rel="stylesheet" href="../css/animate.css" type="text/css" />
	<link rel="stylesheet" href="../css/magnific-popup.css" type="text/css" />

	<link rel="stylesheet" href="../css/responsive.css" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<!--[if lt IE 9]>
		<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
	<![endif]-->

	<!-- Document Title
	============================================= -->
	<title>HRIS</title>

</head>

<body class="stretched">

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

		<!-- Content
		============================================= -->
		<section id="content">

			<div class="content-wrap nopadding">

				<div class="section nopadding nomargin" style="width: 100%; height: 100%; position: absolute; left: 0; top: 0; background: url('../images/login2.jpg') center center no-repeat; background-size: cover;"></div>

				<div class="section nobg full-screen nopadding nomargin" >
					<div class="container vertical-middle divcenter clearfix" >

						<div class="row center">
							<a href="index.php"><img height="50px" src="../images/l4.png" alt="Exceptional Programmers"></a>
						</div>

						<div class="panel panel-default divcenter noradius noborder" style="max-width: 400px; background-color: rgb(231 219 219 / 29%);">
							<div class="panel-body" style="padding: 40px;">
								<form id="login-form" name="login-form" class="nobottommargin" action="index.php" method="post">
									<h3>Login to your Account</h3>

									<div class="col_full">
										<label for="login-form-email">Email:</label>
										<input type="email" id="login-form-username" name="email" value="" class="form-control not-dark" />
									</div>

									<div class="col_full">
										<label for="login-form-password">Password:</label>
										<input type="password" id="login-form-password" name="password" value="" class="form-control not-dark" />
									</div>

									<div class="col_full nobottommargin center">
										<button class="button button-3d button-black nomargin " id="login-form-submit" name="submit" value="login">Login</button>
										
									</div>	
									
								</form>

								<div class="line line-sm"></div>

								<div class="alert-danger">
								
								<!-- alert -->
									
								</div>
								
							</div>

						</div>


						<div class="row center dark"><small>Copyrights &copy; 2024 All Rights Reserved by HRIS.</small></div>

					</div>
				</div>

			</div>

		</section><!-- #content end -->

	</div><!-- #wrapper end -->

	<!-- Go To Top
	============================================= -->
	<div id="gotoTop" class="icon-angle-up"></div>

	<!-- External JavaScripts
	============================================= -->
	<script type="text/javascript" src="../js/jquery.js"></script>
	<script type="text/javascript" src="../js/plugins.js"></script>

	<!-- Footer Scripts
	============================================= -->
	<script type="text/javascript" src="../js/functions.js"></script>

</body>
</html>