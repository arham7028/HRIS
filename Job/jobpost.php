<?php
include("header2.php");
// include "../include/config.php";
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

 if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $sql = "SELECT * FROM `job` WHERE job_id = $id";
    $result = mysqli_query($connection, $sql);
    if($result){
        $edit = true;
        $job = mysqli_fetch_assoc($result);
        $jobtitle = $job['jobtitle'];
        $address = $job['address'];
        $location = $job['location'];
        $profession = $job['profession'];
        $jobduration = $job['jobduration'];
        $contactNo = $job['contactNo'];
        $budget = $job['budget'];
        $date = $job['date'];
        $jobdetail = $job['jobdetail'];
    }
 }

 if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if(isset($_POST['edit'])){
        $post_id = $_POST['edit'];
        $profession = $_POST['categorie'];
        $jobType = $_POST['jobType'];
        $duration = $_POST['duration'];
        $location = $_POST['location'];
        $date = $_POST['date'];
        $budget = $_POST['budget'];
        $address = $_POST['address'];
        $contact = $_POST['contact'];
        $description = $_POST['jobDescription'];
    
        $sql = "UPDATE `job` SET `jobtitle` = '$jobType', `address` = '$address', `location` = '$location', `profession` = '$profession', `jobduration` = '$duration', `contactNo` = '$contact', `jobdetail` = '$description', `budget` = '$budget', `date` = '$date' WHERE `job`.`job_id` = $post_id";
        $result = mysqli_query($conn, $sql);
        if($result){
            // header("location: myjobs.php");
        }
    }else{
        $profession = $_POST['categorie'];
        $jobType = $_POST['jobType'];
        $duration = $_POST['duration'];
        $location = $_POST['location'];
        $date = $_POST['date'];
        $budget = $_POST['budget'];
        $address = $_POST['address'];
        $contact = $_POST['contact'];
        $description = $_POST['jobDescription'];
    
        $sql = "INSERT INTO `job` (`job_id`, `jobtitle`, `address`, `location`, `profession`, `jobduration`, `contactNo`, `jobdetail`, `budget`, `date`, `posted_by`) VALUES (NULL, '$jobType', '$address', '$location', '$profession', '$duration', '$contact', '$description', '$budget', '$date', '$uid')";
        $result = mysqli_query($conn, $sql);
        if($result){
            // header("location: myjobs.php");
        }
    }
 }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
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
/* .btn{
    color: white;
    background-color: #ed8739;
    border-radius: 10px;
} */
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
    <div class="body">
        <h1 class="center text-center">Post Your Requirement</h1>
        <form method="post" action="jobpost.php" id="jobForm" class="jd-container">

            <label for="categorie">Select the Profession:</label>
            <select  class="form-control" id="categorie" name="categorie" required>
                        <option value="">Select Option</option>
                    <?php 
                             $query = "SELECT * FROM `categories`";

                        $result = mysqli_query($conn, $query);

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

            <br>

            <label for="jobType">Type of Work:</label>
            <input type="text" id="jobType" name="jobType"<?php if(isset($edit)){?>
                value="<?php echo $jobtitle; ?>"
            <?php } ?>  placeholder="Enter The Job Title" required><br>
            
            <label for="duration">Job Duration:</label>
            <input type="text" id="duration" name="duration"<?php if(isset($edit)){?>
                value="<?php echo $jobduration; ?>"
            <?php } ?>  placeholder="Job Duration Describe In Weeks Or Month e.g 3-4 Days" required><br>

            <label for="address">Address:</label>
            <input type="text" id="address" name="address" <?php if(isset($edit)){?>
                value="<?php echo $address; ?>"
            <?php } ?>  placeholder="Enter Your Address or Landmark" required><br>

            <label for="location">Location:</label>
            <input type="text" id="location" name="location" <?php if(isset($edit)){?>
                value="<?php echo $location; ?>"
            <?php } ?>  placeholder="Enter Your Geo Location(Co-ordinates)" required><br>
            
            <label for="date">Date(Your Expected Date To Start The Work):</label>
            <input type="date" id="date" name="date" <?php if(isset($edit)){?>
                value="<?php echo $date; ?>"
            <?php } ?>  required><br> 
            
            <label for="budget">Budget:</label>
            <input type="text" id="budget" name="budget" <?php if(isset($edit)){?>
                value="<?php echo $budget; ?>"
            <?php } ?> placeholder="Enter Your Budget" required dis>
            


            <label for="contact">Contact:</label>
            <input type="number" id="contact" name="contact" <?php if(isset($edit)){?>
                value="<?php echo $contactNo; ?>"
            <?php } ?>  placeholder="Enter Your Contact Number" maxlength="12" required><br>

            <label for="jobDescription">Job Description:</label><br>
            <textarea id="jobDescription" name="jobDescription" rows="4" cols="50" <?php if(isset($edit)){?>
                value="<?php echo $jobdetail; ?>"
            <?php } ?>  placeholder="Describe Your Requirement" required></textarea><br>

            <?php if(isset($edit)){?>
                <input type="hidden" name="edit" <?php if(isset($edit)){?>
                value="<?php echo $id; ?>"
            <?php } ?>>
            <?php } ?> 

            <!-- <label for="photo">Upload Photo:</label>
            <input type="file" id="photo" name="photo" accept="image/*"><br><br> -->
            <br>
            <br>
            <button class="btn btn-warning" type="submit">Post Job</button>
        </form>
        <div id="successMessage" class="hidden">You have successfully posted the job!</div>
    </div>

    <script src="jdscript.js"></script>
    <?php include("footer.php"); ?>
</body> 
</html>