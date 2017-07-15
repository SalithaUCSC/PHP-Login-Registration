<?php
	require 'dbcon.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
</head>
<body>
<div class="wrapper">
    <img src="user1.png">
	<form action="register.php" method="POST">
	    <table>
	        <tr>
	            <td><label>Reg No</label></td>
	            <td><input type="text" name="id" placeholder="Enter Reg No" required></td>
	        </tr>
	        <tr>
	            <td>Degree</td>
	            <td><input type="text" name="degree" placeholder="Enter Degree" required></td>
	        </tr>
	        <tr>
	            <td>Name</td>
	            <td><input type="text" name="uname" placeholder="Enter Name" required></td>
	        </tr>
	        <tr>
	            <td>Password</td>
	            <td><input type="password" name="password" placeholder="Enter Password" required></td>
	        </tr>
	        <tr>
	            <td>Confirm<br>Password</td>
	            <td><input type="password" name="cpassword" placeholder="Confirm Password" required></td>
	        </tr>
	        <tr>
            	<td><input type="submit" name="reg" value="Register" id="regbtn" class="btn"></td>
            	<td><a href="index.php"><input type="button" name="back" value="Back to Login" id="canbtn" class="btn"></a></td>
        	</tr>
	    </table>
	</form>
</div>
	<?php
		if (isset($_POST['reg'])) {

			$id = $_POST['id'];
			$uname = $_POST['uname'];
			$degree = $_POST['degree'];
			$password = $_POST['password'];
			$cpassword = $_POST['cpassword'];
		

			if ($password == $cpassword) {

				$query1 = "SELECT * FROM users WHERE uname='$uname'";
				$query_run1 = mysqli_query($conn , $query1);

				if (mysqli_num_rows($query_run1)>0) {

					echo "<div class='msg' id='errmsg'>User already exists..Try another one!</div><br>";
				} else {

					$query2 = "INSERT INTO users (id, degree, uname, password) VALUES('$id', '$degree','$uname','$password')";
					$query_run2 = mysqli_query($conn,$query2);

					if ($query_run2) {
						echo "<div class='msg' id='sucmsg'>User registered!</div><br>";
					} else {
						echo "Error!<br>";
					}
				}
			}
			else {
				echo "<div class='msg' id='errmsg'>Password and confirm password does not match!</div><br>";
			}
		}
	?>
</body>
</html>