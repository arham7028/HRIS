<?php
// header('Content-Type: application/json');

// // Database connection details
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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['submit']) && isset($_FILES['image'])) {
        // echo "Hello";
        // echo "<pre>";
        // print_r($_FILES['image']);
        // echo "</pre>";


        $img_name = $_FILES['image']['name'];
        $img_size = $_FILES['image']['size'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $error = $_FILES['image']['error'];
        // $Name = $_POST['fullname'];
        // $email = $_POST['email'];
        // $qualification = $_POST['qualification'];
        // $phone = $_POST['phone'];
        // $description = $_POST['description'];
        
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
                      $imh_upload_path = 'Images/userpic/' . $new_img_name;
                      move_uploaded_file($tmp_name, $imh_upload_path);
  
                      //insert in database
                      $sql = " INSERT INTO `photo` (`img_url`) VALUES ('$new_img_name')";
                      $sql = "UPDATE `user` SET `profilePic` = '$new_img_name' WHERE `user`.`u_id` = 2";
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
    }else {
        echo json_encode(['status' => 'error', 'message' => 'No file was uploaded or there was an upload error.']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
}

// Close the database connection
$conn->close();
?>