<?php
        include "../include/config.php";
        include "header.php";
        $query1 = "SELECT * FROM `admin` WHERE admin_mail='$loginName'";
       $result = mysqli_query($connection, $query1);
      $row = mysqli_fetch_assoc($result);
?>

<?php
 if(isset($_GET['delete'])){
    $sno = $_GET['delete'];
    $delete = true;
    $sql = "DELETE FROM `teacher` WHERE `teacher`.`id` = $sno";
    $result = mysqli_query($connection, $sql);

    $delquery = "SELECT * FROM course where `instructorId`= $sno";
    $delresult = mysqli_query($connection, $delquery);

    while ($del = mysqli_fetch_assoc($delresult)) {
    $delsno = $del['id'];
    $sql2 = "DELETE FROM `content` WHERE `courseId`= $delsno";
    $result2 = mysqli_query($connection, $sql2);
  }
  $sql3 = "DELETE FROM `course` WHERE `instructorId`= $sno";
  $result = mysqli_query($connection, $sql3);
  }

  if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset( $_POST['snoEdit'])){
    //   $Couresename = $_POST['courseEdit'];
    //   $id = $_POST['myidEdit'];
    //   $sql = " UPDATE `course` SET `name` = '$Couresename' WHERE `course`.`id` = $id";
    //   $result = mysqli_query($connection, $sql);
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
        $Name = $_POST['fullname'];
        $email = $_POST['email'];
        $qualification = $_POST['qualification'];
        $phone = $_POST['phone'];
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
                      $imh_upload_path = 'images/instructor/' . $new_img_name;
                      move_uploaded_file($tmp_name, $imh_upload_path);
  
                      //insert in database
                      $sql = " INSERT INTO `photo` (`img_url`) VALUES ('$new_img_name')";
                      $sql = "INSERT INTO `teacher` (`name`, `mail`, `phone`, `image`, `qualification`, `description`) VALUES ('$Name', '$email', '$phone', '$new_img_name', '$qualification', '$description')";
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
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Edit Admin</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="home.php" method="POST">
          <div class="modal-body">
            <input type="hidden" name="snoEdit" id="snoEdit">
            <div class="form-group">
              <input type="hidden" class="form-control" id="myidEdit" name="myidEdit" aria-describedby="emailHelp">
            </div>

            <div class="form-group">
              <label for="desc">Name</label>
              <input class="form-control" id="nameEdit" name="nameEdit" aria-describedby="emailHelp">
            </div> 

            <div class="form-group">
              <label for="desc">Email</label>
              <input class="form-control" id="emailEdit" name="emailEdit" aria-describedby="emailHelp">
            </div> 

            <div class="form-group">
                <label for="qualificationId1">Qualifications</label>
                <input type="tex" id="qualificationEdit" placeholder="Qualifications" name="qualificationEdit" class="form-control">
                <?php if(isset($message_q)){ echo $message_q; } ?>
            </div>

            <div class="form-group">
                <label for="phoneId1">Phone</label>
                <input type="text" id="phoneEdit" placeholder="Phone" name="phoneEdit" class="form-control">
                <?php if(isset($message_ph)){ echo $message_ph; } ?>
            </div>

          </div>
          <div class="modal-footer d-block mr-auto">
            <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
            <button type="submit" class="btn btn-success">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>

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

						<li><a href="content.php"><i class="icon-line-content-left"></i>Content</a> </li>

						<li><a href="blog.php"><i class="icon-blogger"></i>Blog</a></li>

						<!-- <li><a href="library.php"><i class="icon-line-align-center"></i>Library</a></li> -->

						<li class="current"><a href="instructors.php"><i class="icon-guest"></i>Instructors</a></li>

                        <li><a href="team.php"><i class="icon-users"></i>Team</a></li>

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

                        if(isset($message_name) || isset($message_picture) || isset($submit_message) || isset($message_ph) || isset($message_des) || isset($message_q) ){
                            echo "<div class='alert alert-danger'>";
                            
                            echo "Please fill the form carefully and correctly<br>";

                            echo "<a type='button' class='btn btn-default btn-sm' data-dismiss='alert'>Cancel</a>
                            </div>";    

                        }

                 ?>
                 
						<h3>Insert Instructors</h3>

                        <form action="" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="fullnameId1">Full Name</label>
                        <input type="text" id="fullnameId1" placeholder="Full Name" name="fullname" class="form-control" title="Only lower and upper case and space" pattern="[A-Za-z/\s]+" required>
                        <?php if(isset($message_name)){ echo $message_name; } ?>
                    </div>
                    <div class="form-group">
                        <label for="emailid1">Email</label>
                        <input type="email" id="emailid1" placeholder="Email" name="email" class="form-control" title="someone@example.com" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required>
                        <?php if(isset($message_email)){ echo $message_email; } ?>
                    </div>
                    <div class="form-group">
                        <label class="btn btn-success" for="my-file-selector">
                            <input id="my-file-selector" name="profilePic" type="file" style="display:none;" onchange="$('#upload-file-info').html($(this).val());">
                            Profile Picture
                        </label>
                        <span class='label label-success' id="upload-file-info"></span>
                        <?php if(isset($message_picture)){ echo $message_picture; } ?>
                    </div>
                    <div class="form-group">
                        <label for="qualificationId1">Qualifications</label>
                        <input type="tex" id="qualificationId1" placeholder="Qualifications" name="qualification" class="form-control">
                        <?php if(isset($message_q)){ echo $message_q; } ?>
                    </div>
                    <div class="form-group">
                        <label for="phoneId1">Phone</label>
                        <input type="text" id="phoneId1" placeholder="Phone" name="phone" class="form-control">
                        <?php if(isset($message_ph)){ echo $message_ph; } ?>
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
        <th>Picture</th>
        <th>Name</th>
        <th>Email</th>
        <th>Qualification</th>
        <th>Phone</th>
        <th>Description</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    <?php

        $query = "SELECT * FROM `teacher`";

        $result = mysqli_query($connection, $query);

        if(mysqli_num_rows($result) > 0){
        
                        //We have data 
                        //output the data
         while( $row = mysqli_fetch_assoc($result) ){
                echo "<tr>";
echo "<td>".$row["id"]."</td> <td><img src=images/instructor/".$row["image"]." width='80px' height='80px'> </td> <td>".$row["name"]."</td> <td> ".$row["mail"]."</td><td>".$row["qualification"]."</td> <td>".$row["phone"]."</td>";
                
                 echo '<td><a href="view.php?instructorId='.$row['id']. '" type= "button" class="btn btn-primary btn-sm">
                <span class="icon-eye-open"></span></a></td>';

                echo '<td><a class="edit btn btn-primary btn-sm"><span class="icon-edit"></span></a></td>';
                
                echo "<td> <button class='delete btn btn-sm btn-danger' id=d".$row['id']."><span class='icon-trash2'></span></button>  </td>";

                echo "<tr>";  
            }
    } else {
        echo "<div class='alert alert-danger'>You have no Record<a class='close' data-dismiss='alert'>&times</a></div>";
    }
    
    // close the mysql 
        // mysqli_close($connection);
    ?>

    <tr>
        <td colspan="9" id="end"><div class="text-center"><a href="instructors.php" type="button" class="btn btn-sm btn-success"><span class="icon-plus"></span></a></div></td>
    </tr>
</table>

<!-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%-->
    



					</div><!-- .postcontent end -->


				</div>

			</div>

		</section><!-- #content end -->

<?php include('footer.php'); 
echo '}';

?>

<?php 
$check = "SELECT * FROM `admin` WHERE admin_mail='$loginName'";
$myresult = mysqli_query($connection, $check);
$myrow = mysqli_fetch_assoc($myresult);


if($myrow['type']=="yes"){

?>
<script>
    edits = document.getElementsByClassName('edit');
    Array.from(edits).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("edit ");
        tr = e.target.parentNode.parentNode;
        myid = tr.getElementsByTagName("td")[0].innerText;
        name = tr.getElementsByTagName("td")[2].innerText;
        email = tr.getElementsByTagName("td")[3].innerText;
        qualification = tr.getElementsByTagName("td")[4].innerText;
        phone = tr.getElementsByTagName("td")[5].innerText;
        console.log(myid, name, email);
        myidEdit.value = myid;
        nameEdit.value = name;
        emailEdit.value = email;
        qualificationEdit.value = qualification;
        phoneEdit.value = phone;
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

        if (confirm("Are you sure you want to remove this instructor!!!All of his courses will be removed from the platform.")) {
          console.log("yes");
          window.location = `instructors.php?delete=${sno}`;
          // TODO: Create a form and use post request to submit a form
        }
        else {
          console.log("no");
        }
      })
    })
  </script>
  <?php }else{ ?>
   
   <script>
    edits = document.getElementsByClassName('edit');
   Array.from(edits).forEach((element) => {
     element.addEventListener("click", (e) => {
      console.log("edit ");
      $('#editModal2').modal('toggle');
     })
   })
   
   deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element) => {
      element.addEventListener("click", (e) => {
      console.log("edit ");
      $('#editModal2').modal('toggle');
      })
    })
   </script>
   <?php  }  ?>


   <div class="modal fade" id="editModal2" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
          <h5 class="modal-title" id="editModalLabel">Sorry you don't have permission for changes</h5>
          
        </div>
        
      </div>
    </div>
  </div>
  