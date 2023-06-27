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
        <div class="lee_titel"><b>Leaving Applications</b></div>
        <div class="table_info">
            <center>
            <table>
                <tr>
                    <th>User</th>
                    <th>From Date</th>
                    <th>To Date</th>
                    <th>Reason</th>
                    <th>Address</th>
                    <th>Phone Number</th>
                    <th>Action</th>
                <tr>
                    <?php
                        $con=mysqli_connect("localhost","root","","college_info");
                        
                        $querydisplay = mysqli_query($con,"select * from leave_info");


                        while ($result = mysqli_fetch_array($querydisplay)) 
                        {
                            ?>
                            <tr>
                                <td class="calss1"><?php echo $result['username']; ?></td>
                                <td class="calss12"><?php echo $result['fromdate']; ?></td>
                                <td class="calss12"><?php echo $result['todate']; ?></td>
                                <td class="calss1"><?php echo $result['reason']; ?></td>
                                <td class="calss1"><?php echo $result['address']; ?></td>
                                <td class="calss1"><?php echo $result['number']; ?></td>
                                <td class="calss1">
                                    <button><a href="deleteleave.php?id=<?php echo $result['srno.']; ?>">Delete</a></button>
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