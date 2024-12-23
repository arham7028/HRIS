<?php
include("header2.php");
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
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: signin.php");
    exit;
}
$sql = "SELECT * FROM job";
$result = mysqli_query($conn, $sql);
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $_POST['category'];
    if ($id!="") {
             //course query
$job_Query ="SELECT * FROM `job` where `profession` = $id";
$result = mysqli_query($conn,$job_Query);
    }
    else{
        // echo "normal";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HRIS-Job Details</title>
    <link rel="stylesheet" href="css/jdstyle.css">
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

        .card{
            margin-top: 10%;
        }
        .container {
            max-width: 100%;
            margin-top: 0;
        }

        .body {
            font-family: Arial, sans-serif;
            background-color: #182121;
            color: white;
           
            padding: 10px;
        }

        /* .btn {
            color: white;
            background-color: #ed8739;
            border-radius: 10px;
        } */

        h1>span:not(.nocolor),
        h2>span:not(.nocolor),
        h3>span:not(.nocolor),
        h4>span:not(.nocolor),
        h5>span:not(.nocolor),
        h6>span:not(.nocolor) {
            color: #ed8739;
        }

        /* Filter */
        .py-3 {
            padding-top: 1rem !important;
            padding-bottom: 1rem !important;
        }

        .border-0 {
            border: 0 !important;
        }

        .form-select {
            display: block;
            width: 100%;
            padding: 0.375rem 2.25rem 0.375rem 0.75rem;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #666565;
            background-color: #fff;
            /* background-image: url(data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23343a40' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M2 5l6 6 6-6'/%3e%3c/svg%3e); */
            background-repeat: no-repeat;
            background-position: right 0.75rem center;
            background-size: 16px 12px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            appearance: none;
        }

        .py-3 {
            margin-top: 0px;
        }
    </style>
</head>

<body>
    <!-- Page Sub Menu
		============================================= -->
    <div id="page-menu">
        <div id="page-menu-wrap">
            <!-- Search Start -->
            <form action="jobdetails.php" style="background-color: #ffffff80;" method="post">
                <div class="container-fluid  mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
                    <div class="container">
                        <div class="row g-2">
                            <div class="col-md-10">
                                <div class="row g-2">
                                    <!-- <div class="col-md-4">
                            <select class="form-select border-0 py-3">
                                <option selected>Single-room</option>
                                <option value="1">Multiple-rooms</option>
                                <option value="2">House</option>
                                <option value="3">Flat</option>
                            </select>
                        </div> -->
                                    <!-- <div class="col-md-4">
                                        <select class="form-select border-0 py-3" style="
    font-size: 2rem;">
                                            <option selected>Boys</option>
                                            <option value="1">Girls</option>
                                            <option value="2">Family</option>
                                        </select>
                                    </div> -->
                                    <?php 
                                    //category query
                                    $category_Query ="SELECT * FROM `categories`";
                                    $result2 = mysqli_query($connection,$category_Query);
                                    ?>
                                    <div class="col-md-4">
                                        <select name="category" id="category" class="form-select border-0 py-3" style="font-size: 2rem;" required>
                                            <option value="" selected>Field</option>
                                            <?php
                                            while ($row2 = mysqli_fetch_assoc($result2)) {
                                            ?>
                                            <option  value="<?php echo $row2['id'] ?>"><?php echo $row2['categorie'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <select name="city" id="city" class="form-select border-0 py-3" style="font-size: 2rem;" required>
                                            <option  selected>City</option>
                                            <option value="Akola" >Akola</option>
                                            <option value="Amravati">Amravati</option>
                                            <option value="Yavatmal">Yavatmal</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                <button type="submit" class="btn btn-success border-0 w-100 py-3">Search</button>
                            </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
            </form>
        </div>
    </div><!-- #page-menu end -->
    <div class="body">
        <!-- <h1>Job Details</h1> -->
        <div id="jobDetails" class="card">
            <?php

            // foreach($users as $user)
            while ($user = mysqli_fetch_assoc($result)) {
            ?>
                <div class="card-content jd-container">
                    <h3><b>Job Profession:</b> <span id="jobType"><?php echo $user['profession']; ?></span></h3>
                    <p><b>Job Type:</b> <span id="job-Type"><?php echo $user['jobtitle']; ?></span></h2>
                    <p><b>Job Description:</b> <span id="jobDescription"><?php echo $user['jobdetail']; ?></span></p>
                    <p><b>Job Duration:</b> <span id="jobDescription"><?php echo $user['jobduration']; ?></span></p>
                    <p><b>Location:</b> <span id="location"> <a target="blank" href="https://www.google.com/maps/place/<?php echo $user['location']; ?>"> <?php echo $user['address']; ?></a></span></p>
                    <p><b>Date:</b> <span id="date">22/10/24</span></p>
                    <p><b>Budget:</b> <span id="budget"> Rs. <?php echo $user['budget']; ?></span></p>
                    <p><b>Contact:</b> <span id="budget"><?php echo $user['contactNo']; ?></span></p>
                    <a href="applyjob.php?id=<?php echo $user["job_id"]; ?>" class="btn">Apply</a>
                    <!-- <img id="jobPhoto" src="#" alt="Uploaded Photo" style="max-width: 100%; height: auto; display: none;"> -->
                </div>

            <?php
            }
            ?>
        </div>
    </div>

    <script src="js/jdscript.js"></script>
    <?php include("footer.php"); ?>
</body>

</html>