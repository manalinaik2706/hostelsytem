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
        <div class="doc_title">Registered Student</div>
        <div class="table_info">
            <center>
            <table>
                <tr>
                    <th>Last Name</th>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Caste</th>
                    <th>D.O.B</th>
                    <th>Gender</th>
                    <th>Phone No.</th>
                    <th>Parent Phone No.</th>
                    <th>Marital Status</th>
                    <th>Permanent Address:</th>
                    <th>Current Address:</th>
                    <th>Photo</th>
                    <th>Signature</th>
                    <th>Action</th>
                </tr>
                <tr>
                    <?php
                        $con=mysqli_connect("localhost","root","","college_info");
                        
                        $querydisplay = mysqli_query($con,"select * from registere_info");


                        while ($result = mysqli_fetch_array($querydisplay)) 
                        {
                            ?>
                            <tr>
                                <td class="calss1"><?php echo $result['Last Name']; ?></td>
                                <td class="calss1"><?php echo $result['First Name']; ?></td>
                                <td class="calss1"><?php echo $result['Middle Name']; ?></td>
                                <td class="calss1"><?php echo $result['Caste']; ?></td>
                                <td class="date"><?php echo $result['D.O.B']; ?></td>
                                <td class="calss1"><?php echo $result['Gender']; ?></td>
                                <td class="calss1"><?php echo $result['Phone_No.']; ?></td>
                                <td class="calss1"><?php echo $result['Parent_Phone_No.']; ?></td>
                                <td class="calss1"><?php echo $result['Marital Status']; ?></td>
                                <td class="calss1"><?php echo $result['Permanent Address:']; ?></td>
                                <td class="calss1"><?php echo $result['Current Address:']; ?></td>
                                <td>
                                    <img src="<?php echo "Student Pic & Signature/".$result['Photo'];?>" height="100px" width="100px" alt="">
                                </td>
                                <td>
                                    <img src="<?php echo "Student Pic & Signature/".$result['Signature'];?>" height="100px" width="100px" alt="">
                                </td>
                                <td>
                                    <button><a href="admindel.php?id=<?php echo $result['Sr._No.']; ?>">Delete</a></button>
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