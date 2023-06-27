<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="design.css">
    <title>leave</title>
</head>
<body class="banner_leav">
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
    <div class="le_app">
        <div class="le_titel"><b>Leaving Application</b></div>
        <form action="leave_store.php" method="post">
            <div class="leave_details">
                <div class="leave_box">
                    <span class="details">From_Date</span>
                    <input type="date" name="strat_date" required>
                </div>
                <div class="leave_box">
                    <span class="details">To_Date</span>
                    <input type="date" name="to_date" required>
                </div>
                <div class="leave_box">
                    <span class="details">Reason</span>
                    <textarea name="reason" id="area" cols="30" rows="10"></textarea>
                </div>
                <div class="leave_box">
                    <span class="details">Address</span>
                    <textarea name="lea_add" id="area" cols="30" rows="10"></textarea>
                </div>
                <div class="leave_box">
                    <span class="details">Alternative No.:-</span>
                    <input type="number" name="pno" required on>
                </div>
            </div>
            <div class="lev_button">
                <input type="submit" name="reg" value="APPLY">   
            </div>
        </form>
    </div>
</body>
</html>