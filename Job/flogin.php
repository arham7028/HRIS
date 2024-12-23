<?php
include "config.php";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
  echo "True";
  $email = $_POST["email"];
  // $email = "vishwaka13@gmail.com";
  $password = $_POST["password"];
  // $password1 = sha1($_POST['password']);
  $sql = "SELECT * FROM `user` WHERE `email` = '$email'";
  $result = mysqli_query($connection, $sql);
  $num = mysqli_num_rows($result);
  echo $num;
  if ($num == 1) {
    while ($row = mysqli_fetch_assoc($result)) {
        if (password_verify($password, $row['password'])) {
          session_destroy();
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION["email"] = $email;
        $_SESSION["user_id"] = $row["u_id"];
        // $_SESSION['username'] = $username;
        header('location: fjobs.php');
      } else {
        // $pass = true;
        
      }
    }
  }
  else{
    // $user = true;
  }
}
?>
<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>NaukriDekho - A Job Portal for Daily wages workers</title>
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
  </head>

  <body>
    <div class="super-container">
      <div class="in-super-container">
        <div class="container">
          <div class="header">
            <!-- Navbar -->
            <nav
              class="
                mb-1
                navbar navbar-expand-lg navbar-dark
                orange
                lighten-1
                sticky-top
                justify-content-between
              "
            >
              <div class="container-fluid">
                <Strong><a class="navbar-brand nav-flex-icons" href="#" style="color: yellow; font-weight: 900; font-style: italic;">
                  <!-- <img
                    id="nav-logo"
                    src="./Images/nlogo1.png"
                    alt="NaukriDekho"
                  /> -->HRIS
                </a></Strong>
                <button
                  class="navbar-toggler"
                  type="button"
                  data-toggle="collapse"
                  data-target="#navbarSupportedContent-555"
                  aria-controls="navbarSupportedContent-555"
                  aria-expanded="false"
                  aria-label="Toggle navigation"
                >
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div
                  class="collapse navbar-collapse"
                  id="navbarSupportedContent-555"
                >
                  <!-- Search box -->
                  <!-- <form class="form-inline" id="search-box">
                    <div class="dm-form my-0">
                      <input
                        class="form-control mr-sm-2"
                        type="text"
                        placeholder="Search"
                        aria-label="Search"
                      />
                    </div>
                  </form> -->
                  <!-- Search Box End -->

                  <div style="margin-left: 555px;"></div>

                  <ul
                    class="navbar-nav me-auto mb-2 mb-lg-0 justify-content-end"
                  >
                    <li class="nav-item">
                      <a id="custom-nav" class="nav-link active" href="./"
                        ><strong class="btn btn-outline-warning">Home</strong>
                        <span class="sr-only"></span>
                      </a>
                    </li>
                    <!-- <li class="nav-item">
                      <a id="custom-nav" class="nav-link" href="#about"
                        ><strong class="btn btn-outline-warning">About Us</strong></a
                      >
                    </li> -->
                    <li class="nav-item">  
                      <a id="custom-nav" class="nav-link" href="flogin.html"
                        ><strong class="btn btn-outline-warning">Login</strong></a
                      >
                    </li>
                    <li class="nav-item"> 
                      <a id="custom-nav" class="nav-link" href="fregister.html"
                        ><strong class="btn btn-outline-warning">Register</strong></a
                      >
                    </li>
                  </ul>
                </div>
              </div>
            </nav>
            <!--/.Navbar -->
          </div>
          <!--header end-->


        </div>
        <!--container end-->
      </div>
      <!-- End In Super container -->
          
      <!-- Login Page Start -->
        
          <section class="gradient-custom" id="login-canvas">
            <div class="container py-5 h-50">
              <div class="row d-flex justify-content-center align-items-center h-50">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                  <div class="card bg-dark text-white" style="border-radius: 1rem; border-color: #ffc107; /* margin-top: -90px; */">
                    <div class="card-body p-4 text-center">
          
                      <div class="mb-md-5 mt-md-4 pb-5">
                        <!-- <div>
                            <a href="#">
                                <img class="login-logo" src="Images/nlogo1.png" alt="NaukriDekho">
                            </a>
                        </div> -->
                        <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                        <p class="text-white-60 mb-5">Please enter your login credentials!</p>
                        
                        <form action="flogin.php" name="myForm" onsubmit="validate11_form()" method="post"><!--ge, it onsubmit it means if the return value comes true then only the form will get submit-->
                        <div class="form-outline form-white mb-4">
                       
                            <input type="email" name="email" id="email" placeholder="Email" class="form-control form-control-lg" required/><!--ge-->
                                 <!-- <label class="form-label" for="typeEmailX">Email</label> -->
                           
                                 <b></b><span class="form_error"> </span></b><!--ge-->
                        </div>
          
                        <div class="form-outline form-white mb-4">
                          <input type="password" name="password" id="password" placeholder="Password" class="form-control form-control-lg" required/><!--ge-->
                          <!-- <label class="form-label" for="typePasswordX">Password</label> -->
                         
                          <b><span class="form_error"></span></b><!--ge-->
                        </div>
          
                        <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!">Forgot password?</a></p>
          
                        <div class="login-margin-up"></div>




                        <button class="btn btn-warning btn-lg px-5" type="submit" >Login</button>
                    </form><!--ge-->
          
                        <!-- <div class="d-flex justify-content-center text-center mt-4 pt-1">
                          <a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
                          <a href="#!" class="text-white"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                          <a href="#!" class="text-white"><i class="fab fa-google fa-lg"></i></a>
                        </div> -->
          
                      </div>
                      
                      <div class="login-margin-down"></div>

                      <div>
                        <p class="mt-5">Don't have an account? <a href="fregister.html" class="text-white-50 fw-bold">Sign Up</a></p>
                      </div>
          
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>


          <!-- Login Page End -->

      <!-- Footer -->
<footer class="page-footer font-small unique-color-dark pt-3 footer" id="about">

  <!-- Footer Elements -->
  <div class="container">

    <!-- Call to action -->
    <ul class="list-unstyled list-inline text-center py-0">
      <li class="list-inline-item">
        <h5 class="mt-0 mb-3 text-light">Register for free</h5>
      </li><br>
      <li class="list-inline-item">
        <a href="fregister.html" class="btn btn-outline-light">Sign up!</a>
      </li>
    </ul>
    <!-- Call to action -->

  </div>
  <!-- Footer Elements -->

  <!-- Copyright -->
  <div class="footer-copyright text-center py-1 text-light">© 2021 Copyright:
    <a href="https://NaukriDekho.me"> NaukriDekho.me</a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->
    </div>
    <!--super-contaIner end-->
 

    <!-- Bootstrap Bundle with Popper -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>
    <script src="./flogin.js"></script>
  </body>
</html>
