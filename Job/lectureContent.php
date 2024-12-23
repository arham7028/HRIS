<?php
//  include "../include/config.php";
 $servername="localhost";
 $username = "root";
 $password ="";
 $database="hris";
 $connection= mysqli_connect($servername, $username, $password, $database);
 if (!$connection) {
   die("Sorry we failed to connect".mysqli_connect_error());
 } 
 else {
	// echo 'Success';
	// $firstname=$_POST['firstname'];
 }
if(isset($_GET['id'])){
// $id = $_GET['id'];
// echo $id;
// $query1 = "SELECT * FROM `content` WHERE id='$id'";
// $result = mysqli_query($connection, $query1);
// $row1 = mysqli_fetch_assoc($result);
$id =  $_GET['id'];



//fetching main content
$query2 ="SELECT * FROM `content` WHERE `id`='$id'";
$result2 = mysqli_query($connection, $query2);
$row2 = mysqli_fetch_assoc($result2);
// //course query
// $course_Query ="SELECT * FROM `course` WHERE id ='$courseId'";
// $result3 = mysqli_query($connection,$course_Query);
// $row3 = mysqli_fetch_assoc($result3);

// //instructor
// $instructorid = $row3['instructorId'];
// $instructor_Query ="SELECT * FROM `teacher` WHERE id ='$instructorid'";
// $result4 = mysqli_query($connection,$instructor_Query);
// $row4 = mysqli_fetch_assoc($result4);


// if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true) {
//     header("location: signin.php");
//     exit;
// }

session_start();

$u_email = $_SESSION['username'];

$sql = "SELECT * from user where email = '$u_email'";
$result = mysqli_query($connection, $sql);
$user = mysqli_fetch_assoc($result);
$uid = $user['u_id'];

}
?>
	<link rel="icon" type="image/png" href="Images/t1.png" sizes="16x16">
	<link rel="icon" type="image/png" href="Images/t2.png" sizes="32x32">
	<link rel="stylesheet" href="css/font-icons.css" type="text/css" />
	<link rel="stylesheet" href="css/animate.css" type="text/css" />
	<link rel="stylesheet" href="css/stylecourse.css" type="text/css" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

	<link rel="stylesheet" href="css/responsive.css" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
   <style>
      :root{
   --main-color: #ed8739;
   --red:#e74c3c;
   --orange:#f39c12;
   --light-color:#888;
   --light-bg:#eee;
   --black:#2c3e50;
   --white:#fff;
   --border:.1rem solid rgba(0,0,0,.2);
}

body{
   background-color: var(--light-bg);
   padding-left: 0rem;
}
#vertical-nav {
	position: fixed;
	top: 0;
	left: 0;
	width: 240px;
	z-index: 99;
	background: #ed8739;
	border-right: 1px solid #EEE;
	height: 100%;
	overflow: auto;
	padding: 140px 0 40px;
	-webkit-transition: padding .4s ease;
	-o-transition: padding .4s ease;
	transition: padding .4s ease;
}

.sticky-header + #vertical-nav { padding-top: 100px; }

#vertical-nav nav ul {
	margin-bottom: 0;
	list-style: none;
}

#vertical-nav nav li a {
	display: block;
	padding: 10px 30px;
	color: #333;
	text-transform: uppercase;
	font-size: 13px;
	font-weight: 700;
	letter-spacing: 2px;
	font-family: 'Raleway', sans-serif;
}

#vertical-nav nav li i {
	font-size: 14px;
	width: 16px;
	text-align: center;
}

#vertical-nav nav li i:not(.icon-angle-down) {
	margin-right: 8px;
	position: relative;
	top: 1px;
}

#vertical-nav nav li a i.icon-angle-down {
	width: auto;
	margin-left: 5px;
}

#vertical-nav nav li:hover > a,
#vertical-nav nav li.current > a,
#vertical-nav nav li.active > a {
	background-color: #FFF;
	color: #ed8739;
}

