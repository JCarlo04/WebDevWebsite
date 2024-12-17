<?php
	session_start();
	// checking for session id or admin id
	if(!isset($_SESSION['user_level']) or ($_SESSION['user_level'] != 1)){
		header(header: "localtion: login_page.php");
		exit();
	}

?>
<!doctype html>
<html lang="en">
<head>
	<title>Administrator Page</title>
	<meta charset = "utf-8">
	<link rel="stylesheet" type="text/css" href="newcss2.css">
</head>
<body>
	<div id="container">
		<?php include('header.php'); ?>
		<?php include('nav_admin.php'); ?>
		<div id='contentAdmin'>
			<h1 id="admin">BRO IS AN ADMIN😭🙏</h1>
			<h3 id="admin">Here are the analytics of the website for this month!</h3>
			<img id="dashboard" src="dashboard.png"alt="Administrator Dashboard"></img>
		</div>
	</div>
	<?php include('footer.php'); ?>
</body>
</html>