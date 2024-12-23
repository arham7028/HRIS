<?php
 $servername="localhost";
 $username = "root";
 $password ="";
 $database="hris";
 $conn= mysqli_connect($servername, $username, $password, $database);
 if (!$conn) {
   die("Sorry we failed to connect".mysqli_connect_error());
 } 

 if(isset($_GET['mail'])){
  $mail = $_GET['mail'];
 }
if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $email = $_POST['email'];
  $dob = $_POST['dob'];
  $gender = $_POST['gender'];
  $landmark = $_POST['landmark'];
  $country = $_POST['country'];
  $state = $_POST['state'];
  $city = $_POST['city'];
  $user = $_POST['user'];
  $number = $_POST['number'];
  $password = $_POST['password'];
  $cpass = $_POST['confirm'];
  $address = $landmark . " " . $city . " " . $state . " " . $country;
  if ($firstname == "" || $lastname == "" || $dob == "" || $email == "" || $password == "") {
    $blank = true;
  } else {
    $existsSql = "Select * from user where email='$email'";
    $result = mysqli_query($conn, $existsSql);
    $num = mysqli_num_rows($result);
    if ($num > 0) {
      $err = true;
    } else {
      if ($password == $cpass) {
        $hash = password_hash("$password", PASSWORD_DEFAULT);
        $sql = "INSERT INTO `user` (`firstname`, `lastname`, `dob`, `gender`, `email`, `phonenumber`, `address`, `usertype`, `password`) VALUES ('$firstname', '$lastname', '$dob', '$gender', '$email', '$number', '$address', '$user', '$hash')
          ";
        $result = mysqli_query($conn, $sql);
        if ($result) {
          header("location: signin.php");
        }
      } else {
        $pass = true;
      }
    }
  }
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>HRIS</title>
  <!-- Bootstrap CSS -->
  <link rel="icon" type="image/png" href="Images/t1.png" sizes="16x16">
	<link rel="icon" type="image/png" href="Images/t2.png" sizes="32x32">
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
      margin-top: 25%;
    }

    .ad {
      /* margin-left: 1%; */
      margin: 1.4%;
    }

    .center {
      text-align: center;
    }
    .disabled{
      cursor: not-allowed;
    }
  </style>
</head>

