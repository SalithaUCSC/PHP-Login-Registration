<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="wrapper">
	<h1 class="greet">Weclome <?php echo $_SESSION["uname"];?></h1>

	<form action="home.php" method="POST"><input type="submit" name="out" value="Log Out" class="btn" id="outbtn" ></form>
</div>

	<?php
		if (isset($_POST['out'])) 
		{
			session_destroy();
			header("location: index.php");
		}
	?>


</body>
</html>