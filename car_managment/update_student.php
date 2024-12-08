<?php
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

$id = $_GET['student_id'];
$sql = "SELECT * FROM user WHERE id='$id' ";
$result = mysqli_query($data, $sql);

$info = $result->fetch_assoc();

if (isset($_POST['update'])) {
    $user_name=$_POST['name'];
    $user_email=$_POST['email'];
    $user_phone=$_POST['phone'];
    $user_package_no=$_POST['package_no'];
    $user_password=$_POST['password'];
    $user_res_status_no=$_POST['result_status'];

    $query="UPDATE user SET username='$user_name',email='$user_email',phone='$user_phone',password='$user_password',package_no='$user_package_no',result_status='$user_res_status_no' WHERE id='$id'";
    $res = mysqli_query($data, $query);

    if ($res) {
        $_SESSION["message"]="Successfully Student Data Updated";
        header("location:view_student.php");
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Update Page</title>
    <?php
    include "admin_css.php";
    ?>
    <style type="text/css">
        label {
            display: inline-block;
            width: 100px;
            text-align: right;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        input{
            width: 250px;
        }

        .div_deg {
            background-color: skyblue;
            width: 400px;
            padding-top: 70px;
            padding-bottom: 70px;
        }
    </style>
</head>

<body>
    <?php
    include "admin_sidebar.php";
    ?>

    <div class="content">
        <center>
            <h1>Update Student</h1>
            <div class="div_deg">
                <form action="#" method="post">
                    <div>
                        <label for="">Username</label>
                        <input type="text" name="name" value="<?php echo "{$info['username']}"; ?>">
                    </div>
                    <div>
                        <label for="">Email</label>
                        <input type="text" name="email" value="<?php echo "{$info['email']}"; ?>">
                    </div>
                    <div>
                        <label for="">Phone</label>
                        <input type="number" name="phone" value="<?php echo "{$info['phone']}"; ?>">
                    </div>
                    <div>
                        <label for="">Training No.</label>
                        <input type="number" name="package_no"value="<?php echo "{$info['package_no']}"; ?>">
                    </div>
                    <div>
                        <label for="">Status No.</label>
                        <input type="number" name="result_status"value="<?php echo "{$info['result_status']}"; ?>">
                    </div>
                    <div>
                        <label for="">Passowrd</label>
                        <input type="text" name="password" value="<?php echo "{$info['password']}"; ?>">
                    </div>
                    <div>
                        <input class="btn btn-success" type="submit" name="update" value="update">
                    </div>
                </form>
            </div>
        </center>
    </div>
</body>

</html>