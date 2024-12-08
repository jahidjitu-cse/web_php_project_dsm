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

$id = $_GET['teacher_id'];
$sql = "SELECT * FROM teacher WHERE id='$id' ";
$result = mysqli_query($data, $sql);

$info = $result->fetch_assoc();

if (isset($_POST['update'])) {
    $user_name = $_POST['name'];
    $user_email = $_POST['email'];
    $user_phone = $_POST['phone'];
    $user_about = $_POST['about'];

    $query = "UPDATE teacher SET name='$user_name',description='$user_about',email='$user_email',phone='$user_phone' WHERE id='$id'";
    $res = mysqli_query($data, $query);

    if ($res) {
        $_SESSION["message"] = "Successfully Teacher Data Updated";
        header("location:admin_view_teacher.php");
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Update Page</title>
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
        textarea{
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
            <h1>Update Teacher</h1>
            <div class="div_deg">
                <form action="#" method="post">
                    <div>
                        <label for="">Name</label>
                        <input type="text" name="name" value="<?php echo "{$info['name']}"; ?>">
                    </div>
                    <div>
                        <label for="">About</label>
                        <textarea name="about" id="" value="<?php echo "{$info['description']}"; ?>"><?php echo "{$info['description']}"; ?></textarea>

                        <!-- <input type="text" name="password" value="<?php echo "{$info['password']}"; ?>"> -->
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
                        <input class="btn btn-success" type="submit" name="update" value="update">
                    </div>
                </form>
            </div>
        </center>
    </div>
</body>

</html>