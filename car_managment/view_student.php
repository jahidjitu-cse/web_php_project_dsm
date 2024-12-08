<?php
error_reporting(0);
session_start();

if (!isset($_SESSION['username'])) {
    header("location:login.php");
} elseif ($_SESSION['usertype'] == "student") {
    header("location:login.php");
}
$host = "localhost";
$username = "root";
$password = "";
$database = "car_project";

$data = mysqli_connect($host, $username, $password, $database);

$sql="SELECT 
    u.id AS user_id,
    u.username as username ,
    u.phone as phone,
    u.email as email,
    u.usertype,
    u.password as password,
    u.package_no as package_no,
    u.result_status as status_no,
    p.id AS package_id,
    p.name AS package_name,
    p.description,
    p.training_duration,
    p.cost
FROM 
    `user` u
LEFT JOIN 
    `package_list` p
ON 
    u.package_no = p.id
WHERE 
    u.usertype = 'student'";

$result = mysqli_query($data, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Student</title>
    <?php
    include "admin_css.php";
    ?>
</head>

<body>
    <?php
    include "admin_sidebar.php";
    ?>
    <div class="content">
        <center>
            <h1>Students Data</h1>
            <?php
            if ($_SESSION["message"]) {
                echo $_SESSION["message"];
            }
            unset($_SESSION["message"]);
            ?>
            <br><br>
            <table class="table table-striped 
                    table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Training Enrolled</th>
                        <th>Phone</th>
                        <th>Password</th>
                        <th>Result Status</th>
                        <th>Delete</th>
                        <th>Update</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($info = $result->fetch_assoc()) {
                    ?>
                        <tr>
                            <td><?php echo "{$info['username']}" ?> </td>
                            <td><?php echo "{$info['email']}" ?></td>
                            <td><?php echo "{$info['package_name']}" ?></td>
                            <td><?php echo "{$info['phone']}" ?></td>
                            <td><?php echo "{$info['password']}" ?></td>
                            <td><?php echo "{$info['status_no']}" ?></td>
                            <td><?php echo "<a onClick=\"javascript:return confirm('Are you sure to delete this??');\"class='btn btn-danger' href='delete_student.php?student_id={$info['user_id']}' >Delete</a>" ?></td>
                            <td><?php echo "<a  class='btn btn-primary' href='update_student.php?student_id={$info['user_id']}' >Update</a>" ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </center>
    </div>
</body>

</html>