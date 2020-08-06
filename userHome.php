<?php
	session_start(); 
?>
<!DOCTYPE html>
<html>
<head >
	<title>Login Page</title>
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
	</form>
	</center>
	<button type="submit" class="logout_btn" name="logout_btn">Logout</button>

</body>
</html>