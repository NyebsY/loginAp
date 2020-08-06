<?php
	require "dbConfig.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration Page</title>
	<link rel="stylesheet" href= "css/style.css">
</head>
<body style="background-color:#00CCFF">
	<form action="register.php" method="post">
		<div id="wrapper">
			<center>
			<h1>Registration Form</h1>
			</center>
				<label>Email Address:</label>
				<br>
				<input name="email" type= "text" class="inputvalues" required>
				<br>
				
				<label>Name:</label>
				<br>
				<input name="name" type= "text" class="inputvalues" required>
				<br>
				
				<label>Surname:</label>
				<br>
				<input name="surname" type= "text" class="inputvalues" required>
				<br>
				
				<label>Password:</label>
				<br>
				<input name="password" type= "password" class="inputvalues" required>
				<br>
				<label>Confirm Password:</label>
				<br>
				<input name="Cpassword" type= "password" class="inputvalues" required>
				<br>
				
				<input name="submit_btn" type="submit" class="button
				
				  " id="register_btn" value="Sign Up">
				<p>Already have an account? <a href="login.php">Click here to Login</a></p>	
		</div>
		
	</form>
	<?php
		if(isset($_POST['submit_btn']))
		{
			$email = $_POST['email'];
			$name = $_POST['name'];
			$surname = $_POST['surname'];
			$password = $_POST['password'];
			$Cpassword = $_POST['Cpassword'];

			if($password == $Cpassword)
			{
				$regex = '/^[a-zA-Z\s\d\w]{6,}+$/';
				
				
				
				if(preg_match($regex, $password))
				{
					echo '<script type="text/javascript"> alert("Password should contain atleast 1 number, 1 specail character, 1 upper case and 1 lowercase letter")</script>';
				}
				else
				{
					$query = "SELECT email FROM user WHERE email = '$email'";
					$result = mysqli_query($con, $query);
					$check = mysqli_fetch_array($result);

					if(isset($check))
					{
						echo '<script type="text/javascript"> alert("User already registered. Login or try another email address") </script>';
					}
					else
					{
						$encryptPass = password_hash($password, PASSWORD_DEFAULT);
						$query="INSERT INTO user(`name`, `surname`, `email`, `password`) VALUES('$name', '$surname', '$email', '$encryptPass')";
						$query_run= mysqli_query($con, $query);

						if($query_run)
						{
							echo '<script type="text/javascript"> alert("User successfully registrated.") </script>';
							header('location:login.php');
						}
						else
						{
							echo '<script type="text/javascript"> alert("Unable to register. Please try again") </script>';
						}
					}
				}
				
			}
			else
			{
				echo '<script type="text/javascript"> alert("Passwords do not match!") </script>';
			}
		}
						
			
	?>
	

</body>
</html>