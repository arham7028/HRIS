<?php
include("header2.php");
// include "../include/config.php";

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

//  $_SESSION["email"]= $email;
//  $_SESSION["user_id"] = "101";
//  $_SESSION["user_type"] = "3";
?>
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>HRIS</title>
    <!-- Bootstrap -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We"
      crossorigin="anonymous"
    />

    <!-- Font Styles -->

    <!-- <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin /> -->
    <link
      href="https://fonts.googleapis.com/css2?family=Oswald:wght@700&display=swap"
      rel="stylesheet"
    />

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

      td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
      }

      tr:nth-child(even) {
        background-color: #464545;
      }
      .jobs-apl{
        margin-top: 20px; 
        color: white; 
        padding: 8px;
      }
      .cancel{
        align-items: center;
      }
    </style>
  </head>
<body>
    <div class="super-container" style="background-color: black;">
<?php
    // require_once('./config.php');
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

    foreach($users as $user)
    {
?>
      <!-- Profile Start-->

      <section class="gradient-custom pt-3" id="register-canvas" style="height: auto;">
        <div class="container py-5 h-50">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-lg-9 col-xl-7">
              <!-- <div class="col-12 col-md-8 col-lg-6 col-xl-5"></div> -->
              <div class="card bg-dark shadow-2-strong" style="margin-top: -50px; border-radius:1rem; border-color: #ffc107;">
                <div class="card-body p-4 p-md-5" style="margin: -20px;">
                  <h3 class="mt-2 mb-0 pb-2 pb-md-0 mb-md-5 font-color align-items-center text-white text-center">
                    Profile</h3>
                  <form>

                    <div class="row m-1">
                      <div class="col-md-6 mb-2">

                        <div class="form-outline">
                          <input type="text" id="firstName" class="form-control form-control-lg font-color"
                            placeholder="<?php echo $user['firstname']; ?>" required disabled/>
                        </div>

                      </div>
                      <div class="col-md-6 mb-2">

                        <div class="form-outline">
                          <input type="text" id="lastName" class="form-control form-control-lg font-color"
                            placeholder="<?php echo $user['lastname']; ?>" value="" required disabled/>
                        </div>

                      </div>
                    </div>

                    <div class="row m-1">
                      <div class="col-md-6 mb-2 d-flex align-items-center">

                        <!-- <h6 class="mb-2 pb-1 font-color text-white">Birthday </h6><br> -->
                        <div class="form-outline datepicker w-100">
                          <label for="birthdayDate" class="form-label text-white"><strong>Birthday</strong></label>
                          <input type="calender" class="form-control form-control-lg font-color font-color"
                            name="birthdayDate" placeholder="<?php echo $user['dob']; ?>" id="birthdayDate" required disabled/>
                        </div>
                      </div>
                      <div class="col-md-6 mt-1 mb-2">                                                               
                        <h6 class="mb-2 pb-1 font-color text-white">Gender: </h6>

                        <div class="form-check form-check-inline">
                          <input class="form-check-input font-color" type="radio" name="inlineRadioOptions"
                            id="femaleGender" value="F" required 
                            <?php
                              $gender = $user['gender'];
          
                              if ($gender == 'F') {
                                echo 'checked';
                              }elseif ($gender == 'M') {
                                
                            ?>
                            disabled/>
                          <label class="form-check-label font-color text-white" for="femaleGender">Female</label>
                        </div>

                        <div class="form-check form-check-inline">
                          <input class="form-check-input font-color" type="radio" name="inlineRadioOptions"
                            id="maleGender" value="M" 
                            <?php
                              
                                echo 'checked';
                            ?>
                            disabled/>
                          <label class="form-check-label font-color text-white" for="maleGender">Male</label>
                        </div>

                        <div class="form-check form-check-inline">
                          <input class="form-check-input font-color" type="radio" name="inlineRadioOptions"
                            id="otherGender" value="O"
                            <?php
                            } 
                            else{
                                echo 'checked';
                              }
                            ?>
                            disabled/>
                          <label class="form-check-label font-color text-white" for="otherGender">Other</label>
                        </div>

                      </div>
                    </div>

                    <div class="row m-1">
                      <div class="col-md-6 mb-2 pb-0">

                        <div class="form-outline">
                          <input type="email" id="emailAddress" class="form-control form-control-lg font-color"
                            placeholder="<?php echo $user['email']; ?>" required disabled/>
                        </div>

                      </div>
                      <div class="col-md-6 mb-2 pb-2">

                        <div class="form-outline">
                          <input type="tel" id="phoneNumber" class="form-control form-control-lg font-color"
                            placeholder="<?php echo $user['phonenumber']; ?>" required disabled/>
                        </div>

                      </div>
                    </div>

                    <div class="row m-1 mt-0">
                      <div class="col-12">
                        <select class="select form-control-lg font-color" id="userType" required disabled>
                          <option value="1" disabled>None</option>
                          <option value="2"
                          <?php
                            $jobtype = $user['usertype'];  //2 is given for JobType 
                            if ($jobtype == '2') {
                              echo 'selected';
                            }
                            else{
                          ?>
                          >Job-seeker</option>            
                          <option value="3"               
                          <?php
                                                     // 3 is given for JobType 
                              echo 'selected';
                            }
                          ?>
                          >Job-provider</option>
                        </select>
                        <label class="form-label select-label font-color text-white">Choose user type</label>

                      </div>
                    </div>
                    <br>
                    <div class="row m-1">
                      <div class="col-md-6 mb-4 mt-0 pb-2">

                        <div class="form-outline">
                          <input type="password" id="password" class="form-control form-control-lg font-color"
                            placeholder="<?php echo sha1($user['password']); ?>" required disabled/>
                        </div>

                      </div>
                      <div class="col-md-6 mb-4 pb-2">

                        <div class="form-outline">
                          <input type="password" id="cpassword" class="form-control form-control-lg font-color"
                            placeholder="Confirm Password" required disabled/>
                        </div>

                      </div>
                    </div>

                    <div class="d-flex flex-row bd-highlight mb-4 justify-content-between mx-3">
                        <div class="p-0 bd-highlight">
                            <input class="btn btn-warning btn-lg px-5" id="edit-btn" type="submit" value="Edit" onclick="edit()"/>
                        </div>
                        <div class="p-0 bd-highlight">
                            <input class="btn btn-warning btn-lg px-4" id="s-btn" type="submit" value="Submit" onclick="submit()"/>
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
          if ($_SESSION["user_type"] == "2") {
          ?>

          <!-- Applied Jobs Start -->
          <div class="jobs bg-dark text-light" style="margin-top: 30px; border-radius: 5px;">
            <h1 class="bg-dark jobs-apl">Applied Jobs</h1>
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
                foreach($jobs as $job){
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
              }elseif($_SESSION["user_type"] == "3") {
              ?>
            </table>
          </div>
          <!-- Applied Job End -->

          <!-- Posted Job Start -->
          <div class="jobs bg-dark text-light" style="margin-top: 30px; border-radius: 5px;">
            <h1 class="bg-dark jobs-apl">Posted Jobs</h1>
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
                foreach($posted_jobs as $p_job){
              ?>
              <tr>
                <td></td>
                <td><?php echo $p_job["job_id"]; ?></td>
                <td><?php echo $p_job["jobtitle"]; ?></td>
                <td><?php echo $p_job["profession"]; ?></td>
                <td><?php echo $p_job["budget"]; ?></td>
                <td><?php echo $p_job["jobduration"]; ?></td>
                <td><?php echo $p_job["phoneNo"]; ?></td>
                <td><?php echo $p_job["jobdetails"]; ?></td>
                <td><?php echo $p_job["address"]; ?></td>
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
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>

    <script>
        function edit(){
          if(confirm("Do you want to edit your Information?")){
            document.getElementById("firstName").disabled = "";
            document.getElementById("firstName").value = "<?php echo $user['firstname']; ?>";
            document.getElementById("firstName").placeholder = "firstname";

            document.getElementById("lastName").disabled = "";
            document.getElementById("lastName").value = "<?php echo $user['lastname']; ?>";
            document.getElementById("lastName").placeholder = "lastame";

            document.getElementById("birthdayDate").disabled = "";
            document.getElementById("birthdayDate").value = "<?php echo $user['dob']; ?>";
            document.getElementById("birthdayDate").placeholder = "DoB";

            document.getElementById("femaleGender").disabled = "";
            document.getElementById("maleGender").disabled = "";
            document.getElementById("otherGender").disabled = "";

            document.getElementById("emailAddress").disabled = "";
            document.getElementById("emailAddress").value = "<?php echo $user['email']; ?>";
            document.getElementById("emailAddress").placeholder = "email";

            document.getElementById("phoneNumber").disabled = "";
            document.getElementById("phoneNumber").value = "<?php echo $user['phonenumber']; ?>";
            document.getElementById("phoneNumber").placeholder = "Mobile Number";

            document.getElementById("userType").disabled = "";
            document.getElementById("password").disabled = "";
            document.getElementById("cpassword").disabled = "";
          }
        }
    </script>
  </body>

<?php include("footer.php"); ?>