<!doctype html>
<html lang="en">
<head>
	<title>Registered Users Page</title>
	<meta charset = "utf-8">
	<link rel="stylesheet" type="text/css" href="newcss2.css">
</head>
<body>
	<div id="container-for-view">
		<?php include('header.php'); ?>
		<?php include('nav_admin.php'); ?>
		<?php include('infocolumn.php'); ?>
		<div class='content-view-users'>
			<h2>Registered Users</h2>
			<p>
			<?php
				require('mysqli_connect.php');
				#for fetching data
				$q = "SELECT user_id, fname, lname, email, DATE_FORMAT(registration_date, '%M %d, %Y') as regdate FROM users ORDER BY registration_date ASC"; 
				$result = @mysqli_query($dbcon, $q);
				if($result){
					echo '<table class="content-table" cellspacing ="0.5">
						<tr>
						<td>Name</td>
						<td>Email</td>
						<td>Registration Date</td>
						<th colspan = 2>Actions</th>
						</tr>';
					while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
						echo '<tr>
						<td>'.$row['lname'].', '.$row['fname'] . '</td>
						<td>'.$row['email'] . '</td>
						<td>'.$row['regdate'] . '</td>
						<td><a href="edit_user.php?id='.$row['user_id'].'">Edit</a></td>
						<td><a href="delete_user.php?id='.$row['user_id'].'">Delete</a></td>
						</tr>';
					}
					echo '</table>';
					mysqli_free_result($result);

				}else{
					echo '<p class = "error">The current users could not be retrieved due to a system error. Please report this incident to the SysAdmin. Error Code: 22</p>';
				}
				mysqli_close($dbcon);
			?>
			</p>


		</div>
	</div>
	<?php include('footer.php'); ?>
</body>
</html>