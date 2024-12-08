<?php
session_start();
$host="localhost";
$user="root";
$pass= "";
$db="car_project";
$conn=mysqli_connect($host,$user,$pass,$db);

if($_GET['student_id']){
    $user_id=$_GET['student_id'];
    $sql="DELETE FROM user WHERE id='$user_id'";
    $result=mysqli_query($conn,$sql);
    if ($result) {

       $_SESSION["message"]="Successfully Student Data Deleted";

       header("location:view_student.php");
    }
}
?>