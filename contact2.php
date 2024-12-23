<?php
include("header.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>HRIS</title>
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
  <script type="text/javascript" src="https://cdn.emailjs.com/dist/email.min.js"></script>
<style>
  body{
    text-align: justify;
    /* margin-top: 14%; */
  }
  .btn{
    margin-top: 5px;
  }
  hr{
    margin: 2rem;
  }
  .form{
    width: 100%;
    padding: 25px;
    /* margin-top: 25%; */
  }
  .ad{
    /* margin-left: 1%; */
    margin: 1.4%;
  }
  .center{
    text-align: center;
  }
</style>
</head>
<body>
    		<!-- ======================Page Title======================== -->
		<section id="page-title">

<div class="container clearfix">
    <h1>Contact</h1>
    <span>Get in Touch with Us</span>
    
</div>

</section><!-- #page-title end -->

		<!-- Content
		============================================= -->
		<section id="content">

			<div class="content-wrap">

				<div class="container clearfix">

					<!-- Postcontent
					============================================= -->
					<form id="contact-form" class="postcontent nobottommargin">

						<?php 

							if(isset($message_error) || isset($name_error) || isset($phone_error) || isset($mail_error) || isset($send_error) ){

								echo "<div class='alert alert-danger'>";
                            
                            	echo "Please fill the form carefully and correctly<br>";

                            	echo "<a type='button' class='btn btn-default btn-sm' data-dismiss='alert'>Cancel</a>
                            	</div>";
							}else if(isset($success)){

								if(isset($success)) echo $success;
							}

						?>

						<h3>Send us an Email</h3>

								<div class="form-process"></div>

								<div class="col_one_third">
									<label for="template-contactform-name">Name <small>*</small></label>
									<input type="text" placeholder="Name" id="name" name="name" class="sm-form-control required" />
								<?php if(isset($name_error)) echo $name_error; ?>
								</div>

								<div class="col_one_third">
									<label for="template-contactform-email">Email <small>*</small></label>
									<input type="email" id="email" placeholder="Email" name="email" class="required email sm-form-control" />
									<?php if(isset($mail_error)) echo $mail_error; ?>
								</div>

								<div class="col_one_third col_last">
									<label for="template-contactform-phone">Phone</label>
									<input type="text" id="contact" placeholder="Only Digits" name="phone" value="" class="sm-form-control" />
									<?php if(isset($phone_error)) echo $phone_error; ?>
								</div>

								<div class="clear"></div>
								<div class="clear"></div>

								<div class="col_full">
									<label for="template-contactform-message">Message <small>*</small></label>
									<textarea placeholder="Message" class="required sm-form-control" id="message" name="msg" rows="6" cols="30"></textarea>
									<?php if(isset($message_error)) echo $message_error; ?>
								</div>
								
								<div class="col_full">
									<button class="button button-3d nomargin" onclick="sendOTP()"  id="otp-btn" name="submit" value="submit">Send Message</button>
								</div>

							
						
            </form><!-- .postcontent end -->

					<!-- Sidebar
					============================================= -->
					<!-- <div class="sidebar col_last nobottommargin">

						<address>
							<strong>Office:</strong><br>
							GCOEY | Yavatmal<br>
						</address>

						<abbr title="Phone Number"><strong>Phone:</strong></abbr> 1234-1234567<br>
						<abbr title="Email Address"><strong>Email:</strong></abbr> hris@gmail.com

					
						<div class="widget noborder notoppadding">

							<a target="_blank" href="https://www.facebook.com/ExceptionalProgrammers" class="social-icon si-small si-dark si-facebook">
								<i class="icon-facebook"></i>
								<i class="icon-facebook"></i>
							</a>

							<a target="_blank" href="https://twitter.com/exceptionalprog" class="social-icon si-small si-dark si-twitter">
								<i class="icon-twitter"></i>
								<i class="icon-twitter"></i>
							</a>

							<a target="_blank" href="https://www.youtube.com/channel/UCnckIffIs_irwEwIjyoFCtQ" class="social-icon si-small si-dark si-youtube">
								<i class="icon-youtube-play"></i>
								<i class="icon-youtube-play"></i>
							</a>

							<a target="_blank" href="https://plus.google.com/u/0/111814927807344564394" class="social-icon si-small si-dark si-gplus">
								<i class="icon-gplus"></i>
								<i class="icon-gplus"></i>
							</a>

							<a target="_blank" href="https://www.dropbox.com/sh/xlbicsv6kp21yhx/AAB2_IhXaStVBNdDxDnEpKQXa?dl=0" class="social-icon si-small si-dark si-dropbox">
								<i class="icon-dropbox2"></i>
								<i class="icon-dropbox2"></i>
							</a>

							<a target="_blank" href="https://github.com/exceptionalprogrammers" class="social-icon si-small si-dark si-github">
								<i class="icon-github"></i>
								<i class="icon-github"></i>
							</a>

						</div>

					</div> -->
                    <!-- .sidebar end -->

				</div>

			</div>

		</section><!-- #content end -->



    <script type="text/javascript">
        // Initialize EmailJS
        (function() {
            emailjs.init("Ix5BQRlTQud_IQaNQ");
        })();

        // Function to send email
        document.getElementById('contact-form').addEventListener('submit', function(event) {
            event.preventDefault();

            // Get form values
            var templateParams = {
                name: document.getElementById('name').value,
                email: document.getElementById('email').value,
                message: document.getElementById('contact').value,
                message: document.getElementById('message').value
            };
            alert("success");
            console.log("Template Params:", templateParams); // Debug log

            emailjs.send('service_thm8mon', 'template_qjkd44j', templateParams)
                .then(function(response) {
                    console.log('SUCCESS!', response.status, response.text);
                    alert('Email sent successfully!');
                }, function(error) {
                    console.error('FAILED...', error);
                    alert('Failed to send email. Check console for errors.');
                });
        });
    </script>
  

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

    fetch(apiEndPoint, {headers: {"X-CSCAPI-KEY": config.ckey}})
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

    fetch(`${config.cUrl}/${selectedCountryCode}/states`, {headers: {"X-CSCAPI-KEY": config.ckey}})
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

    fetch(`${config.cUrl}/${selectedCountryCode}/states/${selectedStateCode}/cities`, {headers: {"X-CSCAPI-KEY": config.ckey}})
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
<?php include("footer.php"); ?>
