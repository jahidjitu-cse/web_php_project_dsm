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

$sql = "SELECT * FROM package_list";
$result = mysqli_query($data, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
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
            <h1>Training Packages</h1>
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
                        <th>Name</th>
                        <th>About</th>
                        <th>Training Duration</th>
                        <th>Cost</th>
                        <th>Delete</th>
                        <th>Update</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($info = $result->fetch_assoc()) {
                    ?>
                        <tr>
                            <td><?php echo "{$info['name']}" ?> </td>
                            <td><?php echo "{$info['description']}" ?></td>
                            <td><?php echo "{$info['training_duration']}" ?></td>
                            <td><?php echo "{$info['cost']}" ?></td>
                            <td><?php echo "<a onClick=\"javascript:return confirm('Are you sure to delete this??');\"class='btn btn-danger' href='admin_delete_training.php?package_id={$info['id']}' >Delete</a>" ?></td>
                            <td><?php echo "<a  class='btn btn-primary' href='admin_update_training.php?package_id={$info['id']}' >Update</a>" ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </center>
</body>

</html>