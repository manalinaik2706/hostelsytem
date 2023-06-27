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
                    echo '<button class="user_log"><a href="logout.php">Logout</a></button>';
                    echo '<i class="fa fa-user fa-2x" id="symbol_ex"></i><li class="user_fis">ADMIN</li>';
                ?>
            </ul>
        </nav>
    </header>
    <div class="doc_title">Students Fee:</div>
        <div class="table_info">
            <center>
            <table>
                <tr>
                    <th>Name</th>
                    <th>Caste</th>
                    <th>Total Fee</th>
                    <th>Unpaid Fee</th>
                    <th>Action</th>
                </tr>
                <tr>
                    <?php
                        $con=mysqli_connect("localhost","root","","college_info");
                        
                        $querydisplay = mysqli_query($con,"select * from fee_status");


                        while ($result = mysqli_fetch_array($querydisplay)) 
                        {
                            ?>
                            <tr>
                                <td class="calss1"><?php echo $result['first_name']." ".$result['middle_name']." ".$result['last_name'];?></td>
                                <td class="calss1"><?php echo $result['caste']; ?></td>
                                <td class="calss1"><?php echo $result['total_fee']; ?></td>
                                <td class="calss1"><?php echo $result['unpaid_fee']; ?></td>
                                <td class="calss1">
                                    <button><a href="amount.php">Amount</a></button>
                                </td>
                            </tr>
                        <?php
                        $_SESSION["fee"] = $result['feeid'];
                        $_SESSION["un_fee"] = $result['unpaid_fee'];
                        }
                    ?>
                </tr>
            </table>
            </center>
        </div>    
</body>
</html>