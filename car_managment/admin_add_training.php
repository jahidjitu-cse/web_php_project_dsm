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

if (isset($_POST["add_training"])) {
    $training_name = $_POST["name"];
    $training_cost = $_POST["cost"];
    $training_duration = $_POST["training_duration"];
    $training_des = $_POST["description"];

    $sql = "INSERT INTO package_list (name,description,training_duration,cost) 
    VALUES ('$training_name','$training_des','$training_duration','$training_cost')";

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
    <title>Add Training</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .form-container {
            max-width: 600px;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"],
        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        textarea {
            resize: vertical;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #0056b3;
        }

        @media (max-width: 600px) {
            .form-group {
                margin-bottom: 10px;
            }

            button {
                font-size: 14px;
            }
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


    <div class="form-container">
        <h2>Add Package</h2>
        <form id="packageForm" action="admin_add_training.php" method="post">
            <div class="form-group">
                <label for="name">Package Name</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <label for="training_duration">Training Duration</label>
                <input type="text" id="training_duration" name="training_duration" required>
            </div>
            <div class="form-group">
                <label for="cost">Cost</label>
                <input type="number" id="cost" name="cost" required step="0.01">
            </div>
            <div>
                <input class="btn btn-primary" type="submit" name="add_training" value="Add Training">
            </div>
        </form>
    </div>
</body>

</html>