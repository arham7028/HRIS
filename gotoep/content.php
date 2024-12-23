
<?php
include "../include/config.php";
include "header.php";
$query1 = "SELECT * FROM `admin` WHERE admin_mail='$loginName'";
       $result = mysqli_query($connection, $query1);
      $row = mysqli_fetch_assoc($result);
?>

<?php
// Operation on the data

if(isset($_GET['delete'])){
    $sno = $_GET['delete'];
    $delete = true;
    $sql = "DELETE FROM `content` WHERE `content`.`id` = $sno";
    $result = mysqli_query($connection, $sql);
  }

  if ($_SERVER['REQUEST_METHOD'] == "POST") {
     if(isset($_POST['id'])){
        if (isset($_POST['submit']) && isset($_FILES['profilePic'])) {
            // echo "Hello";
            // echo "<pre>";
            // print_r($_FILES['profilePic']);
            // echo "</pre>";
            
    
            $img_name = $_FILES['profilePic']['name'];
            $img_size = $_FILES['profilePic']['size'];
            $tmp_name = $_FILES['profilePic']['tmp_name'];
            $error = $_FILES['profilePic']['error'];
            $courseId = $_POST['course_op'];
            $name = $_POST['updatename'];
            $editor = $_POST['editor'];
            $id = $_POST['id'];
    
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
                          $imh_upload_path = 'images/lectures/' . $new_img_name;
                          move_uploaded_file($tmp_name, $imh_upload_path);
      
                          //insert in database
                          $sql = " INSERT INTO `photo` (`img_url`) VALUES ('$new_img_name')";
                          $sqlup = " UPDATE `content` SET `content` = '$editor', `courseId` = '$courseId', `lectureName` = '$name',`cover` = '$new_img_name' WHERE `content`.`id` = $id;
    ";
                          $result = mysqli_query($connection, $sqlup);
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
            $courseId = $_POST['course_op'];
            $name = $_POST['name'];
            $editor = $_POST['editor'];
    
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
                          $imh_upload_path = 'images/lectures/' . $new_img_name;
                          move_uploaded_file($tmp_name, $imh_upload_path);
      
                          //insert in database
                          $sql = " INSERT INTO `photo` (`img_url`) VALUES ('$new_img_name')";
                          $sql = "INSERT INTO `content` ( `content`, `courseId`, `lectureName`,`cover`) VALUES ('$editor', '$courseId', '$name', '$new_img_name');
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

						<li><a href="courses.php"><i class="icon-book3"></i>Courses</a></li>

						<li  class="current"><a href="content.php"><i class="icon-line-content-left"></i>Content</a> </li>

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

                        if(isset($message_name) || isset($submit_message) || isset($message_Content) || isset($course_error)  ){
                            echo "<div class='alert alert-danger'>";
                            
                            echo "Please fill the form carefully and correctly<br>";

                            echo "<a type='button' class='btn btn-default btn-sm' data-dismiss='alert'>Cancel</a>
                            </div>";    

                        }

                 ?>
                 
						<h3>Insert Course Content</h3>

                        <form action="" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="nameId1">Lecture Name</label>
                        <input type="text" id="nameId1" placeholder="Lecture Name" name="name" class="form-control" title="Only lower and upper case and space" pattern="[A-Za-z/\s]+" required>
                        <?php if(isset($message_name)){ echo $message_name; } ?>
                    </div>

                    <div class="form-group">                    
                       <label>Course Selection</label>
                        <select class="form-control"  name="course_op" required>
                        <option value="">Select Option</option>
                    <?php 
                        
                        $query = "SELECT * FROM `course`";

                        $result = mysqli_query($connection, $query);
                        

                        if(mysqli_num_rows($result) > 0){
                        

                        //We have data 
                        //output the data

                        while( $row = mysqli_fetch_assoc($result) ){
                    ?>
                       
                        <option value="<?php echo $row['id']; ?>"> <?php echo $row['name']; ?>  </option>

                        <?php       
                            } }
                        ?>

                        </select>
                <?php if(isset($course_error)) echo $course_error; ?>
                </div>

                <div class="form-group">
                        <label class="btn btn-success" for="my-file-selector">
                            <input id="my-file-selector" name="profilePic" type="file" style="display:none;" onchange="$('#upload-file-info').html($(this).val());" required>
                            Cover Picture
                        </label>
                        <span class='label label-success' id="upload-file-info"></span>
                        <?php if(isset($message_picture)){ echo $message_picture; } ?>
                    </div>
                    
                <textarea class="ckeditor" name="editor" required></textarea>
                <?php if(isset($message_Content)) echo $message_Content; ?>
                    <br>
                    <div class="form-group col-md-2">
                        <button name="submit" class="btn btn-block btn-success" type="submit">Submit</button>
                    </div>
                </form>
                 		

<!--%%%%%%%%%%%%%%%% HERE DISPLAY TABLE %%%%%%%%%%%%%%%%% -->
    
    
    <table class="table table-striped table-bordered">
    <tr>
        <th>ID</th>
        <th>Lecture Name</th>
        <th>Course Name</th>
        <th>View Course</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    <?php

        $query = "SELECT * FROM `content`";

        $result = mysqli_query($connection, $query);

        if(mysqli_num_rows($result) > 0){
        
                        //We have data 
                        //output the data
         while( $row = mysqli_fetch_assoc($result) ){

                $temp = $row['courseId'];
                $query2 = "SELECT * FROM `course` WHERE id ='$temp' ";
                $result2 = mysqli_query($connection, $query2);

                if(mysqli_num_rows($result2) > 0){
        
                        //We have data 
                        //output the data
                while( $row2 = mysqli_fetch_assoc($result2) ){

                   $courseName = $row2['name']; 
                }} else{$courseName='Insert Course Name';}

                echo "<tr>";
                
                echo "<td>".$row["id"]."</td>";


                echo "<td>".$row["lectureName"]."</td>"; 

                echo "<td>".$courseName."</td>";
                
                echo '<td><a href="view.php?id='.$row['id']. '" type= "button" class="btn btn-primary btn-sm">
                <span class="icon-eye-open"></span></a></td>';


                echo '<td><a href="updatecontent.php?id='.$row['id']. '" type= "button" class="btn btn-primary btn-sm">
                <span class="icon-edit"></span></a></td>';
                
                echo "<td> <button class='delete btn btn-sm btn-danger' id=d".$row['id']."><span class='icon-trash2'></span></button></td>";

                echo "<tr>";  
            }
    } else {
        echo "<div class='alert alert-danger'>You have no Content.<a class='close' data-dismiss='alert'>&times</a></div>";
    }
    
    // close the mysql 
        mysqli_close($connection);
    ?>

    <tr>
        <td colspan="6" id="end"><div class="text-center"><a href="content.php" type="button" class="btn btn-sm btn-success"><span class="icon-plus"></span></a></div></td>
    </tr>
</table>

<!-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%-->
    



					</div><!-- .postcontent end -->


				</div>

			</div>

		</section><!-- #content end -->
<script src="ckeditor/ckeditor.js" type="text/javascript"></script>

<?php include('footer.php'); 

echo '}';

?>

<script>
    // edits = document.getElementsByClassName('edit');
    // Array.from(edits).forEach((element) => {
    //   element.addEventListener("click", (e) => {
    //     console.log("edit ");
    //     tr = e.target.parentNode.parentNode;
    //     myid = tr.getElementsByTagName("td")[0].innerText;
    //     name = tr.getElementsByTagName("td")[2].innerText;
    //     description = tr.getElementsByTagName("td")[3].innerText;
    //     console.log(myid, name,description);
    //     myidEdit.value = myid;
    //     courseEdit.value = name;
    //     descriptionEdit.value = description;
    //     snoEdit.value = e.target.id;
    //     console.log(e.target.id)
    //     $('#editModal').modal('toggle');
    //   })
    // })

    deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("edit ");
        sno = e.target.id.substr(1);

        if (confirm("Are you sure you want to delete this lecture?")) {
          console.log("yes");
          window.location = `content.php?delete=${sno}`;
          // TODO: Create a form and use post request to submit a form
        }
        else {
          console.log("no");
        }
      })
    })
  </script>

