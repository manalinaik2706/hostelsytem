<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documents</title>
    <link rel="stylesheet" type="text/css" href="design.css">
</head>
<body id="body_log">
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
                    echo '<i class="fa fa-user fa-2x" id="symbol_ex"></i><li class="user_fis">ADMIN</li>';
                }
                ?>
            </ul>
        </nav>
   </header>
   <div class="doc1">
        <div class="doc_title">Rooms Info</div>
        <div class="table_info">
            <center>
            <table>
                <tr>
                    <th>Room No</th>
                    <th>Bed No</th>
                    <th>Status</th>
                    <th>Bed occupied By</th>
                    <th>Action</th>
                <tr>
                    <?php
                        $con=mysqli_connect("localhost","root","","college_info");
                        
                        $querydisplay = mysqli_query($con,"select * from room_info");


                        while ($result = mysqli_fetch_array($querydisplay)) 
                        {
                            ?>
                            <tr>
                                <td class="calss1"><?php echo $result['room_no']; ?></td>
                                <td class="calss1"><?php echo $result['bed_no']; ?></td>
                                <td class="calss1"><?php echo $result['bedstatus']; ?></td>
                                <td class="calss1"><?php echo $result['bedoccupiedby']; ?></td>
                                <td>
                                    <button><a href="updateroom.php?id=<?php echo $result['bedid']; ?>">Delete</a></button>
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

   <div calss="adding">
       <div class="add_titel">Adding Room</div>
       <form method="post" action="process.php">
            <div>
                <span>Add Room No.</span>
                <input type="number" name="room_no" id="room_no">
            </div>
            <div>
                <input type="submit" value="ADD" name="adding">
            </div>
        </form>
   </div>
</body>
</html>