#vertical-nav nav ul ul { display: none; }

#vertical-nav nav ul ul a {
	font-size: 12px;
	letter-spacing: 1px;
	padding-left: 45px;
	font-family: 'Lato', sans-serif;
}

#vertical-nav nav ul ul a i.icon-angle-down { font-size: 12px; }

#vertical-nav nav ul ul ul a { padding-left: 60px; }
#vertical-nav nav ul ul ul ul a { padding-left: 75px; }

@media (min-width: 992px) {

	#header { z-index: 199; }

	#page-title,
	#content,
	#footer { margin-left: 240px; }

	#page-title .container,
	#content .container,
	#footer .container {
		width: auto;
		padding: 0 60px;
	}

	#vertical-nav .container {
		width: 100%;
		padding: 0;
	}

	#page-title .breadcrumb { right: 60px !important; }

}


@media (max-width: 991px) {

	#vertical-nav {
		position: relative;
		width: 100%;
		z-index: auto;
		border: none;
		border-bottom: 1px solid #EEE;
		height: auto;
		padding: 0;
	}

	#vertical-nav .container { padding: 10px 20px; }

	#vertical-nav nav li a { padding: 10px 0; }

	#vertical-nav nav li:hover > a,
	#vertical-nav nav li.current > a,
	#vertical-nav nav li.active > a { background-color: transparent; }

	#vertical-nav nav ul ul a { padding-left: 15px; }
	#vertical-nav nav ul ul ul a { padding-left: 30px; }
	#vertical-nav nav ul ul ul ul a { padding-left: 45px; }

}
.playlist-details .row .column .thumb img{
   height: 38rem;
}

.header{
   position: sticky;
   top:0; left:0; right: 0;
   background-color: #ed8739;
   z-index: 1000;
   border-bottom: var(--border);
}
/* #vertical-nav{
	display: none;
} */
</style>

<header class="header">
   
   <section class="flex">

      <a href="home.php" class="logo"><img src="Images/logo8.png" alt="" style="height: 50px; margin-left: -53px;"></a>

      <!-- <form action="search.html" method="post" class="search-form">
         <input type="text" name="search_box" required placeholder="search courses..." maxlength="100">
         <button type="submit" class="fas fa-search"></button>
      </form> -->

      <div class="icons">
         <!-- <div id="menu-btn" class="fas fa-bars"></div> -->
         <div id="search-btn" class="fas fa-search"></div>
         <div id="user-btn" class="fas fa-user"></div>
         <div id="toggle-btn" class="fas fa-sun"></div>
      </div>

      <div class="profile">
         <img src="Images/user.png" class="image" alt="">
         <h3 class="name"><?php echo $user['firstname']; ?></h3>
         <p class="role">Student</p>
         <a href="profile.php" class="btn">view profile</a>
         <div class="flex-btn">
            <a href="logout.php" class="option-btn btn-danger">logout</a>
            <!-- <a href="register.html" class="option-btn">register</a> -->
         </div>
      </div>

   </section>

</header>   

   <div id="vertical-nav">
        <div class="container">
            <nav>
                <ul>

                    <li  class="current"><a href="lectures.php"><i class="icon-line-content-left"></i>Back</a> </li>

                    <li><a href="home.php"><i class="icon-home2"></i>Home</a></li>

                </ul>
            </nav>

        </div>
    </div>
<section id="content" >

<div class="content-wrap center">

   <div class="container clearfix ">
   <!-- ========================================== -->

   <div class="postcontent nobottommargin">



<section class="playlist-videos">

<h1 class="heading"><?php echo $row2['lectureName']; ?></h1>

<div class="box-container">
   
<div class="container box">
<?php
   echo $row2['content'];
 ?>
</div>
</div>

</section>
	</div><!-- .postcontent end -->

</div>

</div>

</section><!-- #content end -->

<!-- custom js file link  -->
<script src="js/coursescript.js"></script>