<?php
    $con=mysqli_connect("localhost","root","","college_info");
    include 'common.php';

    $id = $_GET['id'];

    $emp = "empty";
    $non = "none";
    $up_query = "UPDATE room_info SET `bedstatus` ='".$emp."' , `bedoccupiedby` ='".$non."'  WHERE bedid ='". $id."' ";
    $query_run = mysqli_query($con,$up_query);

    header('location:room_info.php');
?>