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
    <div class="timetable">
        <table class="">
                <tr>
                    <th colspan=3>TIMETABLE</th>
                </tr>
                <tr>
                    <th>Breakfast</th>
                    <th>Lunch</th>
                    <th>Dinner</th>
                </tr>
                <tr>
                    <th>7.00 am - 9.00am</th>
                    <th>1.30 pm - 3.00pm</th>
                    <th>7.30 pm - 9.30pm</th>
                </tr>
        </table>
        <br><br>
        <table>
                <tr>
                    <th colspan=4>Menu Card</th>
                </tr>
                <tr>
                    <th class="space">DAYS</th>
                    <th class="space">Breakfast</th>
                    <th class="space">Lunch</th>
                    <th class="space">Dinner</th>
                </tr>
                <tr>
                    <?php
                            $con=mysqli_connect("localhost","root","","college_info");
                            
                            $querydisplay = mysqli_query($con,"select * from mess");


                            while ($result = mysqli_fetch_array($querydisplay)) 
                            {
                                ?>
                                    <th class="space"><?php echo $result['Days']; ?></th>
                                        <th class="space"><?php echo $result['Breakfast']; ?></th>
                                        <th class="space"><?php echo $result['Lunch']; ?></th>
                                        <th class="space"><?php echo $result['Dinner']; ?></th>
                </tr>
                            <?php
                            }
                            ?>
        </table>
    </div>
</body>
</html>
