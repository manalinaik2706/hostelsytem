<?php
    $con=mysqli_connect("localhost","root","","college_info");
    
    session_start();
    $user = explode(" ", $_SESSION["user"])[0];

    if(isset($_POST['doc_submit']))
    {
        $doc_type = $_POST['docs'];

        $pic_name = $_FILES['pic1']['name'];
        $pic_size = $_FILES['pic1']['size'];
        $pic_tmp = $_FILES['pic1']['tmp_name'];
        $pic_type = $_FILES['pic1']['type'];

        $insert = mysqli_query($con,"insert into document_store values ('','$user','$doc_type','$pic_name')");
        $select=mysqli_query($con,"select * from document_store");

        move_uploaded_file($pic_tmp,"Student Doc/".$pic_name);

        header('location:document.php');
    }
?>