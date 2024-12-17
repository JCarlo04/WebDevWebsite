<?php
$dbcon = @mysqli_connect('localhost', 'JCGoot','JCGoot','members_goot')
OR die('Could not connect to MySQL. Error in '.mysqli_connect_error());
mysqli_set_charset($dbcon, 'utf8');
