<?php
    $con=mysqli_connect("localhost","root","","college_info");
    include 'common.php';

if(isset($_POST['add_notice']))        
{
    $notice = $_POST['not'];
    $insert = mysqli_query($con,"insert into notice_board values ('','$notice',now())");
    $select=mysqli_query($con,"select * from notice_board"); 
    redirect('/first/admin.php', $statusCode = 303);
}
?>