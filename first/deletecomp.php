<?php
    $con=mysqli_connect("localhost","root","","college_info");
    
    $id = $_GET['id'];

    echo $id;
    
    $q = "DELETE FROM `complaint_info` WHERE `srno.`= '$id'";

    mysqli_query($con,$q);
    
    header('location:admincomp.php')
?>

                        