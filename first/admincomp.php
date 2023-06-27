<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="design.css">
    <title>leave</title>
</head>
<body>
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
    <div class="lee_app">
        <div class="lee_titel"><b>Complaints</b></div>
        <div class="table_info">
            <center>
            <table>
                <tr>
                    <th>User</th>
                    <th>Complaint Name</th>
                    <th>Message</th>
                    <th>Date</th>
                    <th>Action</th>
                <tr>
                    <?php
                        $con=mysqli_connect("localhost","root","","college_info");
                        
                        $querydisplay = mysqli_query($con,"select * from complaint_info");


                        while ($result = mysqli_fetch_array($querydisplay)) 
                        {
                            ?>
                            <tr>
                                <td class="calss1"><?php echo $result['username']; ?></td>
                                <td class="calss1"><?php echo $result['compname']; ?></td>
                                <td class="calss1"><?php echo $result['message']; ?></td>
                                <td class="calss1"><?php echo $result['date']; ?></td>
                                <td class="calss1">
                                    <button><a href="deletecomp.php?id=<?php echo $result['srno.']; ?>">Delete</a></button>
                                </td>
                            </tr>
                        <?php
                        }
                    ?>
                </tr>
            </table>
            </center>
        </div>
    </div>
</body>
</html>