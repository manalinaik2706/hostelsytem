
<!DOCTYPE html>
<html lang="en">
<head>
    <title>first_page</title>
    <link rel="stylesheet" type="text/css" href="design.css">
    <script src="https://kit.fontawesome.com/d78a259999.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body id="body_log" class="banner_imgrm">
    <center><h1 class="m_hed">Hostel Management System</h1></center>
    <header class="hed">
        <p>Dashboard</p>
        <nav>
            <ul class="log_link">
                <?php
                session_start();
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
        <?php
        $con=mysqli_connect("localhost","root","","college_info");
                            
        $querydisplay = mysqli_query($con,"select * from room");
        ?>
    <div class="rmenu">
        <?php
        while ($result = mysqli_fetch_array($querydisplay))
        {
            if ($result['roomstatus'] == "empty")
            {
                echo '<div class="rsub_menu" style="background-color:lightgreen;">';	
                echo '<a href="bed.php?id='.$result["roomno"].'" class="menu_style" id="rp_one">Room No.'.$result["roomno"].'</a>';
                echo '</div>';
            }
            else
            {
                echo '<div class="rsub_menu" style="background-color:#f70d1a;">';	
                echo '<a href="bed.php?id='.$result["roomno"].'" class="menu_style" id="rp_one">Room No.'.$result["roomno"].'</a>';
                echo '</div>'; 
            }
        }
        ?>

        <?php
       
        ?>
    </div> 
</body>
</html>
