<?php
	session_start(); 
?>
<!DOCTYPE html>
<html>
<head >
	<title>User Home Page</title>
	<link rel="stylesheet" href= "css/style.css">
</head>
<body>
	<center>
	<form>
	<h1>Welcome 
		<?php
			echo $_SESSION['userName'];
		?>
	</h1>
	
	<a href = 'profile.php' class = "nav_btn">Profile</a>
	<a href = 'friends.php' class = "nav_btn">Friends</a>
	<a href = 'logout.php' class = "nav_btn">Logout</a>

	</form>
	</center>
	
</body>
</html>
