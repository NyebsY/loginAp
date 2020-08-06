<?php
	session_start();
	require "dbConfig.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<link rel="stylesheet" href= "css/style.css">
</head>
<body style="background-color:#00CCFF">
	<form action="login.php" method="post">
		<div id="wrapper">
			<center>
			<h1>Login Form</h1>
			</center>
				<label>Email Address:</label>
				<br>
				<input name="email" type= "text" class="inputvalues" required>
				<br>
				
				<label>Password:</label>
				<br>
				<input name="password" type= "password" class="inputvalues" required>
				<br>

				
				<input name="login_btn" class="button" type="submit" id="login_btn" value="Login">
				<p>Dont have an account yet? <a href="register.php">Click here to Sign Up</a></p>	
		</div>
		
	</form>
	<?php
		if(isset($_POST['login_btn']))
		{
			$email = $_POST['email'];
			$password = $_POST['password'];
			$query = "SELECT password, name FROM user WHERE email = '$email'";
			$query_num = mysqli_query($con, $query);
			
			if(mysqli_num_rows($query_num)== 1)
			{	
				$result = mysqli_fetch_array($query_num);
				$hashpass = $result[0];
				$name = $result[1];
				
				if(password_verify($password, $hashpass))
				{
					$_SESSION['userName']= $name;
					header('location:userHome.php');
					
				}
			}
			else
			{
				echo '<script type="text/javascript"> alert("User account not found or Incorrect password. Please enter email address/password") </script>';
			}
		}
							
	?>
	
</body>
</html>