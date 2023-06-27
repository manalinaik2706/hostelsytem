<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>address</title>
    <link rel="stylesheet" type="text/css" href="design.css">
</head>
<body id="body_log">
            <header class="hed">
                <p>Dashboard</p>
            </header>
    <div class="add_container">
            <div class="title">Address Details</div>
            <form method="POST" action="process.php" onsubmit="return valid()" enctype="multipart/form-data" name="myform">
                <div class="user_details">
                    <div class="input_box">
                        <span class="details">Permanent Address:</span>
                        <textarea name="per_add" id="area" cols="30" rows="10"></textarea>
                    </div>
                    <div class="input_box">
                        <span class="details">Current Address:</span>
                        <textarea name="cur_add" id="area" cols="30" rows="10"></textarea>
                    </div>
                    <div class="input_box">
                        <span class="details">Country:</span>
                        <input type="text" name="coun" required>
                    </div>
                    <div class="input_box">
                        <span class="details">Country:</span>
                        <input type="text" name="cur_coun" required>
                    </div>
                    <div class="input_box">
                        <span class="details">City :</span>
                        <input type="text" name="city" required>
                    </div>
                    <div class="input_box">
                        <span class="details">City :</span>
                        <input type="text" name="cur_city" required>
                    </div>
                    <div class="input_box">
                        <span class="details">Pincode:</span>
                        <input type="number" name="pin" required>
                    </div>
                    <div class="input_box">
                        <span class="details">Pincode:</span>
                        <input type="number" name="cur_pin" required>
                    </div>
                    <div class="input_box">
                        <span class="details">Same as Permanent:-</span>
                        <input type="checkbox" name="copy_add" id="check_">
                    </div>
                </div>
                <div class="button">
                    <input type="submit" name="reg" value="Proceed">   
                </div>
            </form>
        </div>
    </div>
</body>
</html>