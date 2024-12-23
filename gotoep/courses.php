<?php
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
 ?>
<?php
        include "../include/config.php";
         include "header.php";
         $update=false;
         $add=false;
    ?>
 <?php 
       $query1 = "SELECT * FROM `admin` WHERE admin_mail='$loginName'";
       $result = mysqli_query($connection, $query1);
      $row = mysqli_fetch_assoc($result);

            if(isset($_GET['delete'])){
              $sno = $_GET['delete'];
              $delete = true;
              $sql = "DELETE FROM `course` WHERE `course`.`id`= $sno";
              $sql2 = "DELETE FROM `content` WHERE `courseId`= $sno";
              $result = mysqli_query($connection, $sql);
              $result2 = mysqli_query($connection, $sql2);
            }

            if ($_SERVER['REQUEST_METHOD'] == "POST") {
              if (isset( $_POST['snoEdit'])){
                $Couresename = $_POST['courseEdit'];
                $description = $_POST['descriptionEdit'];
                $id = $_POST['myidEdit'];
                $sql = " UPDATE `course` SET `name` = '$Couresename', `description` = '$description' WHERE `course`.`id` = $id";
                $result = mysqli_query($connection, $sql);
                if($result){
                  $update = true;
              }
              else{
                $updateerr=true;
              }
              }else{
                if (isset($_POST['submit']) && isset($_FILES['profilePic'])) {
                  // echo "Hello";
                  // echo "<pre>";
                  // print_r($_FILES['profilePic']);
                  // echo "</pre>";
                  
          
                  $img_name = $_FILES['profilePic']['name'];
                  $img_size = $_FILES['profilePic']['size'];
                  $tmp_name = $_FILES['profilePic']['tmp_name'];
                  $error = $_FILES['profilePic']['error'];
                  $courseName = $_POST['fullname'];
                  $book_op = $_POST['book_op'];
                  $categorie_op = $_POST['categorie_op'];
                  $instructor_op = $_POST['instructor_op'];
                  $description = $_POST['description'];
                  
                  // var_dump($error);


                      if ($error == 0) {
                        if ($img_size > 614813900) {
                            echo "Its size is large";
                        } else {
                            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                            $img_ex_lc = strtolower($img_ex);
            
                            $allowed_exs = array("jpg", "jpeg", "png","pdf","txt");
            
                            if (in_array($img_ex_lc, $allowed_exs)) {
                                $new_img_name = uniqid().'.'. $img_ex_lc;
                                $imh_upload_path = 'images/courses/' . $new_img_name;
                                move_uploaded_file($tmp_name, $imh_upload_path);
            
                                //insert in database
                                $sql = " INSERT INTO `photo` (`img_url`) VALUES ('$new_img_name')";
                                $sql = "INSERT INTO `course` (`name`, `cover`, `description`, `categorieId`, `instructorId`, `bookId`) VALUES ('$courseName', '$new_img_name', '$description', '$categorie_op', '$instructor_op', '$book_op');
";
                                $result = mysqli_query($connection, $sql);
                                if ($result) {
                                    // header("location: home.php");
                                }
                            } else {
                                echo "You cannot upload this file type";
                            }
                        }
                    } else {
                        echo "Unknown error occure";
                    }
              } else {
                  echo "Error";
              }
              }
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
		<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

		<div id="vertical-nav">
			<div class="container clearfix">

				<nav>
					<ul>
						<li><a href="home.php"><i class="icon-home2"></i>Home</a></li>

                        <li><a href="categorie.php"><i class="icon-book2"></i>Categories</a></li>
                        
						<li class="current"><a href="courses.php"><i class="icon-book3"></i>Courses</a></li>

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
		</div>

        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Edit Course</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="courses.php" method="POST">
          <div class="modal-body">
            <input type="hidden" name="snoEdit" id="snoEdit">
            <div class="form-group">
              <input type="hidden" class="form-control" id="myidEdit" name="myidEdit" aria-describedby="emailHelp">
            </div>

            <!-- <div class="form-group">
                        <label class="btn btn-success" for="my-file-selector">
                            <input id="my-file-selector" name="profilePicUpdate" type="file" style="display:none;" onchange="$('#upload-file-info').html($(this).val());">
                            Cover Picture
                        </label>
                        <span class='label label-success' id="upload-file-info"></span>
                        <?php if(isset($message_picture)){ echo $message_picture; } ?>
                    </div> -->

            <div class="form-group">
              <label for="courseEdit">Course Name</label>
              <input class="form-control" id="courseEdit" name="courseEdit" aria-describedby="emailHelp">
            </div> 
            <div class="form-group">
              <label for="descriptionEdit">Description</label>
              <input class="form-control" id="descriptionEdit" name="descriptionEdit" aria-describedby="emailHelp">
            </div> 

          </div>
          <div class="modal-footer d-block mr-auto">
            <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>

				<!-- Page Title
		============================================= -->
		<section id="page-title">

			<div class="container clearfix">
      <h1>Welcome <strong><?php if(isset($row)) echo $row['name']; ?></strong></h1>
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

                        if(isset($message_name) || isset($message_picture) || isset($submit_message) || isset($message_des) || isset($categorie_error) || isset($instructor_error) || isset($book_error) ){
                            echo "<div class='alert alert-danger'>";
                            
                            echo "Please fill the form carefully and correctly<br>";

                            echo "<a type='button' class='btn btn-default btn-sm' data-dismiss='alert'>Cancel</a>
                            </div>";    

                        }

                 ?>
                 
						<h3>Insert Course</h3>

                        <form action="courses.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nameID">Course Name</label>
                        <input type="text" id="nameID" placeholder="Full Name" name="fullname" class="form-control" title="Only lower and upper case and space" pattern="[A-Za-z/\s]+">
                        <?php if(isset($message_name)){ echo $message_name; } ?>
                    </div>

                    <div class="form-group" hidden>                    
                        <label hidden>Book Selection</label>
                        <select class="form-control"  name="book_op" hidden>
                        <option value="" hidden>Select Option</option>
                    <?php 
                             $query = "SELECT * FROM `library`";

                        $result = mysqli_query($connection, $query);

                        if(mysqli_num_rows($result) > 0){
        
                        //We have data 
                        //output the data
                        while( $row = mysqli_fetch_assoc($result) ){
                    ?>

                        <option value="<?php echo $row['id']; ?>" > <?php echo $row['name']; ?>  </option>

                        <?php       
                            } }
                        ?>
                        <option value="none" selected hidden> Null </option>
                        </select>
                    <?php if(isset($book_error)) echo $book_error; ?>
                </div>

                    <div class="form-group">                    
                        <label>Categorie Selection</label>
                        <select class="form-control"  name="categorie_op">
                        <option value="">Select Option</option>
                    <?php 
                             $query = "SELECT * FROM `categories`";

                        $result = mysqli_query($connection, $query);

                        if(mysqli_num_rows($result) > 0){
        
                        //We have data 
                        //output the data
                        while( $row = mysqli_fetch_assoc($result) ){
                    ?>

                        <option value="<?php echo $row['id']; ?>" > <?php echo $row['categorie']; ?>  </option>

                        <?php       
                            } }
                        ?>

                        </select>
                    <?php if(isset($categorie_error)) echo $categorie_error; ?>
                </div>

                <div class="form-group">                    
                        <label>Instructor Selection</label>
                        <select class="form-control"  name="instructor_op">
                        <option value="">Select Option</option>
                    <?php 
                             $query = "SELECT * FROM `teacher`";

                        $result = mysqli_query($connection, $query);

                        if(mysqli_num_rows($result) > 0){
        
                        //We have data 
                        //output the data
                        while( $row = mysqli_fetch_assoc($result) ){
                    ?>

                        <option value="<?php echo $row['id']; ?>" > <?php echo $row['name']; ?>  </option>

                        <?php       
                            } }
                        ?>

                        </select>
                    <?php if(isset($instructor_error)) echo $instructor_error; ?>
                </div>

                <div class="form-group">
                        <label class="btn btn-success" for="my-file-selector">
                            <input id="my-file-selector" name="profilePic" type="file" style="display:none;" onchange="$('#upload-file-info').html($(this).val());">
                            Cover Picture
                        </label>
                        <span class='label label-success' id="upload-file-info"></span>
                        <?php if(isset($message_picture)){ echo $message_picture; } ?>
                    </div>

                    <div class="form-group">
                        <label for="descriptionId1">Description</label>
                        <textarea id="descriptionId1" class="form-control" 
                         name="description"></textarea>
                    </div>
                    <?php if(isset($message_des)){ echo $message_des; } ?>

                    <div class="form-group col-md-2">
                        <button name="submit" class="btn btn-block btn-success" type="submit">Submit</button>
                    </div>
                </form>
                        
							

<!--%%%%%%%%%%%%%%%% HERE DISPLAY TABLE %%%%%%%%%%%%%%%%% -->
    
    
    <table class="table table-striped table-bordered">
    <tr>
        <th>ID</th>
        <th>Cover Picture</th>
        <th>Name</th>
        <th>Description</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    <?php

        $query = "SELECT * FROM `course`";

        $result = mysqli_query($connection, $query);

        if(mysqli_num_rows($result) > 0){
        
                        //We have data 
                        //output the data
         while( $row = mysqli_fetch_assoc($result) ){
                echo "<tr>";
echo "<td>".$row["id"]."</td> <td><img src=images/courses/".$row["cover"]." width='80px' height='80px'> </td> 
                    <td>".$row["name"]."</td>";
                
                 echo '<td>'.$row["description"].'</td>';

                echo '<td><a class="edit btn btn-primary btn-sm"><span class="icon-edit"></span></a></td>';
                
                echo "<td> <button class='delete btn btn-sm btn-danger' id=d".$row['id']."><span class='icon-trash2'></span></button></td>";

                echo "<tr>";  
            }
    } else {
        echo "<div class='alert alert-danger'>You have no Courses.<a class='close' data-dismiss='alert'>&times</a></div>";
    }
    
    // close the mysql 
        mysqli_close($connection);
    ?>

</table>
<!-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%-->
                	</div><!-- .postcontent end -->

				</div>

			</div>

		</section><!-- #content end -->


<?php include('footer.php'); 

?>

<script>
    edits = document.getElementsByClassName('edit');
    Array.from(edits).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("edit ");
        tr = e.target.parentNode.parentNode;
        myid = tr.getElementsByTagName("td")[0].innerText;
        name = tr.getElementsByTagName("td")[2].innerText;
        description = tr.getElementsByTagName("td")[3].innerText;
        console.log(myid, name,description);
        myidEdit.value = myid;
        courseEdit.value = name;
        descriptionEdit.value = description;
        snoEdit.value = e.target.id;
        console.log(e.target.id)
        $('#editModal').modal('toggle');
      })
    })

    deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("edit ");
        sno = e.target.id.substr(1);

        if (confirm("Are you sure you want to delete this course!")) {
          console.log("yes");
          window.location = `courses.php?delete=${sno}`;
          // TODO: Create a form and use post request to submit a form
        }
        else {
          console.log("no");
        }
      })
    })
  </script>
  