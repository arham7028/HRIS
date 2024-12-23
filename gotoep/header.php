<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true) {
    header("location: index.php");
    exit;
} else {
    $loginName=$_SESSION['username'];
}
?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="HRIS" />
	<!-- <link rel="icon" type="image/png" href="images/tab.png" sizes="16x16">
	<link rel="icon" type="image/png" href="images/tab1.png" sizes="32x32"> -->

	<!-- Stylesheets
	============================================= -->
	<link rel="icon" type="image/png" href="images/l4.png" sizes="16x16">
	<link rel="icon" type="image/png" href="images/l4.png" sizes="32x32">
	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="../css/bootstrapmanuel.css" type="text/css" />
	<link rel="stylesheet" href="../style1.css" type="text/css" />
	<link rel="stylesheet" href="../css/dark.css" type="text/css" />
	<link rel="stylesheet" href="../css/font-icons.css" type="text/css" />
	<link rel="stylesheet" href="../css/animate.css" type="text/css" />
	<link rel="stylesheet" href="../css/magnific-popup.css" type="text/css" />
	<link rel="stylesheet" href="../css/calendar.css" type="text/css" />

	<link rel="stylesheet" href="../css/responsive.css" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<!-- [if lt IE 9]> -->
		<!-- <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script> -->
	<!-- <![endif] -->

	<!-- Document Title
	============================================= -->
	<title>HRIS</title>

<style>
body:not(.no-transition) #wrapper,
.animsition-overlay {
	position: relative;
	opacity: 1;
	-webkit-animation-fill-mode: both;
	animation-fill-mode: both;
  display: none;
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


</style>

</head>

<body class="stretched">
<!-- class="clearfix" -->
<div id="vertical-nav">
        <div class="container">
<!--  clearfix -->
            <nav>
                <ul>
                    <li class="current"><a href="home.php"><i class="icon-home2"></i>Home</a></li>

                    <li><a href="categorie.php"><i class="icon-book2"></i>Categories</a></li>

                    <li><a href="courses.php"><i class="icon-book3"></i>Courses</a></li>

                    <li><a href="content.php"><i class="icon-line-content-left"></i>Content</a> </li>

                    <li><a href="blog.php"><i class="icon-blogger"></i>Blog</a></li>

                    <!-- <li><a href="library.php"><i class="icon-line-align-center"></i>Library</a></li> -->

                    <li><a href="instructors.php"><i class="icon-guest"></i>Instructors</a></li>

                    <!-- <li><a href="team.php"><i class="icon-users"></i>Team</a></li> -->

                    <li><a href="logout.php"><i class="icon-line-power"></i>Logout</a></li>    

                </ul>
            </nav>

        </div>
    </div>
</body>

