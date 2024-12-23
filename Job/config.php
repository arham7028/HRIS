<?php 

$db_user = "root";
$db_pass = "";
$db_name = "hris";

$db = new PDO('mysql:host=localhost;dbname=' . $db_name . ';charset=utf8', $db_user, $db_pass);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	
	// if direct access to this page
if(preg_match("/config.php/",$_SERVER['SCRIPT_FILENAME'])){
	die("Access denied: Please away from here.");
}

	$connection = mysqli_connect('localhost','root','','hris') or die("Database Not connected".mysqli_connect_error());
// session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true) {
    // header("location: index.php");
    // exit;
} else {
    # code...
}

 ?>