<?php 
    
    include('constants.php');
    //include('functions.inc.php');

    //authorize session or access control
    //check whether the user is logged in or not
    if(!isset($_SESSION['loginUser'])) //if user session is not set
    {
        //User is not logged in
        //redirect to login page with message
        $_SESSION['no-login'] = "<div class='error'>You're not Logged In!</div>";
        //Redirect to login page
        header('location:'.SITEURL.'Login.php');
    }

?>