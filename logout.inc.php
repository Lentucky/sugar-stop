<?php 

    //include constants.php for URL
    include('config/constants.php');
    //1.Destroy the Session
    session_unset();
    session_destroy(); //Unset $_SESSION['user']

    //2. Redirect to login page
    header('location:'.SITEURL);
    exit();


?>