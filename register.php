<!doctype html>
<html lang="en">
<head>
	<title>Registration Page</title>
	<meta charset = "utf-8">
	<link rel="stylesheet" type="text/css" href="newcss.css">
</head>
<body>
	<div id = "container">
		<?php include('header.php'); ?>
		<?php include('nav_notlogged.php'); ?>
		<?php include('infocolumn.php'); ?>
		<div id='error'>
		<?php
			if($_SERVER['REQUEST_METHOD'] =='POST'){
				//error array to store all errors
				$error = array();
				//is there a first name is entered
				if(empty($_POST['fname'])){
					$errors[] = 'Please input your first name.';
				}else{
					$fn = trim($_POST['fname']);
				}
				
				//check if last name is entered
				$error = array();
				if(empty($_POST['lname'])){
					$errors[] = 'Please input your last name.';
				}else{
					$ln = trim($_POST['lname']);
				}

				//email
				$error = array();
				if(empty($_POST['email'])){
					$errors[] = 'Please input your email.';
				}else{
					$e = trim($_POST['email']);
				}



				//check if password is matching
				if(!empty($_POST['psword1'])){
					if ($_POST['psword1'] != $_POST['psword2']){
						$errors[] = 'Your passwords do not match';
					}else{
						$p = trim($_POST['psword1']);
						
					}
				
				}else{
					$errors[] = 'Please input your password.';
				
				}

				//are all fields successful
				if(empty($errors)){
					require('mysqli_connect.php');
					//query to enter the data
					$hash = hash('sha256', $p);
					$q = "insert into users(fname, lname, email, psword, registration_date) Values ('$fn', '$ln', '$e', '$hash', Now());";
					$result = @mysqli_query($dbcon, $q);
					if($result){ //if result is true
						header("location: register_success.php");	
						exit();
					}else{ //if result is false
						//display ng error
						echo '<h2>System Error</h2>
						<p class="error">Your registration failed due to an unexpected error. Sorry for the inconvenience.</p>
						';
						//for debugging purposes
						echo '<p>'.mysqli_error($dbcon).'</p>';
					}
					//close the database connection
					mysqli_close($dbcon);
					include('footer.php');
					exit();
					
				}else{//error occurred
					echo '<h2 class="errorocc">An Error(s) has occurred</h2>
					<class ="error">The following error(s) occurred:<br/>';
					foreach($errors as $msg){
						echo " - $msg<br/>\n";
					}
					echo'</p><h2 class="plsplspls">Please Try Again.</h2><br/><br/>';
				}

			}

		?>
			<div id="registration_page">
			<h2>Registration Page</h2>
			<div id="input_boxes">
			<form action="register.php" method="post">
			<p class="buttons">
				<label class="class" for ="fname">First Name</label>
				<input type="text" id="fname" name="fname" size="30" maxlength="40"
				value="<?php if(isset($_POST['fname'])) echo $_POST['fname'];?>">
				</p>

				<p class="buttons">
				<label class="class" for ="lname">Last Name</label>
				<input type="text" id="lname" name="lname" size="30" maxlength="40"
				value="<?php if(isset($_POST['lname'])) echo $_POST['lname'];?>">
				</p>

				<p class="buttons">
				<label class="class" for ="email">Email Address</label>
				<input type="text" id="email" name="email" size="30" maxlength="50"
				value="<?php if(isset($_POST['email'])) echo $_POST['email'];?>">
				</p>

				<p class="buttons">
				<label class="class" for ="psword1">Password</label>
				<input type="password" id="psword1" name="psword1" size="20" maxlength="40"
				value="<?php if(isset($_POST['psword1'])) echo $_POST['psword1'];?>">
				</p>

				<p class="buttons">
				<label class="class" for ="psword2">Repeat Password</label>
				<input type="password" id="psword2" name="psword2" size="20" maxlength="40"
				value="<?php if(isset($_POST['psword2'])) echo $_POST['psword2'];?>">
				</p>

				<p><input type="submit" id="submit" name="submit" value="Register">

				</p>

			</form>
			</div>
			</div>
		</div>
		</div>
	<?php include('footer.php'); ?>
</body>
</html>