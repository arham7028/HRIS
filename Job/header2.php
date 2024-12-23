<?php include('include/openconfig.php'); 
 $servername="localhost";
 $username = "root";
 $password ="";
 $database="hris";
 $conn= mysqli_connect($servername, $username, $password, $database);
 if (!$conn) {
   die("Sorry we failed to connect".mysqli_connect_error());
 } 
 else {
    // echo 'Success';
    // $firstname=$_POST['firstname'];
 }
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true) {
    header("location: signin.php");
    exit;
}

$u_email = $_SESSION['username'];

$sql = "SELECT * from user where email = '$u_email'";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);
$uid = $user['u_id'];
$usertype = $user['usertype'];
?>

<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="ExceptionalProgrammers" />
	<meta name=description content="Exceptional Programmers">
	<link rel="icon" type="image/png" href="Images/t1.png" sizes="16x16">
	<link rel="icon" type="image/png" href="Images/t2.png" sizes="32x32">

	<!-- Stylesheets
	============================================= -->
	<link rel="stylesheet" href="../css/font-icons.css" type="text/css" />
	<link rel="stylesheet" href="../css/animate.css" type="text/css" />
	<link rel="stylesheet" href="../css/stylecourse.css" type="text/css" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

	<link rel="stylesheet" href="css/responsive.css" type="text/css" />
	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="css/bootstrapmanuel.css" type="text/css" />
	<link rel="stylesheet" href="style1.css" type="text/css" />
	<link rel="stylesheet" href="css/swiper.css" type="text/css" />
	<link rel="stylesheet" href="css/dark.css" type="text/css" />
	<link rel="stylesheet" href="css/font-icons.css" type="text/css" />
	<link rel="stylesheet" href="css/animate.css" type="text/css" />
	<link rel="stylesheet" href="css/magnific-popup.css" type="text/css" />
	<link rel="stylesheet" href="css/responsive.css" type="text/css" />
	
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	
	<title>HRIS</title>

	<style>
		.header .flex {
    display: flex;
    align-items: center;
    justify-content: space-between;
    position: relative;
    padding: 0rem 0rem;
	padding-top: 0.5rem;
}
#header, #header-wrap, #logo img {
    height: 91px;
    -webkit-transition: height .4s ease, opacity .3s ease;
    -o-transition: height .4s ease, opacity .3s ease;
    transition: height .4s ease, opacity .3s ease;
}
	</style>

</head>

