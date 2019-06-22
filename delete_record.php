<?php
	session_start();
	require_once('dbconfig/config.php');
		if(isset($_SESSION['id'])){ 
?>
<!DOCTYPE html>
<html>
<head>
<title>Delete Record</title>
<link rel="stylesheet" href="css/style.css">
<script type="text/javascript" src="js/main.js"></script>
</head>
<body style="background-color:#bdc3c7">
	<div id="main-wrapper">
	<center><h2>Delete Record</h2></center>
		<?php

				if(isset($_GET['id'])){ $id=$_GET['id']; 
					
						?>
					
<form action="deleteconfrim.php" method="post"   >

			<div class="inner_container">
				
				<h3> Press Ok button to delete the record.</h3>
				
				<div class="btngrp"><button class="login_button"   type="submit">Ok</button>
				<a href="homepage.php"><div class="cancel_link">Cancel</div></a></div>
				<input type="hidden" name="id" value="<?=$id?>">
				
			</div>
		</form>

						<?php
					}
					else{
						echo '<script type="text/javascript">alert("Something going wrong. Please try again!")</script>';
						echo '<h3>Go back.</h3>';

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