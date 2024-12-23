<?php

session_start();
$_SESSION = array();
session_destroy();
header("location: signin.php");

include('config.php');

//Reset OAuth access token
$google_client->revokeToken();

//Destroy entire session data.
session_destroy();

//redirect page to index.php
header('location:register.php');

?>

