
<?php
 include "../include/config.php";
 include "header.php";
 if(isset($_GET['id'])){
    $id =$_GET['id'];
    $sql = "SELECT * FROM `content` WHERE `id` = $id";
    $result = mysqli_query($connection, $sql);
    $row = mysqli_fetch_assoc($result);
    $content_Name= $row['lectureName'];
    $contentFull= $row['content'];
    $course_Id =$row['courseId'];
    $cover =$row['cover'];
   
       
 }
 
?>
<style>
      body:not(.no-transition) #wrapper,
.animsition-overlay {
	position: relative;
	/* opacity: 0; */
	-webkit-animation-fill-mode: both;
	animation-fill-mode: both;
  display: hidden;
}

#vertical-nav nav li:hover > a, #vertical-nav nav li.current > a, #vertical-nav nav li.active > a {
    background-color: #FFF;
    color: #ed8739;
}
</style>
		<!-- ============================== Document Wrapper ================================= -->
	<div id="wrapper" class="clearfix">

		<div id="vertical-nav">
			<div class="container clearfix">

				<nav>
					<ul>
						<li><a href="home.php"><i class="icon-home2"></i>Home</a></li>

                        <li><a href="categorie.php"><i class="icon-book2"></i>Categories</a></li>

						<li><a href="courses.php"><i class="icon-book3"></i>Courses</a></li>

						<li  class="current"><a href="content.php"><i class="icon-line-content-left"></i>Content</a> </li>

						<li><a href="blog.php"><i class="icon-blogger"></i>Blog</a></li>

						<li><a href="library.php"><i class="icon-line-align-center"></i>Library</a></li>

						<li><a href="instructors.php"><i class="icon-guest"></i>Instructors</a></li>

                        <!-- <li><a href="team.php"><i class="icon-users"></i>Team</a></li> -->

                        <li><a href="logout.php"><i class="icon-line-power"></i>Logout</a></li>    

					</ul>
				</nav>

			</div>
		</div>
		</div>

				<!-- Page Title
		============================================= -->
		<section id="page-title">

			<div class="container clearfix">
				<h1>Welcome <strong><?php if(isset($loginName)) echo $loginName; ?></strong></h1>
			</div>

			<div id="page-menu-wrap">

				<div class="container clearfix">


				</div>

			</div>

		</section><!-- #page-title end -->

		<!-- Page Sub Menu
		============================================= -->

		<!-- Content
		============================================= -->
		<section id="content">

			<div class="content-wrap">

				<div class="container clearfix">
				<!-- ========================================== -->

				<div class="postcontent nobottommargin">

                    

                <?php

                    // echo $alertMessage; 
                    if(isset($update_status)) echo $update_status;

                        if(isset($message_name) || isset($submit_message) || isset($message_Content) || isset($course_error)  ){
                            echo "<div class='alert alert-danger'>";
                            
                            echo "Please fill the form carefully and correctly<br>";

                            echo "<a type='button' class='btn btn-default btn-sm' data-dismiss='alert'>Cancel</a>
                            </div>";    

                        }

                 ?>
                 
						<h3>Update Course Content</h3>

                        <form action="content.php" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <input type="hidden" value="<?php if(isset($id)) echo $id; ?>"  name="id">
                        <label for="nameId1">Lecture Name</label>
                        <input type="text" id="nameId1" value="<?php if(isset($content_Name)) echo $content_Name; ?>" placeholder="Lecture Name" name="updatename" class="form-control" title="Only lower and upper case and space" pattern="[A-Za-z/\s]+">
                        <?php if(isset($message_name)){ echo $message_name; } ?>
                    </div>

                    <div class="form-group">                    
                       <label for="contentsel">Course Selection</label>
                        <select class="form-control"  name="course_op" id="contentsel">
                    <?php 
                        
                        $query3 = "SELECT * FROM `course`";

                        $result3 = mysqli_query($connection, $query3);

                        if(mysqli_num_rows($result3) > 0){
                        

                        //We have data 
                        //output the data
                        while( $row3 = mysqli_fetch_assoc($result3) ){
                    ?>
                        
                        <option <?php if($row3['id'] == $course_Id) { ?> selected <?php } ?> value="<?php echo $row3['id']; ?>"> <?php echo $row3['name']; ?>  </option>

                        <?php       
                            } }
                        ?>

                        </select>
                <?php if(isset($course_error)) echo $course_error; ?>
                </div>

                <div class="form-group">
                        <label class="btn btn-success" for="my-file-selector">
                            <input id="my-file-selector" name="profilePic" type="file" style="display:none;" onchange="$('#upload-file-info').html($(this).val());" value="<?php if(isset($cover)) echo $cover; ?>"  required>
                            Cover Picture
                        </label>
                        <span class='label label-success' id="upload-file-info"></span>
                        <?php if(isset($message_picture)){ echo $message_picture; } ?>
                    </div>
                    
                <textarea class="ckeditor" name="editor"><?= $contentFull ?></textarea>
                <?php if(isset($message_Content)) echo $message_Content; ?>
                    <br>
                    <div class="form-group col-md-2">
                        <button name="submit" class="btn btn-block btn-success" type="submit">Submit</button>
                    </div>
                </form>


					</div><!-- .postcontent end -->


				</div>

			</div>

		</section><!-- #content end -->
<script src="ckeditor/ckeditor.js" type="text/javascript"></script>

<?php include('footer.php'); 


?>