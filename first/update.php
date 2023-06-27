<?php
    $con=mysqli_connect("localhost","root","","college_info");
    include 'common.php';
    session_start();
    $user = explode(" ", $_SESSION["user"])[0];
    if(isset($_POST['update']))
    {    
      
        $pno = $_POST['pno'];
        $ppno= $_POST['ppno'];
        $dob = $_POST['dob'];

        $up_query = "UPDATE registere_info SET `Phone_No.` ='".$pno."', `Parent_Phone_No.` ='".$ppno."', `D.O.B` ='".$dob."' WHERE Username ='". $user."' ";
        $query_run = mysqli_query($con,$up_query);

        header('location:personal.php');
        
    }
    if(isset($_POST['select']))
    {
        $room = explode(" ", $_SESSION["room"])[0];
        $bed = $_POST['bed'];
        $ful = "full";
        $up_query = "UPDATE room_info SET `bedstatus` ='".$ful."', `bedoccupiedby` ='".$user."' WHERE 	room_no ='". $room."' AND bed_no ='". $bed."' ";
        $query_run = mysqli_query($con,$up_query);

        header('location:room.php');
    }
    if(isset($_POST['update_menu']))
    {
        $day = $_POST['day'];
        $time= $_POST['time'];
        $menu = $_POST['menu'];

        $up_query = "UPDATE mess SET `$time` ='".$menu."' WHERE Days ='".$day."' ";
        $query_run = mysqli_query($con,$up_query);

        header('location:mess_admin.php');
        
    }
?>