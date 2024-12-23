<?php
include("../inc/db_connect.php");
$firstname = "Arham";
$lastname ="Abbas";
$realusername = "arham2211";
$password = "1234asdf";
$usertype = "Admin";

$password = md5(md5($password).md5($realusername));
$query = mysqli_query($db_connect, "INSERT INTO users (`user_id`, `firstname`, `lastname`, `username`, `password`, `accounttype`) VALUES (NULL, '$firstname', '$lastname', '$realusername', '$password', '$usertype')");
$querycount = mysqli_num_rows($query);
?>