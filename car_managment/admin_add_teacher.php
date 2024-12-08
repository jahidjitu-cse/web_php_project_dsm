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


if (isset($_POST["add_teacher"])) {
    $t_name = $_POST["name"];
    $t_email = $_POST["email"];
    $t_phone = $_POST["number"];
    $t_des = $_POST["description"];

    $sql = "INSERT INTO teacher (name,description,email,phone) VALUES ('$t_name','$t_des','$t_email','$t_phone')";

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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Teacher</title>
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
        textarea {
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
            <h1>Add Teacher</h1>
            <div class="dev_deg">
                <form action="admin_add_teacher.php" method="post">
                    <div>
                        <label for="">Name:</label>
                        <input type="text" name="name">
                    </div>
                    <div>
                        <label for="">Description:</label>
                        <textarea name="description" id=""></textarea>
                    </div>
                    <div>
                        <label for="">Email:</label>
                        <input type="email" name="email">
                    </div>
                    <div>
                        <label for="">Phone:</label>
                        <input type="tel" name="number">
                    </div>
                    <div>
                        <input class="btn btn-primary" type="submit" name="add_teacher" value="Add Teacher">
                    </div>
                </form>
            </div>
        </center>
    </div>
</body>

</html>