
<?php
include ("header2.php");
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

  if(isset($_GET['delete'])){
    $sno = $_GET['delete'];
    $delete = true;
    $sql = "DELETE FROM `job` WHERE `job`.`job_id` = $sno";
    $sql2 = "UPDATE `jobapplication` SET `Status` = 'Job is over' WHERE `jobapplication`.`job_id` = $sno";
    $result = mysqli_query($conn, $sql);
    $result2 = mysqli_query($conn, $sql2);
    if($result){
        // header("location: myjobs.php");
        $delete = true;
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

    .container{
        max-width: 100%;
        margin-top: 0;
    }

    .body {
    font-family: Arial, sans-serif;
    background-color: #182121;
    color: white;
    margin-top: 0px;
    padding: 10px;
}
/* .btn{
    color: white;
    background-color: #ed8739;
    border-radius: 10px;
} */

h1 > span:not(.nocolor), h2 > span:not(.nocolor), h3 > span:not(.nocolor), h4 > span:not(.nocolor), h5 > span:not(.nocolor), h6 > span:not(.nocolor) {
    color: #ed8739;
}

h1{
    color: #ed8739;
}
button{
    margin-left: 5px;
}
    </style>
</head>
<body>
    <div class="body">
    <h1 class="center text-center">Your Posted Requirement</h1>
        <div id="jobDetails" class="card">
            <?php
            $sql = "SELECT * FROM job WHERE posted_by = $uid";
            $result = mysqli_query($conn, $sql);

            // foreach($users as $user)
            while( $user = mysqli_fetch_assoc($result) )
            {
              $ctid = $user['profession'];
              $sql2 = "SELECT * FROM categories WHERE `id` = $ctid";
              $result2 = mysqli_query($conn, $sql2);
              $user2 = mysqli_fetch_assoc($result2);
            ?>
            <div class="card-content jd-container">
                <h3><b>Job Profession:</b> <span id="jobType"><?php echo $user2['categorie']; ?></span></h3>
                <p><b>Job Type:</b> <span id="job-Type"><?php echo $user['jobtitle']; ?></span></h2>
                <p><b>Job Description:</b> <span id="jobDescription"><?php echo $user['jobdetail']; ?></span></p>
                <p><b>Job Duration:</b> <span id="jobDescription"><?php echo $user['jobduration']; ?></span></p>
                <p><b>Location:</b> <span id="location"> <a target="blank" href="https://www.google.com/maps/place/<?php echo $user['location']; ?>"> <?php echo $user['address']; ?></a></span></p>
                <p><b>Date:</b> <span id="date">22/10/24</span></p>
                <p><b>Budget:</b> <span id="budget"> Rs. <?php echo $user['budget']; ?></span></p>
                <p><b>Contact:</b> <span id="budget"><?php echo $user['contactNo']; ?></span></p>
                <a class="view btn col-md-4" id="a<?php echo $user['job_id']; ?>">View Applications</a><button id="e<?php echo $user['job_id']; ?>" class="edit col-md-2 btn-warning">Edit</button><button id="d<?php echo $user['job_id']; ?>" class="delete col-md-2 ">Complete</button>
            <br><br><br>
                
                <!-- <img id="jobPhoto" src="#" alt="Uploaded Photo" style="max-width: 100%; height: auto; display: none;"> -->
            </div>

            <?php
            }
          ?>
        </div>
    </div>

    <script src="js/jdscript.js"></script>
    <?php include("footer.php"); ?>
    <script>
        edits = document.getElementsByClassName('edit');
        Array.from(edits).forEach((element) => {
        element.addEventListener("click", (e) => {
        console.log("edit ");
        sno = e.target.id.substr(1);
        window.location = `jobpost.php?edit=${sno}`;
      })
    })


    deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("edit ");
        sno = e.target.id.substr(1);

        if (confirm("Are you sure that this work is done !!!")) {
          console.log("yes");
          window.location = `myjobs.php?delete=${sno}`;
          // TODO: Create a form and use post request to submit a form
        }
        else {
          console.log("no");
        }
      })
    })

    view = document.getElementsByClassName('view');
    Array.from(view).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("edit ");
        sno = e.target.id.substr(1);
        window.location = `application.php?id=${sno}`;
      })
    })
    </script>
</body>
</html>