<body class="stretched">


	<div id="wrapper" class="clearfix">
        <?php if ($usertype == "3") {
			# code...
		?>
		<header id="header" class=" full-header header flex" data-sticky-class="not-dark">

			<div id="header-wrap" class="flex">

				<div class="container clearfix">

					<div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

		
					<div id="logo">
						<a href="#" class="standard-logo" data-dark-logo="../images/logo.png"><img src="Images/l10.png" alt=""></a>
						<a href="#" class="retina-logo" data-dark-logo="../images/logo.png"><img src="Images/l10.png" alt=""></a>
					</div><!-- #logo end -->

					<!-- Primary Navigation
					============================================= -->
					<nav id="primary-menu" class="dark">

						<ul>
							<li class="current"><a href="home.php"><div>Home</div></a></li>

							<li><a href="course.php"><div>Courses</div></a>
								<ul>
									<li><a href="index.php?page=course"><div><i class="icon-keyboard"></i>Construction</div></a></li>
									
									<li><a href="index.php?page=course"><div><i class="icon-line-align-center"></i>Welding</div></a></li>

									<li><a href="index.php?page=course"><div><i class="icon-data"></i>Electrician</div></a></li>

									<li><a href="index.php?page=course"><div><i class="icon-line-layout"></i>Carpenter</div></a></li>
									
									<li><a href="index.php?page=course"><div><i class="icon-disqus"></i>Plumber</div></a></li>

									<li><a href="index.php?page=course"><div><i class="icon-graph"></i>Mechanic</div></a></li>

									
								</ul>
							</li>

							<li class="mega-menu"><a href="blog.php"><div>Blog</div></a> </li>

							<!-- <li><a href="jobdetails.php"><div>Jobs</div></a></li> -->

							
							<li><a href="jobpost.php"><div>Post Jobs</div></a></li>
							<li><a href="myjobs.php"><div>My Posts</div></a></li>

							<li><a href="contact.php"><div>Contact Us</div></a> </li>

							<li>
							<section class="flex">

<div class="icons flex">
   <div id="user-btn" class="fas fa-user"></div>
   <div id="toggle-btn" class="fas fa-sun" hidden></div>
</div>

<div class="profile">
<?php 
	if ($user["profilePic"]==null) {
		echo '<img src="Images/user.png" class="image" alt="">';
	} else {
		echo '<img src="Images/userpic/'.$user["profilePic"].'" class="image" alt="">';
	}
	
	?>   <h3 class="name"><?php echo $user['firstname']; ?></h3>
   <!-- <p class="role">Job-Provider</p> -->
   <a href="profile.php" class="btn btn-primary">view profile</a>
   <div class="flex-btn">
	  <a href="logout.php" class="btn btn-danger">logout</a>
	  <!-- <a href="register.html" class="option-btn">register</a> -->
   </div>
</div>

</section>
						</li>
<!-- 
							<li><a href="#nav"><div>Login</div></a>

										<ul>

										    <li class="mega-menu-title"><a href="record/"><div> Admin</div></a>
								
											<li class="mega-menu-title"><a href="Job/login/login.php"><div> Worker</div></a></li>
											<li class="mega-menu-title"><a href="gotoep/"><div> Instuctor</div></a></li>												
										
										</ul>

							</li> -->
							
						</ul>

					</nav><!-- #primary-menu end -->

				</div>

			</div>


		</header><!-- #header end -->
		<?php } ?>

		        <?php if ($usertype == "2") {
			# code...
		?>
		<header id="header" class=" full-header header flex" data-sticky-class="not-dark">

			<div id="header-wrap" class="flex">

				<div class="container clearfix">

					<div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

		
					<div id="logo">
						<a href="#" class="standard-logo" data-dark-logo="../images/logo.png"><img src="Images/l10.png" alt=""></a>
						<a href="#" class="retina-logo" data-dark-logo="../images/logo.png"><img src="Images/l10.png" alt=""></a>
					</div><!-- #logo end -->

					<!-- Primary Navigation
					============================================= -->
					<nav id="primary-menu" class="dark">

						<ul>
							<li class="current"><a href="home.php"><div>Home</div></a></li>

							<li><a href="course.php"><div>Courses</div></a>
								<ul>
									<li><a href="index.php?page=course"><div><i class="icon-keyboard"></i>Construction</div></a></li>
									
									<li><a href="index.php?page=course"><div><i class="icon-line-align-center"></i>Welding</div></a></li>

									<li><a href="index.php?page=course"><div><i class="icon-data"></i>Electrician</div></a></li>

									<li><a href="index.php?page=course"><div><i class="icon-line-layout"></i>Carpenter</div></a></li>
									
									<li><a href="index.php?page=course"><div><i class="icon-disqus"></i>Plumber</div></a></li>

									<li><a href="index.php?page=course"><div><i class="icon-graph"></i>Mechanic</div></a></li>

									
								</ul>
							</li>

							<li class="mega-menu"><a href="blog.php"><div>Blog</div></a> </li>

							<li><a href="jobdetails.php"><div>Jobs</div></a></li>

							<li><a href="myapplication.php?id=<?php echo $uid; ?>"><div>Applied Jobs</div></a></li>

							
							<!-- <li><a href="jobpost.php"><div>Post Jobs</div></a></li> -->
							<!-- <li><a href="myjobs.php"><div>My Application</div></a></li> -->

							<li><a href="contact.php"><div>Contact Us</div></a> </li>

							<li>
							<section class="flex">

<div class="icons flex">
   <div id="user-btn" class="fas fa-user"></div>
   <div id="toggle-btn" class="fas fa-sun" hidden></div>
</div>

<div class="profile">
	<?php 
	if ($user["profilePic"]==null) {
		echo '<img src="Images/user.png" class="image" alt="">';
	} else {
		echo '<img src="Images/userpic/'.$user["profilePic"].'" class="image" alt="">';
	}
	
	?>
   
   <h3 class="name"><?php echo $user['firstname']; ?></h3>
   <a href="profile.php" class="btn btn-primary">view profile</a>
   <div class="flex-btn">
	  <a href="logout.php" class="btn btn-danger">logout</a>
	  <!-- <a href="register.html" class="option-btn">register</a> -->
   </div>
</div>

</section>
						</li>
<!-- 
							<li><a href="#nav"><div>Login</div></a>

										<ul>

										    <li class="mega-menu-title"><a href="record/"><div> Admin</div></a>
								
											<li class="mega-menu-title"><a href="Job/login/login.php"><div> Worker</div></a></li>
											<li class="mega-menu-title"><a href="gotoep/"><div> Instuctor</div></a></li>												
										
										</ul>

							</li> -->
							
						</ul>

					</nav><!-- #primary-menu end -->

				</div>

			</div>


		</header><!-- #header end -->
		<?php } ?>
		<!-- custom js file link  -->
<script src="../js/coursescript.js"></script>