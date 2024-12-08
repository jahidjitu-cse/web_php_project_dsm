<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("location:login.php");
} elseif ($_SESSION['usertype'] == "admin") {
    header("location:login.php");
}

$host = "localhost";
$user = "root";
$pass = "";
$db = "car_project";

$conn = mysqli_connect($host, $user, $pass, $db);
$name = $_SESSION['username'];

$sql="SELECT 
    u.username,
    u.package_no,
    p.name AS package_name,
    p.description AS package_description,
    p.training_duration AS package_training_duration,
    p.cost AS package_cost 
FROM 
    `user` u
INNER JOIN 
    `package_list` p
ON 
    u.package_no = p.id
WHERE 
    u.username = '$name';";

$result = mysqli_query($conn, $sql);
$info = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Training Information</title>
    <?php
    include"student_css.php";
    ?>
</head>

<body>
   <?php    
   include"student_sidebar.php";
   ?>
   <div class="content" >
   <center>
   <h1>Your Packages</h1>
   <br><br>
   <table class="table table-striped 
                    table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>About</th>
                        <th>Training Duration</th>
                        <th>Cost</th>
                    </tr>
                </thead>
                <tbody>
                        <tr>
                            <td><?php echo "{$info['package_name']}" ?> </td>
                            <td><?php echo "{$info['package_description']}" ?></td>
                            <td><?php echo "{$info['package_training_duration']}" ?></td>
                            <td><?php echo "{$info['package_cost']}" ?></td>
                        </tr>
                </tbody>
            </table>
   </center>
   </div>
</body>

</html>