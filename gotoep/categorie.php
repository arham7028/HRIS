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

 }
 $update=false;
 $add=false;
?>
<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="../css/bootstrap.css" type="text/css" />
	<link rel="stylesheet" href="../style.css" type="text/css" />
	<link rel="stylesheet" href="../css/dark.css" type="text/css" />
	<link rel="stylesheet" href="../css/font-icons.css" type="text/css" />
	<link rel="stylesheet" href="../css/animate.css" type="text/css" />
	<link rel="stylesheet" href="../css/magnific-popup.css" type="text/css" />

	<link rel="stylesheet" href="../css/responsive.css" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <?php
        include "../include/config.php";
         include "header.php";
         $query = "SELECT * FROM `admin` WHERE admin_mail='$loginName'";
         $result = mysqli_query($conn, $query);
         $row = mysqli_fetch_assoc($result);

         if(isset($_GET['delete'])){
          $sno = $_GET['delete'];
          $delete = true;
          $sql = "DELETE FROM `categories` WHERE `categories`.`id` = $sno";
          $result = mysqli_query($connection, $sql);
          $delquery = "SELECT * FROM course where `categorieId`= $sno";
          $delresult = mysqli_query($connection, $delquery);

          while ($del = mysqli_fetch_assoc($delresult)) {
          $delsno = $del['id'];
          $sql2 = "DELETE FROM `content` WHERE `courseId`= $delsno";
          $result2 = mysqli_query($connection, $sql2);
        }
        $sql3 = "DELETE FROM `course` WHERE `categorieId`= $sno";
        $result = mysqli_query($connection, $sql3);
        }

         if ($_SERVER['REQUEST_METHOD'] == "POST") {
          if (isset( $_POST['snoEdit'])){
            $courseEdit = $_POST['courseEdit'];
            $id = $_POST['myidEdit'];
            
            $sql = "UPDATE `categories` SET `categorie` = '$courseEdit' WHERE `categories`.`id` = $id";
            $result = mysqli_query($conn, $sql);
            if ($result) {
              $update=true;
          }
          }
          else{
            $course = $_POST['course'];
            $sql2 = "INSERT INTO `categories` (`categorie`) VALUES ('$course')";
            $result = mysqli_query($conn, $sql2);
            if ($result) {
              $add=true;
          }
          }
        }
    ?>

<style>
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

                        <li  class="current"><a href="categorie.php"><i class="icon-book2"></i>Categories</a></li> 

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
          <h5 class="modal-title" id="editModalLabel">Edit Category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="categorie.php" method="POST">
          <div class="modal-body">
            <input type="hidden" name="snoEdit" id="snoEdit">
            <div class="form-group">
              <input type="hidden" class="form-control" id="myidEdit" name="myidEdit" aria-describedby="emailHelp">
            </div>

            <div class="form-group">
              <label for="desc">Course Category</label>
              <input class="form-control" id="courseEdit" name="courseEdit" aria-describedby="emailHelp">
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
		<section id="page-title">

			<div class="container clearfix">
				<h1>Welcome <strong><?php if(isset($row)) echo $row['name'];; ?></strong></h1>
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
		<section id="content" >

			<div class="content-wrap center">

				<div class="container clearfix ">
				<!-- ========================================== -->

				<div class="postcontent nobottommargin">

                    

                <?php

                    // echo $alertMessage; 
                    if(isset($update_status)) echo $update_status;

                        if(isset($message_name) || isset($submit_message)){
                            echo "<div class='alert alert-danger'>";
                            
                            echo "Please fill the form carefully and correctly<br>";

                            echo "<a type='button' class='btn btn-default btn-sm' data-dismiss='alert'>Cancel</a>
                            </div>";    

                        }

                 ?>
                 
						<h3 class="center">Insert Course Categories</h3>

                        <form action="" method="post" enctype="multipart/form-data" class="center">
                    
                    <div class="form-group">
                        <label for="CourseId1">Course Category</label>
                        <input type="text" id="CourseId1" placeholder="Full Name" name="course" class="form-control" title="Only lower and upper case and space" pattern="[A-Za-z/\s]+" required>
                        <?php if(isset($message_name)){ echo $message_name; } ?>
                    </div>
                    
                    <div class="form-group col-md-2 center">
                        <button name="submit" class="btn btn-block btn-success " type="submit">Submit</button>
                    </div>
                </form>
                        
							

							
						

<!--%%%%%%%%%%%%%%%% HERE DISPLAY TABLE %%%%%%%%%%%%%%%%% -->
    
    
    <table class="table table-striped table-bordered">
    <tr>
        <th>ID</th>
        <th>Course Categories</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    <?php

        $query = "SELECT * FROM `categories`";

        $result = mysqli_query($conn, $query);

        if(mysqli_num_rows($result) > 0){
        
                        //We have data 
                        //output the data
         while( $row = mysqli_fetch_assoc($result) ){
                echo "<tr>";
echo "<td>".$row["id"]."</td> <td>".$row["categorie"]."</td>";

echo '<td><a class="edit btn btn-primary btn-sm"><span class="icon-edit"></span></a></td>';
                
                echo "<td> <button class='delete btn btn-sm btn-danger' id=d".$row['id']."><span class='icon-trash2'></span></button>";

                echo "<tr>";  
            }
    } else {
        echo "<div class='alert alert-danger'>You have no courses.<a class='close' data-dismiss='alert'>&times</a></div>";
    }
    
    // close the mysql 
        mysqli_close($conn);
    ?>

    <tr>
        <td colspan="4" id="end"><div class="text-center"><a href="categorie.php" type="button" class="btn btn-sm btn-success"><span class="icon-plus"></span></a></div></td>
    </tr>
</table>

<!-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%-->

                	</div><!-- .postcontent end -->

				</div>

			</div>

		</section><!-- #content end -->

<?php include('footer.php'); ?>
<script>
    edits = document.getElementsByClassName('edit');
    Array.from(edits).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("edit ");
        tr = e.target.parentNode.parentNode;
        myid = tr.getElementsByTagName("td")[0].innerText;
        name = tr.getElementsByTagName("td")[1].innerText;
        console.log(myid, name,);
        myidEdit.value = myid;
        courseEdit.value = name;
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

        if (confirm("Are you sure you want to delete this category!!!Your courses will automatically deleted related to this category")) {
          console.log("yes");
          window.location = `categorie.php?delete=${sno}`;
          // TODO: Create a form and use post request to submit a form
        }
        else {
          console.log("no");
        }
      })
    })
  </script>

