<?php
    $con=mysqli_connect("localhost","root","","college_info");
    include 'common.php';

    if(!empty($_POST["username"]))
    {
        $query = "SELECT * FROM registere_info WHERE Username='" . $_POST["username"] . "'";
        $result = mysqli_query($con,$query);
        $count = mysqli_num_rows($result);
        if($count>0)
        {
            echo "<span style='color:red'> Sorry User already exists .</span>";
            echo "<script>$('#submit').prop('disabled',true);</script>";
        }
        else
        {
            echo "<span style='color:green'> User available for Registration .</span>";
            echo "<script>$('#submit').prop('disabled',false);</script>";
        }
    }

    if(isset($_POST['reg']))
    {
        $lname = $_POST['lname'];
        $fname = $_POST['fname'];
        $mname = $_POST['mname'];
        $pno = $_POST['pno'];
        $ppno = $_POST['ppno'];
        $dob = $_POST['dob'];
        $rel = $_POST['rel'];
        $status = $_POST['status'];
        $gender = $_POST['gender'];
        $uname = $_POST['username'];
        $pass = $_POST['psw'];
        $re_pass = $_POST['re_pass'];
        $en_pass = md5($pass);
        $pr_add =  $_POST['per_add'];
        $cr_add =  $_POST['cur_add'];
        
        $pic_name = $_FILES['pic1']['name'];
        $pic_size = $_FILES['pic1']['size'];
        $pic_tmp = $_FILES['pic1']['tmp_name'];
        $pic_type = $_FILES['pic1']['type'];
    
        $sig_name = $_FILES['sig1']['name'];
        $sig_size = $_FILES['sig1']['size'];
        $sig_tmp = $_FILES['sig1']['tmp_name'];
        $sig_type = $_FILES['sig1']['type'];

        if($pass == $re_pass)
        {
            $insert = mysqli_query($con,"insert into registere_info values ('','$lname','$fname','$mname','$pno','$ppno','$dob','$rel','$status','$gender','$uname','$en_pass','$pr_add','$cr_add','$pic_name','$sig_name','0')");
            $select=mysqli_query($con,"select * from registere_info");

            echo $uname;
            
            move_uploaded_file($pic_tmp,"Student Pic & Signature/".$pic_name);
            move_uploaded_file($sig_tmp,"Student Pic & Signature/".$sig_name);

            if($rel == "OPEN")
            {
                $fee = 12000;
                $insert = mysqli_query($con,"insert into fee_status values ('','$uname','$lname','$fname','$mname','$rel','$fee','$fee')");
            }
            elseif($rel == "OBC")
            {
                $fee = 8000;
                $insert = mysqli_query($con,"insert into fee_status values ('','$uname','$lname','$fname','$mname','$rel','$fee','$fee')");
            }
            elseif($rel == "ST")
            {
                $fee = 5000;
                $insert = mysqli_query($con,"insert into fee_status values ('','$uname','$lname','$fname','$mname','$rel','$fee','$fee')");
            }

            redirect('/first/login.html', $statusCode = 303);    
        }
        else 
        {
            echo "Password Do not match!!";
        }

    }

    if(isset($_POST['log']))        
    {
        $uname = $_POST['uname'];
        $upass = $_POST['upass'];
        $en_unpass = md5($upass);

        $result = mysqli_query($con,"select * from registere_info where Username='$uname' and Password='$en_unpass'");
        $row = mysqli_fetch_array($result);
        
        if($row['Username'] == $uname && $row['Password'] == $en_unpass )
        {
            $insert = mysqli_query($con,"insert into login_infos values ('','$uname',now())");
            $select=mysqli_query($con,"select * from login_infos"); 
        }
        if (isset($row)) 
            {
                session_start();
                
                $_SESSION["first"] = $row['First Name'];
                $_SESSION["last"] = $row['Last Name'];
                $_SESSION["user"] = $row['Username']; 
                if($row['role'] == 0)
                {
                    redirect('/first/first_p.php', $statusCode = 303);
                }
                else
                {
                    redirect('/first/admin.php', $statusCode = 303);
                }
                
            } 
       
        if($row['Username'] == $uname && $row['Password'] == $en_unpass )
        {
            $insert = mysqli_query($con,"insert into login_infos values ('','$uname',now())");
            $select=mysqli_query($con,"select * from login_infos"); 
        }
        else 
        {
            redirect('/first/login.html?error=true', $statusCode = 303);
        }
    }

    if(isset($_POST['adding']))        
    {
        $room = $_POST['room_no'];
        $status = "empty";
        $none = "none";
        
        $insert = mysqli_query($con,"insert into room values ('','$room','$status')");
        $select=mysqli_query($con,"select * from room"); 
        
        $count = 1;
        while($count < 4 )
        {
            $insert = mysqli_query($con,"insert into room_info values ('','$room','$count','$status','$none')");
            $select=mysqli_query($con,"select * from room");
            $count++;
        }

        header('location:room_info.php');
    }
    if(isset($_POST['fed']))
    {
        $message = $_POST['mess'];
        session_start();  
        $user = explode(" ", $_SESSION["user"])[0];
        $insert = mysqli_query($con,"insert into feedback values ('','$user','$message')");
        $select=mysqli_query($con,"select * from feedback");
    }

    if(isset($_POST['sub']))
    {
        $amount = $_POST['amu'];
        session_start();  
        $id = explode(" ", $_SESSION["fee"])[0];
        $fee = explode(" ", $_SESSION["un_fee"])[0];

        $new_fee = $fee - $amount ;
        
        $up_query = "UPDATE fee_status SET `unpaid_fee` ='".$new_fee."' WHERE feeid ='".$id."' ";
        $query_run = mysqli_query($con,$up_query);

        header('location:admin_fee.php');
        
    }

?>
