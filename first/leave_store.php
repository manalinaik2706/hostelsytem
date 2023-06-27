<?php
$con=mysqli_connect("localhost","root","","college_info");
include 'common.php';
session_start();
$user = explode(" ", $_SESSION["user"])[0];

if(!empty($_POST["reg"]))
{
    $sdate = $_POST['strat_date'];
    $tdate = $_POST['to_date'];
    $reason = $_POST['reason'];
    $leave = $_POST['lea_add'];
    $alphone = $_POST['pno'];


    $insert = mysqli_query($con,"insert into leave_info values ('','$user','$sdate','$tdate','$reason','$leave','$alphone')");
    $select=mysqli_query($con,"select * from leave_info");

    header('location:first_p.php');
}
?>