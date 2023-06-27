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
                    echo '<button class="user_log"><a href="logout.php">Logout</a></button>';
                    echo '<i class="fa fa-user fa-2x" id="symbol_ex"></i><li class="user_fis">ADMIN</li>';
                ?>
            </ul>
        </nav>
    </header>
    <div class="menu_ad">
        <div class="sub_menu" id="three">
            <a href="student_info.php" class="menu_style" id="pro_1">Student Info</a>
        </div>
        <div class="sub_menu" id="two">
            <a href="admin_fee.php" class="menu_style" id="pro_4">Student Fee</a>
        </div>
    </div>
</body>
</html>