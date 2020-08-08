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
	<a href= 'logout.php'>Logout</a>
	</form>
	</center>
	
</body>
</html>