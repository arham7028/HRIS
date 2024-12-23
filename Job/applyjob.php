<?php
// include("header2.php");
include "../include/config.php";
?>
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


 if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $owndetail = $_POST['owndetail'];
    $job =  $_GET['id'];
    $budget = $_POST['budget'];
    $phoneno = $_POST['phoneno'];
    $uid = '2';

    // echo $job;

    $sql = "INSERT INTO `jobapplication` (`u_id`, `job_id`, `firstname`, `lastname`, `email`, `est_budget`, `owndetail`, `phoneNo`,`Status`) VALUES ('$uid', '$job', '$firstname', '$lastname', '$email', '$budget', '$owndetail', '$phoneno','pending')";
    $result = mysqli_query($connection, $sql);
    if($result){
        header("location: jobdetails.php");
    }
 }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>User Dashboard</title> -->
    <link rel="stylesheet" href="css/jdstyle.css">
        <!-- Bootstrap -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We"
      crossorigin="anonymous"
    />

    <!-- Font Styles -->

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Oswald:wght@700&display=swap"
      rel="stylesheet"
    />

    <!-- 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj"
        crossorigin="anonymous"></script> -->

    <!-- Styles.css -->
    <link rel="stylesheet" href="css/style.css" />
    <style>
    .jd-container {
    max-width: 600px;
    margin: 50px auto;
    padding: 20px;
     /* Replace 'background-image.jpg' with your image path */
 
     margin-bottom: 0;
    border-radius: 8px;
    box-shadow: 0px 0px 36px rgb(225 120 30 / 54%);
    }

    .container{
        max-width: 100%;
        margin-top: 0;
        color: white;
    }

    .body {
    font-family: Arial, sans-serif;
    background-color: #182121;
    color: white;
    margin-top: 0px;
    padding: 20px;
}
.btn{
    color: white;
    background-color: #ed8739;
    border-radius: 10px;
}
form,label{
    color: white;
}
input,textarea{
    color: black;
}
h1{
    color:#ed8739;
}
</style>
</head>
<body>

<section style="height: 140vh!important; background-image: url('https://mdbootstrap.com/img/Photos/new-templates/search-box/img4.jpg')">
        <div class="container h-50">
          <div class="row d-flex justify-content-center align-items-center h-50">
            <div class="col-xl-9">
              <div style="border-radius: 15px; margin-top: 10px;" class="card bg-dark">
                <div class="card-body">
                    <h1 class="text-white align-items-center ps-4 mt-3 mb-2">Apply for a job</h1>
                <form name="applyform" action="applyjob.php?id=<?php echo $_GET['id']; ?>" method="POST" onsubmit="validate_form()"><!--ge-->
                  <div class="row align-items-center pt-4">
                    <div class="col-md-3 ps-5">
      
                      <h5 class="mb-0 text-light">Full name</h5>
      
                    </div>
                    <div class="col-md-9 pe-5" >
                      <div class="row mx-1">
                      <input  id="firstName" name="firstname" type="text" class="validations form-control form-control-lg w-50 col-md-6" class="validations m-2" maxlength="30" placeholder="First Name" required/>  <!-- ge -->
                      <input  id="lastName" name="lastname" type="text" class="validations form-control form-control-lg w-50 col-md-6" class="validations" maxlength="30" placeholder="Last Name" required/>
                      </div>
      
                    </div>
                  </div>
      
                  <hr class="mx-n3">
      
                  <div class="row align-items-center">
                    <div class="col-md-3 ps-5">
      
                      <h5 class="mb-0 text-light ">Email address</h5>
      
                    </div>
                    <div class="col-md-9 pe-5">
      
                      <input id="email" name="email" type="email" class="validations form-control form-control-lg" placeholder="example@example.com" />
      
                    </div>
                  </div>
      
                  <hr class="mx-n3">
      
                  <div class="row align-items-center">
                    <div class="col-md-3 ps-5">
      
                      <h5 class="mb-0 text-light">Provide Details</h5>
      
                    </div>
                    <div class="col-md-9 pe-5">
      
                      <textarea class="form-control" name="owndetail" id="owndetail" rows="3" placeholder="Message sent to the employer"></textarea>
      
                    </div>
                  </div>
      
                  <hr class="mx-n3">
      
                  <div class="row align-items-center">
                    <div class="col-md-3 ps-5">
      
                      <h5 class="mb-0 text-light">Phone  No :</h5>
      
                    </div>
                    <div class="col-md-9 pe-5">
      
                      <input id="phoneno" name="phoneno" class="form-control validations" id="formFileLg" type="text"/>
                    </div>
                  </div>

                  <hr class="mx-n3">
      
      <div class="row align-items-center">
        <div class="col-md-3 ps-5">

          <h5 class="mb-0 text-light">Your Estimated Budget Requirements:</h5>

        </div>
        <div class="col-md-9 pe-5">

          <input id="budget" name="budget" class="form-control validations" id="formFileLg2" type="text"/>
        </div>
      </div>
      
                  <hr class="mx-n3">
      
                  <div class="row align-items-center">
                    <div class="col-md-3 ps-5">
      
                      <h5 class="mb-0 text-light ">Job Id :</h5>
      
                    </div>
                    <div class="col-md-9 pe-5">

                    <?php $id = $_GET['id']; ?>
                      <input id="jobid" name="jobid" type="text" class="validations form-control form-control-lg" placeholder="Enter the Job Id Associated with Job title." value="<?php echo $id; ?>" disabled/>
      
                    </div>
                  </div>

                  <hr class="mx-n3">
                  
                  <div class="px-2 pt-5 validations">
                    <!-- <button type="submit" class="btn btn-warning btn-lg">Send application</button> -->
                    <br>
                    <input class="btn btn-warning btn-lg px-4" id="submit-btn" type="submit" value="Send application" >
                  </div>
                </form>
                </div>
              </div>
      
            </div>
          </div>
        </div>
      </section>
      <script src="jdscript.js"></script>
    <?php 
    // include("../footer.php"); 
    ?>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>  
      <!-- <script src="fapplyforjob.js"></script> -->
</body> 
</html>