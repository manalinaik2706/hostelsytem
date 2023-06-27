<?php
    $con=mysqli_connect("localhost","root","","college_info");
    
    $id = $_GET['id'];

    echo $id;
    
    $q = "DELETE FROM `notice_board` WHERE `id`= '$id'";

    mysqli_query($con,$q);
    
    header('location:admin.php')
?>