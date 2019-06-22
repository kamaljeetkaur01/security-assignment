<?php
	session_start();
	require_once('dbconfig/config.php');
	//phpinfo();

	if(isset($_SESSION['id'])){ 

						

?>
<!DOCTYPE html>
<html>
<head>
<title>Home Page</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div id="main-wrapper">
		
		
	
			
			<div class="inner_container">
				<div class="btngrp">
					<a href="add_record.php"><button class="login_button" name="login" type="button">Add Record</button></a>
					<a href="change_password.php" > <div class="change_password">Change Password</div></a>
				</div>

				<a href="logout.php"><button class="logout_button" type="button">Log Out</button></a>	
			</div>
		
		<?php 
			$query = "select * from record where u_id='".$_SESSION['id']."'";
					//echo $query;
				$query_run = mysqli_query($con,$query);
				//echo mysql_num_rows($query_run);
				if($query_run->num_rows > 0)
					{	?>
						<table  border="1" width="100%">
							<tr>
								<th>ID</th>
								<th>Name</th>
								<th>Mobile No</th>
								<th>Action</th>
							</tr>

					<?php	
						while($row = $query_run->fetch_assoc()) {
						?>
						<tr>
								<td><?=$row['id']?></td>
								<td><?=$row['name']?></td>
								<td><?=$row['mobileno']?></td>
								<td>	
									<a href="edit_record.php?id=<?=$row['id']?>">Edit</a>
									<a href="delete_record.php?id=<?=$row['id']?>">Delete</a>

								</td>
							</tr>
					<?php } ?>
						</table>
				<?php	 }
					else{

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