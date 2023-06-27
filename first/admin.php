<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Page</title>
    <link rel="stylesheet" type="text/css" href="design.css">
    <script src="https://kit.fontawesome.com/d78a259999.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                    echo '<i class="fa fa-user fa-2x" id="symbol_ex"></i><li class="user_fis">ADMIN</li>';
                }
                ?>
                
            </ul>
        </nav>
    </header>
    <div class="menu">
        <div class="sub_menu" id="div_1"> 	
        <i class="fa fa-user fa-6x" id="symbol"></i><a href="admin_student.php" class="menu_style">Student</a>
        </div>
        <div class="sub_menu" id="div_2">
            <i class="fa fa-bed fa-6x" id="symbol"></i><br><a href="room_info.php" class="menu_style">Rooom</a>
        </div>
        <div class="sub_menu" id="div_3">
            <i class="fa fa-cutlery fa-6x" id="symbol"></i><br><a href="mess_admin.php" class="menu_style">Mess</a>
        </div> 
        <div class="sub_menu" id="div_4">
            <i class="fa fa-file-text fa-6x" id="symbol"></i><br><a href="adminleave.php" class="menu_style">Leave</a>
        </div>
        <div class="sub_menu" id="div_5">
            <i class="fa fa-file fa-6x" id="symbol"></i><br><a href="admincomp.php" class="menu_style">Complaint</a>
        </div>
    </div> 
    <div class="add_notice">
        <div class="not_title">Notice Board</div>
        <div class="table-wrapper-scroll-y my-custom-scrollbar">
            <table class="table table-bordered table-striped mb-0">
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
                        <td class="delete_row"><a href="delete_notice.php?id=<?php echo $result['id'];  ?>"><button type="button" class="btn btn-outline-danger"><i class="fa fa-times"></i></button></a></td>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
        <button class="not_add" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add Notice</button>
    </div>

    <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Add Notice</h4>
                </div>

                <!-- Modal body -->
                <form method="POST" action="notice_add.php" name="myform" class="modl">
                    <div class="form-group" class="modl">
                        <textarea class="form-control" rows="3" name="not" columns="10" id="comment"></textarea>
                    </div>
                    <input type="submit" name="add_notice" value="ADD" class="btn btn-outline-primary btn-block">
                </form>
            </div>
        </div>
    </div>
</body>
</html>
