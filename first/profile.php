<!DOCTYPE html>
<html lang="en">
<head>
    <title>first_page</title>
    <link rel="stylesheet" type="text/css" href="design.css">
    <script src="https://kit.fontawesome.com/d78a259999.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body id="body_log">

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
    <div class="banner_img2 "></div>
    <div class="menu">
        <div class="sub_menu" id="three">
            <a href="personal.php" class="menu_style" id="pro_1">Personal</a>
        </div>
        <div class="sub_menu" id="two">
             <a href="document.php" class="menu_style" id="pro_2">Document</a>
        </div>
        <div class="sub_menu" id="four">
            <a href="fee.php" class="menu_style" id="pro_3">Fee</a>
        </div>
    </div>
</body>
</html>