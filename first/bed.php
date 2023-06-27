<!DOCTYPE html>
<html lang="en">
<head>
    <title>first_page</title>
    <link rel="stylesheet" type="text/css" href="design2.css">
    <script src="https://kit.fontawesome.com/d78a259999.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body id="body_log">
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

        $id = $_GET['id'];
                
        $_SESSION["room"] = $id;
                            
        $querydisplay = mysqli_query($con,"select * from room_info where room_no = '$id'");
    ?>
    
    <div class="menu">
        <?php
        $count = 0;
        while ($result = mysqli_fetch_array($querydisplay))
        {
            
            if ($result['bedstatus'] == "empty")
            {
                echo '<lable class="rsub_menu" style="background-color:lightgreen;">';	
                echo '<a class="menu_style" id="rp_one">Bed No.'.$result["bed_no"].'</a>';
                echo '</lable>';
                $count++;
            }
            else
            {
                echo '<lable class="rsub_menu" style="background-color:#f70d1a;">';	
                echo '<a class="menu_style" id="rp_one">Bed No.'.$result["bed_no"].'</a>';
                echo '</lable>';
            }
        }
        $emp = "empty";
        $ful = "full";
        if($count >= 1)
        {
            $up_query = "UPDATE room SET `roomstatus` ='".$emp."' WHERE roomno ='". $id."' ";
            $query_run = mysqli_query($con,$up_query);
        }
        else
        {
            $up_query = "UPDATE room SET `roomstatus` ='".$ful."' WHERE roomno ='". $id."' ";
            $query_run = mysqli_query($con,$up_query);
            echo "<p class='room'>Room is fulled</p>";
        }
        ?>

    <div class="container1">
        <form method="POST" action="update.php" name="myform1">
            <div class="input_box1">
                <span class="details">Select Bed:-</span>
                <select name="bed" class="bed_sel" required>
                    <option value=""></option>
                    <option value="1">Bed no.1</option>
                    <option value="2">Bed no.2</option>
                    <option value="3">Bed no.3</option>
                </select>
            </div>
            <div class="button">
                <input type="submit" name="select" value="SUBMIT">   
            </div>
        </form>
    </div>
    
</body>
</html>