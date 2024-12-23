<?php
 include "../include/config.php";
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

if(isset($_GET['edit'])){
  $sno = $_GET['edit'];
  echo $sno;
  $delete = true;
  $sql = "SELECT * FROM `jobapplication` WHERE `jobapplication`.`app_id` = $sno";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  $tjobid = $row['job_id'];
  $sql2= "UPDATE `jobapplication` SET `Status` = 'rejected' WHERE `jobapplication`.`job_id` = $tjobid";
  $sql3= "UPDATE `jobapplication` SET `Status` = 'approved' WHERE `jobapplication`.`app_id` = $sno";
  $result = mysqli_query($conn, $sql3);
  $result = mysqli_query($conn, $sql2);
  header('location: profile.php');
}
?>
	<link rel="stylesheet" href="css/font-icons.css" type="text/css" />
	<link rel="stylesheet" href="css/animate.css" type="text/css" />
	<link rel="stylesheet" href="css/stylecourse.css" type="text/css" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
   <link rel="icon" type="image/png" href="Images/t1.png" sizes="16x16">
	<link rel="icon" type="image/png" href="Images/t2.png" sizes="32x32">
	<link rel="stylesheet" href="css/responsive.css" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
    
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
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
   font-size: 1.5rem;
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

table{
    background-color: var(--light-bg);
}
</style>

 

   <div id="vertical-nav">
        <div class="container">
            <nav>
                <ul>

                    <li  class="current"><a href="myjobs.php"><i class="icon-line-content-left"></i>Back</a> </li>

                    <li><a href="index.php?page=home"><i class="icon-home2"></i>Home</a></li>

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

<table class="table" id="myTable">
      <thead>
        <tr>
          <th scope="col">Name</th>
          <th scope="col">Budget</th>
          <th scope="col">Contact</th>
          <th scope="col">Details</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          $jobid = $_GET['id'];
        // include "../include/config.php";
          $sql = "SELECT * FROM `jobapplication` where job_id = $jobid";
          $result = mysqli_query($conn, $sql);
          $sno = 0;
          while($row = mysqli_fetch_assoc($result)){
            $sno = $sno + 1;
            echo "<tr>
            <th scope='row'><a href='emp_review.php?id=".$row['u_id']."'>". $row['firstname'] . "</a></th>
            <td>". $row['est_budget'] . "</td>
            <td>". $row['phoneNo'] . "</td>
            <td>". $row['owndetail'] . "</td>
            <td> <button class='edit btn btn-sm btn-success' id=e".$row['app_id'].">Approve</button> </td>
          </tr>";
        } 
          ?>


      </tbody>
    </table>
       <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>
  <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function () {
      $('#myTable').DataTable();

    });
  </script>

</section>
	</div><!-- .postcontent end -->

</div>

</div>

</section><!-- #content end -->

<script>
      edit = document.getElementsByClassName('edit');
    Array.from(edit).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("edit ");
        sno = e.target.id.substr(1);

        if (confirm("Are you sure you want aprove this applicant!")) {
          console.log("yes");
          window.location = `application.php?edit=${sno}`;
          // TODO: Create a form and use post request to submit a form
        }
        else {
          console.log("no");
        }
      })
    })
    //   deletes = document.getElementsByClassName('delete');
    // Array.from(deletes).forEach((element) => {
    //   element.addEventListener("click", (e) => {
    //     console.log("edit ");
    //     sno = e.target.id.substr(1);
    //     if (confirm("Are you sure you want to delete this requirements!")) {
    //       console.log("yes");
    //       window.location = `applications.php?delete=${sno}`;
    //       // TODO: Create a form and use post request to submit a form
    //     }
    //     else {
    //       console.log("no");
    //     }
    //   })
    // })

</script>

<!-- custom js file link  -->
<script src="../js/coursescript.js"></script>