<?php
session_start();
$host="localhost";
$user="root";
$pass= "";
$db="car_project";
$conn=mysqli_connect($host,$user,$pass,$db);

if($_GET['teacher_id']){
    $user_id=$_GET['teacher_id'];
    $sql="DELETE FROM teacher WHERE id='$user_id'";
    $result=mysqli_query($conn,$sql);
    if ($result) {

       $_SESSION["message"]="Successfully Teacher Data Deleted";

       header("location:admin_view_teacher.php");
    }
}
?>