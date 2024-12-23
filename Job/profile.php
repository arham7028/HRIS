
<?php
include("header2.php");
// include "../include/config.php";
$servername = "localhost";
$username = "root";
$password = "";
$database = "hris";
$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
  die("Sorry we failed to connect" . mysqli_connect_error());
} else {
  // echo 'Success';
  // $firstname=$_POST['firstname'];
}
if ($_SERVER['REQUEST_METHOD'] == "POST") {
  if (isset($_POST['submit']) && isset($_FILES['profilePic'])) {
    echo "success";
  }
  else{
    echo "fail";
  }
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $email = $_POST['email'];
  $dob = $_POST['dob'];
  $gender = $_POST['gender'];
  $user = $_POST['userType'];
  $number = $_POST['contact'];
  $password = $_POST['password'];
  $cpass = $_POST['cpassword'];
  $address = $_POST['address'];
  if ($firstname == "" || $lastname == "" || $dob == "" || $email == "" || $password == "") {
    $blank = true;
  }
   else {
    $existsSql = "Select * from user where email='$email'";
    $result = mysqli_query($conn, $existsSql);
    $num = mysqli_num_rows($result);
    
    if ($num > 0) {
      if($u_email != $email && $num>1){
        $err=true;
      }else{
        if ($password == $cpass) {
          $hash = password_hash("$password", PASSWORD_DEFAULT);
          $sql = "UPDATE `user` SET `firstname` = '$firstname', `lastname` = '$lastname', `dob` = '$dob', `gender` = '$gender', `email` = '$email', `phonenumber` = '$number', `address` = '$address', `usertype` = '$user', `password` = '$hash' WHERE `user`.`u_id` = $uid
            ";
          $result = mysqli_query($conn, $sql);
          if ($result) {
            include "logout.php";
          }
        } else {
          $pass = true;
        }
      }
    } else {
      if ($password == $cpass) {
        $hash = password_hash("$password", PASSWORD_DEFAULT);
        $sql = "UPDATE `user` SET `firstname` = '$firstname', `lastname` = '$lastname', `dob` = '$dob', `gender` = '$gender', `email` = '$email', `phonenumber` = '$number', `address` = '$address', `usertype` = '$user', `password` = '$hash' WHERE `user`.`u_id` = $uid
          ";
        $result = mysqli_query($conn, $sql);

        if ($result) {
          include "logout.php";
          echo "success";
        }
      } else {
        $pass = true;
      }
    }
    // $sql = "SELECT * from user where email = '$u_email'";
    // $result = mysqli_query($conn, $sql);
    // $user = mysqli_fetch_assoc($result);
  } 
}
// $_SESSION["email"] = "ghanhsya@gmail.com";
// $_SESSION["user_id"] = "101";
// $_SESSION["user_type"] = $user['usertype'];
?>

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>HRIS</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous" />

  <!-- Font Styles -->

  <!-- <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin /> -->
  <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@700&display=swap" rel="stylesheet" />

  <!-- 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj"
        crossorigin="anonymous"></script> -->

  <!-- Styles.css -->
  <!-- <link rel="stylesheet" href="css/style.css" /> -->
  <style>
    table {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      color: white;
      width: 100%;
      margin-bottom: 30px;
    }

    td,
    th {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
    }

    tr:nth-child(even) {
      background-color: #464545;
    }

    .jobs-apl {
      margin-top: 20px;
      color: white;
      padding: 8px;
    }

    .cancel {
      align-items: center;
    }

    .p-bt{
      font-size: 14px;
    padding: 7px;
    border-radius: 8px;
    }
    .pr-pc{
      border-radius: 100%;
    }
    .btn1{
      padding: 10px;
      font-size: 12px;
      border-radius: 12px;
      background-color: #ed8739;
    }
  </style>
</head>

