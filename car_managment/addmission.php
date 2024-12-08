<?php
error_reporting(0);
session_start();

if (!isset($_SESSION['username'])) {
    header("location:login.php");
} elseif ($_SESSION['usertype'] == "student") {
    header("location:login.php");
}

$host="localhost";
$user= "root";
$pass= "";
$db = "car_project";
$conn = mysqli_connect($host, $user, $pass, $db);

$sql="SELECT * FROM admission";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admission</title>
    <style>
        table,
        td,
        th {
            border: 1px solid black;
        }

        table {
            border-collapse: collapse;
            width: 50%;
        }
    </style>
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
        <h1>Applied For Admission</h1>
        <br><br>
        <?php
            if ($_SESSION["message"]) {
                echo $_SESSION["message"];
            }
            unset($_SESSION["message"]);
            ?>
        <!-- <table border="1px solid black;">
            <tr border=" 1px solid black;">
                <th border=" 1px solid black;" style="padding: 20px; font-size: 15px;">Name</th>
                <th style="padding: 20px; font-size: 15px;">Email</th>
                <th style="padding: 20px; font-size: 15px;">Phone</th>
                <th style="padding: 20px; font-size: 15px;">Message</th>
            </tr>
        </table> -->
        <table class="table table-striped 
                    table-bordered table-hover">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Message</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
            <?php
                while ($info=$result->fetch_assoc()) {
                ?>
                <tr>
                    <td><?php echo "{$info['name']}" ?> </td>
                    <td><?php echo "{$info['email']}" ?></td>
                    <td><?php echo "{$info['phone']}" ?></td>
                    <td><?php echo "{$info['message']}" ?></td>
                    <td><?php echo "<a onClick=\"javascript:return confirm('Are you sure to delete this??');\"class='btn btn-danger' href='delete_admitted_student.php?student_id={$info['id']}' >Delete</a>" ?></td>
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