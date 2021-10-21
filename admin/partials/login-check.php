<?php 
    
    //authorize session or access control
    //check whether the user is logged in or not
    if(!isset($_SESSION['user'])) //if user session is not set
    {
        //User is not logged in
        //redirect to login page with message
        $_SESSION['no-login-message'] = "<div class='error'>Login error</div>";
        //Redirect to login page
        header('location:'.SITEURL.'admin/login.php');
    }

?>
