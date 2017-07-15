<?php
    session_start();
    require 'dbcon.php';
?>

<!DOCTYPE html>
<head>
    <title>User Login and Registration</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="wrapper">
    <img src="user1.png">
    <form action="index.php" method="POST">
        <table>
            <tr>
                <td>Name</td>
                <td><input type="text" name="uname"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <td><input type="submit" name="log" value="Login" id="logbtn" class="btn"></td>
                <td><a href="register.php"><input type="button" name="reg" value="Register" id="regbtn" class="btn"></a></td>
            </tr>


        </table>
    </form>
</div>
<?php

    if (isset($_POST['log'])) {
        
        $uname = $_POST['uname'];
        $password = $_POST['password'];

        $query = "SELECT * FROM users WHERE uname = '$uname' AND password = '$password'";
    
        $query_run = mysqli_query($conn , $query);

        if (mysqli_num_rows($query_run)>0) {
            $_SESSION['uname'] = $uname;
            header("location:homepage.php");
        } else {
            echo "<div class='msg' id='errmsg'>Invalid credentials</div>";
        }
    }
?>
</body>
</html>




