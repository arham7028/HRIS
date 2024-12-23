<!-- <?php 
echo "Welcome to the world of cookies<br>";

setcookie("Username", "Password", "Address", "City", "Zip", time() + 86400, "/");
echo "The cookie is set <br>";

?> -->

<?php
echo "Welcome to the world of cookies<br>";

$cookieParams = array(
    "Username" => "email",
    "Password" => "City"
);

setcookie("User_Details", json_encode($cookieParams), time() + 86400, "/");
echo "The cookie is set <br>";
?>
