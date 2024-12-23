<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Email with JavaScript</title>
    <script type="text/javascript" src="https://cdn.emailjs.com/dist/email.min.js"></script>
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
* {
	box-sizing: border-box;
	font-family: 'poppins', sans-serif;
}
body {
	/* text-align: center; */
	display: flex;
	align-items: center;
	justify-content: center;
	margin: 0;
	padding: 0;
	height: 100vh;
}
.form {
	width: 500px;
	background-color: #eeeeee;
	padding: 0 30px;
	display: grid;
	gap: 20px;
	padding-bottom: 30px;
}
input {
	width: 100%;
	padding: 10px;
}
.otpverify {
	width: 100%;
	display: flex;
	gap: 20px;
}
.btn {
	padding: 10px;
	/* background-color: #82eec1; */
	outline: none;
	border: none;
	cursor: pointer;
	border-radius: 5px;
	width: 150px;
}
.otpverify{
	display: none;
}
        * {
	box-sizing: border-box;
	font-family: 'poppins', sans-serif;
}
body {
	/* text-align: center; */
	display: flex;
	align-items: center;
	justify-content: center;
	margin: 0;
	padding: 0;
	height: 100vh;
}
.form {
	width: 500px;
	background-color: #eeeeee;
	padding: 0 30px;
	display: grid;
	gap: 20px;
	padding-bottom: 30px;
}
input {
	width: 100%;
	padding: 10px;
}
.otpverify {
	width: 100%;
	display: flex;
	gap: 20px;
}
.btn {
	padding: 10px;
	/* background-color: #82eec1; */
	outline: none;
	border: none;
	cursor: pointer;
	border-radius: 5px;
	width: 150px;
}
.otpverify{
	display: none;
}
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
    .disabled{
      cursor: not-allowed;
    }
    .otpverify{
        margin-top: 5px;
    }
</style>
</head>
<body>
<div class="form" id="form">
<div class="btn-group">
            <a href="signin.php" class="btn btn-primary active col-md-2">Signin</a>
            <a href="emailverify.php" class="btn btn-primary col-md-2" aria-current="page">Signup</a>
            <a href="../" class="btn btn-warning text-white col-md-2" style="border-radius: 20px;margin-left: 50%;">Home</a>
        </div>
<h1 class="center">Email Verification <br> </h1>
        <hr>
    <form id="contact-form">
        <!-- <input type="text" id="name" placeholder="Your Name" required> -->
        <input type="email" id="email" class="form-control col-md-4" placeholder="Your Email" required>
        <!-- <textarea id="message" placeholder="Your Message" required></textarea> -->
        <div class="otpverify">
            <input type="text" id="otp_inp" class="ver form-control col-md-4" placeholder="Enter the OTP sent to your Email...">
            <button class="btn btn-success" class="ver" id="otp-btn">Verify</button>
          </div>
        <button type="submit" class="btn-success btn">Send Email</button>
    </form>

</div>

    <script type="text/javascript">
        // Initialize EmailJS
        (function() {
            emailjs.init("Ix5BQRlTQud_IQaNQ");
        })();

        // Function to send email
        document.getElementById('contact-form').addEventListener('submit', function(event) {
            const otpverify = document.getElementsByClassName('otpverify')[0];
            event.preventDefault();
            let otp_val = Math.floor(Math.random() * 10000);
            let u_mail = document.getElementById('email').value;
            // Get form values
            var templateParams = {
                // name: document.getElementById('name').value,
                email: document.getElementById('email').value,
                message: otp_val
            };

            emailjs.send('service_thm8mon', 'template_qcc8c9t' , templateParams)
                .then(function(response) {
                    console.log('SUCCESS!', response.status, response.text);
                    alert('Email sent successfully!');
                    otpverify.style.display = "flex";
              const otp_inp = document.getElementById('otp_inp');
              const otp_btn = document.getElementById('otp-btn');
              otp_btn.addEventListener('click', () => {
                if (otp_inp.value == otp_val) {
                  alert("Email address verified...");
                  window.location = `register.php?mail=${u_mail}`;
                } else {
                  alert("Invalid OTP");
                }
              })
                }, function(error) {
                    console.log('FAILED...', error);
                    alert('Failed to send email.');
                });
        });
    </script>
</body>
</html>
