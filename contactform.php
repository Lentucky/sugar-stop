<?php ob_start(); ?>

<?php 
    include('config/constants.php');

    if(isset($_POST['btn-send']))
    {
        $username = $_POST['name'];
        $subject = $_POST['subject'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        
        $mailTo = "sugarstoplaguna@yahoo.com";
        $headers = "From: ".$email; 
        $txt = "You have received an e-mail from ".$name.".\n\n".$message;

        if(mail($to,$subject,$message,$email))
        {
            $_SESSION['contact'] = "<div class='success'>Your email has been sent!</div>";
            header("location:".SITEURL);
            ob_end_flush();
        }     
        else
        {
            $_SESSION['contact'] = "<div class='error'>There was an error, please try again</div>";
            header('location:'.SITEURL);
        }
    }
    
?>