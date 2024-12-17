<!doctype html>
<html lang="en">
<head>
	<title>Log In Page</title>
	<meta charset = "utf-8">
	<link rel="stylesheet" type="text/css" href="newcss2.css">
</head>
<body>
	<div id="container">
		<?php include('header.php'); ?>
		<?php include('new_nav_page.php'); ?>
		<?php include('infocolumn.php'); ?>
		<div style="margin-left:600px;" id='contentLogin' ">
		<?php 
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				require('mysqli_connect.php');
				if(!empty($_POST['email'])){
					$e = mysqli_real_escape_string($dbcon, $_POST['email']);
				}else{
					echo '<p class = "edesign">No email.</p>';
					$e= Null;

				}
				if(!empty($_POST['psword'])){
					$p = mysqli_real_escape_string($dbcon, $_POST['psword']);
				}else{
					echo '<p class = "edesign">No password. </p>';
					$p= Null;
				}
				if ($e && $p){
					$encrypt = hash('sha256',$p);
					$q ="SELECT user_id, fname, user_level from users where (email = '$e' AND psword = '$encrypt')";
					$result = mysqli_query($dbcon, $q);
					if (mysqli_num_rows($result)== 1){
					session_start();
					$_SESSION = mysqli_fetch_array($result, MYSQLI_ASSOC);
					$_SESSION['user_level'] = (int) $_SESSION['user_level'];
					$url = ($_SESSION['user_level'] === 1) ? 'admin_page.php' : 'members_page.php';
					header('Location: '. $url);
					exit();
					mysqli_free_result($result);
					mysqli_close($dbcon);
					}else{
						echo '<p class = "edesign">error1. </p>';
					}
				}else{
					echo '<p class = "edesign">error. </p>';
				}

				mysqli_close($dbcon);
			}
		?>
			<div id= "boxes">
					<form action="login_page.php" method="post">
						<p class="boxes1">
							<label class="label" for="email" style="color:black;">Email Address</label>
							<input type="text" id="email" name="email" size="30" maxlength="60" 
							value="<?php if(isset($_POST['email'])) echo$_POST['email'];?>">
						</p>
						<p class="boxes1">
							<label class="label" for="psword" style="color:black;">Password</label>
							<input type="password" id="psword" name="psword" size="30" maxlength="12" 
							value="<?php if(isset($_POST['psword'])) echo$_POST['psword'];?>">
                            <br>
						</p>
						<p class="boxes1">
                        <input type="submit" id="submit" name="submit" value="Login">
						</p>
						</p>
					</form>
				</div>
			</div>
		</div>
        <?php include('footer.php');?>
</body>
</html>