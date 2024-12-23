<?php
 $servername="localhost";
 $username = "root";
 $password ="";
 $database="hris";
 $conn= mysqli_connect($servername, $username, $password, $database);
 if (!$conn) {
   die("Sorry we failed to connect".mysqli_connect_error());
 } 

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * from user where email='$username'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1) {
      while ($row = mysqli_fetch_assoc($result)) {
          if (password_verify($password, $row['password'])) {
            session_destroy();
          session_start();
          $_SESSION['username'] = $username;

          $_SESSION['loggedin'] = true;
        //   echo $_SESSION['mailid'];
          header("location: home.php");
        } else {
          $pass = true;
        }
      }
    }
    else{
      $user = true;
    }
  }


?>
<!DOCTYPE html>
<html>

<head>
    <title>HRIS</title>
    <link rel="icon" type="image/png" href="Images/t1.png" sizes="16x16">
	<link rel="icon" type="image/png" href="Images/t2.png" sizes="32x32">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <script src="https://smtpjs.com/v3/smtp.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="emailotp.css">
    <style>
        body {
            text-align: justify;
            /* margin-top: 14%; */
        }

        .btn {
            margin-top: 5px;
        }

        hr {
            margin: 2rem;
        }

        .form {
            width: 60%;
            padding: 25px;
            /* margin-top: 25%; */
        }

        .ad {
            /* margin-left: 1%; */
            margin: 1.4%;
        }

        .center {
            text-align: center;
        }
        /* .btn-home{
          margin-left: 50%;
          border-radius: 20px;
        } */
    </style>
</head>

<body>
    <div class="form" id="form">
        <div class="btn-group">
            <a href="signin.php" class="btn btn-primary active col-md-2">Signin</a>
            <a href="emailverify.php" class="btn btn-primary col-md-2" aria-current="page">Signup</a>
            <a href="../" class="btn btn-warning text-white col-md-2" style="border-radius: 20px;margin-left: 50%;">Home</a>
        </div>

        <h1 class="center">Login To Portal <br> </h1>
        <hr>

        <form action="signin.php" method="post">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="email">Email:</label>
                    <input type="text" class="form-control" name="email" id="email" placeholder="Enter your email/username" required>
                </div>

                <div class="form-group col-md-6">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Enter password" required>
                </div>


                <button type="submit" class="btn btn-success">Sign in</button>

            </div>
        </form>

    </div>



    <!-- <script src="https://smtpjs.com/v3/smtp.js"></script> -->
    <!-- <script src="emailotp.js"></script> -->




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>



    <!-- <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>


</body>

</html>