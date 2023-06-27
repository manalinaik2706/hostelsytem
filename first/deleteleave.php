<?php
    $con=mysqli_connect("localhost","root","","college_info");
    
    $id = $_GET['id'];

    echo $id;
    
    $q = "DELETE FROM `leave_info` WHERE `srno.`= '$id'";

    mysqli_query($con,$q);
    
    header('location:adminleave.php')
?>

                        