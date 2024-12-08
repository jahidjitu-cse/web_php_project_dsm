<?php
error_reporting(0);
session_start();


$host = "localhost";
$user = "root";
$pass = "";
$db = "car_project";
$conn = mysqli_connect($host, $user, $pass, $db);


if ($conn === false) {
    die("connection error");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["username"];
    $pass = $_POST["password"];

    $sql = "select * from user where username='" . $name . "' AND password='" . $pass . "'";

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

    if ($row["usertype"] == "student") {

        $_SESSION['username'] = $name;
        $_SESSION['usertype'] = "student";
        header("location:student_profile.php");
    } else if ($row["usertype"] == "admin") {
        $_SESSION['username'] = $name;
        $_SESSION['usertype'] = "admin";
        header("location:admission.php");
    } else {
        $messege = "username or passowrd do not match";
        $_SESSION["loginMessage"] = $messege;
        header("location:login.php");
    }
}
