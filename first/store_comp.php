<?php
$con=mysqli_connect("localhost","root","","college_info");
include 'common.php';
session_start();
$user = explode(" ", $_SESSION["user"])[0];

if(!empty($_POST["col"]))
{
    $cname = $_POST['cname'];
    $cmess = $_POST['mess'];

    $insert = mysqli_query($con,"insert into complaint_info values ('','$user','$cname','$cmess',now())");
    $select=mysqli_query($con,"select * from complaint_info");

    header('location:first_p.php');
}
?>