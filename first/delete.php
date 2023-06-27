<?php
    $con=mysqli_connect("localhost","root","","college_info");
    
    $id = $_GET['id'];

    echo $id;
    
    $q = "DELETE FROM `document_store` WHERE `Sr.No.`= '$id'";

    mysqli_query($con,$q);
    
    header('location:document.php')
?>

                        