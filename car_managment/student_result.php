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
$sql = "SELECT 
    u.username,
    u.result_status,
    r.result_type
FROM 
    `user` u
LEFT JOIN 
    `result_info` r
ON 
    u.result_status = r.id
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
    <title>Student Profile</title>
    <?php
    include "student_css.php";
    ?>
    <style>

    </style>
</head>

<body>
    <?php
    include "student_sidebar.php";
    ?>
    <div class="content">
        <center>
        <h1>Your Result</h1>
        <p><?php echo "{$info['result_type']}" ?></p>
        </center>
    </div>

</body>

</html>