<body>
  <div class="form" id="form">
    <!-- <div class="btn-group">
      <a href="signin.php" class="btn btn-primary  col-md-2">Login</a>
      <a href="register.php" class="btn btn-primary active col-md-2" aria-current="page">Signup</a>
                  <a href="../" class="btn btn-warning text-white col-md-2" style="border-radius: 20px;margin-left: 50%;">Home</a>

    </div> -->
    <h1 class="center">Fill The Details Properly <br> </h1>
    <hr>
    <form action="register.php" method="post">
      <div class="form-row">

        <!-- <hr> -->
        <!-- <div id="hid">
          <input type="email" id="email" class="ver" placeholder="Enter Your Email...">
          <div class="otpverify">
            <input type="text" id="otp_inp" class="ver" placeholder="Enter the OTP sent to your Email...">
            <button class="btn btn-success" class="ver" id="otp-btn">Verify</button>
          </div>

          <button class="btn btn-primary" class="ver" onclick="sendOTP()">Send OTP</button>
        </div>
      </div> -->

      <div id="unhid" class="form-row">




        <div class=" form-group col-md-6">
          <label for="useremail">Username</label>
          <input type="text" class="form-control disabled" name="username" value="<?php echo $mail; ?>" id="username" placeholder="Email" disabled>
        </div>
        <div class=" form-group col-md-6" hidden>
          <label for="email">Username</label>
          <input type="text" class="form-control" name="email" value="<?php echo $mail; ?>" id="usermail" placeholder="Email">
        </div>



        <div class="form-group col-md-6">
          <label for="firstname">First name</label>
          <input type="text" class="form-control" name="firstname" id="firstname" placeholder="First Name" required>
        </div>

        <div class="form-group col-md-6">
          <label for="lastname">Last name</label>
          <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Last Name" required>
        </div>

        <div class="form-group col-md-6">
          <label for="dob">DOB</label>
          <!-- <input type="data" class="form-control" name ="date" id="inputDate" > -->
          <input type="date" class="form-control" name="dob" id="dob" required>
        </div>

        <div class="form-group col-md-6">
          <label for="inputGender">Gender: </label>
          <br>
          <!-- <input type="text" class="form-control" name ="lastname" id="lastname" placeholder="Last Name"> -->
          <!-- <input type="radio" name="" id=""> -->
          <label for="male" class="gender-btn">
            <input type="radio" id="male" name="gender" value="M"> Male
          </label>
          <label for="female" class="gender-btn">
            <input type="radio" id="female" name="gender" value="F"> Female
          </label>
        </div>

        <div class="form-group col-md-6">
          <label for="inputNumber">Phone Number</label>
          <input type="number" class="form-control" name="number" id="number" placeholder="Phone Number" required>
        </div>

        <div class="form-group col-md-6">
          <label for="inputGender">User Type: </label>
          <br>
          <!-- <input type="text" class="form-control" name ="lastname" id="lastname" placeholder="Last Name"> -->
          <!-- <input type="radio" name="" id=""> -->
          <label for="2" class="gender-btn">
            <input type="radio" id="2" name="user" value="2"> Job-Seeker
          </label>
          <label for="3" class="gender-btn">
            <input type="radio" id="3" name="user" value="3"> Job-Provider
          </label>
        </div>

        <div class="form-group col-md-6">
          <label for="landmark">Landmark</label>
          <input type="text" class="form-control" name="landmark" id="landmark" placeholder="Landmark" required>
        </div>

        <div class="form-group col-md-12">
          <label for="inputAddress2">Address: </label>
          <br>
          <div class="select_option">
            <div class="row ">
              <select name="country" class="form-select form-control country col-md-3 ad" aria-label="Default select example" onchange="loadStates()">
                <option selected>Select Country</option>
              </select>
              <select name="state" class="form-select form-control state col-md-3 ad" aria-label="Default select example" onchange="loadCities()">
                <option selected>Select State</option>
              </select>
              <select name="city" class="form-select form-control city col-md-3 ad" aria-label="Default select example" required>
                <option selected>Select City</option>
              </select>
            </div>
          </div>
          <!-- <br> -->

        </div>
        <div class="form-group col-md-6">
          <label for="password">Password:</label>
          <input type="password" class="form-control" name="password" id="password" minlength="6" placeholder="Password" required>
        </div>

        <div class="form-group col-md-6">
          <label for="confirm">Confirm Password</label>
          <input type="password" class="form-control" name="confirm" id="confirm" placeholder="Confirm Password">
        </div>
        <button type="submit" class="btn btn-success">Sign in</button>


      </div>
    </form>




    <!-- <script src="https://smtpjs.com/v3/smtp.js"></script> -->
    <!-- <script src="emailotp.js"></script> -->

    <!-- <script>
      document.getElementById("unhid").style.display = "none";

      function sendOTP() {
        const email = document.getElementById('email');
        const otpverify = document.getElementsByClassName('otpverify')[0];

        let otp_val = Math.floor(Math.random() * 10000);

        let emailbody = `<h2>Your OTP is </h2>${otp_val}`;
        Email.send({
          SecureToken: "5ea87299-13d2-49eb-94e0-5afd21cec296",
          To: email.value,
          From: "rohitwankhade376@gmail.com",
          Subject: "Email OTP using JavaScript",
          Body: emailbody,
        }).then(

          message => {
            if (message === "OK") {
              alert("OTP sent to your email " + email.value);

              otpverify.style.display = "flex";
              const otp_inp = document.getElementById('otp_inp');
              const otp_btn = document.getElementById('otp-btn');

              otp_btn.addEventListener('click', () => {
                if (otp_inp.value == otp_val) {
                  alert("Email address verified...");
                  document.getElementById("unhid").style.display = "block";
                  document.getElementById("unhid").style.display = "flex";

                  document.getElementById("hid").style.display = "none";
                  document.getElementById("form").style.marginTop = "20px";
                  let username = document.getElementById("username");
                  let usermail = document.getElementById("usermail");
                  username.value = email.value;
                  usermail.value = email.value;
                  // console.log('success');
                  // console.log(email.value);

                } else {
                  alert("Invalid OTP");
                }
              })
            }
          }
        );
      }
    </script> -->

    <script>
      var config = {
        cUrl: 'https://api.countrystatecity.in/v1/countries',
        ckey: 'NHhvOEcyWk50N2Vna3VFTE00bFp3MjFKR0ZEOUhkZlg4RTk1MlJlaA=='
      }


      var countrySelect = document.querySelector('.country'),
        stateSelect = document.querySelector('.state'),
        citySelect = document.querySelector('.city')


      function loadCountries() {

        let apiEndPoint = config.cUrl

        fetch(apiEndPoint, {
            headers: {
              "X-CSCAPI-KEY": config.ckey
            }
          })
          .then(Response => Response.json())
          .then(data => {
            // console.log(data);

            data.forEach(country => {
              const option = document.createElement('option')
              option.value = country.iso2
              option.textContent = country.name
              countrySelect.appendChild(option)
            })
          })
          .catch(error => console.error('Error loading countries:', error))

        stateSelect.disabled = true
        citySelect.disabled = true
        stateSelect.style.pointerEvents = 'none'
        citySelect.style.pointerEvents = 'none'
      }


      function loadStates() {
        stateSelect.disabled = false
        citySelect.disabled = true
        stateSelect.style.pointerEvents = 'auto'
        citySelect.style.pointerEvents = 'none'

        const selectedCountryCode = countrySelect.value
        // console.log(selectedCountryCode);
        stateSelect.innerHTML = '<option value="">Select State</option>' // for clearing the existing states
        citySelect.innerHTML = '<option value="">Select City</option>' // Clear existing city options

        fetch(`${config.cUrl}/${selectedCountryCode}/states`, {
            headers: {
              "X-CSCAPI-KEY": config.ckey
            }
          })
          .then(response => response.json())
          .then(data => {
            // console.log(data);

            data.forEach(state => {
              const option = document.createElement('option')
              option.value = state.iso2
              option.textContent = state.name
              stateSelect.appendChild(option)
            })
          })
          .catch(error => console.error('Error loading countries:', error))
      }


      function loadCities() {
        citySelect.disabled = false
        citySelect.style.pointerEvents = 'auto'

        const selectedCountryCode = countrySelect.value
        const selectedStateCode = stateSelect.value
        // console.log(selectedCountryCode, selectedStateCode);

        citySelect.innerHTML = '<option value="">Select City</option>' // Clear existing city options

        fetch(`${config.cUrl}/${selectedCountryCode}/states/${selectedStateCode}/cities`, {
            headers: {
              "X-CSCAPI-KEY": config.ckey
            }
          })
          .then(response => response.json())
          .then(data => {
            // console.log(data);

            data.forEach(city => {
              const option = document.createElement('option')
              option.value = city.iso2
              option.textContent = city.name
              citySelect.appendChild(option)
            })
          })
      }

      window.onload = loadCountries
    </script>

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