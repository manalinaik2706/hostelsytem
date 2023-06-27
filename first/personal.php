<!DOCTYPE html>
<html lang="en">
<head>
    <title>Personal</title>
    <link rel="stylesheet" type="text/css" href="design.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body id="body_log">
    <header class="hed">
        <p>Dashboard</p>
        <nav>
            <ul class="log_link">
                <?php
                session_start();
                $user = explode(" ", $_SESSION["user"])[0];
                if (empty($_SESSION["first"])) 
                {
                    echo '<a href="login.html" class="user_log">Login</a>';
                } 
                else 
                {
                    echo '<button class="user_log"><a href="logout.php">Logout</a></button>';
                    echo '<i class="fa fa-user fa-2x" id="symbol_ex"></i><li class="user_fis">'.explode(" ", $_SESSION["first"])[0].'</li>';
                    echo '<li class="user_las">'.explode(" ", $_SESSION["last"])[0].'</li>';
                }
                ?>
            </ul>
        </nav>
    </header>
            <form action="update.php" method="POST">
                <?php
                    $con=mysqli_connect("localhost","root","","college_info");
                    $query = "SELECT * FROM registere_info WHERE Username= '$user'";
                    $query_run = mysqli_query($con,$query);
                    $row = mysqli_fetch_array($query_run);
                ?>
                <div class="edit_info">
                    <div class="full_name">
                        <span class="name_details">Full Name</span><br>
                        <span class="name" name="Lanme"><?php echo $row['Last Name'];?></span>
                        <span class="name"><?php echo $row['First Name'];?></span>
                        <span class="name"><?php echo $row['Middle Name'];?></span>
                    </div>
                    <div class="contact_details">
                        <span class="name_details">Contact Details</span>
                        <div class="det">
                            <span class="disp">Phone No.:-</span>
                            <input type="number" value="<?php echo $row['Phone_No.'];?>" id="up_ppno" name="pno">
                        </div><br>
                        <div class="det">
                            <span class="disp">Parent Phone No.:-</span>
                            <input type="number" value="<?php echo $row['Parent_Phone_No.'];?>" id="up_ppno" name="ppno">
                        </div>    
                    </div><br>
                    <div class="birth_details">
                        <span class="name_details">Birth Details and Caste</span>
                        <div class="date_details">
                            <span class="disp">Date Of Birth:-</span>
                            <input type="date" value="<?php echo $row['D.O.B'];?>" id="up_dob" name="dob">
                        </div> <br>
                        <div class="caste_details">
                            <span class="disp">Caste:-</span>
                            <span class="name"><?php echo $row['Caste'];?></span>
                        </div>    
                    </div>
                    <div class="add_details">
                        <span class="name_details">Address Details</span><br>
                        <span class="up_per_add">Permanent Address:-</span>  
                        <span id="up_add"><?php echo $row['Permanent Address:'];?></span><br><br>
                        <span class="up_cur_add">Current Address:-</span>  
                        <span id="up_add"><?php echo $row['Current Address:']; ?></span> 
                    </div>
                </div>
                <input type="submit" name="update" class="up_button" value="UPDATE">
            </form>
</body>
</html>