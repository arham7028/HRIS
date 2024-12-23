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
 $emailerr=false;
 $passerr=false;
 $update = false;
 $updateerr = false;
?>
<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="../css/bootstrapmanuel.css" type="text/css" />
	<link rel="stylesheet" href="../style1.css" type="text/css" />
	<link rel="stylesheet" href="../css/dark.css" type="text/css" />
	<link rel="stylesheet" href="../css/font-icons.css" type="text/css" />
	<link rel="stylesheet" href="../css/animate.css" type="text/css" />
	<link rel="stylesheet" href="../css/magnific-popup.css" type="text/css" />

	<link rel="stylesheet" href="../css/responsive.css" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <style>
      .at{
        margin-left: 25%;
      }
      body:not(.no-transition) #wrapper,
.animsition-overlay {
	position: relative;
	opacity: 1;
	-webkit-animation-fill-mode: both;
	animation-fill-mode: both;
  display: none;
}

#vertical-nav nav li:hover > a, #vertical-nav nav li.current > a, #vertical-nav nav li.active > a {
    background-color: #FFF;
    color: #ed8739;
}
</style>
<?php
        include "../include/config.php";
        include "header.php";
        if(isset($_GET['delete'])){
        $sno = $_GET['delete'];
        $delete = true;
        $sql = "DELETE FROM `admin` WHERE `id` = $sno";
        $result = mysqli_query($conn, $sql);
      }
        $query = "SELECT * FROM `admin` WHERE admin_mail='$loginName'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
       
         if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (isset( $_POST['snoEdit'])){
              $name = $_POST['nameEdit'];
              $email = $_POST['emailEdit'];
              $id = $_POST['myidEdit'];
              $sql = " UPDATE `admin` SET `name` = '$name', `admin_mail` = '$email' WHERE `admin`.`id` = $id";
              $result = mysqli_query($conn, $sql);
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
                $email = $_POST['email'];
                $fullname = $_POST['fullname'];
                $password = $_POST['password'];
                $c_password = $_POST['c_password'];
                $admin_op = $_POST['admin_op'];
                $hash = password_hash("$password", PASSWORD_DEFAULT);
                // var_dump($error);
                if($password==$c_password){
                  $myquery = "Select * from admin where admin_mail='$email'";
                  $myresult = mysqli_query($conn, $myquery);
                  $myrow = mysqli_fetch_assoc($myresult);
    
                  if ($myrow>0) {
                   $emailerr=true;
                  }else{
                    if ($error == 0) {
                      if ($img_size > 614813900) {
                          echo "Its size is large";
                      } else {
                          $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                          $img_ex_lc = strtolower($img_ex);
          
                          $allowed_exs = array("jpg", "jpeg", "png","pdf","txt");
          
                          if (in_array($img_ex_lc, $allowed_exs)) {
                              $new_img_name = uniqid().'.'. $img_ex_lc;
                              $img_upload_path = 'images/admin/' . $new_img_name;
                              move_uploaded_file($tmp_name, $img_upload_path);
          
                              //insert in database
                              $sql = " INSERT INTO `photo` (`img_url`) VALUES ('$new_img_name')";
                              $sql = "INSERT INTO `admin` (`name`, `admin_mail`, `password`, `profilePic`, `type`) VALUES ('$fullname', '$email', '$hash', '$new_img_name', '$admin_op')";
                              $result = mysqli_query($conn, $sql);
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
                  }
                }else{
                  $passerr=true;
                }
    
            } else {
                echo "Error";
            }
            }
        }
         ?>

<div id="wrapper" class="clearfix">

<div id="vertical-nav">
    <div class="container clearfix pg">
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
</div>
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
          </div>
          <div class="modal-footer d-block mr-auto">
            <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
            <button type="submit" class="btn btn-success">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>

            <!-- Page Title
============================================= -->
<section id="page-title" style="margin-padding: 0px;">

    <div class="container clearfix">
        <h1>Welcome <strong><?php if(isset($row)) echo $row['name']; ?></strong></h1>
    </div>


    <div id="page-menu-wrap">

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
                 if($emailerr){
                  echo "<div class='alert at alert-danger' style='position:absolute;'>";
                    
                 echo "Oops the email address is already taken!!!<br>";

                 echo "<a type='button' class='btn btn-default btn-sm' data-dismiss='alert'>Cancel</a>
                 </div>";
                 }

                 if($passerr){
                  echo "<div class='alert at alert-danger' style='position:absolute;'>";
                    
                 echo "Oops your password does not match!!!<br>";

                 echo "<a type='button' class='btn btn-default btn-sm' data-dismiss='alert'>Cancel</a>
                 </div>";
                 }

                 if($updateerr){
                  echo "<div class='alert at alert-danger' style='position:absolute;'>";
                    
                 echo "Oops this email is already taken!!!<br>";

                 echo "<a type='button' class='btn btn-default btn-sm' data-dismiss='alert'>Cancel</a>
                 </div>";
                 }
                 
                 if($update){
                  echo "<div class='alert at alert-success' style='position:absolute;'>";
                    
                 echo "Username ".$name." updated successfully!!!<br>";

                 echo "<a type='button' class='btn btn-default btn-sm' data-dismiss='alert'>Cancel</a>
                 </div>";
                 }
                 
         ?>
            

        <?php

            if(isset($update_status)) echo $update_status;

                if(isset($message_name) || isset($message_picture) || isset($message_pass) || isset($message_c_pass) || isset($submit_message) || isset($admin_error)){
                    
                    echo "<div class='alert alert-danger'>";
                    
                    echo "Please fill the form carefully and correctly<br>";

                    echo "<a type='button' class='btn btn-default btn-sm' data-dismiss='alert'>Cancel</a>
                    </div>";    

                }

         ?>
         
                <h3 id="unhid2">Insert Admin</h3>

                <form action="" method="post" id="unhid" class="needs-validation" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nameId">Full Name</label>
                <input type="text" id="nameId" placeholder="Full Name" name="fullname" class="form-control" title="Only lower and upper case and space" pattern="[A-Za-z/\s]+" required>
                <?php if(isset($message_name)){ echo $message_name; } ?>
            </div>

            <div class="form-group">                    
               <label>Admin Type</label>
                <select class="form-control"  name="admin_op" required>
                <option value="">Select Option</option>
                <option value="yes">Yes Sophisticated</option>
                <option value="no">Not Sophisticated</option>
                </select>

            <?php if(isset($admin_error)) echo $admin_error; ?>
            </div>


            <div class="form-group">
                <label for="emailId">Email</label>
                <input type="email" id="emailId" placeholder="Email" name="email" class="form-control" title="someone@example.com" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required>
                <?php if(isset($message_email)){ echo $message_email; } ?>
            </div>
            <div class="form-group">
                <label class="btn btn-success" for="my-file-selector">
                    <input id="my-file-selector" name="profilePic" type="file" style="display:none;" onchange="$('#upload-file-info').html($(this).val());" required>
                    Profile Picture
                </label>
                <span class='label label-success' id="upload-file-info"></span>
                <?php if(isset($message_picture)){ echo $message_picture; } ?>
            </div>
            <div class="form-group">
                <label for="passwordId1">Password</label>
                <input type="password" id="passwordId1" placeholder="Password" name="password" class="form-control" required minlength="6">
                <?php if(isset($message_pass)){ echo $message_pass; } ?>
            </div>
            <div class="form-group">
                <label for="passwordId2">Confirm Password</label>
                <input id="passwordId2" type="password" placeholder="Confirm Password" name="c_password" class="form-control" required minlength="6">
                <?php if(isset($message_c_pass)){ echo $message_c_pass; } ?>
            </div>
            <div class="form-group col-md-2">
                <button name="submit" class="btn btn-block btn-success" type="submit">Submit</button>
            </div>
        </form>
                
                    

                    
                

<!--%%%%%%%%%%%%%%%% HERE DISPLAY TABLE %%%%%%%%%%%%%%%%% -->


<table class="table table-striped table-bordered">
<thead>
<tr>
<th type="hidden">ID</th>
<th>Picture</th>
<th>Name</th>
<th>Email</th>
<th>Edit</th>
<th>Delete</th>
</tr>
</thead>
<tbody>
  <?php

$query = "SELECT * FROM `admin`";

$result = mysqli_query($conn, $query);

if(mysqli_num_rows($result) > 0){

                //We have data 
                //output the data
 while( $row = mysqli_fetch_assoc($result) ){
        echo "<tr>";
echo "<td type='hidden'>".$row["id"]."</td>
 <td><img src=images/admin/".$row["profilePic"]." width='80px' height='80px'> </td> <td>".$row["name"]."</td> <td> ".$row["admin_mail"]."</td>";

        echo '<td><a class="edit btn btn-primary btn-sm"><span class="icon-edit"></span></a></td>';
        
        echo "<td> <button class='delete btn btn-sm btn-danger' id=d".$row['id']."><span class='icon-trash2'></span></button>  </td>";

        echo "<tr>";  
    }
} else {
echo "<div class='alert alert-danger'>You have no admin<a class='close' data-dismiss='alert'>&times</a></div>";

}





// close the mysql 
mysqli_close($connection);
?>

</tbody>
</table>

<!-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%-->




            </div><!-- .postcontent end -->


        </div>

    </div>

</section><!-- #content end -->

<?php include('footer.php'); 

?>

<?php 
$check = "SELECT * FROM `admin` WHERE admin_mail='$loginName'";
$myresult = mysqli_query($conn, $check);
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
        console.log(myid, name, email);
        myidEdit.value = myid;
        nameEdit.value = name;
        emailEdit.value = email;
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

        if (confirm("Are you sure you want to delete this note!")) {
          console.log("yes");
          window.location = `home.php?delete=${sno}`;
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

    
    document.getElementById("unhid").style.display = "none";
    document.getElementById("unhid2").style.display = "none";
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
  