<!DOCTYPE html>
<html lang="en">
<head>
    <title>first_page</title>
    <link rel="stylesheet" type="text/css" href="design.css">
    <script src="https://kit.fontawesome.com/d78a259999.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
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
    <div class="fee_container">
    <?php
        $con=mysqli_connect("localhost","root","","college_info");
        $query = "SELECT * FROM fee_status WHERE Username= '$user'";
        $query_run = mysqli_query($con,$query);
        $row = mysqli_fetch_array($query_run);

        ?>
        <div class="fee_m_title">FEE</div>
        <div class="input">
            <div class="disp">
                <span class="fee_titel">Full Name:-</span><br>
                <span class="disp_fee"><?php echo $row['last_name']."  ".$row['first_name']."  ".$row['middle_name'];?></span>
            </div>
            <div class="disp">
                <span class="fee_titel">Total Fee:-</span><br>
                <span class="disp_fee"><?php echo $row['total_fee']; ?></span>
            </div>
            <div class="disp">
                <span class="fee_titel">Unpaid Fee:-</span><br>
                <span class="disp_fee"><?php echo $row['unpaid_fee']; ?></span>
            </div>
        </div>
    </div>
</body>
</html>