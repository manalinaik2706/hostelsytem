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
    <div class="doc_title">Amount:</div>
    <form method="post" action="process.php">
            <div id="check1">
                Enter Amount:- <input type="number" name="amu" id="text_field"><br><br>
                <input type="submit" value="SUBMIT" id="log1" name="sub"><br><br> 
            </div>
        </form>
    </div>    
</body>
</html>