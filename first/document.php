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
                    echo '<i class="fa fa-user fa-2x" id="symbol_ex"></i><li class="user_fis">'.explode(" ", $_SESSION["first"])[0].'</li>';
                    echo '<li class="user_las">'.explode(" ", $_SESSION["last"])[0].'</li>';
                }
                ?>
            </ul>
        </nav>
   </header>
   <div class="doc">
        <div class="doc_title">Documents</div>
        <div class="table_info">
            <center>
            <table>
                <tr>
                    <th>Document Type</th>
                    <th>Open/View</th>
                    <th>Remove</th>
                </tr>
                <tr>
                    <?php
                        $con=mysqli_connect("localhost","root","","college_info");
                        
                        $querydisplay = mysqli_query($con,"select * from document_store where username = '$user'");


                        while ($result = mysqli_fetch_array($querydisplay)) 
                        {
                            ?>
                            <tr>
                                <td><?php echo $result['Document Type'];?></td>
                                <td>
                                    <img src="<?php echo "Student Doc/".$result['Actual Document'];?>" height="150px" width="150px" alt="">
                                </td>
                                <td>
                                    <button><a href="delete.php?id=<?php echo $result['Sr.No.']; ?>">Delete</a></button>
                                </td>
                            </tr>
                        <?php
                        }
                    ?>
                </tr>
            </table>
            </center>
        </div>
        <div class="doc_select">
            <form action="doc_store.php" method="POST" enctype="multipart/form-data" >
                <br><br>
                <select name="docs" id="doc_sel">
                    <option value="">Choose Document Type:</option>
                    <option value="Adhar Card">Adhar Card</option>
                    <option value="Caste Certificate">Caste Certificate</option>
                    <option value="Admission Form">Admission Form</option>
                </select>
                <br><br>
                <input type="file" name="pic1" class="upload_box" required>
                <br><br>
                <center><input type="submit" name="doc_submit" class="doc_btn" value="Upload"></center>
            </form>
        </div>
   </div>
</body>
</html>