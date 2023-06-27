<?php
    $con=mysqli_connect("localhost","root","","college_info");
    
    $id = $_GET['id'];

    echo $id;
    
    $q = "DELETE FROM `registere_info` WHERE `Sr._No.`= '$id'";

    mysqli_query($con,$q);
    
    header('location:student_info.php')
?>