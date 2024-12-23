<?php
require 'connection.php';
if(isset($_POST["submit"])){
$name = $_POST["name"];
$email = $_POST["email"];
$latitude = $_POST["latitude"];
$longitude = $_POST["longitude"];
$query = "INSERT INTO `tb_data` VALUES('', '$name', '$email', '$latitude', '$longitude')"; 
mysqli_query($conn, $query);
echo
"
<script>

alert('Data Added Successfully');
document.location.href = 'data.php';

</script>
"
;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Insert Data With Geolocation Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .myForm {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #4caf50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        a {
            display: block;
            margin-top: 320px;
            margin-left:-285px;
            margin-right:110px;
            text-align: center;
            color: #3498db;
            text-decoration: none;
            border: 1px solid #3498db;
            padding: 8px 12px;
            border-radius: 3px;
            transition: background-color 0.3s, color 0.3s;
        }

        a:hover {
            background-color: #3498db;
            color: white;
        }
    </style>
</head>
<body onload="getLocation()">
    <form class="myForm" action="" method="post" autocomplete="off">
        <label for="name">Name</label>
        <input type="text" name="name" required value=""> <br>
        <label for="email">Email</label>
        <input type="email" name="email" required value=""> <br>
        <input type="hidden" name="latitude" value="">
        <input type="hidden" name="longitude" value="">
        <button type="submit" name="submit">Submit</button>
    </form>

    <script type="text/javascript">
        // Your JavaScript code here
    </script>
    <br>
    <a href="data.php">Database Page </a>
</body>
</html>













<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
   
<title>Insert Data With Geolocation Data</title>





</head>
<body onload="getLocation">
<form class="myForm" action="" method="post" autocomplete="off">
<label for="">Name</label>
<input type="text" name="name" required value=""> <br>
<label for="">Email</label>
<input type="email" name="email" required value=""> <br>
<input type="hidden" name="latitude" value="">
<input type="hidden" name="longitude" value="">
<button type="submit" name="submit">Submit</button>
</form>

<script type="text/javascript">
function getLocation(){
if(navigator.geolocation){
navigator.geolocation.getCurrentPosition(showPosition, showError);
}
}
function showPosition(position){
document.querySelector('.myForm input[name = "latitude"]').value = position.coords.latitude;
document.querySelector('.myForm input[name = "longitude"]').value = position.coords.longitude;
}

function showError(error) {
switch(error.code){
case error.PERMISSION_DENIED:
alert("You Must Allow The Request For Geolocation To Fill Out The Form");
location.reload();
break;
}
}
</script>
<br>
<a href="data.php">Database Page </a>
</body>
</html> -->