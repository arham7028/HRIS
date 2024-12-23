<link rel="stylesheet" href="../css/stylecourse.css" type="text/css" />
<?php
 include("header.php");
 include "include/config.php";

 //course query
$course_Query ="SELECT * FROM `course`";
$result1 = mysqli_query($connection,$course_Query);

//category query
$category_Query ="SELECT * FROM `categories`";
$result2 = mysqli_query($connection,$category_Query);


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $_POST['filter'];
    if ($id!="") {
             //course query
$course_Query ="SELECT * FROM `course` where `categorieId` = $id";
$result1 = mysqli_query($connection,$course_Query);
    }
    else{
        // echo "normal";
    }
}
?>

<style>
.container section {
    padding: 2rem;
    margin: 0 auto;
    max-width: 1200px;
}

.courses .box-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(30rem, 1fr));
    gap: 1.5rem;
    justify-content: center;
    align-items: flex-start;
}

.courses .box-container .box {
    border-radius: 0.5rem;
    background-color: var(--white);
    padding: 2rem;
}

.courses .box-container .box .tutor {
    display: flex;
    align-items: center;
    gap: 1.5rem;
    margin-bottom: 2.5rem;
}

.courses .box-container .box .tutor img {
    height: 5rem;
    width: 5rem;
    border-radius: 50%;
    object-fit: cover;
}

.courses .box-container .box .tutor h3 {
    font-size: 1.8rem;
    color: var(--black);
    margin-bottom: 0.2rem;
}
.courses .box-container .box .tutor span {
    font-size: 1.3rem;
    color: var(--light-color);
}

.courses .box-container .box .thumb {
    position: relative;
}

.courses .box-container .box .thumb img {
    width: 100%;
    height: 20rem;
    object-fit: cover;
    border-radius: 0.5rem;
}

.courses .box-container .box .thumb span {
    position: absolute;
    top: 1rem;
    left: 1rem;
    border-radius: 0.5rem;
    padding: 0.5rem 1.5rem;
    background-color: rgba(0, 0, 0, .3);
    color: #fff;
    font-size: 1.5rem;
}

.courses .box-container .box .title {
    font-size: 2rem;
    color: var(--black);
    padding-bottom: 0.5rem;
    padding-top: 1rem;
}

.btn, .inline-btn {
    background-color: var(--main-color);
}
.inline-btn, .inline-option-btn, .inline-delete-btn {
    display: inline-block;
}
.inline-btn, .inline-option-btn, .inline-delete-btn, .btn, .delete-btn, .option-btn {
    border-radius: 0.5rem;
    color: #fff;
    font-size: 1.8rem;
    cursor: pointer;
    text-transform: capitalize;
    padding: 1rem 3rem;
    text-align: center;
    margin-top: 1rem;
}

:root {
    --main-color: #ed8739;
    --red: #e74c3c;
    --orange: #f39c12;
    --light-color: #888;
    --light-bg: #eee;
    --black: #2c3e50;
    --white: #fff;
    --border: .1rem solid rgba(0, 0, 0, .2);
}
#page-title{
    background-color: #e58e4c;
}

select,option{
    border-radius: 10px;
    padding: 4px;
}
#selectid{
    margin-top: 1px;
    padding-bottom: 14px;
}
.btn-dark{
    border: 1px solid #2c3e50;
}
</style>


		<!-- Page Title
		============================================= -->
		<section id="page-title">

			<div class="container clearfix">
				<h1>Some courses are <strong>Comming Soon...!</strong></h1>
				<!-- <span>Courses</span> -->
			</div>
       <div class="container">
           <form action="course.php" method="post">
           <div class="row center">
             <div class="col-md-12 center">
                <select name="filter" id="selectid" class="form-select border-0 py-2" style="font-size: 1.5rem;width: 264px;height: 44px; font-family: 'Raleway', sans-serif;">
                    <option style="font-family: 'Raleway', sans-serif;" value="">Select</option>
                    <?php
                    while ($row2 = mysqli_fetch_assoc($result2)) {
                        ?>
                    <option style="font-family: 'Raleway', sans-serif;" value="<?php echo $row2['id'] ?>"><?php echo $row2['categorie'] ?></option>
                    <?php } ?>
                </select>
                <button class="btn btn-dark border-0 py-3 width-100 " style="margin-left: 32px;margin-top: 6px;">Search
            </button>
                         </div>
            </div>
           </form>
        </div>

		</section><!-- #page-title end -->

		<!-- Page Sub Menu
		============================================= -->
		<!-- <div id="page-menu">

			<div id="page-menu-wrap">


			</div>

		</div> -->
        <!-- #page-menu end -->

		<div class="container">
		<section class="courses">

<!-- <h1 class="heading">our courses</h1> -->

<div class="box-container">
<?php
while ($row1 = mysqli_fetch_assoc($result1)) {
	//instructor
$instructorid = $row1['instructorId'];
$instructor_Query ="SELECT * FROM `teacher` WHERE id ='$instructorid'";
$result2 = mysqli_query($connection,$instructor_Query);
$row2 = mysqli_fetch_assoc($result2);
?>
   <div class="box">
	  <div class="tutor" style="font-family: 'Raleway', sans-serif;">
		 <img src=<?php echo "gotoep/images/instructor/".$row2['image']; ?> alt="">
		 <div class="info">
			<h3 style="font-family: 'Raleway', sans-serif;"><?php echo $row2['name']; ?></h3>
			<span>21-10-2022</span>
		 </div>
	  </div>
	  <div class="thumb">
	    <img src=<?php echo "gotoep/images/courses/".$row1['cover']; ?> alt="">
		 <span>10 videos</span>
	  </div>
	  <h3 class="title"><?php echo $row1['name']; ?></h3>
	  <a href=<?php echo "lectures.php?id=".$row1['id']?> class="inline-btn">view playlist</a>
   </div>
   <?php
}
?>

</div>

</section>
		</div>

		
<?php include("footer.php"); ?>

<!-- custom js file link  -->
<script src="js/coursescript.js"></script>