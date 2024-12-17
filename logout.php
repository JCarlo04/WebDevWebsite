<?php
    session_start();
    // if no one's logged in, redirect to index
    if(!isset($_SESSION['user_id'])){
        header("Location:index.php");
        exit();
    }
    // if there's a log in, delete the session then redirect to index
    else{
        $_SESSION = array();
        session_destroy();
        //sanity checking
        setcookie('PHPSESSID', '', time()-3600, '/', '', 0, 0 );
        header("Location: index.php");
        exit();
    }
?>