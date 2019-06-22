<?php
	session_start();
	require_once('dbconfig/config.php');
	
if(isset($_SESSION['id'])){ 

							header( "Location: homepage.php");
 }
	else{
?>
<!DOCTYPE html>
<html>
<head>
<title>Sign Up Page</title>
<link rel="stylesheet" href="css/style.css">
<script type="text/javascript" src="js/main.js"></script>
</head>
<body style="background-color:#FFC0CB">
	<div id="main-wrapper">
	<center><h2>Registration Form</h2></center>
		<form action="register.php" method="post"   onsubmit="return signupvalidate(this);">

			<div class="inner_container">
				
				<div class="formgroup"><label class="lable-side"><b>User Name</b></label>
				<input type="text" class="text-side" id="first_name" name="first_name" color="#000000"></div>
				<div class="formgroup"><label class="lable-side"><b>User Email</b></label>
				<input type="text" class="text-side" id="email" name="email" color="#000000"></div>
				<div class="formgroup"><label class="lable-side"><b>User Password</b></label>
				<input type="password" class="text-side" id="password" name="password" color="#000000" ></div>
				<div class="formgroup"><label class="lable-side"><b>Confirm Password</b></label>
				<input type="password" class="text-side" name="cpassword" id="cpassword" color="#000000"></div>
				<div class="btngrp"><button class="login_button" name="register"  type="submit">Submit</button>
				
				<div class="register_div"> <a href="index.php" class="register_link"><span>Login</span></a></div>
			</div>
		</form>
		
		<?php
			if(isset($_POST['register']))
			{
				$first_name=$_POST['first_name'];
				$email=$_POST['email'];
				$password=$_POST['password'];
				$cpassword=$_POST['cpassword'];
				
				if($password==$cpassword)
				{
					$query = "select * from users where email='$email'";
					//echo $query;
				$query_run = mysqli_query($con,$query);
				//echo mysql_num_rows($query_run);
				if($query_run)
					{
						if(mysqli_num_rows($query_run)>0)
						{
							echo '<script type="text/javascript">alert("This Username Already exists.. Please try another email!")</script>';
						}
						else
						{	$encrypted_password = password_hash($password, PASSWORD_DEFAULT);
							$query = "insert into users (id, first_name, email,password)  values(null,'$first_name','$email','$encrypted_password')";
							$query_run = mysqli_query($con,$query);
							if($query_run)
							{
								echo '<script type="text/javascript">alert("User Registered.. Welcome")</script>';
								$_SESSION['email'] = $email;
								$_SESSION['id'] = mysqli_insert_id($con);
								header( "Location: homepage.php");
							}
							else
							{
								echo '<p class="bg-danger msg-block">Registration Unsuccessful due to server error. Please try later</p>';
							}
						}
					}
					else
					{
						echo '<script type="text/javascript">alert("DB error")</script>';
					}
				}
				else
				{
					echo '<script type="text/javascript">alert("Password and Confirm Password do not match")</script>';
				}
				
			}
			else
			{
			}
		?>
	</div>
</body>
</html>

<?php  } ?>