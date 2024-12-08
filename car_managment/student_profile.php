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
$sql = "SELECT * FROM user WHERE username='$name'";
$result = mysqli_query($conn, $sql);
$info = mysqli_fetch_assoc($result);



if (isset($_POST["update_profile"])) {
    $s_email = $_POST["email"];
    $s_password = $_POST["password"];
    $s_phone = $_POST["phone"];
    $query = "UPDATE user SET email='$s_email', phone='$s_phone',password= $s_password WHERE username='$name'";
    $result2 = mysqli_query($conn, $query);

    if ($result2) {
        header("location:student_profile.php");
    }
}
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
        span {
            color: red;
        }

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

        .div_deg {
            background-color: skyblue;
            width: 500px;
            padding-top: 70px;
            padding-bottom: 70px;
        }
    </style>
</head>

<body>
    <?php
    include "student_sidebar.php";
    ?>
    <div class="content">
        <center>
            <h1>Update Your Profile</h1>
            <span>Note:You cannot change your username or training package</span>
            <br><br>
            <form action="#" method="post">
                <div class="div_deg">
                    <!-- <div>
                        <label for="">Userame</label>
                        <input type="text" name="name" value="<?php echo "{$info['username']}" ?>">
                    </div> -->
                    <div>
                        <label for="">Email</label>
                        <input type="email" name="email" value="<?php echo "{$info['email']}" ?>">
                    </div>
                    <div>
                        <label for="">Phone</label>
                        <input type="text" name="phone" value="<?php echo "{$info['phone']}" ?>">
                    </div>
                    <div>
                        <label for="">Password</label>
                        <input type="text" name="password" value="<?php echo "{$info['password']}" ?>">
                    </div>
                    <div>
                        <input class="btn btn-primary" type="submit" name="update_profile" value="Update">
                    </div>
                </div>
            </form>
        </center>
    </div>

</body>

</html>