<?php

session_start();
$host = "localhost";
$user = "root";
$pass = "";
$db = "car_project";

$conn = mysqli_connect($host, $user, $pass, $db);

if ($conn === false) {
    die("connetion Error");
}

if (isset($_POST['apply'])) {

    $data_name = $_POST['name'];
    $data_email = $_POST['email'];
    $data_phone = $_POST['phone'];
    $data_message = $_POST['message'];

    $sql = "INSERT INTO admission (name,email,phone,message) VALUES ('$data_name',' $data_email',' $data_phone',' $data_message')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $_SESSION["message"] = "Suceessfully Applied";
        header("location:index.php");
    } else {
        echo "Apply Faild";
    }
}
