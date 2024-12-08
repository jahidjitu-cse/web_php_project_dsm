<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("location:login.php");
} elseif ($_SESSION['usertype'] == "student") {
    header("location:login.php");
}


$host = "localhost";
$user = "root";
$password = "";
$db = "car_project";
$conn = mysqli_connect($host, $user, $password, $db);


if (isset($_POST["add_student"])) {
    $username = $_POST["name"];
    $user_password = $_POST["password"];
    $user_email = $_POST["email"];
    $user_phone = $_POST["phone"];
    $user_package_no= $_POST['package_no'];
    $usertype = "student";


    $check = "SELECT * FROM user WHERE username='$username'";

    $check_user = mysqli_query($conn, $check);

    $row_count = mysqli_num_rows($check_user);

    if ($row_count == 1) {
        echo "<script type='text/javascript'>
        alert('Username Already Exists...Try Another One')
        </script>";
    } else {
        $sql = "INSERT INTO user(username,email,phone,usertype,password,package_no) VALUE ('$username','$user_email',' $user_phone','$usertype','$user_password','$user_package_no')";
        $result = mysqli_query($conn, $sql);


        if ($result) {
            echo "<script type='text/javascript'>
        alert('Data Uploaded Successfully')
        </script>";
        } else {
            echo "<script type='text/javascript'>
        alert('Data Uploaded Failed')
        </script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <title>Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        label {
            display: inline-block;
            text-align: right;
            width: 100px;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        input {
            width: 250px;
        }

        .dev_deg {
            background-color: skyblue;
            width: 500px;
            padding-top: 70px;
            padding-bottom: 70px;
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
            <h1>Add Student</h1>
            <div class="dev_deg">
                <form action="add_student.php" method="post">
                    <div>
                        <label for="">Username</label>
                        <input type="text" name="name">
                    </div>
                    <div>
                        <label for="">Email</label>
                        <input type="email" name="email">
                    </div>
                    <div>
                        <label for="">Phone</label>
                        <input type="number" name="phone">
                    </div>
                    <div>
                        <label for="">Training No.</label>
                        <input type="number" name="package_no">
                    </div>
                    <div>
                        <label for="">Password</label>
                        <input type="password" name="password">
                    </div>
                    <div>
                        <input type="submit" class="btn btn-primary" name="add_student" value="Add Student">
                    </div>
                </form>
            </div>
        </center>
    </div>
</body>

</html>