<!doctype html>
<html lang="en">
<head>
    <title>Edit User Information</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="newcss2.css">
</head>
<body>
    <div id="container">
        <?php include('header.php'); ?>
        <?php include('nav.php'); ?>
        <?php include('infocolumn.php'); ?>

        <div id='content'>
            <h2>Edit User Record</h2>
            <?php
                # checking for valid id number
                if ((isset($_GET['id']) && is_numeric($_GET['id']))) {
                    $id = $_GET['id'];
                } elseif ((isset($_POST['id']) && is_numeric($_POST['id']))) {
                    $id = $_POST['id'];
                } else {
                    # if no valid id was found
                    echo '<p class="error">This page has been accessed by mistake.</p>';
                    include('footer.php');
                    exit();
                }

                require('mysqli_connect.php');

                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $errors = array();
                    # TASK, check if the fname($fn), lname($ln), and email($e) has content
                    if (empty($_POST['fname'])) {
                        $errors[] = 'Please input your first name.';
                    } else {
                        $fn = trim($_POST['fname']);
                    }

                    # check if last name is entered
                    if (empty($_POST['lname'])) {
                        $errors[] = 'Please input your last name.';
                    } else {
                        $ln = trim($_POST['lname']);
                    }

                    # check if email is entered
                    if (empty($_POST['email'])) {
                        $errors[] = 'Please input your email.';
                    } else {
                        $e = trim($_POST['email']);
                    }

                    if (empty($errors)) {
                        # editing was successful
                        $q = "UPDATE users SET fname='$fn', lname='$ln', email='$e' WHERE user_id = '$id' LIMIT 1";
                        $result = @mysqli_query($dbcon, $q);
                        if (mysqli_affected_rows($dbcon) == 1) {
                            echo '<h3>The user information has been updated!</h3>';
                        } else {
                            echo '<h3>The user information has NOT been updated due to a system error.</h3>';
                            echo '<p>' . mysqli_error($dbcon) . '</p>';
                        }
                    } else {
                        # display errors
                        echo '<h2 class="errorocc">An Error(s) has occurred</h2>';
                        echo 'The following error(s) occurred:<br/>';
                        foreach ($errors as $msg) {
                            echo " - $msg<br/>\n";
                        }
                        echo '<p>Please Try Again!</p>';
                    }
                }

                $q = "SELECT fname, lname, email FROM users WHERE user_id = '$id'";
                $result = @mysqli_query($dbcon, $q);

                if (mysqli_num_rows($result) == 1) { # if there is a valid user id
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    # create the form including the text boxes
                    echo '
                        <form action="edit_user.php" method="post">
                            <p class="buttons">
                                <label class="class" for="fname">First Name</label>
                                <input type="text" id="fname" name="fname" size="30" maxlength="40" value="' . $row['fname'] . '">
                            </p>
                            <p class="buttons">
                                <label class="class" for="lname">Last Name</label>
                                <input type="text" id="lname" name="lname" size="30" maxlength="40" value="' . $row['lname'] . '">
                            </p>
                            <p class="buttons">
                                <label class="class" for="email">Email Address</label>
                                <input type="text" id="email" name="email" size="30" maxlength="50" value="' . $row['email'] . '">
                            </p>
                            <p><input type="submit" id="submit" name="submit" value="Edit"></p>
                            <p><input type="hidden" name="id" value="' . $id . '"></p>
                        </form>';
                } else {
                    # id is not valid
                    echo '<h2>User cannot be found in the database.</h2>';
                    echo '<p>Would you want to register instead? Click <a href="register.php">HERE.</a></p>';
                }

                mysqli_close($dbcon);
            ?>
        </div>

        <?php include('footer.php'); ?>
    </div>
</body>
</html>

