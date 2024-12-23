<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database page</title>
</head>
<body>
<table Border=1 cellspacing=0 cellpadding= 10>
<tr>
<td>#</td>
<td>Name</td>
<td>Email</td>
<td>Maps</td>
</tr>
<?php
require 'connection.php';
$rows = mysqli_query($conn, "SELECT * FROM sharp_emp ORDER BY id DESC");
$i = 1;
foreach($rows as $row):
    ?>
    <tr>
    <td><?php echo $i++; ?></td>
    <td><?php echo $row["first_name"]; ?></td>
    <td><?php echo $row["phone"] ?></td>
    <td style = "width: 450px; height: 450px;">
    <iframe src='https://www.google.com/maps?q= <?php echo $row["residence_location"]; ?>&hl=es;z=14&output=embed' style="width:100%; height:100%"></iframe> 
    
    </td>
    </tr>
    <?php endforeach; ?>
</table>
<br>
<a href="index.php">Index page</a>

</body>
</html>