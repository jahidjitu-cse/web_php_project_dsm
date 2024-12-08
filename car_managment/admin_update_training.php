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

$id = $_GET['package_id'];
$sql = "SELECT * FROM package_list WHERE id='$id' ";
$result = mysqli_query($data, $sql);

$info = $result->fetch_assoc();

if (isset($_POST['update'])) {
    $training_name = $_POST['name'];
    $training_description = $_POST['description'];
    $training_duration = $_POST['training_duration'];
    $training_cost = $_POST['cost'];

    $query = "UPDATE package_list SET name='$training_name',description='$training_description',training_duration='$training_duration',cost='$training_cost' WHERE id='$id'";
    $res = mysqli_query($data, $query);

    if ($res) {
        $_SESSION["message"] = "Successfully Training Data Updated";
        header("location:admin_view_training.php");
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Training Update Page</title>
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
            width: 350px;
        }
        textarea{
            width: 350px;
        }

        .div_deg {
            background-color: skyblue;
            width: 600px;
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
            <h1>Update Training</h1>
            <div class="div_deg">
                <form action="#" method="post">
                    <div>
                        <label for="">Name</label>
                        <input type="text" name="name" value="<?php echo "{$info['name']}"; ?>">
                    </div>
                    <div>
                        <label for="">About</label>
                        <textarea name="description" id="" value="<?php echo "{$info['description']}"; ?>"><?php echo "{$info['description']}"; ?></textarea>

                    </div>
                    <div>
                        <label for="">Training Duration</label>
                        <input type="text" name="training_duration" value="<?php echo "{$info['training_duration']}"; ?>">
                    </div>
                    <div>
                        <label for="">Cost</label>
                        <input type="number" name="cost" value="<?php echo "{$info['cost']}"; ?>">
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