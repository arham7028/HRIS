<?php
include "../include/config.php";
if(isset($_GET['id'])){
$id = $_GET['id'];
// echo $id;
$query1 = "SELECT * FROM `content` WHERE id='$id'";
$result = mysqli_query($connection, $query1);
$row1 = mysqli_fetch_assoc($result);
$courseId = $row1['courseId'];

//fetching main content
$query2 ="SELECT * FROM `content` WHERE courseID='$courseId'";
$result2 = mysqli_query($connection, $query2);

//course query
$course_Query ="SELECT * FROM `course` WHERE id ='$courseId'";
$result3 = mysqli_query($connection,$course_Query);
$row3 = mysqli_fetch_assoc($result3);

//instructor
$instructorid = $row3['instructorId'];
$instructor_Query ="SELECT * FROM `teacher` WHERE id ='$instructorid'";
$result4 = mysqli_query($connection,$instructor_Query);
$row4 = mysqli_fetch_assoc($result4);



}
?>
	<link rel="stylesheet" href="../css/font-icons.css" type="text/css" />
	<link rel="stylesheet" href="../css/animate.css" type="text/css" />
	<link rel="stylesheet" href="../css/stylecourse.css" type="text/css" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

	<link rel="stylesheet" href="../css/responsive.css" type="text/css" />
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
</style>
   <div id="vertical-nav">
        <div class="container">
<!--  clearfix -->
            <nav>
                <ul>

                    <li  class="current"><a href="content.php"><i class="icon-line-content-left"></i>Back</a> </li>

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

<section class="playlist-details">

<h1 class="heading">Course Details</h1>

<div class="row">

   <div class="column">
      <!-- <form action="" method="post" class="save-playlist">
         <button type="submit"><i class="far fa-bookmark"></i> <span>save playlist</span></button>
      </form> -->

      <div class="thumb">
         <img src=<?php echo "images/courses/".$row3['cover']; ?> alt="Course Cover">
         <!-- <span>10 videos</span> -->
      </div>
   </div>
   <?php    ?>
   <div class="column">
      <div class="tutor">
         <img src=<?php echo "images/instructor/".$row4['image']; ?> alt="">
         <div>
            <h3><?php echo $row4['name'];?></h3>
            <span>[<?php echo $row4['qualification'];?>]</span>
         </div>
      </div>

      <div class="details">
         <h3><?php echo $row3["name"]; ?></h3>
         <p><?php echo $row3["description"]; ?></p>
         <a href="teacher_profile.php" class="inline-btn">view profile</a>
      </div>
   </div>
</div>

</section>

<section class="playlist-videos">

<h1 class="heading">Lectures</h1>

<div class="box-container">
   
<?php
$num =0;
while( $row2 = mysqli_fetch_assoc($result2) ){
   $num +=1;
?>
   <a class="box" href="lectureContent.php?id=<?php echo $row2['id']; ?>">
      <i class="fas fa-play"></i>
      <img src=<?php echo "images/lectures/".$row2['cover']; ?> alt="">
      <span style="
    font-size: 1.8rem;
    color: #fff;
    background-color: rgba(0, 0, 0, .3);
    border-radius: 0.5rem;
    position: absolute;
    top: 1.9rem;
    left: 2rem;
    padding: 0.5rem 1.5rem;
">Lecture: <?php echo $num; ?></span>
      <h3><?php echo $row2['lectureName']; ?></h3>
   </a>
<?php } ?>
</div>

</section>
	</div><!-- .postcontent end -->

</div>

</div>

</section><!-- #content end -->

<!-- custom js file link  -->
<script src="../js/coursescript.js"></script>