<body>
  <div class="super-container" style="background-color: black; padding-top: 5%;">
    <?php
    require_once('./config.php');
    // $u_id = $_SESSION["user_id"];
    $u_id = $uid;
    $firstname = "";
    $lastname = "";
    $dateofbirth = "";
    $gender = "";
    $email = $u_email;
    // $email = $_SESSION["email"];
    $phoneno = "";
    $jobtype = "";
    $password = "";

    $sql = "SELECT * FROM user WHERE email = '$email';";
    $stmtselect = $db->prepare($sql);
    $stmtselect->execute();
    $users = $stmtselect->fetchAll();

    $sql_jobs = "SELECT * FROM job j, jobapplication ja WHERE j.job_id = ja.job_id AND u_id = '$u_id';";
    $stmtjobs = $db->prepare($sql_jobs);
    $stmtjobs->execute();
    $jobs = $stmtjobs->fetchAll();

    $sql_posted = "SELECT * FROM job WHERE posted_by = '$u_id'";
    $stmtposted = $db->prepare($sql_posted);
    $stmtposted->execute();
    $posted_jobs = $stmtposted->fetchAll();

    foreach ($users as $user) {
    ?>
    <!-- Modal -->

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
    aria-hidden="true" style="opacity:1;">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Change Profile Picture</h5>
          <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button> -->
        </div>
        <form action="changep.php" method="post" enctype="multipart/form-data">
          <div class="modal-body">
            <input type="hidden" name="snoEdit" id="snoEdit">
            <div class="form-group">
              <input type="hidden" class="form-control" value="<?php echo $u_id; ?>" id="myidEdit" name="myidEdit" aria-describedby="emailHelp">
            </div>

            <div class="form-group">
              <label for="desc">Upload Picture</label>
              <input type="file" name="image" id="image">

            </div> 

          </div>
          <div class="modal-footer d-block mr-auto">
          <input type="submit" value="Submit" class=" btn-primary btn1">
            <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
            <!-- <button name="submit" type="submit" class="btn btn-success col-md-2">Upload</button> -->
          </div>
        </form>
      </div>
    </div>
  </div>


      <!-- Profile Start-->

      <section class="gradient-custom pt-3" id="register-canvas" style="height: auto;">
      <div class="profile center">
    <!-- <img src="Images/userpic/<?php echo $user['profilePic']; ?>" class="center pr-pc" alt="Worker Photo" width="120 px" height="120 px"> -->
    <?php 
	if ($user["profilePic"]==null) {
		echo '<img src="Images/user.png" class="center pr-pc" alt="" width="120 px" height="120 px">';
	} else {
		echo '<img src="Images/userpic/'.$user["profilePic"].'" class="center pr-pc" alt="" width="120 px" height="120 px">';
	}
	
	?>
</div>
<br>
      <div class="profile center">
        <button class="center p-bt btn-primary"  >Change Profile Pic</button>
        <!-- onclick="uploadImage()" -->
    </div>

<br><br>
        <div class="container py-5 h-50">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-lg-9 col-xl-7">
              <!-- <div class="col-12 col-md-8 col-lg-6 col-xl-5"></div> -->
              <div class="card bg-dark shadow-2-strong" style="margin-top: -50px; border-radius:1rem; border-color: #ffc107;">
                <div class="card-body p-4 p-md-5" style="margin: -20px;">
                  <h3 class="mt-2 mb-0 pb-2 pb-md-0 mb-md-5 font-color align-items-center text-white text-center">
                    Profile</h3>
                  <form action="profile.php" method="post">

                    <div class="row m-1">
                      <div class="col-md-6 mb-2">
                        <label class="form-check-label font-color text-white" for="firstName">First Name</label>

                        <div class="form-outline">
                          <input type="text" id="firstName" name="firstname" class="form-control form-control-lg font-color" placeholder="<?php echo $user['firstname']; ?>" value="" required disabled />
                        </div>

                      </div>
                      <div class="col-md-6 mb-2">
                        <label class="form-check-label font-color text-white" for="lastName">Last Name:</label>

                        <div class="form-outline">
                          <input type="text" id="lastName" name="lastname" class="form-control form-control-lg font-color" placeholder="<?php echo $user['lastname']; ?>" value="" required disabled />
                        </div>

                      </div>
                    </div>

                    <div class="row m-1">
                      <div class="col-md-6 mb-2 d-flex align-items-center">

                        <!-- <h6 class="mb-2 pb-1 font-color text-white">Birthday </h6><br> -->
                        <div class="form-outline datepicker w-100">
                          <label for="dob" class="form-label text-white"><strong>DoB</strong></label>
                          <input type="date" class="form-control form-control-lg font-color font-color" name="dob" value="<?php echo $user['dob']; ?>" id="dob" required disabled />
                        </div>
                      </div>
                      <div class="col-md-6 mt-1 mb-2">
                        <h6 class="form-check-label font-color text-white">Gender: </h6>

                        <div class="form-check form-check-inline">
                          <input class="form-check-input font-color" type="radio" name="gender" id="femaleGender" value="F" required <?php
                                                                                                                                                  $gender = $user['gender'];

                                                                                                                                                  if ($gender == 'F') {
                                                                                                                                                    echo 'checked';} elseif ($gender == 'M') {?> disabled />

                          <label class="form-check-label font-color text-white" for="femaleGender">Female</label>
                        </div>

                        <div class="form-check form-check-inline">
                          <input class="form-check-input font-color" type="radio" name="gender" id="maleGender" value="M" <?php

                                                                                                                                                    echo 'checked';
                                                                                                                                      ?> disabled />
                          <label class="form-check-label font-color text-white" for="maleGender">Male</label>
                        </div>

                        <div class="form-check form-check-inline">
                          <input class="form-check-input font-color" type="radio" name="gender" id="otherGender" value="O" <?php
                                                                                                                                                  } else {
                                                                                                                                                    echo 'checked';
                                                                                                                                                  }
                                                                                                                                        ?> disabled />
                          <label class="form-check-label font-color text-white" for="otherGender">Other</label>
                        </div>

                      </div>
                    </div>

                    <div class="row m-1">
                      <div class="col-md-6 mb-2 pb-0">
                        <label class="form-check-label font-color text-white" for="">Email</label>

                        <div class="form-outline">
                          <input type="email" id="emailAddress" name="email" class="form-control form-control-lg font-color" placeholder="<?php echo $user['email']; ?>" required disabled />
                        </div>

                      </div>
                      <div class="col-md-6 mb-2 pb-2">
                        <label class="form-check-label font-color text-white" for="phoneNumber">Contact</label>
                        <div class="form-outline">
                          <input type="tel" id="phoneNumber" name="contact" class="form-control form-control-lg font-color" placeholder="<?php echo $user['phonenumber']; ?>" required disabled />
                        </div>

                      </div>
                    </div>

                    <div class="row m-1 mt-0">
                    <div class="col-md-6 mb-2 pb-2">
                        <label class="form-check-label font-color text-white" for="address">Address</label>
                        <div class="form-outline">
                          <input type="tel" id="address" name="address" class="form-control form-control-lg font-color" placeholder="<?php echo $user['address']; ?>" required disabled />
                        </div>

                      </div>
                      <div class="col-md-6">
                      <label class="form-label select-label font-color text-white">Choose user type: </label>
                      <br>
                        <select class="select form-control-lg font-color" name="userType" id="userType" required disabled>
                          <option value="1" disabled>None</option>
                          <option value="2" <?php
                                            $jobtype = $user['usertype'];  //2 is given for JobType 
                                            if ($jobtype == '2') {
                                              echo 'selected';
                                            } else {
                                            ?>>Job-seeker</option>
                          <option value="3" <?php
                                              // 3 is given for JobType 
                                              echo 'selected';
                                            }
                                            ?>>Job-provider</option>
                        </select>

                      </div>
                    </div>
                    <br>
                    <div class="row m-1">
                      <div class="col-md-6 mb-4 mt-0 pb-2">

                        <div class="form-outline">
                        <label class="form-check-label font-color text-white" id="pass" for="password">Change Password:</label>
                          <input type="password" name="password" id="password" class="form-control form-control-lg font-color" placeholder="password" required disabled />
                        </div>

                      </div>
                      <div class="col-md-6 mb-4 pb-2">

                        <div class="form-outline">
                        <label class="form-check-label font-color text-white" id="cpass" for="cpassword">Confirm Password:</label>
                          <input type="password" name="cpassword" id="cpassword" class="form-control form-control-lg font-color" placeholder="Confirm Password" required disabled />
                        </div>

                      </div>
                    </div>

                    <div class="d-flex flex-row bd-highlight mb-4 justify-content-between mx-3">
                      <div class="p-0 bd-highlight">
                        <input class="btn btn-warning btn-lg px-5" id="edit-btn" type="button" value="Edit" onclick="edit()" />
                      </div>
                      <div class="p-0 bd-highlight">
                        <input class="btn btn-warning btn-lg px-4" id="s-btn" type="submit" value="Submit" onclick="submit()" />
                      </div>

                  </form>
                <?php
              }
                ?>
                </div>
              </div>
            </div>
          </div>

          <?php
          if(!isset($user["usertype"])){
            include "logout.php";
          }
          if ($user["usertype"] == "2") {
          ?>

            <!-- Applied Jobs Start -->
            <div class="jobs bg-datk text-light" style="margin-top: 30px; border-radius: 5px;">
              <a href="myapplication.php?id=<?php echo $uid; ?>"><h1 class="bg-dark jobs-apl">Applied Jobs</h1></a>
              <table>
                <th>
                <td>Job Id</td>
                <td>Job Title</td>
                <td>Profession</td>
                <td>Budget</td>
                <td>Job Duration</td>
                <td>Phone Number</td>
                <td>Job Details</td>
                <td>Address</td>
                <!-- <td>Action</td> -->
                </th>
                <?php
                foreach ($jobs as $job) {
                ?>
                  <tr>
                    <td></td>
                    <td><?php echo $job["job_id"]; ?></td>
                    <td><?php echo $job["jobtitle"]; ?></td>
                    <td><?php echo $job["profession"]; ?></td>
                    <td><?php echo $job["budget"]; ?></td>
                    <td><?php echo $job["jobduration"]; ?></td>
                    <td><?php echo $job["phoneNo"]; ?></td>
                    <td><?php echo $job["jobdetail"]; ?></td>
                    <td><?php echo $job["address"]; ?></td>
                    <!-- <td>
                  <form action="" method="post">
                    <input class="cancel" type="submit" value="Cancel"><span style="color: red;">X</span>
                  </form>
                </td> -->
                  </tr>
                <?php
                }
              } elseif ($user["usertype"] == "3") {
                ?>
              </table>
            </div>
            <!-- Applied Job End -->

            <!-- Posted Job Start -->
            <div class="jobs bg-dark text-light" style="margin-top: 30px; border-radius: 5px;">
            <a href="myjobs.php"><h1 class="bg-dark jobs-apl">Posted Jobs</h1></a>
              <table>
                <th>
                <td>Job Id</td>
                <td>Job Title</td>
                <td>Profession</td>
                <td>Budget</td>
                <td>Job Duration</td>
                <td>Phone Number</td>
                <td>Job Details</td>
                <td>Address</td>
                <!-- <td>Action</td> -->
                </th>
                <?php
                foreach ($posted_jobs as $p_job) {
                ?>
                  <tr>
                    <td></td>
                    <td><?php echo $p_job["job_id"]; ?></td>
                    <td><?php echo $p_job["jobtitle"]; ?></td>
                    <td><?php echo $p_job["profession"]; ?></td>
                    <td><?php echo $p_job["budget"]; ?></td>
                    <td><?php echo $p_job["jobduration"]; ?></td>
                    <td><?php echo $p_job["contactNo"]; ?></td>
                    <td><?php echo $p_job["jobdetail"]; ?></td>
                    <td><a href="https://www.google.com/maps/place/<?php echo $p_job['location']; ?>" class="text-white" target="blank"><?php echo $p_job["address"]; ?></a></td>
                    <!-- <td>
                  <form action="" method="post">
                    <input class="cancel" type="submit" value="Cancel"><span style="color: red;">X</span>
                  </form>
                </td> -->
                  </tr>
              <?php
                }
              }
              ?>
              </table>
            </div>
            <!-- Posted Job End -->
        </div>
      </section>

      <!-- Profile End -->

  </div>
  <!--super-contaIner end-->


  <!-- Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <script>
        document.getElementById("password").style.display = "none";
        document.getElementById("cpassword").style.display = "none";
        document.getElementById("pass").style.display = "none";
        document.getElementById("cpass").style.display = "none";
        document.getElementById("s-btn").style.display = "none";

        function edit(){
          if(confirm("Do you want to edit your Information?")){
            document.getElementById("firstName").disabled = "";
            document.getElementById("firstName").value = "<?php echo $user['firstname']; ?>";
            document.getElementById("firstName").placeholder = "firstname";

            document.getElementById("lastName").disabled = "";
            document.getElementById("lastName").value = "<?php echo $user['lastname']; ?>";
            document.getElementById("lastName").placeholder = "lastame";

            document.getElementById("dob").disabled = "";
            document.getElementById("dob").value = "<?php echo $user['dob']; ?>";
            document.getElementById("dob").placeholder = "DoB";

            document.getElementById("femaleGender").disabled = "";
            document.getElementById("maleGender").disabled = "";
            document.getElementById("otherGender").disabled = "";

            document.getElementById("emailAddress").disabled = "";
            document.getElementById("emailAddress").value = "<?php echo $user['email']; ?>";
            document.getElementById("emailAddress").placeholder = "email";

            document.getElementById("phoneNumber").disabled = "";
            document.getElementById("phoneNumber").value = "<?php echo $user['phonenumber']; ?>";
            document.getElementById("phoneNumber").placeholder = "Mobile Number";

            document.getElementById("address").disabled = "";
            document.getElementById("address").value = "<?php echo $user['address']; ?>";
            document.getElementById("address").placeholder = "address";

            document.getElementById("userType").disabled = "";
            document.getElementById("password").disabled = "";
            document.getElementById("cpassword").disabled = "";

            document.getElementById("password").style.display = "block";
            document.getElementById("pass").style.display = "block";
           document.getElementById("cpassword").style.display = "block";
           document.getElementById("cpass").style.display = "block";
           document.getElementById("s-btn").style.display = "block";
          }
        }
    </script>

    <script>
       edits = document.getElementsByClassName('p-bt');
    Array.from(edits).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("edit ");
        // tr = e.target.parentNode.parentNode;
        // myid = tr.getElementsByTagName("td")[0].innerText;
        // name = tr.getElementsByTagName("td")[2].innerText;
        // email = tr.getElementsByTagName("td")[3].innerText;
        // console.log(myid, name, email);
        // myidEdit.value = myid;
        // nameEdit.value = name;
        // emailEdit.value = email;
        snoEdit.value = e.target.id;
        console.log(e.target.id)
        $('#editModal').modal('toggle');
      })
    })
    </script>
