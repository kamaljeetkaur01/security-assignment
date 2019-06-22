<?php
	session_start();
	require_once('dbconfig/config.php');
		if(isset($_SESSION['id'])){ 

						

?>
<!DOCTYPE html>
<html>
<head>
<title>Add Record</title>
<link rel="stylesheet" href="css/style.css">
<script type="text/javascript" src="js/main.js"></script>
</head>
<body style="background-color:#bdc3c7">
	<div id="main-wrapper">
		<center><h2>Add Record</h2></center>
		<form action="add_record.php" method="post"   onsubmit="return addrecordvalidate(this);">

			<div class="inner_container">
				
				<div class="formgroup"><label class="lable-side"><b>Name</b></label>
				<input type="text" class="text-side" id="personname" name="personname" ></div>
				<div class="formgroup"><label class="lable-side" ><b>Mobile</b></label>
				<input type="text" class="text-side" id="mobile" onkeypress="return isNumber(event)" name="mobile" ></div>
				<div class="btngrp"><button class="login_button" name="addrecord"  type="submit">Submit</button>
				<button type="reset" class="reset_btn">Reset</button></div>
			
			</div>
		</form>
		
		<?php
			if(isset($_POST['addrecord']))
			{
				
				$personname=$_POST['personname'];
				$mobile=$_POST['mobile'];
			
				$userid=  $_SESSION['id'];

				if($mobile==""||$personname=="")
				{
						echo '<script type="text/javascript">alert("all field is required")</script>';
				}
				else
				{
							$query = "insert into record (id, u_id, name,mobileno)  values(null,$userid,'$personname','$mobile')";
							$query_run = mysqli_query($con,$query);
							if($query_run)
							{
								echo '<script type="text/javascript">alert("Record added successfully.")</script>';
								header( "Location: homepage.php");
							}
							else
							{
								echo '<script type="text/javascript">alert("Server Problem")</script>';
							}
				}

				
			}
			else
			{
			}
		?>
	</div>
</body>
</html>


<?php 

 }
	else{ 

		header( "Location: index.php");

	 }
?>