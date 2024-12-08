<?php
session_start();
$host="localhost";
$user="root";
$pass= "";
$db="car_project";
$conn=mysqli_connect($host,$user,$pass,$db);

if($_GET['package_id']){
    $training_id=$_GET['package_id'];
    $sql="DELETE FROM package_list WHERE id='$training_id'";
    $result=mysqli_query($conn,$sql);
    if ($result) {

       $_SESSION["message"]="Successfully Training Data Deleted";

       header("location:admin_view_training.php");
    }
}
?>