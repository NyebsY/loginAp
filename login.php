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
	<form action="login.php" method="post" enctype="multipart/form-data">
		<div id="wrapper">
			<center>
			<h1>Login Form</h1>
			</center>
				<label>Email Address:</label>
				<br>
				<input name="email" type= "text" class="inputvalues" required value="<?php if(isset($_COOKIE['email'])) { echo $_COOKIE['email']; } ?>">
				<br>
				
				<label>Password:</label>
				<br>
				<input name="password" type= "password" class="inputvalues" required>
				<br>

				<input name="rememberMe" id="rememberMe" type="checkbox" <?php if(isset($_COOKIE['email'])) {echo "checked= 'checked'";} ?> value="1">
				<label for="rememberMe">Remember me</label>
				<br>
				
				<input name="login_btn" class="button" type="submit" id="login_btn" value="Login">
				<p>Dont have an account yet? <a href="register.php">Click here to Sign Up</a></p>	
		</div>
		
	</form>
	
	<?php
		if(isset($_POST['rememberMe']))
		{
			$escapeRem = mysqli_real_escape_string($con,$_REQUEST['rememberMe']);
		}
		
		$cTime = 60 * 60 * 24 * 30;
		$cTime_Onset = $cTime + time();					 
		
		if(isset($escapeRem))
		{
			setcookie("email", $email, $cTime_Onset);
		}
		else
		{
			$cTime_Offset = time() - $cTime;
			setcookie('email', '', $cTime_Offset);
		}
			
	?>


	<?php
		if(isset($_POST['login_btn']))
		{
			$email = $_POST['email'];
			$password = $_POST['password'];
			
			$email = strip_tags(mysqli_real_escape_string($con, trim($email)));
			$password = strip_tags(mysqli_real_escape_string($con, trim($password)));
			
			$query = "SELECT password, name FROM user WHERE email = '$email'";
			$query_num = mysqli_query($con, $query);
			
			if(mysqli_num_rows($query_num)== 1)
			{	
				$result = mysqli_fetch_array($query_num);
				$hashpass = $result['password'];
				$name = $result['name'];
			
				if(password_verify($password, $hashpass))
				{
					$_SESSION['userName']= $name;
					header('location:userHome.php');	
				}
				else
				{
					echo '<script type="text/javascript"> alert("You have entered an inccorect password") </script>';
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