<!-- 
<script type="text/javascript">
		jQuery(document).ready(function($){
			$( '#vertical-nav nav ul li:has(ul)' ).addClass('sub-menu');
			$( '#vertical-nav nav ul li:has(ul) > a' ).append( ' <i class="icon-angle-down"></i>' );

			$( '#vertical-nav nav ul li:has(ul) > a' ).click( function(e){
				var element = $(this);
				$( '#vertical-nav nav ul li' ).not(element.parents()).removeClass('active');
				element.parent().children('ul').slideToggle( function(){
					$(this).find('ul').hide();
					$(this).find('li.active').removeClass('active');
				});
				$( '#vertical-nav nav ul li > ul' ).not(element.parent().children('ul')).not(element.parents('ul')).slideUp();
				element.parent('li:has(ul)').toggleClass('active');
				e.preventDefault();
			});
		});
		

	</script> -->

  <script>
        function uploadImage() {
            // Create an invisible file input element
            const fileInput = document.createElement('input');
            fileInput.type = 'file';
            fileInput.accept = 'image/*';

            // Trigger the file input click event
            fileInput.click();

            // When a file is selected
            fileInput.onchange = async () => {
                const file = fileInput.files[0];
                if (!file) return;

                const formData = new FormData();
                formData.append('image', file);

                try {
                    const response = await fetch('profile.php', {
                        method: 'POST',
                        body: formData
                    });

                    const result = await response.json();
                    console.log(result);
                } catch (error) {
                    console.error('Error:', error);
                }
            };
        }
    </script>

</body>

<?php include("footer.php"); ?>
