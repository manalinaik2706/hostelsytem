<?php
    session_start();
    explode(" ", $_SESSION["first"])[0];
    explode(" ", $_SESSION["last"])[0];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>HomePage</title>
    <link rel="stylesheet" type="text/css" href="design.css">
    <script src="https://kit.fontawesome.com/d78a259999.js" crossorigin="anonymous"></script>
    
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body id="body_log" class="banner_img1">
    <center><h1 class="m_hed">Hostel Management System</h1></center>
    <div class="wrapper">
        <div class="navbar">
            <div class="logo">
            <strong>Welcome to the Girls Hostel !!</strong>
            </div>
            <div class="nav_right">
                <ul>
                    <li class="nr_li"><i class="fa fa-user " id="symbol_ex"></i></li>
                    <li class="nr_li" onclick="menuToggle();"><?php echo explode(" ", $_SESSION["first"])[0];?> <?php echo explode(" ", $_SESSION["last"])[0];?> <i class="fa fa-arrow-down"></i></li>
                        <div class="dd_menu"> 
                            <div class="dd_left">
                                <ul>
                                    <li><i class="fa fa-file-text"></i></li>
                                    <li><i class="fa fa-sign-out"></i></li>
                                </ul>
                            </div>
                            <div class="dd_right">
                            <ul>
                                    <li><a href="feedback.php">Feedback</a></li>
                                    <li><a href="logout.php">Logout</a></li>
                            </ul>
                            </div>
                        </div>
                </ul>
            </div>
        </div>
    </div>
    <div class="alert alert-primary" id="alert">
    <marquee behavior="" direction=""><strong>Hostel visting time for guest 9.00 am to 7.00 pm.</strong></marquee>
    </div>
    
    <div class="menu">
        <div class="sub_menu" id="three"> 	
        <i class="fa fa-user fa-6x" id="symbol"></i><a href="profile.php" class="menu_style">Profile</a>
        </div>
        <div class="sub_menu" id="two">
            <i class="fa fa-bed fa-6x" id="symbol"></i><br><a href="room.php" class="menu_style">Rooom</a>
        </div>
        <div class="sub_menu" id="four">
            <i class="fa fa-cutlery fa-6x" id="symbol"></i><br><a href="mess.php" class="menu_style">Mess</a>
        </div>
    </div> 
    <div class="sec_menu">  
        <div class="sub_menu" id="five">
            <i class="fa fa-file-text fa-6x" id="symbol"></i><br><a href="leave.php" class="menu_style">Leave</a>
        </div>
        <div class="sub_menu" id="six">
            <i class="fa fa-file fa-6x" id="symbol"></i><br><a href="comp.php" class="menu_style">Complaint</a>
        </div>
    </div> 
        <marquee scrollamount="3" class="notic" direction="up" onmouseover="this.stop()" onmouseout="this.start()">
        <table class="table table-borderless" id="not_tab">
            <tbody>
                <?php
                    $con=mysqli_connect("localhost","root","","college_info");        
                    $querydisplay = mysqli_query($con,"select * from notice_board");
                    while ($result = mysqli_fetch_array($querydisplay)) 
                    {
                ?>            
                <tr>
                    <td><?php echo $result['notice']; ?></td>
                    <td class="date_row"><?php echo $result['date']; ?></td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>        
        </marquee>

    <script>
        function menuToggle()
        {
            const toggleMenu = document.querySelector('.dd_menu');
            toggleMenu.classList.toggle('active');
        }
    </script>
    

</body>
</html>
