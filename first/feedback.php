<html>
    <head>
        <title>login</title>
        <link rel="stylesheet" type="text/css" href="design.css">
    </head>
    <body id="body_log">
        <form method="post" action="process.php">
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
                    echo '<i class="fa fa-user fa-2x" id="symbol_ex"></i><li class="user_fis">'.explode(" ", $_SESSION["first"])[0].'</li>';
                    echo '<li class="user_las">'.explode(" ", $_SESSION["last"])[0].'</li>';
                }
                ?>
                
            </ul>
        </nav>
            </header>
            <div id="feed_check">
                <h1>Feedback</h1>
                <div class="input_box">
                        <span class="details">Message:</span>
                        <textarea name="mess" id="area" cols="30" rows="10"></textarea>
                </div>
                <br>
                <input type="submit" value="Send" id="log" name="fed"><br><br>
            </div>
        </form>
    </body>
</html>